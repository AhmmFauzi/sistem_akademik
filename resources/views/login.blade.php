<!DOCTYPE html>
<html>
<head>
    <title>Login - Siakad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #5B8DEF, #8B5CF6);
            overflow: hidden;
            position: relative;
        }

        .bg-shape {
            position: absolute;
            width: 600px;
            height: 600px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -100px;
            left: -100px;
        }

        .bg-shape2 {
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            bottom: -100px;
            right: -100px;
        }

        .login-box {
            position: relative;
            background: white;
            border-radius: 20px;
            padding: 40px;
            width: 350px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            z-index: 2;
        }

        .login-title {
            font-weight: bold;
        }

        .subtitle {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .btn-login {
            background: linear-gradient(135deg, #5B8DEF, #8B5CF6);
            border: none;
        }

        .btn-login:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="bg-shape"></div>
<div class="bg-shape2"></div>

<div class="login-box text-center">

    <h3 class="login-title">Login Admin</h3>
    <div class="subtitle">Universitas Teknologi Bandung</div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3 text-start">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3 text-start">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-login w-100 text-white">
            Login
        </button>
    </form>

</div>

</body>
</html>