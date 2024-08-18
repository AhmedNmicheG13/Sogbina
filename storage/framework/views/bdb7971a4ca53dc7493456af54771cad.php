<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Utilisateur</title>
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
            padding: 8px; /* Smaller padding for square shape */
            text-decoration: none;
            border: 2px solid #28a745;
            border-radius: 5px;
            margin: 8px;
            text-align: center;
            width: 60px; /* Smaller width for square shape */
            height: 60px; /* Smaller height for square shape */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 0.75rem; /* Smaller font size for square shape */
            transition: all 0.3s ease; /* Smooth transition */
            position: relative;
        }

        .action-buttons a i {
            font-size: 1.5rem; /* Icon size adjusted */
        }

        .action-buttons a span {
            display: none; /* Hide text initially */
            font-size: 0.75rem; /* Smaller font size for text */
            margin-left: 10px; /* Space between icon and text */
        }

        .action-buttons a:hover,
        .action-buttons a.active {
            background-color: #28a745;
            color: white;
            text-decoration: none;
            width: 200px; /* Expanded width for rectangular appearance */
            height: auto; /* Allow height to adjust */
            padding: 10px 20px; /* Adjust padding for rectangular appearance */
            box-sizing: border-box; /* Ensure padding is included in width */
            border-radius: 5px;
        }

        .action-buttons a:hover i {
            margin-right: 10px; /* Space between icon and text */
            font-size: 1.5rem; /* Icon size on hover */
        }

        .action-buttons a:hover span {
            display: inline; /* Show text on hover */
            font-size: 0.9rem; /* Font size on hover */
        }

        @media (max-width: 767.98px) {
            .action-buttons {
                flex-direction: column;
            }

            .action-buttons a {
                flex: 1 1 100%;
                max-width: 100%;
                font-size: 0.9rem; /* Smaller font size on mobile */
                margin: 5px 0;
                width: 100%; /* Full width on mobile */
                height: auto; /* Remove fixed height on mobile */
            }

            .action-buttons a:hover {
                width: 100%; /* Full width on mobile */
                padding: 10px 20px; /* Adjust padding for rectangular appearance */
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

 <?php echo $__env->make('admin.mobile_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

  <!-- Custom Slider Bar Section -->
        <section class="custom-slider-bar">
            <div>
                <h1>Tableau de bord </h1>
                <p></p>
            </div>
        </section>

<div class="layout">
    <div class="action-buttons">
        <a href="<?php echo e(route('trajet.create')); ?>" class="<?php echo e(request()->is('trajet/create') ? 'active' : ''); ?>">
            <i data-feather="plus-circle"></i><span>Publier un Trajet</span>
        </a>
        <a href="<?php echo e(route('trajets.index')); ?>" class="<?php echo e(request()->is('trajets') ? 'active' : ''); ?>">
            <i data-feather="list"></i><span>Afficher les Trajets</span>
        </a>
        <a href="<?php echo e(route('profile.edit')); ?>" class="<?php echo e(request()->is('profile/edit') ? 'active' : ''); ?>">
            <i data-feather="user"></i><span>Modifier Profil</span>
        </a>
        <a href="#" id="logout-btn" style="background-color: red; color: white;">
            <i data-feather="log-out"></i><span>Quitter</span>
        </a>
    </div>

    <div class="content">
        <?php echo $__env->yieldContent('content'); ?>
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
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
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
</html><?php /**PATH /htdocs/resources/views/front/user_dashboard.blade.php ENDPATH**/ ?>