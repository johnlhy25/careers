<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>
    <link rel="shortcut icon" href="<?= rtrim(config_item('base_url'), '/') ?>/assets/img/Fav.png">
    <meta http-equiv="Refresh" content="8; url=<?= config_item('base_url') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Source+Serif+4:wght@700&display=swap" rel="stylesheet">

    <style>
        :root{
            --ink:#1C2B39;
            --paper:#FAF8F4;
            --brass:#A8762E;
            --brass-dark:#8C6224;
            --brass-light:#D4A85C;
            --slate:#5B6B7A;
            --line:#D9D3C7;
        }
        *{margin:0;padding:0;box-sizing:border-box;}
        html,body{height:100%;}
        body{
            font-family:'Inter',-apple-system,sans-serif;
            background:
                radial-gradient(circle at 20% 20%, rgba(168,118,46,.15), transparent 45%),
                radial-gradient(circle at 80% 75%, rgba(168,118,46,.10), transparent 50%),
                var(--ink);
            background-size:200% 200%;
            animation:drift 14s ease-in-out infinite;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            overflow:hidden;
            position:relative;
        }
        @keyframes drift{
            0%,100%{background-position:0% 0%, 100% 100%;}
            50%{background-position:15% 10%, 85% 90%;}
        }

        /* Floating glow rings */
        .glow-ring{
            position:absolute;
            border-radius:50%;
            border:1px solid rgba(168,118,46,.22);
            opacity:0;
            animation:ring-in 1.4s ease forwards, float 6s ease-in-out infinite;
        }
        .glow-ring.r1{width:300px;height:300px;animation-delay:.1s, 1.5s;}
        .glow-ring.r2{width:480px;height:480px;animation-delay:.25s, 1.8s;}
        .glow-ring.r3{width:660px;height:660px;animation-delay:.4s, 2.1s;}
        @keyframes ring-in{
            from{opacity:0;transform:scale(.8);}
            to{opacity:1;transform:scale(1);}
        }
        @keyframes float{
            0%,100%{transform:translateY(0) scale(1);}
            50%{transform:translateY(-14px) scale(1.02);}
        }

        /* Faint particles drifting up */
        .particle{
            position:absolute;
            bottom:-20px;
            width:4px;height:4px;
            background:var(--brass-light);
            border-radius:50%;
            opacity:0;
            animation:rise 7s linear infinite;
        }
        @keyframes rise{
            0%{transform:translateY(0) translateX(0);opacity:0;}
            10%{opacity:.7;}
            90%{opacity:.4;}
            100%{transform:translateY(-100vh) translateX(30px);opacity:0;}
        }

        .card-404{
            position:relative;
            z-index:2;
            background:var(--paper);
            border:1px solid var(--line);
            border-radius:8px;
            padding:52px 44px 44px;
            text-align:center;
            max-width:440px;
            width:90%;
            box-shadow:0 25px 70px rgba(0,0,0,.4);
            opacity:0;
            transform:translateY(24px);
            animation:card-in .7s cubic-bezier(.16,1,.3,1) .3s forwards;
        }
        @keyframes card-in{
            to{opacity:1;transform:translateY(0);}
        }

        .logo-beat{
            width:64px;
            height:64px;
            margin:0 auto 20px;
            opacity:0;
            animation:logo-in .6s ease .6s forwards, beat 1.8s ease-in-out 1.3s infinite;
        }
        @keyframes logo-in{
            from{opacity:0;transform:scale(.6) rotate(-8deg);}
            to{opacity:1;transform:scale(1) rotate(0);}
        }
        @keyframes beat{
            0%,100%{transform:scale(1);}
            50%{transform:scale(1.07);}
        }

        .code-404{
            font-family:'Source Serif 4',Georgia,serif;
            font-size:72px;
            font-weight:700;
            line-height:1;
            margin-bottom:10px;
            display:flex;
            justify-content:center;
            gap:2px;
        }
        .code-404 .digit{
            display:inline-block;
            color:var(--ink);
            opacity:0;
            transform:translateY(20px) rotate(-6deg);
            animation:digit-in .55s cubic-bezier(.34,1.56,.64,1) forwards;
        }
        .code-404 .digit.brass{color:var(--brass);}
        .code-404 .digit:nth-child(1){animation-delay:.75s;}
        .code-404 .digit:nth-child(2){animation-delay:.87s;}
        .code-404 .digit:nth-child(3){animation-delay:.99s;}
        @keyframes digit-in{
            to{opacity:1;transform:translateY(0) rotate(0);}
        }

        .divider-line{
            width:0;
            height:2px;
            background:var(--brass);
            margin:0 auto 18px;
            animation:line-in .5s ease 1.3s forwards;
        }
        @keyframes line-in{
            to{width:48px;}
        }

        .title-404, .sub-404, .btn-home, .redirect-note{
            opacity:0;
            transform:translateY(10px);
            animation:fade-up .5s ease forwards;
        }
        .title-404{font-size:17px;font-weight:600;color:var(--ink);margin-bottom:8px;animation-delay:1.4s;}
        .sub-404{font-size:13.5px;color:var(--slate);line-height:1.6;margin-bottom:26px;animation-delay:1.5s;}
        .btn-home{
            display:inline-flex;align-items:center;gap:8px;
            background:var(--brass);color:#fff;font-size:14px;font-weight:600;
            padding:11px 28px;border-radius:3px;text-decoration:none;
            transition:background .15s ease, transform .15s ease;
            animation-delay:1.6s;
        }
        .btn-home:hover{background:var(--brass-dark);color:#fff;transform:translateY(-2px);}
        .redirect-note{margin-top:18px;font-size:12px;color:var(--slate);animation-delay:1.7s;}
        @keyframes fade-up{
            to{opacity:1;transform:translateY(0);}
        }
    </style>
</head>
<body>

    <div class="glow-ring r1"></div>
    <div class="glow-ring r2"></div>
    <div class="glow-ring r3"></div>

    <div class="particle" style="left:15%; animation-delay:0s;"></div>
    <div class="particle" style="left:35%; animation-delay:1.5s;"></div>
    <div class="particle" style="left:55%; animation-delay:3s;"></div>
    <div class="particle" style="left:70%; animation-delay:.8s;"></div>
    <div class="particle" style="left:85%; animation-delay:2.2s;"></div>

    <div class="card-404">
        <img src="<?= rtrim(config_item('base_url'), '/') ?>/assets/img/Fav.webp" class="logo-beat" alt="Logo">

        <div class="code-404">
            <span class="digit">4</span><span class="digit brass">0</span><span class="digit">4</span>
        </div>
        <div class="divider-line"></div>

        <div class="title-404">Page Not Found</div>
        <p class="sub-404">The page you're looking for doesn't exist or may have been moved.</p>

        <a class="btn-home" href="<?= config_item('base_url') ?>">Back to Home</a>

        <p class="redirect-note">You'll be redirected automatically in a few seconds.</p>
    </div>

</body>
</html>