<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Mobile</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }
        .navbar {
            display: none;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color:  {{ $settings->buton_color ?? 'black' }};
            color: white;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 9999;
            text-transform: capitalize;
        }
        .navbar-logo {
            font-size: 1.5em;
        }
        .hamburger {
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .menu {
            display: none;
            flex-direction: column;
            background-color: white;
            position: fixed;
            top: 70px;
            left: 0;
            width: 100%;
            height: calc(100% - 70px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 10000;
            padding-top: 0;
            text-transform: capitalize;
        }
        .menu a, .submenu a {
            padding: 15px 20px;
            text-decoration: none;
            color: #333;
            display: block;
            text-transform: capitalize;
        }
        .menu a:hover, .submenu a:hover {
            background-color: #ddd;
        }
        .submenu {
            display: none;
            flex-direction: column;
            background-color: white;
        }
        .menu-item {
            position: relative;
        }
        .dropdown-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #343a40;
            color: #fff !important;
            padding: 15px 20px;
            margin: 10px 20px;
            border-radius: 5px;
            text-transform: capitalize;
        }
        .dropdown-btn:hover {
            background-color: #23272b;
        }
        .pub-trajet {
            background-color: #ff4500;
            color: #fff !important;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            margin: 10px 20px;
            border-radius: 5px;
            text-transform: capitalize;
        }
        .pub-trajet img {
            margin-right: 8px;
        }
        .submenu a {
            display: flex;
            align-items: center;
        }
        .submenu a img {
            margin-right: 10px;
        }
        .modal {
            z-index: 11000 !important;
        }
        .profile-pic {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .navbar {
                display: flex;
            }
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="navbar-logo">
        <img src="{{ asset('images/' . ($settings->logo ?? '')) }}" alt="">
    </div>
    <div class="hamburger" onclick="toggleMenu()">
        <img id="hamburger-icon" src="https://img.icons8.com/ios-filled/50/ffffff/menu.png"/>
    </div>
</div>

<div class="menu" id="menu">
    <a href="{{ url('/') }}" class="nav-link-custom">Accueil</a>
        <a href="{{ url('/a-propos') }}" class="nav-link-custom">À propos</a>
        <a href="{{ url('/services') }}" class="nav-link-custom">Services</a>
        <a href="{{ url('/contactez-nous') }}" class="nav-link-custom">Contactez-nous</a>
    <a href="#" class="pub-trajet" onclick="handlePublierTrajet()">
        <img src="https://img.icons8.com/ios-filled/20/ffffff/plus-math.png"/> Publier Un Trajet
    </a>
    <div class="menu-item">
        <div class="dropdown-btn" onclick="toggleSubmenu()">
            <span id="user-name">
                @auth
                    <img src="{{ asset('images/' . Auth::user()->profile_picture) }}" class="profile-pic" /> 
                    {{ Auth::user()->name }}
                @else
                    <img src="https://img.icons8.com/ios-filled/20/ffffff/user.png"/> Espace Client
                @endauth
            </span>
            <img id="dropdown-icon" src="https://img.icons8.com/ios-filled/20/ffffff/chevron-down.png"/>
        </div>
        <div class="submenu" id="submenu">
            @guest
                <a href="#" data-toggle="modal" data-target="#loginModal" id="login-link">
                    <img src="https://img.icons8.com/ios-filled/20/000000/login-rounded-right.png"/> Se Connecter
                </a>
                <a href="#" data-toggle="modal" data-target="#registerModal" id="register-link">
                    <img src="https://img.icons8.com/ios-filled/20/000000/add-user-male.png"/> S'inscrire
                </a>
            @else
                <a href="/dashboard" id="dashboard-link">
                    <img src="https://img.icons8.com/ios-filled/20/000000/dashboard.png"/> Tableau de Bord
                </a>
                <a href="#" id="logout-link" onclick="event.preventDefault(); showLogoutConfirmation();">
                    <img src="https://img.icons8.com/ios-filled/20/000000/logout-rounded.png"/> Se Déconnecter
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</div>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirmation de Déconnexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir quitter ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-success" id="confirm-logout" onclick="confirmLogout()">Oui</button>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}" id="login-form">
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
            </div>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">S'inscrire</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('register') }}" id="register-form">
                    @csrf
                    <div class="form-group row mb-3">
                        <div class="col-md-12 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse e-mail">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer Mot de passe">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success btn-block">
                                S'inscrire
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function toggleMenu() {
        document.getElementById('menu').classList.toggle('show');
        document.getElementById('hamburger-icon').classList.toggle('open');
    }

    function toggleSubmenu() {
        document.getElementById('submenu').classList.toggle('show');
        document.getElementById('dropdown-icon').classList.toggle('rotate');
    }

    function handlePublierTrajet() {
        alert("La publication d'un trajet n'est pas encore disponible.");
    }

    function showLogoutConfirmation() {
        $('#logoutModal').modal('show');
    }

    function confirmLogout() {
        document.getElementById('logout-form').submit();
    }
</script>

<style>
    .show {
        display: flex !important;
    }
    .rotate {
        transform: rotate(180deg);
    }
    .open {
        transform: rotate(90deg);
    }
</style>

</body>
</html>
