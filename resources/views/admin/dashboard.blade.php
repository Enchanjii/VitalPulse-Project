<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | VitalPulse</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px;
            border-radius: 12px;
            margin-bottom: 40px;
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.2);
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .stat-card h3 {
            color: #7f8c8d;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
        }

        .action-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .action-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .action-card h2 {
            font-size: 1.5rem;
            margin-bottom: 16px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }

        .action-card p {
            color: #7f8c8d;
            margin-bottom: 20px;
            font-size: 0.95rem;
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
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
            <a href="/admin/dashboard" class="active">Dashboard</a>
            <a href="/admin/movements">Movements</a>
            <a href="/admin/users">Users</a>
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
            <h1>Welcome back, Admin! 👋</h1>
            <p>You're logged in as an administrator. Manage your movements and users below.</p>
        </div>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Users</h3>
                <div class="number">{{ $totalUsers }}</div>
            </div>
            <div class="stat-card">
                <h3>Regular Users</h3>
                <div class="number">{{ $userCount }}</div>
            </div>
            <div class="stat-card">
                <h3>Admins</h3>
                <div class="number">{{ $adminCount }}</div>
            </div>
            <div class="stat-card">
                <h3>Total Movements</h3>
                <div class="number">{{ $totalMovements }}</div>
            </div>
        </div>

        <!-- Actions Grid -->
        <div class="actions-grid">
            <div class="action-card">
                <h2>📚 Manage Movements</h2>
                <p>Create, edit, update, and delete exercise movements from your library.</p>
                <a href="/admin/movements" class="btn btn-primary">Go to Movements</a>
            </div>
            <div class="action-card">
                <h2>👥 Manage Users</h2>
                <p>View, edit, and manage user accounts and their roles.</p>
                <a href="/admin/users" class="btn btn-primary">Go to Users</a>
            </div>
        </div>
    </div>
</body>

</html>