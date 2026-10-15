@php
    $reviews = [
        ['rating' => 5, 'name' => 'Hannah R.',  'text' => 'The mugs arrived wrapped in paper, not plastic, and not a single one was chipped. They feel even better than the photos.'],
        ['rating' => 5, 'name' => 'David K.',   'text' => 'I swapped my rug for a different size and the return label was in my inbox within a minute. Completely painless.'],
        ['rating' => 4, 'name' => 'Sofia M.',  'text' => 'The lamp is stunning. Delivery took four days instead of three, but the tracking updates were honest.'],
    ];
@endphp

<style>
    .reviews { background: #f3f5f7; padding: 72px 0; border-bottom: 1px solid #e2e8f0; }
    .reviews h2 {
        font-size: clamp(28px, 4vw, 44px); font-weight: 800; line-height: 1.1;
        letter-spacing: -1.5px; max-width: 760px; margin-bottom: 40px;
    }
    .review-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .review {
        background: #fff; border: 1px solid #e2e8f0; border-radius: 26px;
        padding: 32px; display: flex; flex-direction: column; transition: 0.25s;
    }
    .review:hover { transform: translateY(-5px); box-shadow: 0 16px 30px rgba(20, 35, 59, 0.08); }
    .stars { color: #f5b73b; font-size: 18px; letter-spacing: 3px; margin-bottom: 20px; }
    .review blockquote { font-size: 17px; line-height: 1.7; color: #14233b; flex: 1; }
    .review-by { margin-top: 26px; font-size: 13px; color: #7b8a9c; }

    @media (max-width: 1000px) {
        .review-grid { grid-template-columns: 1fr; gap: 16px; }
    }
    @media (max-width: 700px) {
        .reviews { padding: 48px 0; }
        .reviews h2 { margin-bottom: 28px; }
        .review { padding: 24px; }
        .review blockquote { font-size: 16px; }
    }
</style>

<section class="reviews" id="reviews">
    <div class="wrap">
        <h2>What customers say after the box is open</h2>

        <div class="review-grid">
            @foreach ($reviews as $r)
                <article class="review">
                    <div class="stars" aria-label="{{ $r['rating'] }} out of 5 stars">
                        @for ($i = 1; $i <= 5; $i++)
                            {{ $i <= $r['rating'] ? '★' : '☆' }}
                        @endfor
                    </div>
                    <blockquote>{{ $r['text'] }}</blockquote>
                    <p class="review-by">{{ $r['name'] }} · Verified buyer</p>
                </article>
            @endforeach
        </div>
    </div>
</section>