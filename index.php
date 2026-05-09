<?php
$version = "v3.1.2";
$hostname = gethostname();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexGen DevOps Pro | Automation Excellence</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <style>
        :root {
            --primary: #818cf8;
            --primary-glow: rgba(129, 140, 248, 0.4);
            --secondary: #c084fc;
            --accent: #2dd4bf;
            --dark-bg: #030712;
            --card-bg: rgba(17, 24, 39, 0.7);
            --border: rgba(255, 255, 255, 0.08);
            --text-main: #f3f4f6;
            --text-dim: #9ca3af;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-main);
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1, h2, h3, .logo {
            font-family: 'Outfit', sans-serif;
        }

        /* --- Background Glows --- */
        .glow {
            position: fixed;
            width: 40vw;
            height: 40vw;
            border-radius: 50%;
            background: radial-gradient(circle, var(--primary-glow) 0%, transparent 70%);
            z-index: -1;
            filter: blur(80px);
            opacity: 0.5;
        }

        .glow-1 { top: -10%; right: -10%; background: radial-gradient(circle, rgba(192, 132, 252, 0.2) 0%, transparent 70%); }
        .glow-2 { bottom: -10%; left: -10%; background: radial-gradient(circle, rgba(45, 212, 191, 0.15) 0%, transparent 70%); }

        /* --- Navbar --- */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.25rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(3, 7, 18, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            z-index: 1000;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            gap: 12px;
            color: #fff;
            text-decoration: none;
        }

        .logo i {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 1.8rem;
        }

        .nav-links {
            display: flex;
            gap: 32px;
        }

        .nav-links a {
            color: var(--text-dim);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .cta-btn {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(129, 140, 248, 0.3);
            display: inline-block;
        }

        .cta-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(129, 140, 248, 0.5);
        }

        /* --- Hero --- */
        .hero {
            padding: 180px 5% 100px;
            text-align: center;
            position: relative;
        }

        .hero-label {
            display: inline-block;
            background: rgba(129, 140, 248, 0.1);
            color: var(--primary);
            padding: 6px 16px;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(129, 140, 248, 0.2);
        }

        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(to bottom, #fff 40%, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            color: var(--text-dim);
            max-width: 650px;
            margin: 0 auto 2.5rem;
            font-size: 1.1rem;
        }

        /* --- Section Header --- */
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .section-title p {
            color: var(--text-dim);
        }

        /* --- Features --- */
        .features { padding: 100px 5%; }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .f-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            padding: 40px;
            border-radius: 24px;
            transition: 0.4s;
            backdrop-filter: blur(10px);
        }

        .f-card:hover {
            border-color: var(--primary);
            background: rgba(17, 24, 39, 0.9);
            transform: translateY(-8px);
        }

        .f-card i {
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            display: block;
            color: var(--accent);
        }

        .f-card h3 { margin-bottom: 12px; font-size: 1.4rem; }
        .f-card p { color: var(--text-dim); font-size: 0.95rem; }

        /* --- Pricing --- */
        .pricing { padding: 100px 5%; background: rgba(129, 140, 248, 0.02); }
        .price-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 32px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .p-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            padding: 48px;
            border-radius: 32px;
            text-align: center;
            position: relative;
        }

        .p-card.popular {
            border: 1px solid var(--primary);
            transform: scale(1.05);
            background: rgba(129, 140, 248, 0.05);
        }

        .p-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--primary);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 800;
        }

        .price { font-size: 3.5rem; font-weight: 800; margin: 20px 0; }
        .price span { font-size: 1rem; color: var(--text-dim); }

        .p-list { list-style: none; margin: 30px 0; text-align: left; }
        .p-list li { margin-bottom: 12px; color: var(--text-dim); display: flex; gap: 10px; }
        .p-list li i { color: var(--accent); }

        /* --- Footer --- */
        footer {
            padding: 100px 5% 40px;
            border-top: 1px solid var(--border);
            text-align: center;
        }

        .f-logo { font-size: 1.2rem; font-weight: 800; margin-bottom: 24px; display: block; text-decoration: none; color: #fff; }

        .meta-box {
            display: inline-flex;
            gap: 20px;
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 16px;
            font-family: monospace;
            font-size: 0.8rem;
            color: var(--text-dim);
            margin-bottom: 30px;
        }

        .meta-box span b { color: var(--primary); }

        .social { display: flex; justify-content: center; gap: 20px; margin-bottom: 40px; }
        .social a { color: var(--text-dim); font-size: 1.2rem; transition: 0.3s; }
        .social a:hover { color: var(--primary); }

        /* --- Responsive --- */
        @media (max-width: 768px) {
            .nav-links, .cta-btn-nav { display: none; }
            .hero h1 { font-size: 2.8rem; }
            .p-card.popular { transform: none; }
        }
    </style>
</head>
<body>

    <div class="glow glow-1"></div>
    <div class="glow glow-2"></div>

    <nav>
        <a href="#" class="logo">
            <i class="fa-solid fa-bolt-lightning"></i> NEXGEN PRO
        </a>
        <div class="nav-links">
            <a href="#features">Features</a>
            <a href="#pricing">Pricing</a>
            <a href="#infra">Infrastructure</a>
            <a href="#contact">Contact</a>
        </div>
        <a href="#" class="cta-btn cta-btn-nav">Get Started</a>
    </nav>

    <header class="hero">
        <div class="hero-label">NEW: AUTOMATED KUBERNETES SCALING</div>
        <h1>Deploy Infrastructure <br> in Seconds, not Days.</h1>
        <p>NexGen Pro provides the elite toolset for high-performance engineering teams. Scale your PHP apps globally with enterprise-grade security.</p>
        <div class="hero-btns">
            <a href="#" class="cta-btn" style="padding: 16px 40px; font-size: 1.1rem;">Start Deploying</a>
        </div>
    </header>

    <section class="features" id="features">
        <div class="section-title">
            <h2>Built for Performance</h2>
            <p>Experience the most advanced DevOps workflow ever created.</p>
        </div>
        <div class="features-grid">
            <div class="f-card">
                <i class="fa-solid fa-microchip"></i>
                <h3>Serverless Edge</h3>
                <p>Run your PHP applications at the edge with zero latency and automatic scaling.</p>
            </div>
            <div class="f-card">
                <i class="fa-solid fa-fingerprint"></i>
                <h3>Biometric Security</h3>
                <p>Advanced identity management and zero-trust security for your entire pipeline.</p>
            </div>
            <div class="f-card">
                <i class="fa-solid fa-code-merge"></i>
                <h3>Instant CI/CD</h3>
                <p>Push to GitHub and see your changes live in less than 30 seconds. Guaranteed.</p>
            </div>
        </div>
    </section>

    <section class="pricing" id="pricing">
        <div class="section-title">
            <h2>Simple, Transparent Pricing</h2>
            <p>Choose the plan that fits your scale.</p>
        </div>
        <div class="price-grid">
            <div class="p-card">
                <h3>Starter Plan</h3>
                <div class="price">$0<span>/mo</span></div>
                <ul class="p-list">
                    <li><i class="fa-solid fa-circle-check"></i> 3 Microservices</li>
                    <li><i class="fa-solid fa-circle-check"></i> Basic CI/CD</li>
                    <li><i class="fa-solid fa-circle-check"></i> 10GB Bandwidth</li>
                </ul>
                <a href="#" class="cta-btn" style="background: transparent; border: 1px solid var(--border); box-shadow: none;">Select Plan</a>
            </div>
            <div class="p-card popular">
                <div class="p-badge">MOST POPULAR</div>
                <h3>Pro Plan</h3>
                <div class="price">$49<span>/mo</span></div>
                <ul class="p-list">
                    <li><i class="fa-solid fa-circle-check"></i> Unlimited Services</li>
                    <li><i class="fa-solid fa-circle-check"></i> Global K8s Clusters</li>
                    <li><i class="fa-solid fa-circle-check"></i> Priority SSH Support</li>
                    <li><i class="fa-solid fa-circle-check"></i> Custom Domains</li>
                </ul>
                <a href="#" class="cta-btn">Start 14-Day Trial</a>
            </div>
        </div>
    </section>

    <footer>
        <a href="#" class="f-logo">NEXGEN SOLUTIONS</a>
        <div class="meta-box">
            <span>POD: <b><?php echo htmlspecialchars($hostname); ?></b></span>
            <span>BUILD: <b><?php echo htmlspecialchars($version); ?></b></span>
            <span>STATUS: <b style="color: var(--accent);">STABLE</b></span>
        </div>
        <div class="social">
            <a href="#"><i class="fa-brands fa-github"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><i class="fa-brands fa-discord"></i></a>
        </div>
        <p style="color: var(--text-dim); font-size: 0.85rem;">&copy; 2024 NexGen DevOps Global Inc. All rights reserved.</p>
    </footer>

</body>
</html>
