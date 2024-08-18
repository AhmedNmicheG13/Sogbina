<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Desktop</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }
        .navbar-desktop {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: <?php echo e($settings->buton_color ?? 'RED'); ?>;
            color: white;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 9999;
            text-transform: capitalize;
        }
        .navbar-logo img {
            max-height: 50px;
            margin-right: 10px;
        }
        .navbar-nav-desktop {
            display: flex;
            flex: 1;
            justify-content: center;
        }
        .navbar-nav-desktop a {
            padding: 15px;
            text-decoration: none;
            color: <?php echo e($settings->text_color_menu ?? '#FFF'); ?>;
            text-transform: capitalize;
            transition: background-color 0.3s, color 0.3s;
        }
        .navbar-nav-desktop a:hover {
            background-color: #FFF!important;
            color: #222!important;
            text-decoration: none !important;
        }
        .navbar-right {
            display: flex;
            align-items: center;
        }
        .publish-trip-desktop {
            background-color: RED;
            color: #FFF!important;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            margin: 0 10px;
            border-radius: 5px;
            text-transform: capitalize;
            cursor: pointer;
        }
        .publish-trip-desktop img {
            margin-right: 8px;
        }
        .dropdown-desktop {
            position: relative;
        }
        .dropdown-btn-desktop {
            display: flex;
            align-items: center;
            background-color: #28a745;  /* لون الخلفية الأخضر */
            color: #fff !important;     /* لون النص الأبيض */
            padding: 10px 15px;         /* الحشو داخل الزر */
            border-radius: 5px;         /* الزوايا المستديرة */
            cursor: pointer;            /* مؤشر الفأرة على التحويم */
        }
        .dropdown-menu-desktop {
            display: none;
            flex-direction: column;
            background-color: white;
            position: absolute;
            top: 100%;
            right: 0;
            width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 10000;
        }
        .dropdown-menu-desktop a {
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }
        .dropdown-menu-desktop a:hover {
            background-color: #ddd;
            color: #000 !important;
        }
        .dropdown-icon-rotate {
            transition: transform 0.3s;
        }
        .dropdown-icon-rotate.rotate {
            transform: rotate(180deg);
        }
        .profile-pic {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .navbar-desktop {
                display: none !important;
            }
        }
        @media (min-width: 769px) {
            .navbar-mobile {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<div class="navbar-desktop">
    <div class="navbar-logo">
        <img src="<?php echo e(asset('images/' . ($settings->logo ?? 'https://webfx.fr/images/1722354722_logo.png'))); ?>" alt="">
    </div>
    <div class="navbar-nav-desktop">
        <a href="<?php echo e(url('/')); ?>" class="nav-link-custom">Accueil</a>
        <a href="<?php echo e(url('/blog')); ?>" class="nav-link-custom">Blog</a>
        <a href="<?php echo e(url('/a-propos')); ?>" class="nav-link-custom">À propos</a>
        <a href="<?php echo e(url('/services')); ?>" class="nav-link-custom">Services</a>
        <a href="<?php echo e(url('/contactez-nous')); ?>" class="nav-link-custom">Contactez-nous</a>
    </div>
    <div class="navbar-right">
        <div class="publish-trip-desktop" onclick="handlePublishTrip()">
            <img src="https://img.icons8.com/ios-filled/20/ffffff/plus-math.png"/> Publier Un Trajet
        </div>
        <div class="dropdown-desktop">
            <div class="dropdown-btn-desktop" onclick="toggleDropdown()">
                <span id="user-name">
                    <?php if(auth()->guard()->check()): ?>
                        <img src="<?php echo e(asset('images/' . Auth::user()->profile_picture)); ?>" class="profile-pic" /> 
                        <?php echo e(Auth::user()->name); ?>

                    <?php else: ?>
                        <img src="https://img.icons8.com/ios-filled/20/ffffff/user.png"/> Espace Client
                    <?php endif; ?>
                </span>
                <img id="dropdown-icon" class="dropdown-icon-rotate" src="https://img.icons8.com/ios-filled/20/ffffff/chevron-down.png"/>
            </div>
            <div class="dropdown-menu-desktop" id="dropdown-menu">
                <?php if(auth()->guard()->guest()): ?>
                    <a href="#" data-toggle="modal" data-target="#loginModal" id="login-link">
                        <img src="https://img.icons8.com/ios-filled/20/000000/login-rounded-right.png"/> Se Connecter
                    </a>
                    <a href="#" data-toggle="modal" data-target="#registerModal" id="register-link">
                        <img src="https://img.icons8.com/ios-filled/20/000000/add-user-male.png"/> S'inscrire
                    </a>
                <?php else: ?>
                    <a href="/dashboard" id="dashboard-link">
                        <img src="https://img.icons8.com/ios-filled/20/000000/dashboard.png"/> Tableau de Bord
                    </a>
                    <a href="#" id="logout-link" onclick="event.preventDefault(); showLogoutConfirmation();">
                        <img src="https://img.icons8.com/ios-filled/20/000000/logout-rounded.png"/> Se Déconnecter
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                <?php endif; ?>
            </div>
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
                <div id="login-errors" class="alert alert-danger" style="display: none;"></div>
                <form id="login-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row mb-3">
                        <div class="col-md-12 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="email" autofocus placeholder="Adresse e-mail">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12 input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-md-12 text-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
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
                            <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    Mot de passe oublié ?
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>
                <div class="footer-text">
                    <p>En vous inscrivant, vous acceptez nos <a href="#">Conditions d'utilisation</a> et notre <a href="#">Politique de confidentialité</a>.</p>
                </div>
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
                <!-- ÙÂÂÂÂÙÂÂÂÂÙÂÂÂÂÙÂÂÂÂÙÂÂÂÂ Ø¥Ø¶Ø§ÙÂÂÂÂØ© ÙÂÂÂÂÙÂÂÂÂÙÂÂÂÂØ°Ø¬ Ø§ÙÂÂÂÂØªØ³Ø¬ÙÂÂÂÂÙÂÂÂÂ ÙÂÂÂÂÙÂÂÂÂØ§ -->
                <p>Inscription form will be here.</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    $(document).ready(function() {
        // Toggle dropdown menu visibility and rotate icon
        function toggleDropdown() {
            const menu = document.getElementById('dropdown-menu');
            const icon = document.getElementById('dropdown-icon');
            if (menu.style.display === 'flex') {
                menu.style.display = 'none';
                icon.classList.remove('rotate');
            } else {
                menu.style.display = 'flex';
                icon.classList.add('rotate');
            }
        }

        // Handle "Publier Un Trajet" button click
        function handlePublishTrip() {
            const isLoggedIn = <?php echo e(Auth::check() ? 'true' : 'false'); ?>;
            if (isLoggedIn === 'true') {
                window.location.href = '/trajets/create';
            } else {
                $('#loginModal').modal('show');
            }
        }

        // Show logout confirmation modal
        function showLogoutConfirmation() {
            $('#logoutModal').modal('show');
        }

        // Confirm logout
        function confirmLogout() {
            document.getElementById('logout-form').submit();
        }

        // Handle login form submission
        $('#login-form').on('submit', function(event) {
            event.preventDefault();
            var form = document.getElementById('login-form');
            var formData = new FormData(form);

            axios.post('<?php echo e(route('login')); ?>', formData)
                .then(response => {
                    // Show a confirmation message
                    alert('Connexion réussie ! Bienvenue !');

                    // Redirect to dashboard
                    window.location.href = '/dashboard';
                })
                .catch(error => {
                    // Handle errors here
                    const errorContainer = document.getElementById('login-errors');
                    errorContainer.style.display = 'block';
                    errorContainer.innerHTML = 'Erreur de connexion. Veuillez vérifier vos informations.';
                    console.error('Error during login:', error);
                });
        });

        // Bind the toggle function to dropdown button click
        $('.dropdown-btn-desktop').on('click', toggleDropdown);
        // Add click event to publish trip button
        $('.publish-trip-desktop').on('click', handlePublishTrip);
    });
</script>
</body>
</html><?php /**PATH /htdocs/resources/views/front/navbar.blade.php ENDPATH**/ ?>