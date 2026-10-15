<style>
    .news { background: #f3f5f7; padding: 72px 0; }
    .news-card {
        background: #f1b232; border-radius: 34px; padding: 56px 56px;
        display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center;
    }
    .news-text h2 {
        font-size: clamp(28px, 3.6vw, 44px); font-weight: 800; line-height: 1.08;
        letter-spacing: -1.5px; color: #14233b; max-width: 460px;
    }
    .news-text p { margin-top: 16px; color: #4a4a3a; font-size: 15px; line-height: 1.6; max-width: 400px; }

    .news-form { display: flex; gap: 12px; }
    .news-form input {
        flex: 1; min-width: 0; border: 2px solid transparent; background: #fff;
        padding: 17px 24px; border-radius: 999px; font-family: inherit; font-size: 15px; color: #14233b;
    }
    .news-form input::placeholder { color: #9aa5b4; }
    .news-form input:focus { outline: none; border-color: #14233b; }
    .news-form input.error { border-color: #d63b3b; }
    .news-form button {
        background: #14233b; color: #fff; border: none; cursor: pointer;
        padding: 17px 28px; border-radius: 999px; font-family: inherit;
        font-weight: 700; font-size: 15px; white-space: nowrap; transition: 0.2s;
    }
    .news-form button:hover { background: #1f7a6d; transform: translateY(-2px); }
    .news-msg { margin-top: 12px; font-size: 14px; font-weight: 600; color: #7a1f1f; min-height: 20px; }
    .news-done { display: none; font-size: 20px; font-weight: 800; color: #14233b; line-height: 1.4; }
    .news-right.sent .news-form,
    .news-right.sent .news-msg { display: none; }
    .news-right.sent .news-done { display: block; }

    @media (max-width: 900px) {
        .news-card { grid-template-columns: 1fr; padding: 40px 32px; gap: 28px; }
        .news-text h2, .news-text p { max-width: none; }
    }
    @media (max-width: 560px) {
        .news { padding: 48px 0; }
        .news-card { padding: 32px 22px; border-radius: 26px; }
        .news-form { flex-direction: column; }
        .news-form button { width: 100%; }
    }
</style>

<section class="news" id="newsletter">
    <div class="wrap">
        <div class="news-card">

            <div class="news-text">
                <h2>Get 10% off your first order</h2>
                <p>One email each Friday with new makers and restocks. Unsubscribe any time.</p>
            </div>

            <div class="news-right" id="newsRight">
                <form class="news-form" id="newsForm" novalidate>
                    <input type="email" id="newsEmail" placeholder="you@example.com" aria-label="Email address">
                    <button type="submit">Send my code</button>
                </form>
                <p class="news-msg" id="newsMsg"></p>
                <p class="news-done">🎉 Thank you! Your 10% discount code has been sent to your email.</p>
            </div>

        </div>
    </div>
</section>

<script>
(function () {
    const form = document.getElementById('newsForm');
    const input = document.getElementById('newsEmail');
    const msg = document.getElementById('newsMsg');
    const box = document.getElementById('newsRight');
    const valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const email = input.value.trim();

        if (!valid.test(email)) {
            input.classList.add('error');
            msg.textContent = 'Please enter a valid email address.';
            return;
        }
        input.classList.remove('error');
        msg.textContent = '';
        box.classList.add('sent');
    });

    input.addEventListener('input', function () {
        input.classList.remove('error');
        msg.textContent = '';
    });
})();
</script>