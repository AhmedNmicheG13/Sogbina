<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>"> <!-- ÙÙÙ CSS Ø§ÙØ®Ø§Øµ Ø¨Ù -->
</head>
<body>

         <?php echo $__env->make('admin.mobile_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 


    <main class="container mt-5">
        <h1>Services</h1>
        <p>Découvrez les services que nous proposons sur cette page.</p>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script> <!-- ÙÙÙ JavaScript Ø§ÙØ®Ø§Øµ Ø¨Ù -->
</body>
</html>
<?php /**PATH /htdocs/sogbina/resources/views/front/services.blade.php ENDPATH**/ ?>