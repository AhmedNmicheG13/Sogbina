<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body.reset-password-page {
            background: linear-gradient(to right, #4caf50, #81c784) !important;
            font-family: 'Outfit', sans-serif !important;
            height: 100vh !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 0 20px !important;
        }

        .card.reset-password-card {
            border: none !important;
            border-radius: 15px !important;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1) !important;
            background: #ffffff !important;
            width: 100% !important;
            max-width: 600px !important;
        }

        .card-header.reset-password-header {
            background-color: #343a40 !important;
            color: white !important;
            border-top-left-radius: 15px !important;
            border-top-right-radius: 15px !important;
            text-align: center !important;
            font-size: 1.75rem !important;
            font-weight: bold !important;
            padding: 20px !important;
        }

        .form-control.reset-password-input {
            border-radius: 30px !important;
        }

        .btn-primary.reset-password-btn {
            border-radius: 30px !important;
            background-color: #4caf50 !important;
            border: none !important;
            padding: 10px 20px !important;
            font-size: 1.2rem !important;
        }

        .alert-danger.reset-password-alert {
            border-radius: 30px !important;
            text-align: center !important;
        }

        @media (max-width: 768px) {
            body.reset-password-page {
                flex-direction: column !important;
                justify-content: center !important;
                align-items: center !important;
            }

            .card.reset-password-card {
                max-width: 100% !important;
                margin: 0 10px !important;
            }

            .form-group.reset-password-group label {
                text-align: center !important;
            }

            .form-group.reset-password-group div {
                text-align: center !important;
            }

            .btn-primary.reset-password-btn {
                width: 100% !important;
                font-size: 1rem !important;
            }
        }
    </style>
</head>
<body class="reset-password-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card reset-password-card border-success">
                    <div class="card-header reset-password-header">
                        <i class="fas fa-lock"></i>
                        {{ __('Reset Password') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row mb-3 reset-password-group">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control reset-password-input @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3 reset-password-group">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control reset-password-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3 reset-password-group">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control reset-password-input" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary reset-password-btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
