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

           .custom-slider-bar {
            background: linear-gradient(to right, #4CAF50, #8BC34A); /* Gradient background */
            color: #fff; /* White text */
            padding: 80px 15px; /* Increased padding for better appearance */
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .custom-slider-bar h1 {
            font-size: 3rem; /* Larger font size */
            margin: 0;
            color: #fff; /* White text */
        }

        .custom-slider-bar p {
            font-size: 1.5rem; /* Larger font size for subtitle */
            color: #dcdcdc; /* Light gray text */
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
            padding: 8px;
            text-decoration: none;
            border: 2px solid #28a745;
            border-radius: 5px;
            margin: 8px;
            text-align: center;
            width: 60px;
            height: 60px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
        }

        .action-buttons a i {
            font-size: 1.5rem;
        }

        .action-buttons a span {
            display: none;
            font-size: 0.75rem;
        }

        .action-buttons a:hover,
        .action-buttons a.active {
            background-color: #28a745;
            color: white;
            text-decoration: none;
            width: 200px;
            height: auto;
            padding: 10px 20px;
            box-sizing: border-box;
            border-radius: 5px;
        }

        .action-buttons a:hover i {
            margin-right: 10px;
        }

        .action-buttons a:hover span {
            display: inline;
        }

        @media (max-width: 767.98px) {
            .action-buttons {
                flex-direction: column;
            }

            .action-buttons a {
                flex: 1 1 100%;
                max-width: 100%;
                font-size: 0.9rem;
                margin: 5px 0;
                width: 100%;
                height: auto;
            }

            .action-buttons a:hover {
                width: 100%;
                padding: 10px 20px;
            }
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
    </style>
</head>
<body>

 @include('admin.mobile_nav') 
    @include('admin.navbar') 

  <!-- Custom Slider Bar Section -->
        <section class="custom-slider-bar">
            <div>
                <h1>Tableau de bord </h1>
                <p></p>
            </div>
        </section>

<div class="layout">
    <div class="action-buttons">
        @if(auth()->user()->is_admin)
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i data-feather="grid"></i> <span>Dashboard Admin</span>
            </a>
            <a href="{{ route('blogs.index') }}" class="{{ request()->is('blogs') ? 'active' : '' }}">
                <i data-feather="file-text"></i> <span>Manage Blogs</span>
            </a>
            <a href="{{ route('homepage-settings.edit') }}" class="{{ request()->is('admin/homepage-settings') ? 'active' : '' }}">
                <i data-feather="edit"></i> <span>Modifier la Page d'Accueil</span>
            </a>
            <a href="{{ route('admin.settings.edit') }}" class="{{ request()->is('admin/settings/edit') ? 'active' : '' }}">
                <i data-feather="settings"></i> <span>Modifier les Paramètres</span>
            </a>
        @else
            <a href="{{ route('trajet.create') }}" class="{{ request()->is('trajet/create') ? 'active' : '' }}">
                <i data-feather="plus-circle"></i> <span>Publier un Trajet</span>
            </a>
            <a href="{{ route('trajets.index') }}" class="{{ request()->is('trajets') ? 'active' : '' }}">
                <i data-feather="list"></i> <span>Afficher les Trajets</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="{{ request()->is('profile/edit') ? 'active' : '' }}">
                <i data-feather="user"></i> <span>Modifier Profil</span>
            </a>
        @endif
        <a href="#" id="logout-btn" style="background-color: red; color: white;">
            <i data-feather="log-out"></i> <span>Quitter</span>
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
