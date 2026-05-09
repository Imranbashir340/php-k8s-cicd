<?php
$version = "v2.0.4-stable";
$hostname = gethostname();
$time = date("H:i:s T");
$date = date("d M Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevOps Mission Control</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg: #020617;
            --surface: #0f172a;
            --primary: #38bdf8;
            --secondary: #818cf8;
            --accent: #22d3ee;
            --success: #4ade80;
            --warning: #fbbf24;
            --text: #f8fafc;
            --text-dim: #94a3b8;
            --border: rgba(56, 189, 248, 0.2);
            --glow: rgba(56, 189, 248, 0.4);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg);
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-image: 
                radial-gradient(circle at 50% -20%, #1e293b, transparent),
                linear-gradient(rgba(56, 189, 248, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(56, 189, 248, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 40px 40px, 40px 40px;
        }

        .dashboard-wrapper {
            width: 100%;
            max-width: 1100px;
            padding: 2rem;
            position: relative;
        }

        /* Scanline effect */
        .dashboard-wrapper::after {
            content: " ";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.1) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.02), rgba(0, 255, 0, 0.01), rgba(0, 0, 255, 0.02));
            background-size: 100% 4px, 3px 100%;
            pointer-events: none;
            z-index: 100;
            opacity: 0.3;
        }

        .main-panel {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.5), inset 0 0 20px rgba(56, 189, 248, 0.05);
            position: relative;
            overflow: hidden;
        }

        .main-panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, transparent, var(--primary), transparent);
            animation: move-light 3s linear infinite;
        }

        @keyframes move-light {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .nav-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 3rem;
        }

        .title-group h1 {
            font-size: 2.5rem;
            font-weight: 800;
            letter-spacing: -0.05em;
            text-transform: uppercase;
            background: linear-gradient(to bottom, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .title-group p {
            font-family: 'JetBrains Mono', monospace;
            color: var(--primary);
            font-size: 0.9rem;
            letter-spacing: 0.1em;
        }

        .status-pill {
            background: rgba(74, 222, 128, 0.1);
            border: 1px solid rgba(74, 222, 128, 0.2);
            padding: 0.5rem 1.25rem;
            border-radius: 99px;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--success);
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .pulse-core {
            width: 8px;
            height: 8px;
            background: var(--success);
            border-radius: 50%;
            position: relative;
        }

        .pulse-core::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background: var(--success);
            border-radius: 50%;
            animation: ring-pulse 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes ring-pulse {
            0% { transform: translate(-50%, -50%) scale(1); opacity: 0.8; }
            100% { transform: translate(-50%, -50%) scale(4); opacity: 0; }
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 2rem;
        }

        .stats-area {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }

        .stat-box {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid var(--border);
            padding: 2rem;
            border-radius: 20px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-box:hover {
            border-color: var(--primary);
            box-shadow: 0 0 30px var(--glow);
            transform: translateY(-5px);
        }

        .stat-box i {
            font-size: 1.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .stat-box label {
            display: block;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            color: var(--text-dim);
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .stat-box .value {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text);
            word-break: break-all;
        }

        .console-area {
            background: #000;
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid #1e293b;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 1);
        }

        .console-line {
            display: flex;
            gap: 1rem;
        }

        .console-line .timestamp { color: var(--text-dim); }
        .console-line .tag { color: var(--secondary); font-weight: 700; }
        .console-line .msg { color: #cbd5e1; }

        .progress-container {
            margin-top: 2rem;
            padding: 2rem;
            background: rgba(30, 41, 59, 0.3);
            border-radius: 20px;
            border: 1px solid var(--border);
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-dim);
        }

        .progress-bar {
            height: 12px;
            background: #1e293b;
            border-radius: 6px;
            overflow: hidden;
            position: relative;
        }

        .progress-fill {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            animation: load-progress 4s infinite ease-in-out;
        }

        @keyframes load-progress {
            0% { width: 0%; }
            50% { width: 85%; }
            100% { width: 100%; }
        }

        @media (max-width: 900px) {
            .grid-container { grid-template-columns: 1fr; }
            .main-panel { padding: 1.5rem; }
        }
    </style>
</head>
<body>
    <div class="dashboard-wrapper">
        <div class="main-panel">
            <header class="nav-header">
                <div class="title-group">
                    <p>SYSTEM.DASHBOARD.V2</p>
                    <h1>Mission Control</h1>
                </div>
                <div class="status-pill">
                    <div class="pulse-core"></div>
                    System Operational
                </div>
            </header>

            <div class="grid-container">
                <div class="stats-area">
                    <div class="stat-box">
                        <i class="fa-solid fa-code-branch"></i>
                        <label>Registry Version</label>
                        <div class="value"><?php echo htmlspecialchars($version); ?></div>
                    </div>
                    <div class="stat-box">
                        <i class="fa-solid fa-microchip"></i>
                        <label>Active Pod ID</label>
                        <div class="value"><?php echo htmlspecialchars($hostname); ?></div>
                    </div>
                    <div class="stat-box">
                        <i class="fa-solid fa-calendar-day"></i>
                        <label>Deployment Date</label>
                        <div class="value"><?php echo htmlspecialchars($date); ?></div>
                    </div>
                    <div class="stat-box">
                        <i class="fa-solid fa-clock"></i>
                        <label>Server Uptime</label>
                        <div class="value"><?php echo htmlspecialchars($time); ?></div>
                    </div>
                </div>

                <div class="console-area">
                    <div class="console-line">
                        <span class="timestamp">[08:42:10]</span>
                        <span class="tag">INF</span>
                        <span class="msg">Establishing K8s link...</span>
                    </div>
                    <div class="console-line">
                        <span class="timestamp">[08:42:11]</span>
                        <span class="tag">INF</span>
                        <span class="msg">Pulling image from ECR</span>
                    </div>
                    <div class="console-line">
                        <span class="timestamp">[08:42:12]</span>
                        <span class="tag">OK </span>
                        <span class="msg">Container active: node_01</span>
                    </div>
                    <div class="console-line">
                        <span class="timestamp">[08:42:13]</span>
                        <span class="tag">INF</span>
                        <span class="msg">Syncing database clusters</span>
                    </div>
                    <div class="console-line">
                        <span class="timestamp">[08:42:15]</span>
                        <span class="tag">OK </span>
                        <span class="msg">Ready for incoming traffic</span>
                    </div>
                </div>
            </div>

            <div class="progress-container">
                <div class="progress-header">
                    <span>Pipeline Integrity</span>
                    <span>100% SECURE</span>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
