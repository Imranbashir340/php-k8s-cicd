<?php
$version = "v1";
$hostname = gethostname();
$time = date("Y-m-d H:i:s");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI/CD Deployment Status</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-color: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --primary: #3b82f6;
            --primary-glow: rgba(59, 130, 246, 0.5);
            --accent: #10b981;
            --accent-glow: rgba(16, 185, 129, 0.5);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: 
                radial-gradient(circle at 15% 50%, rgba(59, 130, 246, 0.15), transparent 25%),
                radial-gradient(circle at 85% 30%, rgba(16, 185, 129, 0.15), transparent 25%);
            overflow: hidden;
        }

        .container {
            width: 100%;
            max-width: 800px;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        .dashboard {
            background: var(--card-bg);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transform: translateY(0);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            animation: float 6s ease-in-out infinite;
        }

        .dashboard:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.6), 0 0 40px rgba(59, 130, 246, 0.2);
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .icon-container {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary), #8b5cf6);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            box-shadow: 0 10px 25px var(--primary-glow);
            transform: rotate(-5deg);
            transition: transform 0.3s ease;
        }

        .dashboard:hover .icon-container {
            transform: rotate(5deg) scale(1.05);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.025em;
            background: linear-gradient(to right, #60a5fa, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 1.1rem;
            font-weight: 300;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--primary);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card:hover {
            background: rgba(255, 255, 255, 0.05);
            transform: translateY(-2px);
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-card.success::before { background: var(--accent); }

        .stat-icon {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .stat-card.success .stat-icon { color: var(--accent); }

        .stat-label {
            font-size: 0.875rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-main);
            word-break: break-all;
        }

        .status-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            color: var(--accent);
            font-weight: 600;
        }

        .pulse {
            width: 10px;
            height: 10px;
            background-color: var(--accent);
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        /* Decorative background elements */
        .blob {
            position: absolute;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.5;
            animation: moveBlob 20s infinite alternate;
        }

        .blob-1 {
            top: -10%;
            left: -10%;
            width: 300px;
            height: 300px;
            background: var(--primary);
        }

        .blob-2 {
            bottom: -10%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: #8b5cf6;
            animation-delay: -10s;
        }

        @keyframes moveBlob {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(50px, 50px) scale(1.1); }
        }

        @media (max-width: 640px) {
            .dashboard { padding: 2rem; }
            h1 { font-size: 2rem; }
        }
    </style>
</head>
<body>
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    
    <div class="container">
        <div class="dashboard">
            <div class="header">
                <div class="icon-container">
                    <i class="fa-solid fa-rocket"></i>
                </div>
                <h1>CI/CD Pipeline</h1>
                <p class="subtitle">PHP Application deployed on Kubernetes</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card success">
                    <i class="fa-solid fa-code-branch stat-icon"></i>
                    <div class="stat-label">Application Version</div>
                    <div class="stat-value"><?php echo htmlspecialchars($version); ?></div>
                </div>
                
                <div class="stat-card">
                    <i class="fa-solid fa-server stat-icon"></i>
                    <div class="stat-label">Pod Hostname</div>
                    <div class="stat-value"><?php echo htmlspecialchars($hostname); ?></div>
                </div>

                <div class="stat-card">
                    <i class="fa-regular fa-clock stat-icon"></i>
                    <div class="stat-label">Server Time</div>
                    <div class="stat-value" style="font-size: 1.2rem;"><?php echo htmlspecialchars($time); ?></div>
                </div>
            </div>

            <div class="status-indicator">
                <div class="pulse"></div>
                System Online &amp; Operational
            </div>
        </div>
    </div>
</body>
</html>
