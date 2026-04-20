<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChatController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = $request->user();

        $members = \App\Models\User::query()
            ->select(['id', 'name', 'email', 'avatar', 'updated_at'])
            ->orderBy('name')
            ->get();

        $messages = ChatMessage::query()
            ->with(['sender:id,name,avatar'])
            ->inRoom()
            ->orderBy('id')
            ->limit(120)
            ->get();

        ChatMessage::query()
            ->inRoom()
            ->where('sender_id', '!=', $currentUser->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return view('User.KenhTroTruyen', [
            'members' => $members,
            'messages' => $messages,
        ]);
    }

    public function stream(Request $request): JsonResponse
    {
        $currentUser = $request->user();

        $afterId = (int) $request->integer('after_id');

        $query = ChatMessage::query()
            ->with([
                'sender:id,name,avatar',
            ])
            ->inRoom()
            ->orderBy('id');

        if ($afterId > 0) {
            $query->where('id', '>', $afterId);
        }

        $messages = $query->get();

        ChatMessage::query()
            ->inRoom()
            ->where('sender_id', '!=', $currentUser->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json([
            'messages' => $messages->map(function (ChatMessage $message) {
                return $this->formatMessage($message);
            })->values(),
        ]);
    }

    public function send(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:1000'],
        ]);

        $sender = $request->user();

        $message = ChatMessage::create([
            'room' => ChatMessage::GLOBAL_ROOM,
            'sender_id' => $sender->id,
            'recipient_id' => $sender->id,
            'body' => trim($validated['body']),
            'read_at' => null,
        ]);

        $message->load([
            'sender:id,name,avatar',
        ]);

        return response()->json([
            'message' => $this->formatMessage($message),
        ], 201);
    }

    private function formatMessage(ChatMessage $message): array
    {
        return [
            'id' => $message->id,
            'room' => $message->room,
            'sender_id' => $message->sender_id,
            'recipient_id' => $message->recipient_id,
            'body' => $message->body,
            'created_at' => optional($message->created_at)->format('H:i d/m'),
            'is_mine' => Auth::id() === $message->sender_id,
            'sender' => [
                'id' => $message->sender?->id,
                'name' => $message->sender?->name,
                'avatar' => $message->sender?->avatar,
            ],
        ];
    }

    public function deleteMessage(Request $request, ChatMessage $message): JsonResponse
    {
        $user = $request->user();

        if ($user->role !== 'admin' && $message->sender_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $message->delete();

        return response()->json(['success' => true]);
    }

    public function deleteAllMessages(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->role !== 'admin') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        ChatMessage::query()->inRoom()->delete();

        return response()->json(['success' => true]);
    }
}