<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
            padding: 20px; /* إضافة هامش داخلي */
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

        .register-container {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px; /* إضافة هامش خارجي */
        }

        .register-card {
            flex: 1;
            display: flex;
            justify-content: center; /* محاذاة مركزية للبطاقة */
        }

        .register-image {
            flex: 1;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100%;
            max-width: 800px; /* تحديد الحد الأقصى لحجم الصورة */
        }

        .register-image img {
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

            .register-container {
                flex-direction: column;
                align-items: center;
                width: 100%;
            }

            .register-card {
                padding: 10px; /* إضافة هامش داخلي للبطاقة */
            }

            .register-image {
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
    <div class="register-container">
        <div class="register-card">
            <div class="card border-success">
                <div class="card-header">
                    <i class="fas fa-user-plus"></i>
                    Inscription
                </div>
                <div class="card-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" required autocomplete="name" autofocus placeholder="Nom">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" placeholder="Adresse e-mail">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-12 input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmez le mot de passe">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success btn-block">
                                    Inscription
                                </button>
                                <a class="btn btn-link" href="<?php echo e(route('login')); ?>">
                                    Vous avez déjà un compte ? Connexion
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="footer-text">
                        <p>En vous inscrivant, vous acceptez nos <a href="#">Conditions d'utilisation</a> et notre <a href="#">Politique de confidentialité</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="register-image">
            <img src="https://webfx.fr/sogbina/HEADER.png" alt="Inscription">
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
<?php /**PATH /htdocs/resources/views/auth/register.blade.php ENDPATH**/ ?>