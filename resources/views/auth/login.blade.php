<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4caf50, #81c784);
            font-family: 'Outfit', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            background: #ffffff;
            width: 100%;
            max-width: 600px; /* عرض البطاقة المناسب */
        }

        .card-header {
            background-color: #343a40;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            font-size: 1.75rem;
            font-weight: bold;
            padding: 20px;
            position: relative;
        }

        .card-header i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
        }

        .form-control {
            border-radius: 30px;
        }

        .input-group-text {
            border-radius: 30px 0 0 30px;
            background-color: #343a40;
            color: white;
        }

        .btn-success {
            border-radius: 30px;
            background-color: #4caf50;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
        }

        .btn-link {
            color: #4caf50;
        }

        .alert-danger {
            border-radius: 30px;
            text-align: center;
        }

        .footer-text {
            color: #343a40;
            text-align: center;
            margin-top: 15px;
        }

        .login-container {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
        }

        .login-card {
            flex: 1;
            display: flex;
            justify-content: flex-start;
            padding: 20px; /* هامش حول البطاقة على الشاشات الكبيرة */
        }

        .login-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100%;
            max-width: 800px; /* تحديد الحد الأقصى لحجم الصورة */
        }

        .login-image img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 0;
            }

            .login-container {
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .login-card {
                padding: 20px; /* تأكيد وجود هامش حول البطاقة على الشاشات الصغيرة */
            }

            .login-image {
                display: none;
            }

            .card {
                max-width: 100%;
                margin: 20px 0; /* توسيع البطاقة لتشمل عرض الشاشة */
                padding: 20px; /* إضافة هامش داخلي للبطاقة */
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="card border-success">
                <div class="card-header">
                    <i class="fas fa-sign-in-alt"></i>
                    Connexion
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row mb-3">
                            <div class="col-md-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Adresse e-mail">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success btn-block">
                                    Connexion
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Mot de passe oublié ?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="footer-text">
                        <p>En vous inscrivant, vous acceptez nos <a href="#">Conditions d'utilisation</a> et notre <a href="#">Politique de confidentialité</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-image">
            <img src="https://webfx.fr/sogbina/HEADER.png" alt="Connexion">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Page loaded and scripts running.');
        });
    </script>
</body>
</html>
