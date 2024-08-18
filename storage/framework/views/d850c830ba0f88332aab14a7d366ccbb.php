

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Modifier les Informations de l'Administrateur</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <?php if($admin): ?>
        <!-- Formulaire de changement d'email -->
        <form action="<?php echo e(route('admin.updateEmail')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="current_email">Adresse Email Actuelle</label>
                <input type="email" class="form-control" id="current_email" name="current_email" value="<?php echo e(old('current_email', $admin->email)); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="new_email">Nouvelle Adresse Email</label>
                <input type="email" class="form-control" id="new_email" name="new_email" value="<?php echo e(old('new_email')); ?>" required>
                <?php if($errors->has('new_email')): ?>
                    <span class="text-danger"><?php echo e($errors->first('new_email')); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Modifier l'Email</button>
        </form>

        <!-- Formulaire de changement de mot de passe -->
        <form action="<?php echo e(route('admin.updatePassword')); ?>" method="POST" style="margin-top: 30px;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="current_password">Mot de Passe Actuel</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
                <?php if($errors->has('current_password')): ?>
                    <span class="text-danger"><?php echo e($errors->first('current_password')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="new_password">Nouveau Mot de Passe</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                <?php if($errors->has('new_password')): ?>
                    <span class="text-danger"><?php echo e($errors->first('new_password')); ?></span>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirmer le Nouveau Mot de Passe</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                <?php if($errors->has('new_password_confirmation')): ?>
                    <span class="text-danger"><?php echo e($errors->first('new_password_confirmation')); ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Modifier le Mot de Passe</button>
        </form>
    <?php else: ?>
        <div class="alert alert-danger">L'utilisateur n'a pas été trouvé.</div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /htdocs/resources/views/admin/settings/edit.blade.php ENDPATH**/ ?>