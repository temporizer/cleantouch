<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clean Touch — Maintenance</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@400;600;700&family=IBM+Plex+Mono:wght@300;400;600&display=swap" rel="stylesheet" />
    <style>
        :root {
            --newsprint: #f5f0e8;
            --green: #58e283;
            --black: #111;
            --yellow: #ffea00;
            --gray: rgba(17, 17, 17, 0.45);
            --font-display: 'Bebas Neue', sans-serif;
            --font-hand: 'Caveat', cursive;
            --font-body: 'IBM Plex Mono', monospace;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: var(--font-body);
            background: var(--newsprint);
            color: var(--black);
            font-size: 14px;
            line-height: 1.7;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(0,0,0,0.01) 0%, transparent 50%),
                repeating-linear-gradient(0deg, transparent, transparent 40px, rgba(0,0,0,0.015) 40px, rgba(0,0,0,0.015) 41px);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }
        .zine-card {
            background: white;
            padding: 3rem 2.5rem;
            max-width: 500px;
            width: 100%;
            box-shadow: 4px 4px 0 rgba(17, 17, 17, 0.08);
            text-align: center;
        }
        .zine-stamp {
            display: inline-block;
            font-family: var(--font-display);
            font-size: 0.85rem;
            letter-spacing: 2px;
            color: var(--green);
            border: 2px solid var(--green);
            padding: 4px 12px;
            margin-bottom: 1.5rem;
            transform: rotate(-2deg);
        }
        .zine-title {
            font-family: var(--font-display);
            font-size: clamp(2.4rem, 5vw, 3.6rem);
            line-height: 0.92;
            letter-spacing: 2px;
            margin-bottom: 1rem;
        }
        .zine-body {
            font-size: 0.9rem;
            line-height: 1.8;
            color: var(--gray);
            max-width: 380px;
            margin: 0 auto 1.5rem;
        }
        .zine-sticker {
            display: inline-block;
            font-family: var(--font-hand);
            font-size: 1.2rem;
            color: var(--green);
            background: var(--yellow);
            padding: 4px 16px;
            transform: rotate(-2deg);
            margin-top: 0.5rem;
        }
        .zine-tape {
            width: 60px;
            height: 14px;
            background: rgba(255, 234, 0, 0.35);
            margin: 1.5rem auto 0;
            transform: rotate(-1deg);
        }
    </style>
</head>
<body>
    <div class="zine-card">
        <div class="zine-stamp">OUT OF OFFICE</div>
        <h1 class="zine-title">We're doing some maintenance</h1>
        <p class="zine-body">We'll be back shortly. Thank you for your patience.</p>
        <div class="zine-sticker">&mdash; Clean Touch</div>
        <div class="zine-tape"></div>
    </div>
</body>
</html>
