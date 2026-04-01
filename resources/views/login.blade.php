<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalPulse - Login/Register</title>
    <link rel="stylesheet" href="/login.css">
    <style>
        .tab-container {
            width: 400px;
            margin: 40px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .tab-header {
            display: flex;
            background: #e0e0e0;
        }
        .tab-header div {
            flex: 1;
            text-align: center;
            padding: 16px 0;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
        }
        .tab-header .active {
            background: #4fd1c5;
            color: #fff;
        }
        .tab-content {
            padding: 32px 24px 24px 24px;
        }
        .tab-content form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .tab-content input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .tab-content button {
            background: #4fd1c5;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.2s;
        }
        .tab-content button:hover {
            background: #38b2ac;
        }
    </style>
</head>
<body style="background: #222; min-height: 100vh;">
    <div class="tab-container">
        <div class="tab-header">
            <div id="loginTab" class="active" onclick="showTab('login')">Login</div>
            <div id="registerTab" onclick="showTab('register')">Register</div>
        </div>
        <div class="tab-content" id="loginContent">
            <form>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="tab-content" id="registerContent" style="display:none;">
            <form>
                <input type="text" placeholder="Name" required>
                <input type="email" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <input type="password" placeholder="Confirm Password" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
    <script>
        function showTab(tab) {
            document.getElementById('loginTab').classList.remove('active');
            document.getElementById('registerTab').classList.remove('active');
            document.getElementById('loginContent').style.display = 'none';
            document.getElementById('registerContent').style.display = 'none';
            if(tab === 'login') {
                document.getElementById('loginTab').classList.add('active');
                document.getElementById('loginContent').style.display = 'block';
            } else {
                document.getElementById('registerTab').classList.add('active');
                document.getElementById('registerContent').style.display = 'block';
            }
        }
    </script>
</body>
</html>
