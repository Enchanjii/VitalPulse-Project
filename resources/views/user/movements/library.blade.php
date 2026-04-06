<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalPulse | Movement Library</title>
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
            letter-spacing: -2px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
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

        .logout-btn {
            background: #ff6b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2rem;
            color: #2c3e50;
        }

        .movements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 24px;
        }

        .movement-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .movement-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        .movement-header {
            background: linear-gradient(135deg, #4ed6cb 0%, #3eb8ac 100%);
            color: white;
            padding: 20px;
        }

        .movement-header h3 {
            font-size: 1.3rem;
            margin-bottom: 8px;
            font-family: 'Poppins', sans-serif;
        }

        .movement-category {
            font-size: 0.85rem;
            opacity: 0.9;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .movement-content {
            padding: 20px;
        }

        .movement-description {
            color: #7f8c8d;
            font-size: 0.95rem;
            margin-bottom: 16px;
            line-height: 1.6;
        }

        .movement-footer {
            border-top: 1px solid #e0e0e0;
            padding-top: 16px;
            margin-top: 16px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
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
            box-shadow: 0 6px 12px rgba(78, 214, 203, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #7f8c8d;
        }

        .empty-state p {
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-left">
            <div class="logo">VitalPulse</div>
            <input type="text" class="search-bar" placeholder="Search movements...">
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
        <!-- Header -->
        <div class="header">
            <h1>Movement Library</h1>
            <!-- Note: "Add New Movement" button intentionally removed for regular users -->
        </div>

        <!-- Movements Grid -->
        @if($movements->count() > 0)
            <div class="movements-grid">
                @foreach($movements as $movement)
                    <div class="movement-card">
                        <div class="movement-header">
                            <h3>{{ $movement->name }}</h3>
                            <div class="movement-category">{{ $movement->category ?? 'General' }}</div>
                        </div>
                        <div class="movement-content">
                            <p class="movement-description">
                                {{ $movement->description ? substr($movement->description, 0, 100) . '...' : 'No description available' }}
                            </p>
                            <div class="movement-footer">
                                <a href="/movements/{{ $movement->id }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <p>No movements available yet. Check back soon!</p>
            </div>
        @endif
    </div>
</body>

</html>