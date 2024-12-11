<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>{{ $page }} | Elecventory</title>

    <!-- Favicon -->
    <link href="{{ asset('assets/img/Logo.jpg') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #133e87, #cbdceb);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Heebo", sans-serif;
        }

        .login-card {
            background: #f3f3e0;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }

        .login-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #133e87;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #608bc1;
        }

        .btn-login {
            background-color: #608bc1;
            color: #fff;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn-login:hover {
            background-color: #133e87;
        }

        .forgot-password-link {
            font-size: 0.9rem;
            color: #608bc1;
            text-decoration: none;
        }

        .forgot-password-link:hover {
            color: #133e87;
        }

        .signup-link {
            font-size: 0.9rem;
            color: #133e87;
            font-weight: bold;
        }

        .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="text-center mb-3">
            <a href="{{ url('auth/login') }}">
                <h3 class="text-primary"><img class="rounded-circle" src="{{ asset('assets/img/Logo.jpg') }}"
                        alt="Elecventory" style="width: 100px; height: 100px;margin-right: 10px;margin-top:-5px;">
                </h3>
            </a>
        </div>
        <hr>
        <h3 class="text-center">Login Form</h3>
        <hr>
        <form action="{{ url('auth/register') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="text" class="form-label">Nama Anda</label>
                <input type="text" class="form-control" id="username" placeholder="Enter your username"
                    name="username" />
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter your email"
                    name="email" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter your password"
                    name="password" />
            </div>
            <button type="submit" class="btn btn-login w-100 mb-3">Login</button>
            <div class="text-center">
                <span>Sudah ada akun? <a href="{{ url('/auth/login') }}" class="signup-link">Masuk Disini</a></span>
            </div>
        </form>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
