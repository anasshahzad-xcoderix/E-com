@php
    $product = 'Glow table lamp';
    $oldPrice = 120;
    $discount = 30;
    $newPrice = $oldPrice - ($oldPrice * $discount / 100);
@endphp

<style>
    .sale { padding: 24px 0 72px; }
    .sale-card {
        display: grid; grid-template-columns: 1fr 1fr;
        border-radius: 28px; overflow: hidden; background: #6b2d5c; color: #fff;
        min-height: 340px;
    }
    .sale-text { padding: 48px; display: flex; flex-direction: column; justify-content: center; }
    .sale-text h2 { font-size: clamp(28px, 3.4vw, 40px); font-weight: 800; line-height: 1.1; letter-spacing: -1px; }
    .sale-text p { margin-top: 16px; font-size: 14px; line-height: 1.6; color: #f0dcea; max-width: 420px; }

    .timer { display: flex; gap: 10px; margin-top: 26px; }
    .tbox {
        background: rgba(255, 255, 255, 0.14); border-radius: 14px;
        min-width: 62px; padding: 10px 8px; text-align: center;
    }
    .tbox strong { display: block; font-size: 24px; font-weight: 800; line-height: 1.1; }
    .tbox span { font-size: 11px; color: #f0dcea; }

    .sale-buy { display: flex; align-items: center; gap: 14px; margin-top: 30px; flex-wrap: wrap; }
    .new-price { font-size: 34px; font-weight: 800; }
    .old-price { color: #d9b9cf; text-decoration: line-through; font-size: 16px; margin-left: -6px; }
    .sale-btn {
        background: #ffc928; color: #14233b; border: none; cursor: pointer;
        padding: 13px 22px; border-radius: 999px; font-family: inherit;
        font-weight: 700; font-size: 14px; transition: 0.2s;
    }
    .sale-btn:hover { background: #fff; transform: translateY(-2px); }

    .sale-art { background: #8b4579; display: flex; align-items: center; justify-content: center; padding: 24px; }
    .sale-art svg { width: 55%; max-width: 280px; height: auto; }

    @media (max-width: 800px) {
        .sale-card { grid-template-columns: 1fr; }
        .sale-art { order: -1; padding: 32px 24px 8px; }
        .sale-art svg { width: 38%; max-width: 160px; }
        .sale-text { padding: 28px 24px 32px; }
    }
    @media (max-width: 420px) {
        .tbox { min-width: 54px; }
        .tbox strong { font-size: 20px; }
        .new-price { font-size: 28px; }
    }
</style>

<section class="sale" id="sale">
    <div class="wrap">
        <div class="sale-card">

            <div class="sale-text">
                <h2>Today only: {{ $discount }}% off the {{ $product }}</h2>
                <p>Hand-blown glass shade, oak base and a warm dimmable bulb included. When the clock runs out, the price goes back up.</p>

                <div class="timer">
                    <div class="tbox"><strong id="sHours">00</strong><span>Hours</span></div>
                    <div class="tbox"><strong id="sMins">00</strong><span>Minutes</span></div>
                    <div class="tbox"><strong id="sSecs">00</strong><span>Seconds</span></div>
                </div>

                <div class="sale-buy">
                    <span class="new-price">${{ $newPrice }}</span>
                    <span class="old-price">${{ $oldPrice }}</span>
                    <button class="sale-btn" id="saleBtn">Add lamp to cart</button>
                </div>
            </div>

            <div class="sale-art">
                <svg viewBox="0 0 200 200">
                    <polygon points="62,30 138,30 158,92 42,92" fill="#ffc928"/>
                    <circle cx="100" cy="86" r="9" fill="#fff6b0"/>
                    <rect x="95" y="92" width="10" height="82" rx="3" fill="#fff"/>
                    <ellipse cx="100" cy="178" rx="38" ry="10" fill="#fff"/>
                </svg>
            </div>

        </div>
    </div>
</section>

<script>
(function () {
    const h = document.getElementById('sHours');
    const m = document.getElementById('sMins');
    const s = document.getElementById('sSecs');
    const pad = n => String(n).padStart(2, '0');

    function tick() {
        const now = new Date();
        const end = new Date(now);
        end.setHours(24, 0, 0, 0);               // aaj raat 12 baje
        const diff = Math.floor((end - now) / 1000);

        h.textContent = pad(Math.floor(diff / 3600));
        m.textContent = pad(Math.floor((diff % 3600) / 60));
        s.textContent = pad(diff % 60);
    }
    tick();
    setInterval(tick, 1000);

    // Add lamp to cart: header ka cart count barhao
    document.getElementById('saleBtn').addEventListener('click', () => {
        const badge = document.querySelector('.cart-count');
        if (badge) badge.textContent = (parseInt(badge.textContent) || 0) + 1;
    });
})();
</script>