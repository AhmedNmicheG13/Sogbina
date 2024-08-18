<?php $__env->startSection('content'); ?>
<div class="container" style="font-family: 'Outfit', sans-serif;">
    <h1><?php echo e(__('Edit Home Page Settings')); ?></h1>

    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('homepage-settings.update')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Header Title -->
        <div class="row mb-3">
            <label for="header_title" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-fonts"></i> <?php echo e(__('Header Title')); ?>

            </label>
            <div class="col-md-6">
                <input id="header_title" type="text" class="form-control <?php $__errorArgs = ['header_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="header_title" value="<?php echo e(old('header_title', $settings->header_title ?? '')); ?>">
                <?php $__errorArgs = ['header_title'];
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

        <!-- Header Image -->
        <div class="row mb-3">
            <label for="header_image" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-image"></i> <?php echo e(__('Header Image')); ?>

            </label>
            <div class="col-md-6 position-relative">
                <?php if(isset($settings->header_image)): ?>
                <div class="mb-2 position-relative">
                    <img src="<?php echo e(asset('images/' . $settings->header_image)); ?>" alt="Header Image" class="img-thumbnail" width="150">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="event.preventDefault(); document.getElementById('delete-form-header_image').submit();" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                <?php endif; ?>
                <input id="header_image" type="file" class="form-control <?php $__errorArgs = ['header_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="header_image">
                <?php $__errorArgs = ['header_image'];
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

        <!-- Site Text Color -->
        <div class="row mb-3">
            <label for="site_text_color" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette-fill"></i> <?php echo e(__('Header Text Color')); ?>

            </label>
            <div class="col-md-6">
                <input id="site_text_color" type="color" class="form-control color-picker <?php $__errorArgs = ['site_text_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="site_text_color" value="<?php echo e(old('site_text_color', $settings->site_text_color ?? '#fff')); ?>">
                <?php $__errorArgs = ['site_text_color'];
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

        <!-- Header Subtitle -->
        <div class="row mb-3">
            <label for="header_subtitle" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-subtitles"></i> <?php echo e(__('Header Subtitle')); ?>

            </label>
            <div class="col-md-6">
                <input id="header_subtitle" type="text" class="form-control <?php $__errorArgs = ['header_subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="header_subtitle" value="<?php echo e(old('header_subtitle', $settings->header_subtitle ?? '')); ?>">
                <?php $__errorArgs = ['header_subtitle'];
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

        <!-- Logo -->
        <div class="row mb-3">
            <label for="logo" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-image"></i> <?php echo e(__('Logo')); ?>

            </label>
            <div class="col-md-6 position-relative">
                <?php if(isset($settings->logo)): ?>
                <div class="mb-2 position-relative">
                    <img src="<?php echo e(asset('images/' . $settings->logo)); ?>" alt="Logo" class="img-thumbnail" width="150">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="event.preventDefault(); document.getElementById('delete-form-logo').submit();" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                <?php endif; ?>
                <input id="logo" type="file" class="form-control <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="logo">
                <?php $__errorArgs = ['logo'];
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

        <!-- Favicon -->
        <div class="row mb-3">
            <label for="favicon" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-image"></i> <?php echo e(__('Favicon')); ?>

            </label>
            <div class="col-md-6 position-relative">
                <?php if(isset($settings->favicon)): ?>
                <div class="mb-2 position-relative">
                    <img src="<?php echo e(asset('images/' . $settings->favicon)); ?>" alt="Favicon" class="img-thumbnail" width="32" height="32">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="event.preventDefault(); document.getElementById('delete-form-favicon').submit();" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                <?php endif; ?>
                <input id="favicon" type="file" class="form-control <?php $__errorArgs = ['favicon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="favicon">
                <?php $__errorArgs = ['favicon'];
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

        <!-- Button Color -->
        <div class="row mb-3">
            <label for="buton_color" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette-fill"></i> <?php echo e(__('navbar secondry')); ?>

            </label>
            <div class="col-md-6">
                <input id="buton_color" type="color" class="form-control color-picker <?php $__errorArgs = ['buton_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="buton_color" value="<?php echo e(old('buton_color', $settings->buton_color ?? '#000000')); ?>">
                <?php $__errorArgs = ['buton_color'];
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

        <!-- Menu Text Color -->
        <div class="row mb-3">
            <label for="text_color_menu" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette-fill"></i> <?php echo e(__('Text Color Menu')); ?>

            </label>
            <div class="col-md-6">
                <input id="text_color_menu" type="color" class="form-control color-picker <?php $__errorArgs = ['text_color_menu'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="text_color_menu" value="<?php echo e(old('text_color_menu', $settings->text_color_menu ?? '#000000')); ?>">
                <?php $__errorArgs = ['text_color_menu'];
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

        <!-- Navbar Color -->
        <div class="row mb-3">
            <label for="header_color_large" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette"></i> <?php echo e(__('Navbar Color')); ?>

            </label>
            <div class="col-md-6">
                <input id="header_color_large" type="color" class="form-control color-picker <?php $__errorArgs = ['header_color_large'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="header_color_large" value="<?php echo e(old('header_color_large', $settings->header_color_large ?? '#000000')); ?>">
                <?php $__errorArgs = ['header_color_large'];
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

        <!-- Page Title for About Page -->
        <div class="row mb-3">
            <label for="page_title" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-earmark-text"></i> <?php echo e(__('Page Title for About Page')); ?>

            </label>
            <div class="col-md-6">
                <input id="page_title" type="text" class="form-control <?php $__errorArgs = ['page_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="page_title" value="<?php echo e(old('page_title', $settings->page_title ?? '')); ?>">
                <?php $__errorArgs = ['page_title'];
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

        <!-- About Text -->
        <div class="row mb-3">
            <label for="about_text" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-text"></i> <?php echo e(__('About Page Content')); ?>

            </label>
            <div class="col-md-6">
                <textarea id="about_text" class="form-control <?php $__errorArgs = ['about_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="about_text" rows="5"><?php echo e(old('about_text', $settings->about_text ?? '')); ?></textarea>
                <?php $__errorArgs = ['about_text'];
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

        <!-- SEO Title -->
        <div class="row mb-3">
            <label for="seo_title" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-earmark-font"></i> <?php echo e(__('SEO Title')); ?>

            </label>
            <div class="col-md-6">
                <input id="seo_title" type="text" class="form-control <?php $__errorArgs = ['seo_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="seo_title" value="<?php echo e(old('seo_title', $settings->seo_title ?? '')); ?>">
                <?php $__errorArgs = ['seo_title'];
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

        <!-- SEO Description -->
        <div class="row mb-3">
            <label for="seo_description" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-text"></i> <?php echo e(__('SEO Description')); ?>

            </label>
            <div class="col-md-6">
                <input id="seo_description" type="text" class="form-control <?php $__errorArgs = ['seo_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="seo_description" value="<?php echo e(old('seo_description', $settings->seo_description ?? '')); ?>">
                <?php $__errorArgs = ['seo_description'];
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

        <!-- Slug -->
        <div class="row mb-3">
            <label for="slug" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-link-45deg"></i> <?php echo e(__('Slug')); ?>

            </label>
            <div class="col-md-6">
                <input id="slug" type="text" class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="slug" value="<?php echo e(old('slug', $settings->slug ?? '')); ?>">
                <?php $__errorArgs = ['slug'];
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

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Update Settings')); ?>

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
    function confirmDeletion(formId) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette image ?')) {
            document.getElementById(formId).submit();
        }
    }
</script>

<!-- Hidden Forms for Image Deletion -->
<form id="delete-form-header_image" action="<?php echo e(route('homepage-settings.deleteImage', ['type' => 'header_image'])); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>

<form id="delete-form-logo" action="<?php echo e(route('homepage-settings.deleteImage', ['type' => 'logo'])); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>

<form id="delete-form-favicon" action="<?php echo e(route('homepage-settings.deleteImage', ['type' => 'favicon'])); ?>" method="POST" style="display: none;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /htdocs/sogbina/resources/views/admin/homepage_settings/edit.blade.php ENDPATH**/ ?>