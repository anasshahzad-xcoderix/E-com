@php
    $makers = [
        ['init' => 'MA', 'name' => 'Mira Okafor, Salt Kiln',    'text' => 'Wheel-thrown stoneware fired in a wood kiln outside Multan. Makes 40 mugs a week.',                 'bg' => '#ffc928', 'fg' => '#14233b'],
        ['init' => 'TH', 'name' => 'Tomas Hale, Hale Woodwork', 'text' => 'Third-generation joiner building oak stools and lamp bases from reclaimed barn beams.',            'bg' => '#1f7a6d', 'fg' => '#ffffff'],
        ['init' => 'PR', 'name' => 'Priya Raman, Loomhouse',      'text' => 'Hand-loomed cotton throws and rugs, dyed with madder root and indigo in small lots.',               'bg' => '#7a2f64', 'fg' => '#ffffff'],
        ['init' => 'JL', 'name' => 'Jun Lee,  Green Room',    'text' => 'Grows and pots low-light houseplants in recycled planters, ready to display.',                      'bg' => '#ffffff', 'fg' => '#14233b'],
    ];
@endphp

<style>
    .makers { background: #13284a; color: #fff; padding: 80px 0; }
    .makers-grid { display: grid; grid-template-columns: 1fr 1.25fr; gap: 56px; align-items: center; }
    .makers-text h2 { font-size: clamp(30px, 4vw, 46px); font-weight: 800; line-height: 1.08; letter-spacing: -1.5px; }
    .makers-text p { margin-top: 20px; color: #c8d3e6; font-size: 15px; line-height: 1.7; max-width: 420px; }
    .makers-btn {
        display: inline-block; margin-top: 28px; background: #ffc928; color: #14233b;
        padding: 13px 24px; border-radius: 999px; font-weight: 700; font-size: 14px;
        text-decoration: none; transition: 0.2s;
    }
    .makers-btn:hover { background: #fff; transform: translateY(-2px); }

    .maker-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .maker {
        background: #1d3558; border: 1px solid rgba(255, 255, 255, 0.07);
        border-radius: 24px; padding: 26px; transition: 0.25s;
    }
    .maker:hover { transform: translateY(-4px); background: #234068; }
    .avatar {
        width: 46px; height: 46px; border-radius: 50%; margin-bottom: 22px;
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: 14px;
    }
    .maker h3 { font-size: 17px; font-weight: 800; line-height: 1.3; }
    .maker p { margin-top: 10px; color: #c8d3e6; font-size: 14px; line-height: 1.65; }

    @media (max-width: 1000px) {
        .makers-grid { grid-template-columns: 1fr; gap: 36px; }
        .makers-text p { max-width: 560px; }
    }
    @media (max-width: 600px) {
        .makers { padding: 52px 0; }
        .maker-cards { grid-template-columns: 1fr; }
        .maker { padding: 22px; }
        .avatar { margin-bottom: 16px; }
    }
</style>

<section class="makers" id="makers">
    <div class="wrap makers-grid">

        <div class="makers-text">
            <h2>Every product has a name behind it</h2>
            <p>We pay makers within 7 days of delivery and keep our commission at 12%, well below the marketplace average. That's why prices here stay fair.</p>
            <a href="#" class="makers-btn">Browse by studio</a>
        </div>

        <div class="maker-cards">
            @foreach ($makers as $m)
                <article class="maker">
                    <div class="avatar" style="background: {{ $m['bg'] }}; color: {{ $m['fg'] }}">{{ $m['init'] }}</div>
                    <h3>{{ $m['name'] }}</h3>
                    <p>{{ $m['text'] }}</p>
                </article>
            @endforeach
        </div>

    </div>
</section>