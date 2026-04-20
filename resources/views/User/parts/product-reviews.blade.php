@php
    $reviews = $product->reviews()->with('user')->latest()->get();
    $reviewCount = $reviews->count();
    $averageRating = $reviewCount > 0 ? round($reviews->avg('rating'), 1) : 0;
    $myReview = auth()->check() ? $reviews->firstWhere('user_id', auth()->id()) : null;
    $ratingBreakdown = collect([5, 4, 3, 2, 1])->mapWithKeys(function ($star) use ($reviews, $reviewCount) {
        $count = $reviews->where('rating', $star)->count();
        $percent = $reviewCount > 0 ? round(($count / $reviewCount) * 100) : 0;
        return [$star => ['count' => $count, 'percent' => $percent]];
    });
@endphp

<style>
    .review-wrap {
        max-width: 1200px;
        margin: 52px auto;
        padding: 0 20px;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .review-grid {
        display: grid;
        grid-template-columns: minmax(280px, 370px) 1fr;
        gap: 24px;
        align-items: start;
    }

    .review-card {
        background: linear-gradient(170deg, #ffffff 0%, #f7f7f7 100%);
        border: 1px solid #e7e7e7;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
    }

    .review-title {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        color: #111;
    }

    .review-sub {
        margin: 6px 0 0;
        color: #646464;
        font-size: 14px;
    }

    .review-score {
        display: flex;
        align-items: baseline;
        gap: 8px;
        margin: 16px 0 4px;
    }

    .review-score strong {
        font-size: 44px;
        line-height: 1;
        color: #111;
    }

    .review-stars {
        color: #f2b01e;
        letter-spacing: 2px;
        font-size: 18px;
        margin: 2px 0 14px;
    }

    .review-breakdown {
        display: grid;
        gap: 8px;
        margin-bottom: 16px;
    }

    .review-bar-row {
        display: grid;
        grid-template-columns: 34px 1fr 36px;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #555;
    }

    .review-bar {
        height: 8px;
        border-radius: 999px;
        background: #ececec;
        overflow: hidden;
    }

    .review-bar > span {
        display: block;
        height: 100%;
        border-radius: inherit;
        background: linear-gradient(90deg, #ffbf2f 0%, #f08c00 100%);
    }

    .review-alert {
        margin: 12px 0 0;
        padding: 10px 12px;
        border-radius: 10px;
        font-size: 14px;
    }

    .review-alert.error {
        background: #fff2f2;
        color: #b00020;
        border: 1px solid #ffc9cf;
    }

    .review-alert.success {
        background: #eefcf3;
        color: #147a3f;
        border: 1px solid #bfe9ce;
    }

    .review-form {
        margin-top: 14px;
        display: grid;
        gap: 10px;
    }

    .review-form label {
        font-weight: 600;
        font-size: 14px;
        color: #1f1f1f;
    }

    .review-form select,
    .review-form textarea {
        width: 100%;
        border: 1px solid #d6d6d6;
        border-radius: 10px;
        background: #fff;
        padding: 10px 12px;
        font-size: 14px;
        color: #1f1f1f;
        transition: border-color .2s ease, box-shadow .2s ease;
    }

    .review-form select {
        height: 42px;
    }

    .review-form textarea {
        resize: vertical;
        min-height: 108px;
    }

    .review-form select:focus,
    .review-form textarea:focus {
        outline: none;
        border-color: #111;
        box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.08);
    }

    .review-error {
        margin: 0;
        color: #b00020;
        font-size: 13px;
    }

    .review-submit {
        border: none;
        background: #111;
        color: #fff;
        height: 44px;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: transform .15s ease, opacity .2s ease;
    }

    .review-submit:hover {
        transform: translateY(-1px);
        opacity: 0.95;
    }

    .review-login-note {
        margin: 12px 0 0;
        font-size: 14px;
        color: #4b4b4b;
    }

    .review-login-note a {
        color: #111;
        font-weight: 600;
    }

    .review-list-card {
        background: #fff;
        border: 1px solid #e7e7e7;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.04);
    }

    .review-list-title {
        margin: 0 0 10px;
        font-size: 20px;
        color: #111;
    }

    .review-item {
        padding: 16px 0;
        border-bottom: 1px dashed #dedede;
    }

    .review-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .review-user {
        margin: 0;
        font-weight: 700;
        color: #171717;
        font-size: 15px;
    }

    .review-item-stars {
        margin: 4px 0 8px;
        color: #f2b01e;
        letter-spacing: 1.5px;
    }

    .review-comment {
        margin: 0;
        color: #3c3c3c;
        line-height: 1.6;
        font-size: 14px;
    }

    .review-time {
        display: inline-block;
        margin-top: 8px;
        color: #8b8b8b;
        font-size: 12px;
    }

    .review-empty {
        margin: 0;
        color: #666;
        font-size: 14px;
    }

    @media (max-width: 900px) {
        .review-grid {
            grid-template-columns: 1fr;
        }

        .review-wrap {
            margin: 36px auto;
        }
    }
</style>

<section class="review-wrap">
    <div class="review-grid">
        <div class="review-card">
            <h2 class="review-title">Đánh Giá Khách Hàng</h2>
            <p class="review-sub">Trải nghiệm thật từ người đã mua sản phẩm</p>

            <div class="review-score">
                <strong>{{ $averageRating }}</strong>
                <span>/5</span>
            </div>
            <p class="review-stars">{{ str_repeat('★', (int) round($averageRating)) }}{{ str_repeat('☆', 5 - (int) round($averageRating)) }}</p>
            <p class="review-sub">{{ $reviewCount }} đánh giá</p>

            <div class="review-breakdown">
                @foreach([5, 4, 3, 2, 1] as $star)
                    <div class="review-bar-row">
                        <span>{{ $star }}★</span>
                        <div class="review-bar">
                            <span style="width: {{ $ratingBreakdown[$star]['percent'] }}%;"></span>
                        </div>
                        <span>{{ $ratingBreakdown[$star]['count'] }}</span>
                    </div>
                @endforeach
            </div>

            @if(session('error'))
                <p class="review-alert error">{{ session('error') }}</p>
            @endif
            @if(session('success'))
                <p class="review-alert success">{{ session('success') }}</p>
            @endif

            @if(auth()->check())
                <form action="{{ route('products.reviews.store', $product->id) }}" method="POST" class="review-form">
                    @csrf
                    <label for="rating">Chấm điểm</label>
                    <select name="rating" id="rating">
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ (int) old('rating', $myReview->rating ?? 5) === $i ? 'selected' : '' }}>
                                {{ $i }} sao
                            </option>
                        @endfor
                    </select>

                    <label for="comment">Nhận xét</label>
                    <textarea name="comment" id="comment" maxlength="1000" placeholder="Chia sẻ cảm nhận của bạn về mẫu xe này...">{{ old('comment', $myReview->comment ?? '') }}</textarea>

                    @error('rating')
                        <p class="review-error">{{ $message }}</p>
                    @enderror
                    @error('comment')
                        <p class="review-error">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="review-submit">
                        {{ $myReview ? 'Cập nhật đánh giá' : 'Gửi đánh giá' }}
                    </button>
                </form>
            @else
                <p class="review-login-note">Vui lòng <a href="{{ url('/dangnhap') }}">đăng nhập</a> để gửi đánh giá.</p>
            @endif
        </div>

        <div class="review-list-card">
            <h3 class="review-list-title">Nhận xét gần đây</h3>

            @forelse($reviews as $review)
                <article class="review-item">
                    <p class="review-user">{{ $review->user->name ?? 'Khách hàng' }}</p>
                    <p class="review-item-stars">{{ str_repeat('★', (int) $review->rating) }}{{ str_repeat('☆', 5 - (int) $review->rating) }}</p>
                    @if($review->comment)
                        <p class="review-comment">{{ $review->comment }}</p>
                    @endif
                    <span class="review-time">{{ $review->created_at->format('d/m/Y H:i') }}</span>
                </article>
            @empty
                <p class="review-empty">Sản phẩm chưa có đánh giá nào.</p>
            @endforelse
        </div>
    </div>
</section>
