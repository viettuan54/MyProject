<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class ChatMessage extends Model
{
    public const GLOBAL_ROOM = 'global';

    protected $fillable = [
        'room',
        'sender_id',
        'recipient_id',
        'body',
        'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function scopeInRoom(Builder $query, string $room = self::GLOBAL_ROOM): Builder
    {
        return $query->where('room', $room);
    }
}
