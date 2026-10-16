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