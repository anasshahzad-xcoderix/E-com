@php
    $benefits = [
        [
            'title' => 'One checkout, many makers',
            'text'  => 'Buy from a dozen makers in a single order. We combine shipments so you pay delivery once and get one tracking link.',
            'bg'    => '#f5b73b',
            'fg'    => '#14233b',
            'icon'  => '<rect x="2" y="7" width="13" height="9" rx="2"/><path d="M15 10h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="18" cy="18" r="2"/>',
        ],
        [
            'title' => 'Easy returns, no paperwork',
            'text'  => 'Print a prepaid label from your order page. Refunds reach your card within two business days of the parcel scan.',
            'bg'    => '#1f7a6d',
            'fg'    => '#ffffff',
            'icon'  => '<path d="M20 11a8 8 0 0 0-14-4L4 9"/><path d="M4 4v5h5"/><path d="M4 13a8 8 0 0 0 14 4l2-2"/><path d="M20 20v-5h-5"/>',
        ],
        [
            'title' => 'Protected from click to doorstep',
            'text'  => 'If a piece arrives chipped or never arrives, we replace it or refund you. No photos of the box needed for orders under $150.',
            'bg'    => '#5a2a4e',
            'fg'    => '#ffffff',
            'icon'  => '<path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M8.5 12l2.5 2.5 4.5-5"/>',
        ],
    ];
@endphp

<style>
    .benefits { background: #f3f5f7; padding: 72px 0; }
    .benefits h2 {
        font-size: clamp(28px, 4vw, 44px); font-weight: 800; line-height: 1.1;
        letter-spacing: -1.5px; max-width: 760px; margin-bottom: 40px;
    }
    .benefit-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .benefit {
        background: #fff; border: 1px solid #e2e8f0; border-radius: 26px;
        padding: 32px; transition: 0.25s;
    }
    .benefit:hover { transform: translateY(-5px); box-shadow: 0 16px 30px rgba(20, 35, 59, 0.08); }
    .benefit-icon {
        width: 48px; height: 48px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center; margin-bottom: 28px;
    }
    .benefit-icon svg {
        width: 24px; height: 24px; fill: none; stroke: currentColor;
        stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
    }
    .benefit h3 { font-size: 21px; font-weight: 800; line-height: 1.25; letter-spacing: -0.4px; max-width: 260px; }
    .benefit p { margin-top: 14px; color: #5b6b80; font-size: 15px; line-height: 1.7; }

    @media (max-width: 1000px) {
        .benefit-grid { grid-template-columns: 1fr; gap: 16px; }
        .benefit h3 { max-width: none; }
    }
    @media (max-width: 700px) {
        .benefits { padding: 48px 0; }
        .benefits h2 { margin-bottom: 28px; }
        .benefit { padding: 24px; }
        .benefit-icon { margin-bottom: 20px; }
    }
</style>

<section class="benefits" id="benefits">
    <div class="wrap">
        <h2>Shopping online should feel as good as unwrapping the box</h2>

        <div class="benefit-grid">
            @foreach ($benefits as $b)
                <article class="benefit">
                    <div class="benefit-icon" style="background: {{ $b['bg'] }}; color: {{ $b['fg'] }}">
                        <svg viewBox="0 0 24 24">{!! $b['icon'] !!}</svg>
                    </div>
                    <h3>{{ $b['title'] }}</h3>
                    <p>{{ $b['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>