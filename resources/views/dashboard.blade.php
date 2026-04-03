<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalPulse | Dashboard & Library</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: #f5f7fa;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #2c3e50;
            min-height: 100vh;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            padding: 20px 60px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.06);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 40px;
        }
        .logo {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -2px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }
        .logo-vital {
            font-weight: 800;
            letter-spacing: -3px;
        }
        .logo-pulse {
            font-weight: 300;
            letter-spacing: 2px;
        }
        .search-bar {
            padding: 10px 18px;
            border-radius: 12px;
            border: 1.5px solid #e0e0e0;
            font-size: 0.95rem;
            width: 240px;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        .search-bar:focus {
            outline: none;
            border-color: #4ed6cb;
            box-shadow: 0 0 0 3px rgba(78, 214, 203, 0.1);
        }
        .navbar-links {
            display: flex;
            align-items: center;
            gap: 40px;
        }
        .navbar-links a {
            text-decoration: none;
            color: #7f8c8d;
            font-size: 0.95rem;
            font-weight: 500;
            padding-bottom: 4px;
            transition: all 0.3s ease;
            position: relative;
        }
        .navbar-links a:hover {
            color: #4ed6cb;
        }
        .navbar-links a.active {
            color: #2c3e50;
            font-weight: 600;
        }
        .navbar-links a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: #2c3e50;
        }
        .navbar-links button {
            background: none;
            border: none;
            color: #7f8c8d;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }
        .navbar-links button:hover {
            color: #4ed6cb;
        }
        .user-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-left: 20px;
        }
        .welcome-banner {
            background: #f5f7fa;
            color: #2c3e50;
            font-size: 1.3rem;
            font-weight: 700;
            padding: 32px 0;
            text-align: left;
            padding-left: 60px;
            font-family: 'Poppins', sans-serif;
        }
        .dashboard-container {
            padding: 48px 60px;
            max-width: 1400px;
            margin: 0 auto;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 32px;
            margin-bottom: 32px;
        }
        .dashboard-grid-large {
            grid-column: 1 / -1;
        }
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 32px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            border: 2px solid #4ed6cb;
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 24px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        .form-select {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1.5px solid #e0e0e0;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            background-color: #f9fafb;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .form-select:focus {
            outline: none;
            border-color: #4ed6cb;
            background-color: #fff;
        }
        .chart-container {
            position: relative;
            height: 300px;
            margin: 20px 0;
        }
        .exercise-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }
        .exercise-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            border: 1px solid #e8ecf1;
            transition: all 0.3s ease;
        }
        .exercise-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(78, 214, 203, 0.1);
        }
        .exercise-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 12px;
        }
        .exercise-card h4 {
            font-size: 0.95rem;
            font-weight: 600;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }
        .info-box {
            background: linear-gradient(135deg, #e8f8f6 0%, #f0fffe 100%);
            border-radius: 12px;
            padding: 20px;
            margin-top: 16px;
            border-left: 4px solid #4ed6cb;
        }
        .info-box h4 {
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 12px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }
        .info-box p {
            font-size: 0.9rem;
            color: #5a6c7d;
            line-height: 1.6;
        }
        .activity-item {
            padding: 16px 0;
            border-bottom: 1px solid #e8ecf1;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-text {
            font-size: 0.95rem;
            color: #2c3e50;
            font-weight: 500;
        }
        .activity-stat {
            font-size: 1.3rem;
            font-weight: 700;
            color: #4ed6cb;
            margin-bottom: 4px;
        }
        .log-activity-btn {
            width: 100%;
            padding: 12px 0;
            background: linear-gradient(135deg, #4ed6cb 0%, #45b8a8 100%);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 16px;
            font-family: 'Inter', sans-serif;
        }
        .log-activity-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 214, 203, 0.4);
        }
        .tab-container {
            display: none;
        }
        .tab-container.active {
            display: block;
        }
        .exercise-list {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            padding: 32px 28px;
            flex: 0 0 380px;
            max-height: 85vh;
            overflow-y: auto;
        }
        .exercise-list::-webkit-scrollbar {
            width: 6px;
        }
        .exercise-list::-webkit-scrollbar-track {
            background: #f0f0f0;
            border-radius: 10px;
        }
        .exercise-list::-webkit-scrollbar-thumb {
            background: #4ed6cb;
            border-radius: 10px;
        }
        .exercise-list h2 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 24px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
            text-align: center;
        }
        .exercise-item {
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 12px;
            margin-bottom: 16px;
            padding: 14px 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            transition: all 0.3s ease;
            border: 1px solid #e8ecf1;
            position: relative;
            overflow: hidden;
        }
        .exercise-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(135deg, #4ed6cb 0%, #45b8a8 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .exercise-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(78, 214, 203, 0.12);
        }
        .exercise-item:hover::before {
            opacity: 1;
        }
        .exercise-item img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 10px;
            margin-right: 14px;
        }
        .exercise-info {
            flex: 1;
        }
        .exercise-info strong {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.9rem;
        }
        .exercise-info div {
            font-size: 0.85rem;
            color: #5a6c7d;
        }
        .exercise-actions {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .exercise-actions button {
            background: #4ed6cb;
            border: none;
            border-radius: 8px;
            color: #fff;
            padding: 6px 10px;
            cursor: pointer;
            font-size: 1rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .exercise-actions button:hover {
            background: #45b8a8;
            transform: scale(1.05);
        }
        .exercise-actions button.delete {
            background: #e74c3c;
        }
        .exercise-actions button.delete:hover {
            background: #c0392b;
        }
        .add-movement-btn {
            width: 100%;
            margin-top: 24px;
            padding: 14px 0;
            background: linear-gradient(135deg, #4ed6cb 0%, #45b8a8 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(78, 214, 203, 0.3);
            font-family: 'Inter', sans-serif;
        }
        .add-movement-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 214, 203, 0.4);
        }
        .exercise-details {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
            padding: 40px;
            flex: 1;
            min-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
        }
        .exercise-details::-webkit-scrollbar {
            width: 6px;
        }
        .exercise-details::-webkit-scrollbar-track {
            background: #f0f0f0;
            border-radius: 10px;
        }
        .exercise-details::-webkit-scrollbar-thumb {
            background: #4ed6cb;
            border-radius: 10px;
        }
        .exercise-details h3 {
            font-size: 1.7rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }
        .exercise-details .tags {
            background: linear-gradient(135deg, #e8f8f6 0%, #f0fffe 100%);
            border-radius: 10px;
            padding: 8px 14px;
            display: inline-block;
            font-size: 0.85rem;
            margin-bottom: 24px;
            color: #4ed6cb;
            font-weight: 500;
            border: 1px solid rgba(78, 214, 203, 0.2);
        }
        .exercise-details .video-preview {
            width: 100%;
            height: 240px;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            border-radius: 12px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .exercise-details .video-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }
        .exercise-details .video-preview .play-btn {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: rgba(78, 214, 203, 0.9);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 16px rgba(78, 214, 203, 0.3);
        }
        .exercise-details .video-preview .play-btn:hover {
            background: #4ed6cb;
            transform: translate(-50%, -50%) scale(1.1);
        }
        .detail-section {
            margin-bottom: 28px;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e8ecf1;
        }
        .detail-section h4 {
            font-size: 0.95rem;
            font-weight: 700;
            text-transform: uppercase;
            color: #2c3e50;
            margin-bottom: 16px;
            letter-spacing: 0.5px;
            font-family: 'Poppins', sans-serif;
        }
        .chart-container {
            position: relative;
            height: 220px;
            margin-bottom: 8px;
        }
        .chart-small {
            position: relative;
            height: 180px;
            margin-bottom: 8px;
        }
        .equipment-list {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }
        .equipment-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            padding: 12px;
            background: rgba(78, 214, 203, 0.1);
            border-radius: 10px;
            border: 1px solid rgba(78, 214, 203, 0.2);
            flex: 0 0 calc(50% - 6px);
            text-align: center;
            transition: all 0.3s ease;
        }
        .equipment-item:hover {
            background: rgba(78, 214, 203, 0.15);
            border-color: #4ed6cb;
        }
        .equipment-icon {
            font-size: 2rem;
        }
        .equipment-name {
            font-size: 0.8rem;
            font-weight: 600;
            color: #2c3e50;
        }
        .safety-list {
            font-size: 0.9rem;
            color: #2c3e50;
            line-height: 1.8;
        }
        .safety-list li {
            margin-bottom: 8px;
            list-style: none;
            padding-left: 24px;
            position: relative;
        }
        .safety-list li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #4ed6cb;
            font-weight: 700;
        }
        .anatomical-stretch-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 12px;
        }
        .stretch-item {
            background: linear-gradient(135deg, #e8f8f6 0%, #f0fffe 100%);
            padding: 12px;
            border-radius: 10px;
            border: 1px solid rgba(78, 214, 203, 0.2);
            text-align: center;
            font-size: 0.85rem;
            color: #4ed6cb;
            font-weight: 500;
        }
        .stretch-item .icon {
            font-size: 1.8rem;
            margin-bottom: 6px;
        }
        .save-movement-btn {
            width: 100%;
            margin-top: 24px;
            padding: 14px 0;
            background: linear-gradient(135deg, #4ed6cb 0%, #45b8a8 100%);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(78, 214, 203, 0.3);
            font-family: 'Inter', sans-serif;
        }
        .save-movement-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 214, 203, 0.4);
        }
        .video-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .video-modal.active {
            display: flex;
        }
        .video-modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 900px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .video-modal-header {
            background: linear-gradient(135deg, #4ed6cb 0%, #45b8a8 100%);
            color: #fff;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .close-modal {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .close-modal:hover {
            transform: scale(1.2);
        }
        .video-modal-body {
            padding: 30px;
        }
        .video-modal-body iframe {
            width: 100%;
            height: 500px;
            border: none;
            border-radius: 12px;
        }
        .add-movement-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .add-movement-modal.active {
            display: flex;
        }
        .movement-modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .movement-modal-header {
            background: linear-gradient(135deg, #4ed6cb 0%, #45b8a8 100%);
            color: #fff;
            padding: 24px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 1.2rem;
        }
        .movement-modal-body {
            padding: 32px;
            max-height: 70vh;
            overflow-y: auto;
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: #2c3e50;
            font-size: 0.95rem;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e0e0e0;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4ed6cb;
            box-shadow: 0 0 0 3px rgba(78, 214, 203, 0.1);
        }
        .form-group textarea {
            resize: none;
            min-height: 100px;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .modal-footer {
            padding: 0 32px 32px 32px;
            display: flex;
            gap: 12px;
        }
        .modal-footer button {
            flex: 1;
            padding: 14px 24px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }
        .modal-footer .btn-primary {
            background: linear-gradient(135deg, #4ed6cb 0%, #45b8a8 100%);
            color: #fff;
        }
        .modal-footer .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 214, 203, 0.4);
        }
        .modal-footer .btn-secondary {
            background: #e8ecf1;
            color: #2c3e50;
        }
        .modal-footer .btn-secondary:hover {
            background: #d9dfe8;
        }
        .difficulty-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .difficulty-badge.easy {
            background: rgba(46, 204, 113, 0.2);
            color: #2ecc71;
        }
        .difficulty-badge.medium {
            background: rgba(241, 196, 15, 0.2);
            color: #f1c40f;
        }
        .difficulty-badge.hard {
            background: rgba(231, 76, 60, 0.2);
            color: #e74c3c;
        }
        .frequency-indicator {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: #7f8c8d;
        }
        .frequency-indicator .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #4ed6cb;
        }
        .stats-row {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 16px;
            margin-top: 16px;
        }
        .stat-card {
            background: linear-gradient(135deg, #e8f8f6 0%, #f0fffe 100%);
            padding: 16px;
            border-radius: 12px;
            border: 1px solid rgba(78, 214, 203, 0.2);
            text-align: center;
        }
        .stat-card .label {
            font-size: 0.75rem;
            color: #7f8c8d;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 8px;
        }
        .stat-card .value {
            font-size: 1.4rem;
            font-weight: 700;
            color: #4ed6cb;
            font-family: 'Poppins', sans-serif;
        }
        @media (max-width: 1200px) {
            .dashboard-container {
                flex-direction: column;
                align-items: center;
                gap: 32px;
                padding: 32px 40px;
            }
            .exercise-list, .exercise-details {
                width: 100%;
                max-width: 700px;
            }
            .navbar {
                padding: 16px 40px;
            }
            .navbar-left {
                gap: 24px;
            }
            .search-bar {
                width: 200px;
            }
        }
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 16px;
                padding: 16px 20px;
            }
            .navbar-left {
                width: 100%;
                gap: 16px;
            }
            .search-bar {
                width: 100%;
            }
            .navbar-links {
                gap: 20px;
            }
            .dashboard-container {
                padding: 24px 20px;
            }
            .logo {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    <!-- Dashboard Tab -->
    <div class="tab-container active" id="dashboardTab">
        <div class="navbar">
            <div class="navbar-left">
                <div class="logo">
                    <span class="logo-vital">VITAL</span><span class="logo-pulse">PULSE</span>
                </div>
                <input type="text" class="search-bar" placeholder="Search exercises...">
            </div>
            <div class="navbar-links">
                <a href="#" class="active" onclick="switchTab('dashboard'); return false;">Dashboard</a>
                <a href="#" onclick="switchTab('library'); return false;">Library</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
                <div class="user-icon">👤</div>
            </div>
        </div>

        <div class="welcome-banner">
            Welcome back {{ Auth::user()->name ?? 'User' }}!
        </div>

        <div class="dashboard-container">
            <!-- Health Baseline Section -->
            <div class="dashboard-grid">
                <div class="card">
                    <div class="card-title">My health baseline</div>
                    <div class="form-group">
                        <label class="form-label">Height</label>
                        <select class="form-select">
                            <option>5'11" (180cm)</option>
                            <option>5'10" (178cm)</option>
                            <option>6'0" (183cm)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Weight</label>
                        <select class="form-select">
                            <option>170 lbs(77kg)</option>
                            <option>165 lbs(75kg)</option>
                            <option>175 lbs(79kg)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Activity level</label>
                        <select class="form-select">
                            <option>Moderately Active</option>
                            <option>Lightly Active</option>
                            <option>Very Active</option>
                            <option>Sedentary</option>
                        </select>
                    </div>
                </div>

                <!-- Weight Track Trend -->
                <div class="card">
                    <div class="card-title">Weight track trend</div>
                    <div class="chart-container">
                        <canvas id="weightChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Featured Exercises -->
            <div class="card dashboard-grid-large">
                <div class="card-title">Featured Exercises</div>
                <div class="exercise-grid">
                    <div class="exercise-card">
                        <img src="https://images.pexels.com/photos/2261482/pexels-photo-2261482.jpeg?auto=compress&w=200&h=180" alt="Squat">
                        <h4>Squat</h4>
                    </div>
                    <div class="exercise-card">
                        <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&w=200&h=180" alt="Bench Press">
                        <h4>Bench Press</h4>
                    </div>
                    <div class="exercise-card">
                        <img src="https://images.pexels.com/photos/416778/pexels-photo-416778.jpeg?auto=compress&w=200&h=180" alt="Deadlift">
                        <h4>Deadlift</h4>
                    </div>
                </div>
            </div>

            <!-- Recent Activity & Safety Reminders -->
            <div class="dashboard-grid">
                <div class="card">
                    <div class="card-title">Recent Activity</div>
                    <div class="activity-item">
                        <div class="activity-stat">1</div>
                        <div class="activity-text">Workout, 283 steps</div>
                    </div>
                    <button class="log-activity-btn">Log New Activity</button>
                </div>

                <div class="card">
                    <div class="card-title">Safety reminders</div>
                    <div class="info-box">
                        <h4>Key safety caveats</h4>
                        <p>Always consult with your primary care physician before beginning any new exercise program. Stop immediately if you experience sharp pain, dizziness, or shortness of breath.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Library Tab -->
    <div class="tab-container" id="libraryTab">
        <div class="navbar">
            <div class="navbar-left">
                <div class="logo">
                    <span class="logo-vital">VITAL</span><span class="logo-pulse">PULSE</span>
                </div>
                <input type="text" class="search-bar" placeholder="Search exercises...">
            </div>
            <div class="navbar-links">
                <a href="#" onclick="switchTab('dashboard'); return false;">Dashboard</a>
                <a href="#" class="active" onclick="switchTab('library'); return false;">Library</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Log out</button>
                </form>
                <div class="user-icon">👤</div>
            </div>
        </div>
        
        <div class="welcome-banner">
            Vast Exercise Database
        </div>
        
        <div class="dashboard-container" style="display: grid; grid-template-columns: 380px 1fr; gap: 40px; padding: 48px 60px; min-height: 90vh; align-items: start;">
            <div class="exercise-list">
                <h2>Exercises</h2>
                <div class="exercise-item" id="exercise-0">
                    <img src="https://images.pexels.com/photos/2261482/pexels-photo-2261482.jpeg?auto=compress&w=80&h=80" alt="Barbell Squat">
                    <div class="exercise-info">
                        <strong class="exercise-name">Barbell Squat</strong>
                        <div class="exercise-category" style="font-size: 0.8rem; color: #4ed6cb; margin-top: 4px;">Lower Body • Compound</div>
                        <div style="margin-top: 8px; display: flex; gap: 8px;">
                            <span class="difficulty-badge easy exercise-difficulty">Easy</span>
                            <span class="frequency-indicator"><span class="dot"></span><span class="exercise-frequency">3</span>x/week</span>
                        </div>
                    </div>
                    <div class="exercise-actions">
                        <button title="Edit" onclick="openEditMovementModal(0)">✏️</button>
                        <button class="delete" title="Delete" onclick="deleteExercise(0)">🗑️</button>
                    </div>
                </div>
                
                <div class="exercise-item" id="exercise-1">
                    <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&w=80&h=80" alt="Dumbbell Bench Press">
                    <div class="exercise-info">
                        <strong class="exercise-name">Dumbbell Bench Press</strong>
                        <div class="exercise-category" style="font-size: 0.8rem; color: #4ed6cb; margin-top: 4px;">Upper Body • Compound</div>
                        <div style="margin-top: 8px; display: flex; gap: 8px;">
                            <span class="difficulty-badge medium exercise-difficulty">Medium</span>
                            <span class="frequency-indicator"><span class="dot"></span><span class="exercise-frequency">2</span>x/week</span>
                        </div>
                    </div>
                    <div class="exercise-actions">
                        <button title="Edit" onclick="openEditMovementModal(1)">✏️</button>
                        <button class="delete" title="Delete" onclick="deleteExercise(1)">🗑️</button>
                    </div>
                </div>
                
                <div class="exercise-item" id="exercise-2">
                    <img src="https://images.pexels.com/photos/2261477/pexels-photo-2261477.jpeg?auto=compress&w=80&h=80" alt="Pull-Up">
                    <div class="exercise-info">
                        <strong class="exercise-name">Pull-Up</strong>
                        <div class="exercise-category" style="font-size: 0.8rem; color: #4ed6cb; margin-top: 4px;">Back & Arms • Compound</div>
                        <div style="margin-top: 8px; display: flex; gap: 8px;">
                            <span class="difficulty-badge hard exercise-difficulty">Hard</span>
                            <span class="frequency-indicator"><span class="dot"></span><span class="exercise-frequency">2</span>x/week</span>
                        </div>
                    </div>
                    <div class="exercise-actions">
                        <button title="Edit" onclick="openEditMovementModal(2)">✏️</button>
                        <button class="delete" title="Delete" onclick="deleteExercise(2)">🗑️</button>
                    </div>
                </div>
                
                <div class="exercise-item" id="exercise-3">
                    <img src="https://images.pexels.com/photos/416778/pexels-photo-416778.jpeg?auto=compress&w=80&h=80" alt="Deadlift">
                    <div class="exercise-info">
                        <strong class="exercise-name">Deadlift</strong>
                        <div class="exercise-category" style="font-size: 0.8rem; color: #4ed6cb; margin-top: 4px;">Full Body • Compound</div>
                        <div style="margin-top: 8px; display: flex; gap: 8px;">
                            <span class="difficulty-badge hard exercise-difficulty">Hard</span>
                            <span class="frequency-indicator"><span class="dot"></span><span class="exercise-frequency">1</span>x/week</span>
                        </div>
                    </div>
                    <div class="exercise-actions">
                        <button title="Edit" onclick="openEditMovementModal(3)">✏️</button>
                        <button class="delete" title="Delete" onclick="deleteExercise(3)">🗑️</button>
                    </div>
                </div>
                
                <button class="add-movement-btn" onclick="openAddMovementModal()">+ Add new Movement</button>
            </div>
            
            <div class="exercise-details">
                <h3>Barbell Squat</h3>
                <div class="tags">Lower Body, Quads, Glutes</div>
                
                <div class="detail-section">
                    <h4>Movement Popularity</h4>
                    <div class="chart-container">
                        <canvas id="popularityChart"></canvas>
                    </div>
                </div>
                
                <div class="detail-section">
                    <h4>Anatomical Stretches</h4>
                    <div class="anatomical-stretch-grid">
                        <div class="stretch-item">
                            <div class="icon">🦵</div>
                            <div>Quads</div>
                        </div>
                        <div class="stretch-item">
                            <div class="icon">🍑</div>
                            <div>Glutes</div>
                        </div>
                        <div class="stretch-item">
                            <div class="icon">🦾</div>
                            <div>Legs & Glutes</div>
                        </div>
                        <div class="stretch-item">
                            <div class="icon">💪</div>
                            <div>Core</div>
                        </div>
                    </div>
                </div>
                
                <div class="detail-section">
                    <h4>Required Equipment</h4>
                    <div class="equipment-list">
                        <div class="equipment-item">
                            <div class="equipment-icon">🏋️</div>
                            <div class="equipment-name">Barbell</div>
                        </div>
                        <div class="equipment-item">
                            <div class="equipment-icon">🦽</div>
                            <div class="equipment-name">Rack</div>
                        </div>
                        <div class="equipment-item">
                            <div class="equipment-icon">⚖️</div>
                            <div class="equipment-name">Plates</div>
                        </div>
                        <div class="equipment-item">
                            <div class="equipment-icon">🏃</div>
                            <div class="equipment-name">Space</div>
                        </div>
                    </div>
                </div>
                
                <div class="detail-section">
                    <h4>Safety Warnings & Cautions</h4>
                    <ul class="safety-list">
                        <li>Keep chest up and maintain neutral spine</li>
                        <li>Do not let knees cave inward</li>
                        <li>Avoid excessive leaning forward</li>
                        <li>Maintain a flat back throughout</li>
                    </ul>
                </div>
                
                <div class="detail-section">
                    <h4>Average Performance Over Quality</h4>
                    <div class="chart-small">
                        <canvas id="performanceChart"></canvas>
                    </div>
                </div>
                
                <div class="detail-section">
                    <h4>Exercise Description</h4>
                    <p style="font-size: 0.9rem; line-height: 1.6; color: #2c3e50;">
                        A fundamental compound lower body movement that engages the quadriceps, glutes, and core. Focus on maintaining depth and neutral spine alignment for optimal results and injury prevention.
                    </p>
                </div>
                
                <button class="save-movement-btn">Save Movement</button>
            </div>
        </div>
    </div>
    
    <!-- Add Movement Modal -->
    <!-- Edit Movement Modal -->
    <div class="add-movement-modal" id="editMovementModal">
        <div class="movement-modal-content">
            <div class="movement-modal-header">
                <span>Edit Movement</span>
                <button class="close-modal" onclick="closeEditMovementModal()">×</button>
            </div>
            <div class="movement-modal-body">
                <form id="editMovementForm">
                    <div class="form-group">
                        <label for="editMovementName">Movement Name *</label>
                        <input type="text" id="editMovementName" placeholder="e.g., Barbell Squat" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editMovementCategory">Category *</label>
                            <select id="editMovementCategory" required>
                                <option value="">Select Category</option>
                                <option value="Lower Body">Lower Body</option>
                                <option value="Upper Body">Upper Body</option>
                                <option value="Back & Arms">Back & Arms</option>
                                <option value="Full Body">Full Body</option>
                                <option value="Core">Core</option>
                                <option value="Cardio">Cardio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editMovementType">Type *</label>
                            <select id="editMovementType" required>
                                <option value="">Select Type</option>
                                <option value="Compound">Compound</option>
                                <option value="Isolation">Isolation</option>
                                <option value="Functional">Functional</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="editMovementDifficulty">Difficulty *</label>
                            <select id="editMovementDifficulty" required>
                                <option value="">Select Difficulty</option>
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editMovementFrequency">Weekly Frequency</label>
                            <input type="number" id="editMovementFrequency" min="1" max="7" placeholder="e.g., 3" value="2">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="editMovementDescription">Description *</label>
                        <textarea id="editMovementDescription" placeholder="Describe the movement and its benefits..." required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="editMovementEquipment">Required Equipment</label>
                        <input type="text" id="editMovementEquipment" placeholder="e.g., Barbell, Rack, Plates">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-secondary" onclick="closeEditMovementModal()">Cancel</button>
                <button class="btn-primary" onclick="submitEditMovement()">Save Changes</button>
            </div>
        </div>
    </div>
    
    <div class="add-movement-modal" id="addMovementModal">
        <div class="movement-modal-content">
            <div class="movement-modal-header">
                <span>Add New Movement</span>
                <button class="close-modal" onclick="closeAddMovementModal()">×</button>
            </div>
            <div class="movement-modal-body">
                <form id="addMovementForm">
                    <div class="form-group">
                        <label for="movementName">Movement Name *</label>
                        <input type="text" id="movementName" placeholder="e.g., Barbell Squat" required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="movementCategory">Category *</label>
                            <select id="movementCategory" required>
                                <option value="">Select Category</option>
                                <option value="Lower Body">Lower Body</option>
                                <option value="Upper Body">Upper Body</option>
                                <option value="Back & Arms">Back & Arms</option>
                                <option value="Full Body">Full Body</option>
                                <option value="Core">Core</option>
                                <option value="Cardio">Cardio</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="movementType">Type *</label>
                            <select id="movementType" required>
                                <option value="">Select Type</option>
                                <option value="Compound">Compound</option>
                                <option value="Isolation">Isolation</option>
                                <option value="Functional">Functional</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="movementDifficulty">Difficulty *</label>
                            <select id="movementDifficulty" required>
                                <option value="">Select Difficulty</option>
                                <option value="easy">Easy</option>
                                <option value="medium">Medium</option>
                                <option value="hard">Hard</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="movementFrequency">Weekly Frequency</label>
                            <input type="number" id="movementFrequency" min="1" max="7" placeholder="e.g., 3" value="2">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="movementDescription">Description *</label>
                        <textarea id="movementDescription" placeholder="Describe the movement and its benefits..." required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="movementEquipment">Required Equipment</label>
                        <input type="text" id="movementEquipment" placeholder="e.g., Barbell, Rack, Plates">
                    </div>
                    
                    <div style="background: linear-gradient(135deg, #e8f8f6 0%, #f0fffe 100%); padding: 20px; border-radius: 12px; border: 1px solid rgba(78, 214, 203, 0.2); margin-bottom: 16px;">
                        <h4 style="margin-bottom: 16px; color: #2c3e50; font-weight: 600;">Quick Stats</h4>
                        <div class="stats-row">
                            <div class="stat-card">
                                <div class="label">Sets</div>
                                <input type="number" style="width: 100%; text-align: center; padding: 8px; border: none; background: transparent; border-bottom: 2px solid #4ed6cb; color: #4ed6cb; font-weight: 700; font-size: 1.2rem;" min="1" max="10" value="4" placeholder="4">
                            </div>
                            <div class="stat-card">
                                <div class="label">Reps</div>
                                <input type="number" style="width: 100%; text-align: center; padding: 8px; border: none; background: transparent; border-bottom: 2px solid #4ed6cb; color: #4ed6cb; font-weight: 700; font-size: 1.2rem;" min="1" max="50" value="8" placeholder="8">
                            </div>
                            <div class="stat-card">
                                <div class="label">Duration (min)</div>
                                <input type="number" style="width: 100%; text-align: center; padding: 8px; border: none; background: transparent; border-bottom: 2px solid #4ed6cb; color: #4ed6cb; font-weight: 700; font-size: 1.2rem;" min="1" max="60" value="5" placeholder="5">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-secondary" onclick="closeAddMovementModal()">Cancel</button>
                <button class="btn-primary" onclick="submitAddMovement()">Add Movement</button>
            </div>
        </div>
    </div>
    
    
    <script>
        // Exercise Management System
        let exercises = [
            { id: 0, name: 'Barbell Squat', category: 'Lower Body', type: 'Compound', difficulty: 'easy', frequency: 3 },
            { id: 1, name: 'Dumbbell Bench Press', category: 'Upper Body', type: 'Compound', difficulty: 'medium', frequency: 2 },
            { id: 2, name: 'Pull-Up', category: 'Back & Arms', type: 'Compound', difficulty: 'hard', frequency: 2 },
            { id: 3, name: 'Deadlift', category: 'Full Body', type: 'Compound', difficulty: 'hard', frequency: 1 }
        ];
        
        let currentEditingId = null;
        
        function deleteExercise(id) {
            if (confirm('Are you sure you want to delete this exercise?')) {
                const item = document.getElementById('exercise-' + id);
                if (item) {
                    item.style.animation = 'slideOut 0.3s ease';
                    setTimeout(() => {
                        item.remove();
                        // Show success message
                        showNotification('✓ Exercise deleted successfully!', 'delete');
                    }, 300);
                }
            }
        }
        
        function openEditMovementModal(id) {
            currentEditingId = id;
            const exercise = exercises.find(e => e.id === id);
            if (exercise) {
                document.getElementById('editMovementName').value = exercise.name;
                document.getElementById('editMovementCategory').value = exercise.category;
                document.getElementById('editMovementType').value = exercise.type;
                document.getElementById('editMovementDifficulty').value = exercise.difficulty;
                document.getElementById('editMovementFrequency').value = exercise.frequency;
            }
            document.getElementById('editMovementModal').classList.add('active');
        }
        
        function closeEditMovementModal() {
            document.getElementById('editMovementModal').classList.remove('active');
            document.getElementById('editMovementForm').reset();
            currentEditingId = null;
        }
        
        function submitEditMovement() {
            const name = document.getElementById('editMovementName').value;
            const category = document.getElementById('editMovementCategory').value;
            const type = document.getElementById('editMovementType').value;
            const difficulty = document.getElementById('editMovementDifficulty').value;
            const frequency = document.getElementById('editMovementFrequency').value;
            
            if (!name || !category || !type || !difficulty) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Update exercise data
            const exercise = exercises.find(e => e.id === currentEditingId);
            if (exercise) {
                exercise.name = name;
                exercise.category = category;
                exercise.type = type;
                exercise.difficulty = difficulty;
                exercise.frequency = frequency;
                
                // Update UI
                const item = document.getElementById('exercise-' + currentEditingId);
                if (item) {
                    item.querySelector('.exercise-name').textContent = name;
                    item.querySelector('.exercise-category').textContent = category + ' • ' + type;
                    item.querySelector('.exercise-frequency').textContent = frequency;
                    
                    // Update difficulty badge
                    const badge = item.querySelector('.exercise-difficulty');
                    badge.textContent = difficulty.charAt(0).toUpperCase() + difficulty.slice(1);
                    badge.className = 'difficulty-badge ' + difficulty + ' exercise-difficulty';
                }
            }
            
            closeEditMovementModal();
            showNotification('✓ ' + name + ' updated successfully!', 'success');
        }
        
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const colors = {
                success: 'linear-gradient(135deg, #2ecc71 0%, #27ae60 100%)',
                delete: 'linear-gradient(135deg, #e74c3c 0%, #c0392b 100%)'
            };
            
            notification.style.cssText = `
                position: fixed;
                top: 100px;
                right: 30px;
                background: ${colors[type] || colors.success};
                color: white;
                padding: 16px 24px;
                border-radius: 12px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.2);
                font-weight: 600;
                z-index: 2000;
                animation: slideIn 0.3s ease;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
        
        // Close modals when clicking outside
        document.getElementById('editMovementModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditMovementModal();
            }
        });
        
        // Initialize weight chart
        const ctx = document.getElementById('weightChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Week 1', 'Week 3', 'Week 5', 'Week 7', 'Week 10', 'Week 13', 'Week 23'],
                    datasets: [{
                        label: 'Weight (lbs)',
                        data: [170, 170, 176, 170, 179, 170, 170],
                        borderColor: '#4ed6cb',
                        backgroundColor: 'rgba(78, 214, 203, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#4ed6cb',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            min: 165,
                            max: 180,
                            grid: {
                                color: 'rgba(0,0,0,0.05)',
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            }
                        }
                    }
                }
            });
        }

        // Initialize Movement Popularity Chart
        const popularityCtx = document.getElementById('popularityChart');
        if (popularityCtx) {
            new Chart(popularityCtx, {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Popularity',
                        data: [65, 75, 71, 85, 88, 92, 95],
                        borderColor: '#4ed6cb',
                        backgroundColor: 'rgba(78, 214, 203, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointBackgroundColor: '#4ed6cb',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                            },
                            ticks: {
                                font: {
                                    size: 12
                                },
                                color: '#7f8c8d'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 12
                                },
                                color: '#7f8c8d'
                            }
                        }
                    }
                }
            });
        }
        
        // Initialize Performance Chart
        const performanceCtx = document.getElementById('performanceChart');
        if (performanceCtx) {
            new Chart(performanceCtx, {
                type: 'bar',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        label: 'Performance Score',
                        data: [72, 78, 85, 92],
                        backgroundColor: [
                            'rgba(78, 214, 203, 0.8)',
                            'rgba(78, 214, 203, 0.85)',
                            'rgba(78, 214, 203, 0.9)',
                            'rgba(78, 214, 203, 0.95)'
                        ],
                        borderColor: '#4ed6cb',
                        borderWidth: 1,
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)',
                            },
                            ticks: {
                                font: {
                                    size: 12
                                },
                                color: '#7f8c8d'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 12
                                },
                                color: '#7f8c8d'
                            }
                        }
                    }
                }
            });
        }

        function switchTab(tabName) {
            // Hide all tabs
            document.getElementById('dashboardTab').classList.remove('active');
            document.getElementById('libraryTab').classList.remove('active');
            
            // Show selected tab
            if (tabName === 'dashboard') {
                document.getElementById('dashboardTab').classList.add('active');
            } else if (tabName === 'library') {
                document.getElementById('libraryTab').classList.add('active');
            }
        }

        function openAddMovementModal() {
            document.getElementById('addMovementModal').classList.add('active');
        }
        
        function closeAddMovementModal() {
            document.getElementById('addMovementModal').classList.remove('active');
            document.getElementById('addMovementForm').reset();
        }
        
        function submitAddMovement() {
            const form = document.getElementById('addMovementForm');
            const name = document.getElementById('movementName').value;
            const category = document.getElementById('movementCategory').value;
            const type = document.getElementById('movementType').value;
            const difficulty = document.getElementById('movementDifficulty').value;
            const frequency = document.getElementById('movementFrequency').value;
            const description = document.getElementById('movementDescription').value;
            const equipment = document.getElementById('movementEquipment').value;
            
            // Validate form
            if (!name || !category || !type || !difficulty || !description) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Create success notification
            const successMsg = document.createElement('div');
            successMsg.style.cssText = `
                position: fixed;
                top: 100px;
                right: 30px;
                background: linear-gradient(135deg, #2ecc71 0%, #27ae60 100%);
                color: white;
                padding: 16px 24px;
                border-radius: 12px;
                box-shadow: 0 6px 20px rgba(46, 204, 113, 0.3);
                font-weight: 600;
                z-index: 2000;
                animation: slideIn 0.3s ease;
            `;
            successMsg.textContent = '✓ ' + name + ' added successfully!';
            document.body.appendChild(successMsg);
            
            // Remove message after 3 seconds
            setTimeout(() => {
                successMsg.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => successMsg.remove(), 300);
            }, 3000);
            
            // Close modal
            closeAddMovementModal();
        }
        
        // Close modal when clicking outside
        document.getElementById('addMovementModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeAddMovementModal();
            }
        });
        
        // Add animation styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(400px);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(400px);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
