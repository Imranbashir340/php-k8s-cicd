<?php
$version = "v3.0.0";
$hostname = gethostname();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexGen DevOps | Enterprise Automation</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- CSS -->
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --accent: #10b981;
            --dark: #0f172a;
            --light: #f8fafc;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--dark);
            color: var(--light);
            line-height: 1.6;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1, h2, h3, .brand {
            font-family: 'Outfit', sans-serif;
        }

        /* --- Navbar --- */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
            border-bottom: 1px solid var(--glass-border);
        }

        .brand {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .brand i {
            color: var(--primary);
            filter: drop-shadow(0 0 8px var(--primary));
        }

        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: 0.3s;
            opacity: 0.8;
        }

        .nav-links a:hover {
            opacity: 1;
            color: var(--primary);
        }

        .btn {
            padding: 10px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            cursor: pointer;
            border: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            background: var(--primary-dark);
            box-shadow: 0 15px 25px rgba(99, 102, 241, 0.4);
        }

        /* --- Hero --- */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 0 5%;
            background: radial-gradient(circle at 50% 50%, rgba(99, 102, 241, 0.1), transparent);
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 20%;
            left: 10%;
            width: 300px;
            height: 300px;
            background: var(--primary);
            filter: blur(150px);
            opacity: 0.1;
            z-index: -1;
        }

        .hero-content {
            max-width: 900px;
        }

        .hero-badge {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 2rem;
            display: inline-block;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 800;
            letter-spacing: -2px;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.2rem;
            color: #94a3b8;
            margin-bottom: 2.5rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* --- Stats --- */
        .stats {
            padding: 80px 5%;
            background: rgba(15, 23, 42, 0.5);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .stat-item {
            text-align: center;
            padding: 2rem;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
        }

        .stat-item h3 {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .stat-item p {
            color: #94a3b8;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
        }

        /* --- Features --- */
        .features {
            padding: 100px 5%;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            padding: 3rem 2rem;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            transition: 0.4s;
        }

        .feature-card:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-10px);
            border-color: var(--primary);
        }

        .feature-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .feature-card h4 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: #94a3b8;
            font-size: 0.95rem;
        }

        /* --- Footer --- */
        footer {
            padding: 60px 5% 20px;
            border-top: 1px solid var(--glass-border);
            text-align: center;
        }

        .footer-info {
            margin-bottom: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        .deployment-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 12px;
            color: var(--accent);
            font-family: monospace;
            font-size: 0.85rem;
        }

        .dot {
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.5); opacity: 0.5; }
            100% { transform: scale(1); opacity: 1; }
        }

        .copyright {
            color: #64748b;
            font-size: 0.85rem;
        }

        @media (max-width: 992px) {
            .hero h1 { font-size: 3.5rem; }
            .features-grid, .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hero h1 { font-size: 2.5rem; }
            .features-grid, .stats-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <a href="#" class="brand">
            <i class="fa-solid fa-layer-group"></i> NEXGEN
        </a>
        <ul class="nav-links">
            <li><a href="#features">Services</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#infrastructure">Infrastructure</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <a href="#" class="btn btn-primary">Launch App</a>
    </nav>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">Next-Gen CI/CD Platform</div>
            <h1>Automate Your Infrastructure <br> At Scale.</h1>
            <p>Deploy, monitor, and scale your PHP applications on Kubernetes with the world's most advanced DevSecOps pipeline.</p>
            <div class="hero-btns">
                <a href="#" class="btn btn-primary">Start Free Trial</a>
                <a href="#" class="btn" style="color: white; border: 1px solid var(--glass-border); margin-left: 15px;">View Docs</a>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="stats">
        <div class="stats-grid">
            <div class="stat-item">
                <h3>99.9%</h3>
                <p>Uptime Guaranteed</p>
            </div>
            <div class="stat-item">
                <h3>&lt; 10ms</h3>
                <p>Global Latency</p>
            </div>
            <div class="stat-item">
                <h3>500+</h3>
                <p>Enterprise Clients</p>
            </div>
            <div class="stat-item">
                <h3>24/7</h3>
                <p>Support Access</p>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features" id="features">
        <div class="section-header">
            <h2>Modern Features</h2>
            <p style="color: #94a3b8;">Everything you need to ship code faster and safer.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                <h4>Cloud Native</h4>
                <p>Optimized for Kubernetes, Docker, and hybrid cloud environments.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-shield-halved"></i>
                <h4>Security First</h4>
                <p>Integrated vulnerability scanning and automated compliance checks.</p>
            </div>
            <div class="feature-card">
                <i class="fa-solid fa-chart-line"></i>
                <h4>Full Visibility</h4>
                <p>Real-time monitoring and analytics for all your deployment metrics.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-info">
            <div class="deployment-badge">
                <div class="dot"></div>
                DEPLOYED ON: <?php echo htmlspecialchars($hostname); ?> | VERSION: <?php echo htmlspecialchars($version); ?>
            </div>
            <p class="copyright">&copy; 2024 NexGen DevOps Solutions. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
