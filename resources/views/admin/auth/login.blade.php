<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-primary-bg: #f2fbe4;
            --color-primary-accent: #00473d;
            --color-text-white: #ffffff;
            --font-family-sans: 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: var(--font-family-sans);
            background: linear-gradient(135deg, var(--color-primary-bg) 0%, #e8f5d8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .login-container {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-logo {
            font-size: 2rem;
            font-weight: 800;
            color: var(--color-primary-accent);
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: #6b7280;
            font-size: 0.875rem;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
            font-size: 0.875rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--color-primary-accent);
            box-shadow: 0 0 0 3px rgba(0, 71, 61, 0.1);
        }
        
        .form-input.error {
            border-color: #ef4444;
        }
        
        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }
        
        .remember-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .remember-group input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            accent-color: var(--color-primary-accent);
        }
        
        .remember-group label {
            font-size: 0.875rem;
            color: #6b7280;
        }
        
        .btn-login {
            width: 100%;
            padding: 0.875rem;
            background: var(--color-primary-accent);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.2s;
        }
        
        .btn-login:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert {
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
        }
        
        .alert-error {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">Admin Panel</div>
            <p class="login-subtitle">Melden Sie sich an, um fortzufahren</p>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">E-Mail Adresse</label>
                <input type="email" id="email" name="email" class="form-input @error('email') error @enderror" 
                       value="{{ old('email') }}" required autofocus placeholder="admin@example.com">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Passwort</label>
                <input type="password" id="password" name="password" class="form-input @error('password') error @enderror" 
                       required placeholder="••••••••">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="remember-group">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Angemeldet bleiben</label>
            </div>
            
            <button type="submit" class="btn-login">Anmelden</button>
        </form>
    </div>
</body>
</html>
