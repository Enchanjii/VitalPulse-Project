<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VitalPulse | Login</title>
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
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f5f8fa;
            min-height: 100vh;
        }

        .main-split {
            display: flex;
            min-height: 100vh;
            align-items: stretch;
            min-width: 1000px;
        }

        .left-panel {
            width: 45%;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 60px 80px;
            box-shadow: 2px 0 24px rgba(0, 0, 0, 0.06);
            overflow-y: auto;
        }

        .right-panel {
            width: 55%;
            background: linear-gradient(135deg, #8ee7c5 0%, #4fd1c5 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .logo {
            font-size: 48px;
            font-weight: 800;
            letter-spacing: -2px;
            margin-bottom: 1.5rem;
            text-align: left;
            background: linear-gradient(135deg, #667eea 0%, #4ed6cb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            gap: 4px;
            padding-bottom: 18px;
            border-bottom: 2px solid #f0f0f0;
        }

        .logo span {
            font-weight: 300;
        }

        .tagline {
            font-size: 1rem;
            color: #777;
            margin-bottom: 2.5rem;
            text-align: left;
            font-style: italic;
            font-weight: 400;
            opacity: 0.85;
        }

        .form-container {
            width: 100%;
            max-width: 100%;
        }

        .tabs {
            display: flex;
            background: #f1f1f1;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 0;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 14px 0;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
            background: #f1f1f1;
            color: #555;
        }

        .tab.active {
            background: linear-gradient(135deg, #4fd1c5 0%, #3eb8ac 100%);
            color: #fff;
        }

        .tab:hover {
            background: #e8e8e8;
        }

        .tab.active:hover {
            background: linear-gradient(135deg, #4fd1c5 0%, #3eb8ac 100%);
        }

        .tab-content {
            padding: 32px 0;
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4fd1c5;
            box-shadow: 0 0 0 3px rgba(79, 209, 197, 0.1);
        }

        .error-message {
            background: #fee;
            border: 1px solid #fcc;
            color: #c33;
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            display: none;
        }

        .error-message strong {
            display: block;
            margin-bottom: 6px;
        }

        .error-message div {
            margin: 4px 0;
        }

        .btn {
            width: 100%;
            padding: 14px 16px;
            background: linear-gradient(135deg, #4fd1c5 0%, #3eb8ac 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(79, 209, 197, 0.35);
        }

        .btn:active {
            transform: translateY(0);
        }

        .switch-link {
            text-align: center;
            margin-top: 18px;
            font-size: 14px;
            color: #666;
        }

        .switch-link a {
            color: #4fd1c5;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s;
        }

        .switch-link a:hover {
            color: #3eb8ac;
            text-decoration: underline;
        }

        .switch-link button {
            color: #4fd1c5;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s;
        }

        .switch-link button:hover {
            color: #3eb8ac;
            text-decoration: underline;
        }

        .success-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .success-modal.active {
            display: flex;
        }

        .modal-content {
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 420px;
            text-align: center;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-icon {
            font-size: 56px;
            margin-bottom: 20px;
            color: #4fd1c5;
        }

        .modal-title {
            color: #333;
            margin: 0 0 16px 0;
            font-size: 26px;
            font-weight: 700;
            font-family: 'Poppins', sans-serif;
        }

        .modal-message {
            color: #666;
            margin: 0 0 28px 0;
            font-size: 15px;
            line-height: 1.5;
        }

        .modal-btn {
            background: linear-gradient(135deg, #4fd1c5 0%, #3eb8ac 100%);
            color: #fff;
            border: none;
            padding: 12px 32px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .modal-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 209, 197, 0.3);
        }

        @media (max-width: 1400px) {
            .left-panel {
                width: 45%;
                padding: 50px 60px;
            }

            .right-panel {
                width: 55%;
            }
        }

        @media (max-width: 1200px) {
            .left-panel {
                width: 50%;
                padding: 40px 50px;
            }

            .right-panel {
                width: 50%;
            }
        }
    </style>
</head>

<body>
    <!-- Success Modal -->
    <div id="successModal" class="success-modal">
        <div class="modal-content">
            <div class="modal-icon">✓</div>
            <h2 class="modal-title">Success!</h2>
            <p id="successMessage" class="modal-message"></p>
            <button onclick="closeSuccessModal()" class="modal-btn">Continue</button>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('successMessage').textContent = @json(session('success'));
                showSuccessModal();
            });
        </script>
    @endif

    <div class="main-split">
        <!-- Left Panel -->
        <div class="left-panel">
            <div class="logo">VITAL<span>PULSE</span></div>
            <div class="tagline">"Find your baseline. Elevate your pulse."</div>

            <div class="form-container">
                <!-- Tabs -->
                <div class="tabs">
                    <div class="tab active" onclick="switchTab('login', this)">Login</div>
                    <div class="tab" onclick="switchTab('register', this)">Register</div>
                </div>

                <!-- Login Tab -->
                <div id="login-tab" class="tab-content active">
                    <div id="loginError" class="error-message"></div>

                    <form method="POST" action="{{ url('/login') }}" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <label for="loginEmail">Email</label>
                            <input type="email" id="loginEmail" name="email" placeholder="your@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" name="password" placeholder="••••••••" required>
                        </div>

                        <button type="submit" class="btn">Login</button>
                    </form>

                    <div class="switch-link">
                        Don't have an account? <button type="button" onclick="switchTab('register')">Register
                            here</button>
                    </div>
                </div>

                <!-- Register Tab -->
                <div id="register-tab" class="tab-content">
                    <div id="registerError" class="error-message"></div>

                    <form method="POST" action="{{ url('/register') }}" id="registerForm">
                        @csrf
                        <div class="form-group">
                            <label for="registerName">Full Name</label>
                            <input type="text" id="registerName" name="name" placeholder="John Doe" required>
                        </div>

                        <div class="form-group">
                            <label for="registerEmail">Email</label>
                            <input type="email" id="registerEmail" name="email" placeholder="your@email.com" required>
                        </div>

                        <div class="form-group">
                            <label for="registerPassword">Password</label>
                            <input type="password" id="registerPassword" name="password" placeholder="••••••••"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="registerConfirm">Confirm Password</label>
                            <input type="password" id="registerConfirm" name="password_confirmation"
                                placeholder="••••••••" required>
                        </div>

                        <button type="submit" class="btn">Create Account</button>
                    </form>

                    <div class="switch-link">
                        <button type="button" onclick="switchTab('login')">Back to Login</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <div style="text-align: center; color: white; opacity: 0.9;">
                <h1 style="font-size: 32px; margin-bottom: 20px; font-family: 'Poppins', sans-serif; font-weight: 700;">
                    Welcome to VitalPulse</h1>
                <p style="font-size: 16px; max-width: 300px; margin: 0; line-height: 1.6;">Track your health, elevate
                    your fitness, achieve your goals</p>
            </div>
        </div>
    </div>

    <script>
        // Switch between login and register tabs
        function switchTab(tabName, tabElement = null) {
            // Hide all tab contents
            document.getElementById('login-tab').classList.remove('active');
            document.getElementById('register-tab').classList.remove('active');

            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));

            // Show selected tab
            document.getElementById(tabName + '-tab').classList.add('active');

            // Add active class to clicked tab
            if (tabElement) {
                tabElement.classList.add('active');
            } else {
                document.querySelectorAll('.tab').forEach((tab, index) => {
                    if ((tabName === 'login' && index === 0) || (tabName === 'register' && index === 1)) {
                        tab.classList.add('active');
                    }
                });
            }

            // Clear error messages
            document.getElementById('loginError').style.display = 'none';
            document.getElementById('registerError').style.display = 'none';
        }

        // Show success modal
        function showSuccessModal() {
            document.getElementById('successModal').classList.add('active');
        }

        // Close success modal
        function closeSuccessModal() {
            document.getElementById('successModal').classList.remove('active');
            switchTab('login');
        }

        // Handle registration form submission
        document.getElementById('registerForm').addEventListener('submit', function (e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);
            const errorDiv = document.getElementById('registerError');

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'Accept': 'application/json'
                }
            })
                .then(response => {
                    if (response.ok) {
                        return response.json().then(data => {
                            // Clear form
                            document.getElementById('registerForm').reset();
                            errorDiv.style.display = 'none';

                            // Redirect to user dashboard
                            if (data.redirect) {
                                window.location.href = data.redirect;
                            }
                        });
                    } else if (response.status === 422) {
                        // Validation errors
                        return response.json().then(data => {
                            let errorMessages = '<strong>Registration Failed:</strong>';
                            if (data.errors) {
                                for (let field in data.errors) {
                                    errorMessages += '<div>' + data.errors[field][0] + '</div>';
                                }
                            }
                            errorDiv.innerHTML = errorMessages;
                            errorDiv.style.display = 'block';
                            throw new Error('Validation error');
                        });
                    } else {
                        throw new Error('Registration failed');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    if (!errorDiv.innerHTML) {
                        errorDiv.innerHTML = '<strong>Error:</strong> Registration failed. Please try again.';
                    }
                    errorDiv.style.display = 'block';
                });
        });

        // Handle login errors if any
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                const errors = @json($errors->all());
                const errorDiv = document.getElementById('loginError');

                // Create safe DOM structure
                errorDiv.innerHTML = ''; // Clear previous content
                const strongElement = document.createElement('strong');
                strongElement.textContent = 'Login Failed:';
                errorDiv.appendChild(strongElement);

                errors.forEach(function (error) {
                    const errorItem = document.createElement('div');
                    errorItem.textContent = error;
                    errorDiv.appendChild(errorItem);
                });

                errorDiv.style.display = 'block';
            });
        @endif
    </script>
</body>

</html>