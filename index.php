<?php
$version = "v1.2.0";
$hostname = gethostname();
$time = date("l, F j, Y \a\\t g:i A");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOps Dashboard | CI/CD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4F46E5;
            --primary-light: #818CF8;
            --secondary: #10B981;
            --bg-color: #F3F4F6;
            --card-bg: #FFFFFF;
            --text-main: #1F2937;
            --text-light: #6B7280;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --radius-lg: 1rem;
            --radius-xl: 1.5rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            position: relative;
            overflow: hidden;
        }

        /* Abstract Background Shapes */
        .shape {
            position: absolute;
            filter: blur(60px);
            opacity: 0.6;
            z-index: 0;
            animation: float 20s infinite ease-in-out alternate;
        }
        
        .shape-1 {
            background: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);
            width: 400px;
            height: 400px;
            border-radius: 50%;
            top: -10%;
            left: -10%;
        }

        .shape-2 {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
            width: 500px;
            height: 500px;
            border-radius: 50%;
            bottom: -20%;
            right: -10%;
            animation-delay: -5s;
        }

        @keyframes float {
            0% { transform: translate(0, 0) scale(1); }
            50% { transform: translate(50px, 30px) scale(1.1); }
            100% { transform: translate(-30px, 50px) scale(0.9); }
        }

        .container {
            width: 100%;
            max-width: 900px;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        .dashboard {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: var(--radius-xl);
            padding: 3.5rem;
            box-shadow: var(--shadow-xl);
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes slideUp {
            to { transform: translateY(0); opacity: 1; }
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 3rem;
            padding-bottom: 1.5rem;
            border-bottom: 2px solid rgba(0,0,0,0.05);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .logo-box {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary), var(--primary-light));
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);
            transform: rotate(-10deg);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .dashboard:hover .logo-box {
            transform: rotate(0deg) scale(1.05);
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 800;
            color: #111827;
            letter-spacing: -0.025em;
            margin-bottom: 0.25rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: #ECFDF5;
            color: #047857;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.875rem;
            box-shadow: inset 0 0 0 1px rgba(16, 185, 129, 0.2);
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background-color: var(--secondary);
            border-radius: 50%;
            animation: pulse-ring 2s infinite;
        }

        @keyframes pulse-ring {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .grid-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background: var(--card-bg);
            padding: 1.5rem;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
        }

        .card:nth-child(1) { animation: slideUp 0.6s 0.2s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .card:nth-child(2) { animation: slideUp 0.6s 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .card:nth-child(3) { animation: slideUp 0.6s 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
            border-color: rgba(79, 70, 229, 0.2);
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1.25rem;
        }

        .icon-blue { background: #EFF6FF; color: #3B82F6; }
        .icon-purple { background: #FAF5FF; color: #A855F7; }
        .icon-orange { background: #FFF7ED; color: #F97316; }

        .card-label {
            font-size: 0.875rem;
            color: var(--text-light);
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-main);
            word-break: break-all;
        }

        .footer {
            margin-top: 3rem;
            text-align: center;
            font-size: 0.875rem;
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .footer i {
            color: #EF4444;
            animation: heartbeat 1.5s infinite;
        }

        @keyframes heartbeat {
            0% { transform: scale(1); }
            15% { transform: scale(1.2); }
            30% { transform: scale(1); }
            45% { transform: scale(1.2); }
            60% { transform: scale(1); }
        }

        @media (max-width: 768px) {
            .dashboard { padding: 2rem; }
            .header { flex-direction: column; align-items: flex-start; gap: 1.5rem; }
            h1 { font-size: 1.75rem; }
        }
    </style>
</head>
<body>
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>

    <div class="container">
        <div class="dashboard">
            <div class="header">
                <div class="header-left">
                    <div class="logo-box">
                        <i class="fa-brands fa-docker"></i>
                    </div>
                    <div>
                        <h1>Cloud Deployment</h1>
                        <p style="color: var(--text-light);">PHP Application via Kubernetes</p>
                    </div>
                </div>
                <div class="badge">
                    <div class="pulse-dot"></div>
                    System Healthy
                </div>
            </div>

            <div class="grid-cards">
                <div class="card">
                    <div class="card-icon icon-blue">
                        <i class="fa-solid fa-code-commit"></i>
                    </div>
                    <div class="card-label">App Version</div>
                    <div class="card-value"><?php echo htmlspecialchars($version); ?></div>
                </div>

                <div class="card">
                    <div class="card-icon icon-purple">
                        <i class="fa-solid fa-network-wired"></i>
                    </div>
                    <div class="card-label">Pod Hostname</div>
                    <div class="card-value"><?php echo htmlspecialchars($hostname); ?></div>
                </div>

                <div class="card">
                    <div class="card-icon icon-orange">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <div class="card-label">Server Time</div>
                    <div class="card-value" style="font-size: 1.1rem;"><?php echo htmlspecialchars($time); ?></div>
                </div>
            </div>

            <div class="footer">
                Deployed with <i class="fa-solid fa-heart"></i> via CI/CD Pipeline
            </div>
        </div>
    </div>
</body>
</html>
