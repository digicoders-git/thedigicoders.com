<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = config_item('base_url');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found | DigiCoders</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <style type="text/css">
        :root {
            --orange: #E76028;
            --blue: #006DAB;
            --green: #00964C;
            --dark-blue: #001C34;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: linear-gradient(135deg, #f4f7fc 0%, #e2eafc 100%);
            font-family: 'Poppins', sans-serif;
            color: #4A5568;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow-x: hidden;
            position: relative;
        }

        /* Decorative Background Blobs */
        body::before {
            content: '';
            position: absolute;
            top: -10%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(0, 109, 171, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 0;
            animation: float-blob 8s ease-in-out infinite alternate;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -10%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(231, 96, 40, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            z-index: 0;
            animation: float-blob 12s ease-in-out infinite alternate-reverse;
        }

        @keyframes float-blob {
            0% { transform: translateY(0) scale(1); }
            100% { transform: translateY(40px) scale(1.15); }
        }

        .premium-404-container {
            max-width: 650px;
            width: 100%;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 0px;
            padding: 50px 40px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0, 56, 101, 0.08);
            position: relative;
            z-index: 1;
            transform: translateY(0);
            transition: transform 0.4s ease;
        }

        .premium-404-container:hover {
            transform: translateY(-5px);
        }

        /* Pure CSS Floating Code bracket illustration */
        .illustration-wrapper {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .illustration-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0, 109, 171, 0.08) 0%, rgba(231, 96, 40, 0.08) 100%);
            border-radius: 50%;
            animation: pulse-ring 2.5s infinite;
        }

        .floating-brackets {
            font-size: 84px;
            font-weight: 800;
            background: linear-gradient(135deg, var(--blue) 0%, var(--orange) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            z-index: 2;
            animation: float-bracket 4s ease-in-out infinite;
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }

        @keyframes float-bracket {
            0%, 100% { transform: translateY(0) rotate(-3deg); }
            50% { transform: translateY(-15px) rotate(3deg); }
        }

        .error-code {
            font-size: 100px;
            font-weight: 700;
            line-height: 1;
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -2px;
            margin-bottom: 10px;
        }

        .error-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 15px;
        }

        .error-message {
            font-size: 15px;
            line-height: 1.6;
            color: #64748B;
            margin-bottom: 35px;
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Action Buttons */
        .btn-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-premium {
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            border-radius: 0px;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary-premium {
            background: var(--blue);
            color: #fff;
            box-shadow: 0 10px 20px rgba(0, 109, 171, 0.25);
            border: 1px solid var(--blue);
        }

        .btn-primary-premium:hover {
            background: var(--orange);
            border-color: var(--orange);
            transform: translateY(-2px);
        }

        .btn-outline-premium {
            background: transparent;
            color: var(--dark-blue);
            border: 1.5px solid rgba(0, 28, 52, 0.2);
        }

        .btn-outline-premium:hover {
            border-color: var(--blue);
            color: var(--blue);
            background: rgba(0, 109, 171, 0.03);
            transform: translateY(-2px);
        }

        @media (max-width: 576px) {
            .premium-404-container {
                padding: 40px 20px;
                border-radius: 0px;
            }

            .error-code {
                font-size: 80px;
            }

            .error-title {
                font-size: 20px;
            }

            .error-message {
                font-size: 13.5px;
            }

            .btn-premium {
                width: 100%;
                justify-content: center;
                padding: 12px 20px;
            }

            .btn-wrapper {
                flex-direction: column;
                gap: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="premium-404-container">
        <!-- Floating Illustration -->
        <div class="illustration-wrapper">
            <div class="illustration-bg"></div>
            <div class="floating-brackets">&lt;/&gt;</div>
        </div>

        <!-- Text details -->
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Oops! Page Not Found</h2>
        <p class="error-message">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Let's get you back on track!
        </p>

        <!-- Navigation buttons -->
        <div class="btn-wrapper">
            <a href="<?php echo !empty($base_url) ? $base_url : '/'; ?>" class="btn-premium btn-primary-premium">
                <i class="bi bi-house-door-fill"></i> Go to Homepage
            </a>
            <a href="<?php echo !empty($base_url) ? $base_url . 'contact' : '#'; ?>" class="btn-premium btn-outline-premium">
                <i class="bi bi-envelope-fill"></i> Contact Support
            </a>
        </div>
    </div>
</body>
</html>