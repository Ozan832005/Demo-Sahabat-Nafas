<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAHABAT NAPAS - Aplikasi Pendampingan Terapi PPOK</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('icon.png')); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        
        * {
            font-family: 'Inter', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-tertiary);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #0f766e, #0d9488);
            transform: scale(1.1);
        }

        ::-webkit-scrollbar-corner {
            background: var(--bg-tertiary);
        }

        :root {
            --font-size-base: 18px;
            --font-size-lg: 20px;
            --font-size-xl: 24px;
            
            --bg-primary: #f8fafc;
            --bg-secondary: #ffffff;
            --bg-tertiary: #f1f5f9;
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-tertiary: #94a3b8;
            --border-color: #e2e8f0;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --header-bg: rgba(255, 255, 255, 0.65);
            --header-bg-scrolled: rgba(255, 255, 255, 0.85);
            --card-bg: #ffffff;
            --input-bg: #ffffff;
            --gradient-start: #042F2E;
            --gradient-end: #0D9488;
            --fab-bg: rgba(255, 255, 255, 0.9);
            --fab-border: rgba(255, 255, 255, 0.18);
        }

        .dark {
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --bg-tertiary: #334155;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-tertiary: #64748b;
            --border-color: #334155;
            --shadow-color: rgba(0, 0, 0, 0.3);
            --header-bg: rgba(30, 41, 59, 0.65);
            --header-bg-scrolled: rgba(30, 41, 59, 0.85);
            --card-bg: #1e293b;
            --input-bg: #1e293b;
            --gradient-start: #0D9488;
            --gradient-end: #14b8a6;
            --fab-bg: rgba(30, 41, 59, 0.9);
            --fab-border: rgba(255, 255, 255, 0.12);
        }

        body {
            font-size: var(--font-size-base);
            background-color: var(--bg-primary);
            color: var(--text-primary);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .text-sm {
            font-size: calc(var(--font-size-base) * 0.85) !important;
        }

        .text-base {
            font-size: var(--font-size-base) !important;
        }

        .text-lg {
            font-size: var(--font-size-lg) !important;
        }

        .text-xl {
            font-size: var(--font-size-xl) !important;
        }

        .text-2xl {
            font-size: calc(var(--font-size-xl) * 1.3) !important;
        }

        .font-scale-1 { 
            --font-size-base: 18px; 
            --font-size-lg: 20px; 
            --font-size-xl: 24px; 
        }
        .font-scale-2 { 
            --font-size-base: 21px; 
            --font-size-lg: 24px; 
            --font-size-xl: 28px; 
        }
        .font-scale-3 { 
            --font-size-base: 24px; 
            --font-size-lg: 28px; 
            --font-size-xl: 32px; 
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes breathe-in {
            0% { transform: scale(1); }
            100% { transform: scale(1.4); }
        }

        @keyframes breathe-out {
            0% { transform: scale(1.4); }
            100% { transform: scale(1); }
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(13, 148, 136, 0.3); }
            50% { box-shadow: 0 0 40px rgba(13, 148, 136, 0.6); }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .breathing-circle {
            animation-duration: 2s;
            animation-timing-function: ease-in-out;
            animation-iteration-count: infinite;
        }

        .breathing-in {
            animation-name: breathe-in;
        }

        .breathing-out {
            animation-name: breathe-out;
        }

        .glass {
            background: var(--header-bg);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        .header-container {
            background: var(--header-bg);
            backdrop-filter: blur(32px) saturate(180%);
            -webkit-backdrop-filter: blur(32px) saturate(180%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 40px rgba(0, 0, 0, 0.05);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .header-container.scrolled {
            background: var(--header-bg-scrolled);
            backdrop-filter: blur(40px) saturate(200%);
            -webkit-backdrop-filter: blur(40px) saturate(200%);
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 8px 50px rgba(0, 0, 0, 0.1);
        }

        .fab-container {
            position: fixed;
            bottom: 24px;
            right: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            z-index: 1000;
        }

        .fab-button {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--fab-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--fab-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .fab-button:hover {
            transform: scale(1.08);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .fab-button:active {
            transform: scale(0.95);
        }

        .theme-fab-icon {
            width: 24px;
            height: 24px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sun-fab-icon {
            position: absolute;
            opacity: 1;
            transform: rotate(0deg) scale(1);
            color: #fbbf24 !important;
            filter: drop-shadow(0 0 8px rgba(251, 191, 36, 0.6));
        }

        .dark .sun-fab-icon {
            opacity: 0;
            transform: rotate(90deg) scale(0.5);
        }

        .moon-fab-icon {
            position: absolute;
            opacity: 0;
            transform: rotate(-90deg) scale(0.5);
            color: #6366f1 !important;
            filter: drop-shadow(0 0 8px rgba(99, 102, 241, 0.6));
        }

        .dark .moon-fab-icon {
            opacity: 1;
            transform: rotate(0deg) scale(1);
        }

        .font-fab-button {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: var(--fab-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--fab-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            font-weight: 700;
            font-size: 20px;
            color: var(--text-primary);
        }

        .font-fab-button:hover {
            transform: scale(1.08);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
        }

        .font-dropdown {
            position: absolute;
            bottom: 70px;
            right: 0;
            background: var(--fab-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid var(--fab-border);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
            padding: 8px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 80px;
            opacity: 0;
            transform: translateY(10px) scale(0.95);
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .font-dropdown.show {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: all;
        }

        .font-dropdown-item {
            padding: 12px 16px;
            border-radius: 14px;
            cursor: pointer;
            text-align: center;
            font-weight: 600;
            transition: all 0.2s ease;
            color: var(--text-primary);
        }

        .font-dropdown-item:hover {
            background: var(--bg-tertiary);
        }

        .font-dropdown-item.active {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white !important;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
            color: var(--text-secondary);
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(13, 148, 136, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .nav-link:hover {
            background: var(--bg-tertiary);
            color: var(--text-primary);
            transform: translateY(-2px);
        }

        .nav-link:hover::before {
            left: 100%;
        }

        .nav-link svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }

        .nav-link:hover svg {
            transform: scale(1.1);
        }

        .gradient-teal {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
        }

        .user-menu-dropdown {
            position: absolute;
            top: calc(100% + 12px);
            right: 0;
            background: var(--bg-secondary);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            border: 1px solid var(--border-color);
            min-width: 260px;
            z-index: 100;
            overflow: hidden;
            animation: dropdownSlide 0.3s ease-out;
        }

        @keyframes dropdownSlide {
            from {
                opacity: 0;
                transform: translateY(-10px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .user-menu-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--text-primary);
            border: none;
            background: none;
            font-size: 15px;
            position: relative;
        }

        .user-menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 0;
            background: linear-gradient(180deg, var(--gradient-start), var(--gradient-end));
            border-radius: 0 3px 3px 0;
            transition: height 0.2s ease;
        }

        .user-menu-item:hover {
            background: var(--bg-tertiary);
            padding-left: 22px;
        }

        .user-menu-item:hover::before {
            height: 60%;
        }

        .login-btn, .register-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .login-btn {
            background: transparent;
            border: 2px solid var(--border-color);
            color: var(--text-primary);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 0;
        }

        .login-btn:hover {
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 148, 136, 0.3);
        }

        .login-btn:hover::before {
            opacity: 1;
        }

        .login-btn svg, .login-btn span {
            position: relative;
            z-index: 1;
        }

        .register-btn {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white;
            box-shadow: 0 6px 20px rgba(13, 148, 136, 0.3);
        }

        .register-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(13, 148, 136, 0.5);
        }

        .register-btn:hover::before {
            left: 100%;
        }

        .login-btn svg, .register-btn svg {
            width: 18px;
            height: 18px;
            transition: transform 0.3s ease;
        }

        .login-btn:hover svg, .register-btn:hover svg {
            transform: scale(1.15);
        }

        .widget-card {
            position: relative;
            background: var(--card-bg);
            border-radius: 28px;
            padding: 32px;
            border: 1px solid var(--border-color);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            cursor: pointer;
        }

        .widget-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end), var(--gradient-start));
            background-size: 200% 100%;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .widget-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(13, 148, 136, 0.03) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .widget-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(13, 148, 136, 0.2);
            border-color: transparent;
        }

        .widget-card:hover::before {
            opacity: 1;
            animation: shimmer 3s infinite;
        }

        .widget-card:hover::after {
            opacity: 1;
        }

        .widget-card .widget-icon {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            box-shadow: 0 10px 30px rgba(13, 148, 136, 0.3);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .widget-card .widget-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .widget-card:hover .widget-icon {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 40px rgba(13, 148, 136, 0.5);
        }

        .widget-card:hover .widget-icon::before {
            left: 100%;
        }

        .widget-card .widget-icon svg {
            width: 36px;
            height: 36px;
            color: white;
            transition: transform 0.4s ease;
        }

        .widget-card:hover .widget-icon svg {
            transform: scale(1.15);
        }

        .widget-card h3 {
            font-size: var(--font-size-xl);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        .widget-card:hover h3 {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .widget-card p {
            font-size: var(--font-size-base);
            color: var(--text-secondary);
            line-height: 1.7;
            margin-bottom: 20px;
            transition: color 0.3s ease;
        }

        .widget-card:hover p {
            color: var(--text-primary);
        }

        .widget-card .widget-arrow {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 15px;
            color: var(--gradient-end);
            transition: all 0.3s ease;
        }

        .widget-card .widget-arrow svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }

        .widget-card:hover .widget-arrow {
            gap: 12px;
        }

        .widget-card:hover .widget-arrow svg {
            transform: translateX(6px);
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(12px) saturate(150%);
            -webkit-backdrop-filter: blur(12px) saturate(150%);
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            background: var(--bg-secondary);
            border-radius: 32px;
            width: 100%;
            max-width: 440px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 35px 80px -20px rgba(0, 0, 0, 0.4);
            animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end), var(--gradient-start));
            background-size: 200% 100%;
            border-radius: 32px 32px 0 0;
            animation: shimmer 4s infinite linear;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--bg-tertiary);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .modal-close:hover {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            transform: rotate(90deg);
        }

        .modal-close:hover svg {
            color: white !important;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border-radius: 16px;
            border: 2px solid var(--border-color);
            background: var(--input-bg);
            color: var(--text-primary);
            font-size: var(--font-size-base);
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: var(--gradient-end);
            box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.15);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: var(--text-tertiary);
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--text-primary);
            font-size: calc(var(--font-size-base) * 0.9);
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            border-radius: 16px;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            color: white;
            font-weight: 700;
            font-size: var(--font-size-base);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(13, 148, 136, 0.4);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .gradient-hero {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            position: relative;
            overflow: hidden;
        }

        .gradient-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            border-radius: 50%;
        }

        .gradient-hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 60%;
            height: 150%;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 60%);
            border-radius: 50%;
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            background: var(--card-bg);
            border: 1px solid var(--border-color);
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px rgba(13, 148, 136, 0.15);
            border-color: var(--gradient-end);
        }

        .slide-in {
            animation: slideUp 0.6s ease-out;
        }

        .contact-section {
            background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
            position: relative;
            overflow: hidden;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end), var(--gradient-start));
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        .contact-card {
            background: var(--bg-secondary);
            border-radius: 28px;
            padding: 40px;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(13, 148, 136, 0.15);
        }

        .contact-icon {
            width: 80px;
            height: 80px;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            box-shadow: 0 15px 35px rgba(13, 148, 136, 0.35);
            margin-bottom: 24px;
        }

        .contact-icon svg {
            width: 40px;
            height: 40px;
            color: white;
        }

        .hero-content-light {
            color: var(--text-primary) !important;
        }

        .hero-content-light h1,
        .hero-content-light p {
            color: var(--text-primary) !important;
        }

        .hero-content-light span {
            color: var(--gradient-end) !important;
        }

        .hero-content-light .inline-block {
            background: linear-gradient(135deg, rgba(13, 148, 136, 0.1), rgba(20, 184, 166, 0.1)) !important;
            border-color: rgba(13, 148, 136, 0.2) !important;
            color: var(--gradient-end) !important;
        }

        .hero-btn-primary {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end)) !important;
            color: white !important;
        }

        .hero-btn-secondary {
            border-color: var(--gradient-end) !important;
            color: var(--gradient-end) !important;
        }

        .hero-btn-secondary:hover {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end)) !important;
            color: white !important;
        }

        .flip-card-container {
            perspective: 1200px;
            width: 100%;
            height: 650px;
        }

        .flip-card {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        .flip-card.flipped {
            transform: rotateY(180deg);
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 32px;
            overflow: hidden;
        }

        .flip-card-front {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .flip-card-back {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transform: rotateY(180deg);
        }

        .feature-widget {
            position: relative;
            background: var(--card-bg);
            border-radius: 32px;
            padding: 40px;
            border: 1px solid var(--border-color);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.06);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            cursor: pointer;
        }

        .feature-widget::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end), var(--gradient-start));
            background-size: 200% 100%;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .feature-widget::after {
            content: '';
            position: absolute;
            top: -60%;
            left: -60%;
            width: 220%;
            height: 220%;
            background: radial-gradient(circle, rgba(13, 148, 136, 0.04) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
        }

        .feature-widget:hover {
            transform: translateY(-16px) scale(1.03);
            box-shadow: 0 35px 70px rgba(13, 148, 136, 0.18);
            border-color: transparent;
        }

        .feature-widget:hover::before {
            opacity: 1;
            animation: shimmer 3s infinite linear;
        }

        .feature-widget:hover::after {
            opacity: 1;
        }

        .feature-widget .feature-icon-wrapper {
            width: 96px;
            height: 96px;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 28px;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            box-shadow: 0 15px 40px rgba(13, 148, 136, 0.4);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .feature-widget .feature-icon-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
            transition: left 0.7s ease;
        }

        .feature-widget:hover .feature-icon-wrapper {
            transform: scale(1.15) rotate(8deg);
            box-shadow: 0 20px 55px rgba(13, 148, 136, 0.6);
        }

        .feature-widget:hover .feature-icon-wrapper::before {
            left: 100%;
        }

        .feature-widget .feature-icon-wrapper svg {
            width: 48px;
            height: 48px;
            color: white;
            transition: transform 0.5s ease;
        }

        .feature-widget:hover .feature-icon-wrapper svg {
            transform: scale(1.2);
        }

        .feature-widget h3 {
            font-size: calc(var(--font-size-xl) * 1.1);
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 16px;
            transition: all 0.4s ease;
        }

        .feature-widget:hover h3 {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-widget p {
            font-size: var(--font-size-base);
            color: var(--text-secondary);
            line-height: 1.8;
            transition: color 0.4s ease;
        }

        .feature-widget:hover p {
            color: var(--text-primary);
        }

        .feature-widget {
            position: relative;
            background: var(--card-bg);
            border-radius: 32px;
            padding: 48px 40px;
            border: 1px solid var(--border-color);
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.06);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            cursor: pointer;
        }

        .feature-widget::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end), var(--gradient-start));
            background-size: 200% 100%;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .feature-widget::after {
            content: '';
            position: absolute;
            top: -60%;
            left: -60%;
            width: 220%;
            height: 220%;
            background: radial-gradient(circle, rgba(13, 148, 136, 0.04) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
        }

        .feature-widget:hover {
            transform: translateY(-16px) scale(1.03);
            box-shadow: 0 35px 70px rgba(13, 148, 136, 0.18);
            border-color: transparent;
        }

        .feature-widget:hover::before {
            opacity: 1;
            animation: shimmer 3s infinite linear;
        }

        .feature-widget:hover::after {
            opacity: 1;
        }

        .feature-icon-wrapper {
            width: 88px;
            height: 88px;
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 32px;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            box-shadow: 0 15px 45px rgba(13, 148, 136, 0.4);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .feature-icon-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
            transition: left 0.7s ease;
        }

        .feature-widget:hover .feature-icon-wrapper {
            transform: scale(1.15) rotate(6deg);
            box-shadow: 0 20px 60px rgba(13, 148, 136, 0.6);
        }

        .feature-widget:hover .feature-icon-wrapper::before {
            left: 100%;
        }

        .feature-icon-wrapper svg {
            width: 44px;
            height: 44px;
            color: white;
            transition: transform 0.5s ease;
        }

        .feature-widget:hover .feature-icon-wrapper svg {
            transform: scale(1.2);
        }

        .feature-widget h3 {
            font-size: var(--font-size-xl);
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 16px;
            transition: all 0.4s ease;
            line-height: 1.3;
        }

        .feature-widget:hover h3 {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .feature-widget p {
            font-size: var(--font-size-base);
            color: var(--text-secondary);
            line-height: 1.8;
            transition: color 0.4s ease;
        }

        .feature-widget:hover p {
            color: var(--text-primary);
        }

        .flip-card-container {
            perspective: 1200px;
            width: 100%;
            height: 650px;
        }

        .flip-card {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        .flip-card.flipped {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .flip-card-front {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
        }

        .flip-card-back {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            transform: rotateY(180deg);
        }

        .flip-card-front::before, .flip-card-back::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, var(--gradient-start), var(--gradient-end), var(--gradient-start));
            background-size: 200% 100%;
            animation: shimmer 4s infinite linear;
        }

        .contact-info-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px 24px;
            border-radius: 20px;
            background: var(--bg-primary);
            transition: all 0.3s ease;
        }

        .contact-info-item:hover {
            transform: translateX(8px);
            background: linear-gradient(135deg, rgba(13, 148, 136, 0.08), rgba(20, 184, 166, 0.08));
        }

        .contact-info-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            flex-shrink: 0;
        }

        .contact-info-icon svg {
            width: 26px;
            height: 26px;
            color: white;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--bg-tertiary);
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .social-icon svg {
            width: 20px;
            height: 20px;
        }

        .social-icon:hover {
            transform: translateY(-6px) scale(1.1);
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            border-color: transparent;
            box-shadow: 0 15px 40px rgba(13, 148, 136, 0.4);
        }

        .social-icon:hover svg {
            color: white !important;
        }

        .footer-section {
            background: var(--bg-secondary);
            border-top: 1px solid var(--border-color);
            padding: 80px 0 40px 0;
        }

        .footer-widget h4 {
            font-size: var(--font-size-lg);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 24px;
        }

        .footer-link {
            display: block;
            padding: 8px 0;
            color: var(--text-secondary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: var(--gradient-end);
            padding-left: 8px;
        }

        .footer-bottom {
            border-top: 1px solid var(--border-color);
            margin-top: 60px;
            padding-top: 32px;
            text-align: center;
            color: var(--text-tertiary);
        }
    </style>
</head>
<body class="font-scale-1">
    <header class="header-container fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 gradient-teal rounded-xl flex items-center justify-center overflow-hidden">
                    <img src="<?php echo e(asset('icon.png')); ?>" alt="Icon" class="w-full h-full object-cover">
                </div>
                <span class="text-xl font-bold" style="color: var(--text-primary)">Sahabat Napas</span>
            </a>
<nav class="hidden md:flex items-center gap-2">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->isPasien()): ?>
                        <?php
                            $currentRoute = request()->route()->getName() ?? '';
                            $isDashboard = $currentRoute === 'pasien.dashboard';
                            $isTerapi = $currentRoute === 'pasien.terapi';
                            $isCatatan = $currentRoute === 'pasien.catatan';
                        ?>
                        <a href="<?php echo e(route('pasien.dashboard')); ?>" class="nav-link px-3 py-2 rounded-xl text-sm font-medium transition-all <?php if($isDashboard): ?> bg-teal-100 text-teal-700 font-semibold <?php else: ?> text-gray-600 hover:bg-gray-50 <?php endif; ?>">
                            Dashboard
                        </a>
                        <a href="<?php echo e(route('pasien.terapi')); ?>" class="nav-link px-3 py-2 rounded-xl text-sm font-medium transition-all <?php if($isTerapi): ?> bg-teal-100 text-teal-700 font-semibold <?php else: ?> text-gray-600 hover:bg-gray-50 <?php endif; ?>">
                            Terapi
                        </a>
                        <a href="<?php echo e(route('pasien.catatan')); ?>" class="nav-link px-3 py-2 rounded-xl text-sm font-medium transition-all <?php if($isCatatan): ?> bg-teal-100 text-teal-700 font-semibold <?php else: ?> text-gray-600 hover:bg-gray-50 <?php endif; ?>">
                            Riwayat Terapi
                        </a>
                        <a href="<?php echo e(route('pasien.catatan')); ?>#notifikasi" class="nav-link relative px-3 py-2 rounded-xl text-sm font-medium transition-all text-gray-600 hover:bg-gray-50 group">
                            Notifikasi
                            <span class="absolute -top-1 -right-1 flex items-center justify-center min-w-5 h-5 bg-red-500 text-white text-[10px] font-bold rounded-full ring-2 ring-white">
                                3
                            </span>
                        </a>
                    <?php else: ?>
                        <a href="/" class="nav-link">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Beranda
                        </a>
                        <a href="#fitur" class="nav-link">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            Fitur
                        </a>
                        <a href="#kontak" class="nav-link">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 01-2-2v10a2 2 0 012 2z"/>
                            </svg>
                            Kontak
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="/" class="nav-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Beranda
                    </a>
                    <a href="#fitur" class="nav-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Fitur
                    </a>
                    <a href="#kontak" class="nav-link">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 01-2-2v10a2 2 0 012 2z"/>
                        </svg>
                        Kontak
                    </a>
                <?php endif; ?>
            </nav>
            <div class="flex items-center gap-3">
                <?php if(auth()->guard()->check()): ?>
                    <div class="relative">
                        <button onclick="toggleUserMenu()" class="flex items-center gap-2 p-2 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-800 transition">
                            <div class="w-10 h-10 gradient-teal rounded-full flex items-center justify-center text-white font-semibold">
                                <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

                            </div>
                        </button>
                        <div id="userMenu" class="user-menu-dropdown hidden">
                            <?php
                                $dashboardRoute = auth()->user()->isAdmin()
                                    ? 'admin.dashboard'
                                    : (auth()->user()->isPerawat() ? 'perawat.dashboard' : 'pasien.dashboard');
                            ?>
                            <a href="<?php echo e(route($dashboardRoute)); ?>" class="user-menu-item">Dashboard</a>
                            <form action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="user-menu-item w-full text-left">Keluar</button>
                            </form>
                        </div>
                    </div>
                <?php else: ?>
                    <button onclick="openLoginModal()" class="login-btn">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        <span>Masuk</span>
                    </button>
                    <button onclick="openRegisterModal()" class="register-btn hidden md:flex">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span>Daftar</span>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <!-- Pasien Navigation (hanya ditampilkan untuk role pasien) -->
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->user()->isPasien()): ?>
            <?php echo $__env->make('layouts.pasien-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>
    <?php endif; ?>

    <div class="fab-container">
        <button onclick="toggleTheme()" class="fab-button" title="Ganti Tema">
            <svg class="theme-fab-icon sun-fab-icon" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
            </svg>
            <svg class="theme-fab-icon moon-fab-icon" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"/>
            </svg>
        </button>
        <div class="relative">
            <button onclick="toggleFontDropdown()" class="font-fab-button" title="Ukuran Huruf">
                Aa
            </button>
            <div id="fontDropdown" class="font-dropdown">
                <button onclick="setFontSize(1)" class="font-dropdown-item font-scale-1">A</button>
                <button onclick="setFontSize(2)" class="font-dropdown-item font-scale-2">A+</button>
                <button onclick="setFontSize(3)" class="font-dropdown-item font-scale-3">A++</button>
            </div>
        </div>
    </div>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <div id="loginModal" class="modal-overlay hidden" onclick="handleOverlayClick(event, 'loginModal')">
        <div class="modal-content p-8 relative" onclick="event.stopPropagation()">
            <button onclick="closeModals()" class="modal-close">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--text-secondary)">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="text-center mb-8">
                <div class="w-20 h-20 gradient-teal rounded-full flex items-center justify-center mx-auto mb-6 overflow-hidden">
                    <img src="<?php echo e(asset('icon.png')); ?>" alt="Icon" class="w-full h-full object-cover">
                </div>
                <h2 class="text-3xl font-bold" style="color: var(--text-primary)">Masuk ke Akun</h2>
                <p class="mt-3" style="color: var(--text-secondary)">Selamat datang kembali di Sahabat Napas</p>
            </div>
            <form action="<?php echo e(route('login')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="space-y-5">
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" required class="form-input" placeholder="email@contoh.com">
                    </div>
                    <div>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" required class="form-input" placeholder="Masukkan password">
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl">
                            <p class="text-sm text-red-600 dark:text-red-400"><?php echo e($errors->first()); ?></p>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="submit-btn">
                        Masuk
                    </button>
                </div>
            </form>
            <p class="text-center mt-8 text-sm" style="color: var(--text-secondary)">
                Belum punya akun? <button onclick="switchToRegister()" class="font-bold" style="color: var(--gradient-end)">Daftar sekarang</button>
            </p>
        </div>
    </div>

    <div id="registerModal" class="modal-overlay hidden" onclick="handleOverlayClick(event, 'registerModal')">
        <div class="modal-content p-8 relative" onclick="event.stopPropagation()">
            <button onclick="closeModals()" class="modal-close">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: var(--text-secondary)">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
            <div class="text-center mb-8">
                <div class="w-20 h-20 gradient-teal rounded-full flex items-center justify-center mx-auto mb-6 overflow-hidden">
                    <img src="<?php echo e(asset('icon.png')); ?>" alt="Icon" class="w-full h-full object-cover">
                </div>
                <h2 class="text-3xl font-bold" style="color: var(--text-primary)">Buat Akun Baru</h2>
                <p class="mt-3" style="color: var(--text-secondary)">Bergabunglah dengan komunitas Sahabat Napas</p>
            </div>
            <form action="<?php echo e(route('register')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="space-y-5">
                    <div>
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" required class="form-input" placeholder="Nama Anda">
                    </div>
                    <div>
                        <label class="form-label">Email</label>
                        <input type="email" name="email" required class="form-input" placeholder="email@contoh.com">
                    </div>
                    <div>
                        <label class="form-label">Usia (opsional)</label>
                        <input type="number" name="age" class="form-input" placeholder="Contoh: 60">
                    </div>
                    <div>
                        <label class="form-label">Alamat (opsional)</label>
                        <input type="text" name="address" class="form-input" placeholder="Alamat Anda">
                    </div>
                    <div>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" required class="form-input" placeholder="Minimal 6 karakter">
                    </div>
                    <div>
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required class="form-input" placeholder="Ulangi password">
                    </div>
                    <?php if($errors->any()): ?>
                        <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl">
                            <p class="text-sm text-red-600 dark:text-red-400"><?php echo e($errors->first()); ?></p>
                        </div>
                    <?php endif; ?>
                    <button type="submit" class="submit-btn">
                        Daftar
                    </button>
                </div>
            </form>
            <p class="text-center mt-8 text-sm" style="color: var(--text-secondary)">
                Sudah punya akun? <button onclick="switchToLogin()" class="font-bold" style="color: var(--gradient-end)">Masuk sekarang</button>
            </p>
        </div>
    </div>

    <script>
        function toggleTheme() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
        }

        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        let currentFontScale = parseInt(localStorage.getItem('fontScale') || '1');
        function setFontScaleOnLoad() {
            document.body.classList.remove('font-scale-1', 'font-scale-2', 'font-scale-3');
            document.body.classList.add('font-scale-' + currentFontScale);
            updateFontDropdownActive();
        }
        setFontScaleOnLoad();

        function toggleFontDropdown() {
            document.getElementById('fontDropdown').classList.toggle('show');
        }

        function setFontSize(scale) {
            currentFontScale = scale;
            document.body.classList.remove('font-scale-1', 'font-scale-2', 'font-scale-3');
            document.body.classList.add('font-scale-' + scale);
            localStorage.setItem('fontScale', scale);
            updateFontDropdownActive();
            document.getElementById('fontDropdown').classList.remove('show');
        }

        function updateFontDropdownActive() {
            const items = document.querySelectorAll('.font-dropdown-item');
            items.forEach((item, index) => {
                item.classList.toggle('active', index + 1 === currentFontScale);
            });
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.font-fab-button') && !e.target.closest('.font-dropdown')) {
                document.getElementById('fontDropdown').classList.remove('show');
            }
        });

        function toggleUserMenu() {
            document.getElementById('userMenu').classList.toggle('hidden');
        }

        document.addEventListener('click', function(e) {
            if (!e.target.closest('.relative')) {
                const menu = document.getElementById('userMenu');
                if (menu) menu.classList.add('hidden');
            }
        });

        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header-container');
            if (window.scrollY > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        function openLoginModal() {
            document.getElementById('loginModal').classList.remove('hidden');
            document.getElementById('registerModal').classList.add('hidden');
            document.body.style.overflow = 'hidden';
        }

        function openRegisterModal() {
            document.getElementById('registerModal').classList.remove('hidden');
            document.getElementById('loginModal').classList.add('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModals() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('registerModal').classList.add('hidden');
            document.body.style.overflow = '';
        }

        function handleOverlayClick(event, modalId) {
            if (event.target.id === modalId) {
                closeModals();
            }
        }

        function switchToRegister() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('registerModal').classList.remove('hidden');
        }

        function switchToLogin() {
            document.getElementById('registerModal').classList.add('hidden');
            document.getElementById('loginModal').classList.remove('hidden');
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModals();
            }
        });

        <?php if($errors->has('email') || $errors->has('password')): ?>
            openLoginModal();
        <?php endif; ?>

        <?php if($errors->has('name') || $errors->has('password_confirmation')): ?>
            openRegisterModal();
        <?php endif; ?>
        
    </script>
</body>
</html>
<?php /**PATH C:\Users\nurda\project-sahabat-nafas\resources\views\layouts\app.blade.php ENDPATH**/ ?>