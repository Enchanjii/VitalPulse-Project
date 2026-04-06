<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | VitalPulse</title>
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
            min-height: 100vh;
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

        .logout-btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.3s;
        }

        .logout-btn:hover {
            background: #ee5a5a;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .welcome-section {
            background: linear-gradient(135deg, #4ed6cb 0%, #3eb8ac 100%);
            color: white;
            padding: 40px;
            border-radius: 12px;
            margin-bottom: 40px;
            box-shadow: 0 8px 24px rgba(78, 214, 203, 0.2);
        }

        .welcome-section h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .welcome-section p {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .feature-card h2 {
            font-size: 1.5rem;
            margin-bottom: 16px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }

        .feature-card p {
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
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
            <div class="logo">
                <span class="logo-vital">Vital</span><span class="logo-pulse">Pulse</span>
            </div>
        </div>
        <div class="navbar-links">
            <a href="/user/dashboard" class="active">Dashboard</a>
            <a href="/movements">Movement Library</a>
            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Welcome, {{ auth()->user()->name }}! 👋</h1>
            <p>You're logged in as a participant. Explore our movement library to enhance your fitness journey.</p>
        </div>

        <!-- Features Grid -->
        <div class="features-grid">
            <div class="feature-card">
                <h2>📚 Browse Movements</h2>
                <p>Explore our comprehensive library of exercises and movements. Learn proper techniques and
                    instructions for each exercise.</p>
                <a href="/movements" class="btn btn-primary">View Movement Library</a>
            </div>
            <div class="feature-card">
                <h2>💪 Track Progress</h2>
                <p>Monitor your workout progress and keep track of exercises you've completed. Stay motivated on your
                    fitness journey.</p>
                <a href="/movements" class="btn btn-primary">See Movements</a>
            </div>
            <div class="feature-card">
                <h2>📖 Learn Details</h2>
                <p>Get detailed instructions and tips for each movement. Improve your form and technique with expert
                    guidance.</p>
                <a href="/movements" class="btn btn-primary">Explore Details</a>
            </div>
        </div>
    </div>
</body>

</html>