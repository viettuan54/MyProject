<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\product;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function store(Request $request, product $product)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $hasPurchased = Order::where('user_id', Auth::id())
            ->whereHas('items', function ($query) use ($product) {
                $query->where('product_id', $product->id);
            })
            ->exists();

        if (!$hasPurchased) {
            return back()->with('error', 'Bạn cần mua sản phẩm này trước khi đánh giá.');
        }

        ProductReview::updateOrCreate(
            [
                'product_id' => $product->id,
                'user_id' => Auth::id(),
            ],
            [
                'rating' => $validated['rating'],
                'comment' => $validated['comment'] ?? null,
            ]
        );

        return back()->with('success', 'Cảm ơn bạn đã gửi đánh giá!');
    }
}
