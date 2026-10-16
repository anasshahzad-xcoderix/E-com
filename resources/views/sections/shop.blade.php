@php
    $products = [
        ['name' => 'Teal stoneware mug',   'price' => 28,  'cat' => 'Ceramics',  'rating' => 4.9, 'badge' => 'Bestseller', 'bg' => '#fff6a3', 'icon' => 'mug',    'c' => '#1f7a6d'],
        ['name' => 'Midnight bottle vase', 'price' => 64,  'cat' => 'Ceramics',  'rating' => 4.8, 'badge' => null,         'bg' => '#eafcfd', 'icon' => 'vase',   'c' => '#14233b', 'c2' => '#c79a2e'],
        ['name' => 'Plum table lamp',      'price' => 120, 'cat' => 'Lighting',  'rating' => 4.7, 'badge' => 'Staff pick', 'bg' => '#fde8fb', 'icon' => 'lamp',   'c' => '#5a2a4e'],
        ['name' => 'Blue woven rug',       'price' => 185, 'cat' => 'Textiles',  'rating' => 4.9, 'badge' => null,         'bg' => '#f1fbfd', 'icon' => 'rug',    'c' => '#2f4a7c'],
        ['name' => 'Oak three-leg stool',  'price' => 96,  'cat' => 'Furniture', 'rating' => 4.6, 'badge' => null,         'bg' => '#fffbd6', 'icon' => 'stool',  'c' => '#c9904a', 'c2' => '#7a5230'],
        ['name' => 'Fern in glazed pot',   'price' => 42,  'cat' => 'Plants',    'rating' => 4.8, 'badge' => 'New',        'bg' => '#f1fbec', 'icon' => 'plant',  'c' => '#f0b030'],
        ['name' => 'Speckled serving bowl','price' => 38,  'cat' => 'Ceramics',  'rating' => 4.7, 'badge' => null,         'bg' => '#fffde8', 'icon' => 'bowl',   'c' => '#14233b'],
        ['name' => 'Seagrass basket',      'price' => 34,  'cat' => 'Textiles',  'rating' => 4.5, 'badge' => null,         'bg' => '#fffbc4', 'icon' => 'basket', 'c' => '#e2b865'],
        ['name' => 'Linen pendant light',  'price' => 78,  'cat' => 'Lighting',  'rating' => 4.6, 'badge' => null,         'bg' => '#ffffff', 'icon' => 'lamp',   'c' => '#ffc928'],
        ['name' => 'Walnut side stool',    'price' => 110, 'cat' => 'Furniture', 'rating' => 4.8, 'badge' => null,         'bg' => '#fff2e0', 'icon' => 'stool',  'c' => '#6b4429', 'c2' => '#2e1d12'],
        ['name' => 'Cobalt pour-over mug', 'price' => 32,  'cat' => 'Ceramics',  'rating' => 4.9, 'badge' => null,         'bg' => '#eafaff', 'icon' => 'mug',    'c' => '#2f5fc4'],
        ['name' => 'Snake plant in clay',  'price' => 36,  'cat' => 'Plants',    'rating' => 4.7, 'badge' => null,         'bg' => '#fffee6', 'icon' => 'plant',  'c' => '#8ab09c'],
    ];
    $cats = ['All', 'Ceramics', 'Lighting', 'Textiles', 'Furniture', 'Plants'];
@endphp

<style>
    .shop { padding: 72px 0; }
    .shop-head { display: flex; justify-content: space-between; align-items: flex-end; gap: 20px; flex-wrap: wrap; }
    .shop-head h2 { font-size: clamp(32px, 4vw, 44px); font-weight: 800; letter-spacing: -1.5px; }
    .shop-count { color: #7b8a9c; font-size: 14px; margin-top: 6px; }
    .shop-tools { display: flex; gap: 14px; align-items: center; flex-wrap: wrap; }
    .shop-tools input, .shop-tools select {
        border: none; border-bottom: 1.5px solid #e2e8f0; background: transparent;
        padding: 10px 6px; font-family: inherit; font-size: 14px; color: #14233b; min-width: 180px;
    }
    .shop-tools input:focus, .shop-tools select:focus { outline: none; border-color: #1f7a6d; }

    .filters { display: flex; gap: 8px; margin: 28px 0; overflow-x: auto; padding-bottom: 6px; }
    .filter {
        border: 1.5px solid transparent; background: transparent; color: #14233b;
        padding: 10px 20px; border-radius: 999px; font-family: inherit; font-size: 14px;
        font-weight: 500; cursor: pointer; white-space: nowrap; transition: 0.2s;
    }
    .filter:hover { border-color: #14233b; }
    .filter.on { background: #14233b; color: #fff; border-color: #14233b; }

    .items { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
    .item[hidden] { display: none; }
    .item-img {
        position: relative; border-radius: 22px; aspect-ratio: 4 / 5;
        display: flex; align-items: center; justify-content: center; overflow: hidden;
        transition: 0.25s;
    }
    .item:hover .item-img { transform: translateY(-4px); box-shadow: 0 14px 28px rgba(20, 35, 59, 0.1); }
    .item-img svg { width: 78%; height: auto; }
    .badge-tag {
        position: absolute; top: 12px; left: 12px; background: #14233b; color: #fff;
        font-size: 11px; font-weight: 700; padding: 5px 11px; border-radius: 999px;
    }
    .add-btn {
        position: absolute; left: 12px; right: 12px; bottom: 12px; padding: 12px;
        border: none; border-radius: 999px; background: #fff; color: #14233b;
        font-family: inherit; font-weight: 600; font-size: 14px; cursor: pointer;
        opacity: 0; transform: translateY(10px); transition: 0.25s;
    }
    .item:hover .add-btn { opacity: 1; transform: translateY(0); }
    .add-btn:hover { background: #f5b73b; }
    .item-info { display: flex; justify-content: space-between; gap: 10px; margin-top: 14px; font-weight: 600; font-size: 15px; }
    .item-price { font-weight: 800; }
    .item-meta { color: #7b8a9c; font-size: 12px; margin-top: 3px; }
    .item-meta b { color: #f5b73b; }
    .shop-empty { text-align: center; color: #7b8a9c; padding: 50px 0; }

    @media (hover: none) { .add-btn { opacity: 1; transform: none; } }
    @media (max-width: 1000px) { .items { grid-template-columns: repeat(3, 1fr); } }
    @media (max-width: 700px) {
        .shop { padding: 48px 0; }
        .items { grid-template-columns: repeat(2, 1fr); gap: 14px; }
        .shop-tools { width: 100%; }
        .shop-tools input, .shop-tools select { flex: 1; min-width: 0; }
    }
</style>

<section class="shop" id="shop">
    <div class="wrap">

        <div class="shop-head">
            <div>
                <h2>The shop</h2>
                <p class="shop-count" id="shopCount">{{ count($products) }} products</p>
            </div>
            <div class="shop-tools">
                <input type="text" id="shopSearch" placeholder="Search mugs, lamps, rugs...">
                <select id="shopSort">
                    <option value="featured">Featured</option>
                    <option value="low">Price: low to high</option>
                    <option value="high">Price: high to low</option>
                    <option value="rating">Top rated</option>
                </select>
            </div>
        </div>

        <div class="filters">
            @foreach ($cats as $cat)
                <button class="filter {{ $loop->first ? 'on' : '' }}" data-cat="{{ $cat }}">{{ $cat }}</button>
            @endforeach
        </div>

        <div class="items" id="items">
            @foreach ($products as $p)
                <article class="item" data-cat="{{ $p['cat'] }}" data-name="{{ strtolower($p['name']) }}"
                         data-price="{{ $p['price'] }}" data-rating="{{ $p['rating'] }}" data-order="{{ $loop->index }}">
                    <div class="item-img" style="background: {{ $p['bg'] }}">
                        @if ($p['badge'])
                            <span class="badge-tag">{{ $p['badge'] }}</span>
                        @endif
                        @include('sections.icons.' . $p['icon'], ['c' => $p['c'], 'c2' => $p['c2'] ?? null])
                        <button class="add-btn">Add to cart</button>
                    </div>
                    <div class="item-info">
                        <span>{{ $p['name'] }}</span>
                        <span class="item-price">${{ number_format($p['price'], 2) }}</span>
                    </div>
                    <div class="item-meta">{{ $p['cat'] }} · <b>★</b> {{ $p['rating'] }}</div>
                </article>
            @endforeach
        </div>

        <p class="shop-empty" id="shopEmpty" hidden>Koi product nahi mila.</p>
    </div>
</section>

<script>
(function () {
    const grid = document.getElementById('items');
    const cards = Array.from(grid.querySelectorAll('.item'));
    const count = document.getElementById('shopCount');
    const empty = document.getElementById('shopEmpty');
    let cat = 'All', q = '', sort = 'featured';

    function render() {
        let list = cards.filter(c =>
            (cat === 'All' || c.dataset.cat === cat) && c.dataset.name.includes(q)
        );
        const key = {
            featured: c => +c.dataset.order,
            low: c => +c.dataset.price,
            high: c => -c.dataset.price,
            rating: c => -c.dataset.rating
        }[sort];
        list.sort((a, b) => key(a) - key(b));

        cards.forEach(c => c.hidden = true);
        list.forEach(c => { c.hidden = false; grid.appendChild(c); });

        count.textContent = list.length + ' product' + (list.length === 1 ? '' : 's') +
            (cat !== 'All' ? ' in ' + cat : '');
        empty.hidden = list.length > 0;
    }

    document.querySelectorAll('.filter').forEach(btn => btn.addEventListener('click', () => {
        document.querySelectorAll('.filter').forEach(b => b.classList.remove('on'));
        btn.classList.add('on');
        cat = btn.dataset.cat;
        render();
    }));
    document.getElementById('shopSearch').addEventListener('input', e => { q = e.target.value.toLowerCase().trim(); render(); });
    document.getElementById('shopSort').addEventListener('change', e => { sort = e.target.value; render(); });

    document.querySelectorAll('.add-btn').forEach(b => b.addEventListener('click', () => {
        const badge = document.querySelector('.cart-count');
        if (badge) badge.textContent = (parseInt(badge.textContent) || 0) + 1;
    }));
})();
</script>