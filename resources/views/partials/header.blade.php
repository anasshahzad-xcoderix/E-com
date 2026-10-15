<div class="announce">
    Free delivery on orders over $75 · Free returns for 30 days
</div>

<header class="site-header">
    <a href="{{ url('/') }}" class="logo">
        <span class="logo-icon"></span>
        <span class="logo-text">Kiln & Loom</span>
    </a>

    <nav class="menu" id="menu">
        <a href="{{ url('/') }}#shop">Shop</a>
        <a href="{{ url('/') }}#categories">Categories</a>
        <a href="{{ url('/') }}#sale">Daily sale</a>
        <a href="{{ url('/') }}#makers">Makers</a>
        <a href="{{ url('/') }}#faq">Help</a>
    </nav>

    <div class="header-right">
        <a href="#" class="cart-btn">Cart <span class="cart-count">0</span></a>
        <button class="burger" id="burger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const burger = document.getElementById('burger');
        const menu = document.getElementById('menu');

        // mobile menu kholna / band karna
        burger.addEventListener('click', () => menu.classList.toggle('open'));
        menu.querySelectorAll('a').forEach(a =>
            a.addEventListener('click', () => menu.classList.remove('open'))
        );

        // sections ka reveal animation
        const io = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    io.unobserve(e.target);
                }
            });
        }, { threshold: 0.15 });

        document.querySelectorAll('.reveal').forEach(el => io.observe(el));
    });
</script>