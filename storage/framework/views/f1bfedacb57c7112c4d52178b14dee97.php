<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            background: linear-gradient(to right, #4caf50, #81c784);
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .navbar-brand {
            font-weight: bold;
            color: #4caf50;
        }

        .navbar-nav .nav-link {
            color: #4caf50;
        }

        .navbar-nav .nav-link:hover {
            color: #388e3c;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0,0,0,0.1);
            background: #ffffff;
            width: 100%;
            max-width: 600px; /* Maximum width for large screens */
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

        .btn-primary, .btn-success {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 1.2rem;
            border: none;
        }

        .btn-primary {
            background-color: #4caf50;
        }

        .btn-primary:hover {
            background-color: #388e3c;
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

        @media (max-width: 768px) {
            body {
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .card {
                max-width: 100%;
                margin: 0 10px; /* Add margin for small screens */
            }

            .form-group label {
                text-align: center;
            }

            .form-group div {
                text-align: center;
            }

            .btn-primary {
                width: 100%;
                font-size: 1rem;
            }
        }
    </style>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!-- Add your left side links here -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH /htdocs/resources/views/layouts/app.blade.php ENDPATH**/ ?>