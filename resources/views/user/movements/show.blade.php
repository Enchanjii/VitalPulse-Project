<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movement Details | VitalPulse</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
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
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            padding: 20px 60px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
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
            color: #2c3e50;
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
            transition: color 0.3s;
        }

        .navbar-links a.active {
            color: #2c3e50;
            font-weight: 600;
        }

        .logout-btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 30px;
            color: #4ed6cb;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .detail-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .detail-header {
            background: linear-gradient(135deg, #4ed6cb 0%, #3eb8ac 100%);
            color: white;
            padding: 40px;
        }

        .detail-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .detail-category {
            font-size: 1rem;
            opacity: 0.9;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .detail-content {
            padding: 40px;
        }

        .section {
            margin-bottom: 40px;
        }

        .section h2 {
            font-size: 1.5rem;
            color: #2c3e50;
            margin-bottom: 16px;
            font-family: 'Poppins', sans-serif;
        }

        .section p {
            color: #7f8c8d;
            line-height: 1.8;
            font-size: 1rem;
        }

        .instructions {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #4ed6cb;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4ed6cb 0%, #3eb8ac 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(78, 214, 203, 0.3);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-left">
            <div class="logo">VitalPulse</div>
        </div>
        <div class="navbar-links">
            <a href="/user/dashboard">Dashboard</a>
            <a href="/movements" class="active">Movement Library</a>
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <a href="/movements" class="back-link">← Back to Library</a>

        <div class="detail-card">
            <!-- Header -->
            <div class="detail-header">
                <h1>{{ $movement->name }}</h1>
                <div class="detail-category">{{ $movement->category ?? 'General' }}</div>
            </div>

            <!-- Content -->
            <div class="detail-content">
                <!-- Description -->
                @if($movement->description)
                    <div class="section">
                        <h2>Description</h2>
                        <p>{{ $movement->description }}</p>
                    </div>
                @endif

                <!-- Instructions -->
                @if($movement->instructions)
                    <div class="section">
                        <h2>Instructions</h2>
                        <div class="instructions">
                            <p>{{ $movement->instructions }}</p>
                        </div>
                    </div>
                @endif

                <!-- Back Button -->
                <a href="/movements" class="btn btn-primary">← Back to Library</a>
            </div>
        </div>
    </div>
</body>

</html>