<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Laikipia County ECDE</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet">
    
    <style>
        :root {
            /* Color Palette Variables */
            --primary: #006a2c;
            --primary-dim: #004c1d;
            --on-primary: #ffffff;
            --surface: #f5f7f9;
            --surface-card: #ffffff;
            --surface-container: #eef1f3;
            --text-main: #2c2f31;
            --text-variant: #595c5e;
            --outline: #abadaf;
            
            /* UI Tokens */
            --border-radius: 12px;
            --transition: all 0.2s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--surface);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
        }

        /* Subtle Background Pattern */
        .bg-pattern {
            position: fixed;
            inset: 0;
            z-index: -1;
            opacity: 0.05;
            background-image: radial-gradient(var(--text-main) 0.5px, transparent 0.5px);
            background-size: 24px 24px;
        }

        /* Main Container */
        .login-container {
            width: 100%;
            max-width: 400px;
            z-index: 10;
        }

        .login-card {
            background: var(--surface-card);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(44, 47, 49, 0.08);
        }

        /* Gradient Header Bar */
        .card-header {
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
            padding: 16px;
            text-align: center;
        }

        .header-title {
            color: var(--on-primary);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
        }

        /* Core Content */
        .card-content {
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo-wrapper {
            margin-bottom: 40px;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background: var(--surface-container);
            border: 1px solid rgba(171, 173, 175, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-circle .material-symbols-outlined {
            font-size: 48px;
            color: var(--primary);
        }

        /* Form Layout */
        .login-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-variant);
            margin-bottom: 8px;
            margin-left: 4px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper .icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: var(--text-variant);
        }

        .input-wrapper input {
            width: 100%;
            padding: 14px 16px 14px 48px;
            background: var(--surface-container);
            border: 2px solid transparent;
            border-radius: 8px;
            font-size: 14px;
            transition: var(--transition);
            outline: none;
            color: var(--text-main);
        }

        .input-wrapper input:focus {
            background: var(--surface-card);
            border-bottom-color: var(--primary);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        /* Options & Links */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 24px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            color: var(--text-variant);
        }

        .remember-me input {
            accent-color: var(--primary);
            width: 16px;
            height: 16px;
        }

        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Button Interaction */
        .btn-submit {
            width: 100%;
            background: var(--primary);
            color: white;
            border: none;
            padding: 16px;
            border-radius: var(--border-radius);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(0, 106, 44, 0.15);
        }

        .btn-submit:hover {
            background: var(--primary-dim);
            transform: translateY(-1px);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        /* Updated Footer Copyright */
        .card-footer {
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid var(--surface-container);
            width: 100%;
            text-align: center;
        }

        .card-footer p {
            font-size: 11px;
            color: var(--text-variant);
            font-weight: 500;
            opacity: 0.8;
        }
    </style>
</head>
<body>

    <div class="bg-pattern"></div>

    <main class="login-container">
        <div class="login-card">
            <header class="card-header">
                <h1 class="header-title">Welcome Back Login to Proceed</h1>
            </header>

            <div class="card-content">
                 @if (session('error'))
                        <div class="alert alert-danger  p-2 text-danger ">
                            {{ session('error') }}
                        </div>
                    @endif
                <div class="logo-wrapper">
                    <div class="logo-circle">
                          <img src="assets/images/laikipia.png" style="width:100px; height: 100px;">
                    </div>
                </div>

                <form class="login-form" action="{{ route('login.submit') }}" method="POST" id="loginForm">
                    @csrf

                   
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-wrapper">
                            <span class="material-symbols-outlined icon">mail</span>
                            <input type="email" id="email" name="email" placeholder="name@institution.org" required value="{{ old('email') }}">
                        </div>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror


                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-wrapper">
                            <span class="material-symbols-outlined icon">lock</span>
                            <input type="password" id="password" name="password" placeholder="••••••••" required>
                        </div>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" id="remember">
                            <span>Remember Me</span>
                        </label>
                    
                    </div> --}}

                    <button type="submit" class="btn-submit" id="submitBtn" >Login</button>
                </form>

                <footer class="card-footer">
                    <p>&copy;  {{ date('Y') }}
                         Laikipia County ECDE &mdash; All rights reserved</p>
                </footer>
            </div>
        </div>
    </main>

</body>
</html>

<script>
     document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerHTML = `
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Signing in...
        `;
        });
</script>