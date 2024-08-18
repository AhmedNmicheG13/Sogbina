<!-- resources/views/front/modifier_profile.blade.php -->



<?php $__env->startSection('content'); ?>
<div class="container" style="font-family: 'Outfit', sans-serif;">
    <h1><?php echo e(__('Modifier le Profil')); ?></h1>

    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Photo de Profil -->
        <div class="row mb-3">
            <label for="profile_picture" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-image-fill"></i> <?php echo e(__('Photo de Profil')); ?>

            </label>
            <div class="col-md-6 position-relative">
                <?php if(Auth::user()->profile_picture): ?>
                <div class="mb-2 position-relative">
                    <img src="<?php echo e(asset('images/' . Auth::user()->profile_picture)); ?>" alt="Photo de Profil" class="img-thumbnail" style="max-height: 150px;">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="confirmDeletion('<?php echo e(route('profile.deletePicture')); ?>')" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                <?php endif; ?>
                <input id="profile_picture" type="file" class="form-control <?php $__errorArgs = ['profile_picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="profile_picture">
                <?php $__errorArgs = ['profile_picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Nom -->
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-person-fill"></i> <?php echo e(__('Nom')); ?>

            </label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(Auth::user()->name); ?>" required autofocus>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Adresse E-mail -->
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-envelope-fill"></i> <?php echo e(__('Adresse E-mail')); ?>

            </label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(Auth::user()->email); ?>" required>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Téléphone -->
        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-telephone-fill"></i> <?php echo e(__('Téléphone')); ?>

            </label>
            <div class="col-md-6">
                <input id="phone" type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old('phone', Auth::user()->phone)); ?>" required>
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Pays -->
        <div class="row mb-3">
            <label for="country" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-geo-alt-fill"></i> <?php echo e(__('Pays')); ?>

            </label>
            <div class="col-md-6">
                <input id="country" type="text" class="form-control <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="country" value="<?php echo e(old('country', Auth::user()->country)); ?>" required>
                <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Ville -->
        <div class="row mb-3">
            <label for="city" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-building"></i> <?php echo e(__('Ville')); ?>

            </label>
            <div class="col-md-6">
                <input id="city" type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="city" value="<?php echo e(old('city', Auth::user()->city)); ?>" required>
                <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Code Postal -->
        <div class="row mb-3">
            <label for="postal_code" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-mailbox"></i> <?php echo e(__('Code Postal')); ?>

            </label>
            <div class="col-md-6">
                <input id="postal_code" type="text" class="form-control <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="postal_code" value="<?php echo e(old('postal_code', Auth::user()->postal_code)); ?>" required>
                <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Marque de Voiture -->
        <div class="row mb-3">
            <label for="car_brand" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-car-front-fill"></i> <?php echo e(__('Marque de Voiture')); ?>

            </label>
            <div class="col-md-6">
                <input id="car_brand" type="text" class="form-control <?php $__errorArgs = ['car_brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_brand" value="<?php echo e(old('car_brand', Auth::user()->car_brand)); ?>" required>
                <?php $__errorArgs = ['car_brand'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Numéro de Série de la Voiture -->
        <div class="row mb-3">
            <label for="car_serial" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-123"></i> <?php echo e(__('Numéro de Série de la Voiture')); ?>

            </label>
            <div class="col-md-6">
                <input id="car_serial" type="text" class="form-control <?php $__errorArgs = ['car_serial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="car_serial" value="<?php echo e(old('car_serial', Auth::user()->car_serial)); ?>" required>
                <?php $__errorArgs = ['car_serial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Numéro de la Carte Nationale -->
        <div class="row mb-3">
            <label for="national_id" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-heading"></i> <?php echo e(__('Numéro de la Carte Nationale')); ?>

            </label>
            <div class="col-md-6">
                <input id="national_id" type="text" class="form-control <?php $__errorArgs = ['national_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="national_id" value="<?php echo e(old('national_id', Auth::user()->national_id)); ?>" required>
                <?php $__errorArgs = ['national_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Carte Nationale Recto -->
        <div class="row mb-3">
            <label for="national_id_recto" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-image"></i> <?php echo e(__('Carte Nationale Recto')); ?>

            </label>
            <div class="col-md-6">
                <?php if(Auth::user()->national_id_recto): ?>
                <div class="mb-2 position-relative">
                    <img src="<?php echo e(asset('national_ids/' . Auth::user()->national_id_recto)); ?>" alt="Carte Nationale Recto" class="img-thumbnail" style="max-height: 150px;">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="confirmDeletion('<?php echo e(route('profile.deleteNationalIdRecto')); ?>')" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                <?php endif; ?>
                <input id="national_id_recto" type="file" class="form-control <?php $__errorArgs = ['national_id_recto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="national_id_recto">
                <?php $__errorArgs = ['national_id_recto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Carte Nationale Verso -->
        <div class="row mb-3">
            <label for="national_id_verso" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-image"></i> <?php echo e(__('Carte Nationale Verso')); ?>

            </label>
            <div class="col-md-6">
                <?php if(Auth::user()->national_id_verso): ?>
                <div class="mb-2 position-relative">
                    <img src="<?php echo e(asset('national_ids/' . Auth::user()->national_id_verso)); ?>" alt="Carte Nationale Verso" class="img-thumbnail" style="max-height: 150px;">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="confirmDeletion('<?php echo e(route('profile.deleteNationalIdVerso')); ?>')" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                <?php endif; ?>
                <input id="national_id_verso" type="file" class="form-control <?php $__errorArgs = ['national_id_verso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="national_id_verso">
                <?php $__errorArgs = ['national_id_verso'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- RIB Bancaire -->
        <div class="row mb-3">
            <label for="rib_bancaire" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-credit-card-2-front-fill"></i> <?php echo e(__('RIB Bancaire')); ?>

            </label>
            <div class="col-md-6">
                <input id="rib_bancaire" type="text" class="form-control <?php $__errorArgs = ['rib_bancaire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="rib_bancaire" value="<?php echo e(old('rib_bancaire', Auth::user()->rib_bancaire)); ?>" required>
                <?php $__errorArgs = ['rib_bancaire'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Mot de Passe -->
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-lock-fill"></i> <?php echo e(__('Mot de Passe')); ?>

            </label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new-password">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Confirmer le Mot de Passe -->
        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-lock-fill"></i> <?php echo e(__('Confirmer le Mot de Passe')); ?>

            </label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Mettre à Jour le Profil')); ?>

                </button>
            </div>
        </div>
    </form>
</div>

<style>
    .position-relative .badge {
        cursor: pointer;
    }
</style>

<script>
    function confirmDeletion(url) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette image ?')) {
            window.location.href = url;
        }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.user_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /htdocs/sogbina/resources/views/front/modifier_profile.blade.php ENDPATH**/ ?>