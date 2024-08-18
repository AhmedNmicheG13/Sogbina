
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .navbar-custom {
            background-color: #343a40;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: white;
        }
        .slider-bar {
            background-color: #495057;
            color: white;
            padding: 40px 20px;
            text-align: center;
            font-size: 2.5rem;
            margin-top: -20px !important;
            position: relative;
        }
        .slider-bar a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            display: block;
            margin-top: 10px;
        }
        .slider-bar h2 {
            font-size: 1.5rem;
            margin-top: 10px;
        }
        .layout {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            background-color: #f8f9fa;
            padding: 20px;
            width: 100%;
            box-sizing: border-box;
            flex-wrap: wrap;
        }
        .action-buttons a {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
            color: #28a745;
            padding: 10px 20px;
            text-decoration: none;
            border: 2px solid #28a745;
            border-radius: 5px;
            margin: 10px;
            text-align: center;
            flex: 1 1 calc(25% - 20px);
            max-width: 220px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 1rem;
        }
        .action-buttons a:hover {
            background-color: #28a745;
            color: white;
            text-decoration: none;
        }
        .action-buttons a.active {
            background-color: #343a40;
            border-color: #343a40;
            color: white;
        }
        .content {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
        }
        .form-container {
            max-width: 100% !important;
            margin: 0 auto !important;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        @media (max-width: 767.98px) {
            .action-buttons {
                flex-direction: column;
            }
            .action-buttons a {
                flex: 1 1 100%;
                max-width: 100%;
                font-size: 1rem;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>

@include('front.menu_nav')
@include('front.menu_mobile')

<div class="slider-bar">
    Tableau de Bord
    <h2><a href="/">Accueil</a></h2>
</div>

<div class="layout">
    <div class="action-buttons">
        @if(auth()->user()->email == 'admin@gmail.com')
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i data-feather="grid"></i> Dashboard Admin
            </a>
            <a href="{{ route('users.index') }}" class="{{ request()->is('users') ? 'active' : '' }}">
                <i data-feather="users"></i> Gérer Utilisateurs
            </a>
            <a href="{{ route('homepage-settings.edit') }}" class="{{ request()->is('admin/homepage-settings') ? 'active' : '' }}">
                <i data-feather="edit"></i> Modifier la Page d'Accueil
            </a>
            <a href="{{ route('admin.settings.edit') }}" class="{{ request()->is('admin/settings/edit') ? 'active' : '' }}">
    <i data-feather="settings"></i> Ø¥Ø¹Ø¯Ø§Ø¯Ø§Øª Ø§ÙÙØ¯ÙØ±
</a>

           
        @else
            <a href="{{ route('trajet.create') }}" class="{{ request()->is('trajet/create') ? 'active' : '' }}">
                <i data-feather="plus-circle"></i> Publier un Trajet
            </a>
            <a href="{{ route('trajets.index') }}" class="{{ request()->is('trajets') ? 'active' : '' }}">
                <i data-feather="list"></i> Afficher les Trajets
            </a>
            <a href="{{ route('profile.edit') }}" class="{{ request()->is('profile/edit') ? 'active' : '' }}">
                <i data-feather="user"></i> Modifier Profil
            </a>
        @endif
        <a href="#" id="logout-btn" style="background-color: red; color: white;">
            <i data-feather="log-out"></i> Quitter
        </a>
    </div>

    <div class="content">
        @yield('content')
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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button type="button" class="btn btn-success" id="confirm-logout">Oui</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
<script>
    $(function() {
        feather.replace();

        $('#logout-btn').on('click', function(event) {
            event.preventDefault();
            $('#logoutModal').modal('show');
        });

        $('#confirm-logout').on('click', function() {
            $('#logout-form').submit();
        });
    });
</script>
</body>
</html> 