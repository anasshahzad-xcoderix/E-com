<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        <a href="{{ route('contact') }}">Contact</a>
    </nav>

    <div class="header-right">
        <a href="#" class="cart-btn">Cart <span class="cart-count">0</span></a>
        <button class="burger" id="burger" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>
    <style>
        :root {
            --primary: #6c5ce7;
            --primary-dark: #4b3fc7;
            --dark: #1e1b3a;
            --text: #4a4a68;
            --light: #f5f6fb;
            --white: #ffffff;
            --border: #e3e5f0;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--light);
            color: var(--text);
            min-height: 100vh;
        }

        .contact-hero {
            background: linear-gradient(135deg, var(--dark), var(--primary));
            color: var(--white);
            text-align: center;
            padding: 80px 20px 140px;
        }
        .contact-hero span {
            display: inline-block;
            background: rgba(255, 255, 255, .15);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 13px;
            letter-spacing: 1px;
            margin-bottom: 18px;
        }
        .contact-hero h1 {
            font-size: clamp(32px, 5vw, 52px);
            font-weight: 700;
            margin-bottom: 14px;
        }
        .contact-hero p {
            max-width: 520px;
            margin: 0 auto;
            opacity: .85;
            line-height: 1.7;
        }

        .contact-wrap {
            max-width: 1050px;
            margin: -80px auto 70px;
            padding: 0 20px;
        }
        .contact-card {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            background: var(--white);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(30, 27, 58, .15);
        }

        .contact-info {
            background: linear-gradient(160deg, var(--dark), var(--primary-dark));
            color: var(--white);
            padding: 45px 35px;
            position: relative;
            overflow: hidden;
        }
        .contact-info::after {
            content: "";
            position: absolute;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .07);
            right: -70px; bottom: -70px;
        }
        .contact-info h2 { font-size: 24px; margin-bottom: 10px; }
        .contact-info > p { opacity: .8; font-size: 14px; line-height: 1.7; margin-bottom: 35px; }

        .info-item {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 26px;
            position: relative;
            z-index: 1;
        }
        .info-icon {
            width: 46px; height: 46px;
            border-radius: 14px;
            background: rgba(255, 255, 255, .14);
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }
        .info-item small { display: block; opacity: .7; font-size: 12px; }
        .info-item strong { font-weight: 500; font-size: 14px; }

        .socials { display: flex; gap: 12px; margin-top: 35px; position: relative; z-index: 1; }
        .socials a {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .14);
            color: var(--white);
            text-decoration: none;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 600;
            transition: .3s;
        }
        .socials a:hover { background: var(--white); color: var(--primary); transform: translateY(-3px); }

        .contact-form { padding: 45px 40px; }
        .contact-form h2 { color: var(--dark); font-size: 26px; margin-bottom: 6px; }
        .contact-form > p { font-size: 14px; margin-bottom: 28px; }

        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
        .field { margin-bottom: 20px; }
        .field label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 7px;
        }
        .field input,
        .field textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            font-family: inherit;
            font-size: 14px;
            color: var(--dark);
            background: var(--light);
            transition: .25s;
        }
        .field textarea { resize: vertical; min-height: 130px; }
        .field input:focus,
        .field textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(108, 92, 231, .12);
        }

        .btn-send {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            font-family: inherit;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .3s;
        }
        .btn-send:hover { transform: translateY(-2px); box-shadow: 0 12px 25px rgba(108, 92, 231, .35); }

        .alert-success {
            background: #e7f8ee;
            color: #167a43;
            padding: 13px 16px;
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .error-text { color: #d63031; font-size: 12px; margin-top: 5px; display: block; }

        @media (max-width: 800px) {
            .contact-card { grid-template-columns: 1fr; }
            .form-row { grid-template-columns: 1fr; gap: 0; }
            .contact-form, .contact-info { padding: 32px 24px; }
        }
    </style>
</head>
<body>

    {{-- @include('partials.header') --}}

    <section class="contact-hero">
        <span>CONTACT US</span>
        <h1>Get in Touch</h1>
        <p>If you have any questions, concerns, or orders, feel free to reach out to us. We will get back to you as soon as possible.</p>
    </section>

    <section class="contact-wrap">
        <div class="contact-card">

            <div class="contact-info">
                <h2>Contact Information</h2>
                <p>You can also reach us through the options below.</p>

                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div>
                        <small>Address</small>
                        <strong>Multan, Punjab, Pakistan</strong>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div>
                        <small>Phone</small>
                        <strong>+92 300 0000000</strong>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div>
                        <small>Email</small>
                        <strong>info@yourstore.com</strong>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">🕒</div>
                    <div>
                        <small>Working Hours</small>
                        <strong>Mon - Sat, 10am - 8pm</strong>
                    </div>
                </div>

                <div class="socials">
                    <a href="#">f</a>
                    <a href="#">in</a>
                    <a href="#">ig</a>
                    <a href="#">wa</a>
                </div>
            </div>

            <div class="contact-form">
                <h2>Send a Message</h2>
                <p>Fill out the form and we will reply within 24 hours.</p>

                @if (session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="field">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Ali Khan" required>
                            @error('name') <span class="error-text">{{ $message }}</span> @enderror
                        </div>

                        <div class="field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="ali@example.com" required>
                            @error('email') <span class="error-text">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="What is your message about?">
                        @error('subject') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <div class="field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Enter your message here..." required>{{ old('message') }}</textarea>
                        @error('message') <span class="error-text">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn-send">Send Message →</button>
                </form>
            </div>

        </div>
    </section>

    @php
    $columns = [
        'Shop'    => ['New arrivals', 'Categories', 'Daily sale', 'Gift cards'],
        'Support' => ['Delivery', 'Returns', 'Payments', 'Contact us'],
        'Company' => ['Our makers', 'Sell with us', 'Sustainability', 'Careers'],
    ];
    $payments = ['Visa', 'Mastercard', 'Amex', 'PayPal', 'Apple Pay'];
@endphp

<style>
    .site-footer { background: #13284a; color: #c8d3e6; padding: 56px 0 28px; }
    .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; }
    .footer-brand .f-logo { color: #fff; font-weight: 800; font-size: 24px; letter-spacing: -0.5px; text-decoration: none; }
    .footer-brand p { margin-top: 18px; font-size: 15px; line-height: 1.7; max-width: 360px; }

    .footer-col h4 { color: #fff; font-size: 15px; font-weight: 700; margin-bottom: 20px; }
    .footer-col ul { list-style: none; }
    .footer-col li { margin-bottom: 12px; }
    .footer-col a { color: #c8d3e6; text-decoration: none; font-size: 15px; transition: 0.2s; }
    .footer-col a:hover { color: #ffc928; }

    .footer-bottom {
        margin-top: 44px; padding-top: 24px; border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex; justify-content: space-between; align-items: center;
        gap: 12px 24px; flex-wrap: wrap; font-size: 14px;
    }
    .pay-list { display: flex; flex-wrap: wrap; gap: 4px 6px; }
    .pay-list span:not(:last-child)::after { content: "·"; margin-left: 6px; }

    @media (max-width: 900px) {
        .footer-top { grid-template-columns: 1fr 1fr 1fr; }
        .footer-brand { grid-column: 1 / -1; }
    }
    @media (max-width: 560px) {
        .site-footer { padding: 40px 0 24px; }
        .footer-top { grid-template-columns: 1fr 1fr; gap: 32px 20px; }
        .footer-bottom { flex-direction: column; align-items: flex-start; }
    }
</style>

<footer class="site-footer">
    <div class="wrap">

        <div class="footer-top">
            <div class="footer-brand">
                <a href="/" class="f-logo">Yousaf Store</a>
                <p>An independent marketplace for handmade home goods. Fairly priced, carefully packed, made by people you can name.</p>
            </div>

            @foreach ($columns as $title => $links)
                <div class="footer-col">
                    <h4>{{ $title }}</h4>
                    <ul>
                        @foreach ($links as $link)
                            <li><a href="#">{{ $link }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>

        <div class="footer-bottom">
            <span>© {{ date('Y') }} Yousaf Store. All rights reserved.</span>
            <div class="pay-list">
                @foreach ($payments as $p)
                    <span>{{ $p }}</span>
                @endforeach
            </div>
        </div>

    </div>
</footer>
</body>
</html>
