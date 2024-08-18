<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($blog->seo_title ?? $blog->title); ?> - Sogbina</title>
    <meta name="description" content="<?php echo e($blog->meta_description ?? 'Blog - Sogbina'); ?>">
    <meta property="og:title" content="<?php echo e($blog->seo_title ?? $blog->title); ?>" />
    <meta property="og:description" content="<?php echo e($blog->meta_description ?? 'Blog - Sogbina'); ?>" />
    <meta property="og:image" content="<?php echo e(asset('images/' . $blog->image)); ?>" />
    <meta property="og:url" content="<?php echo e(request()->fullUrl()); ?>" />
    <meta property="og:type" content="article" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            color: <?php echo e($settings->site_text_color ?? '#000000'); ?>;
            background-color: #f0f0f0; /* Gray background */
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

        .container {
            background-color: #ffffff; /* White background for the main content */
            padding: 20px;
            border-radius: 8px;
        }

        .blog-meta {
            margin-bottom: 20px;
            color: #666;
        }

        .blog-meta p {
            margin: 0;
        }

        .blog-content {
            font-size: 1.125rem;
            color: #333;
        }

        .short-content {
            font-style: italic;
            margin-bottom: 20px;
            border-left: 4px solid #4CAF50; /* Green left border for emphasis */
            padding-left: 10px;
            background-color: #f9f9f9; /* Light gray background */
        }

        .blog-image {
            width: 100%; /* Full width of the container */
            height: auto;
            max-height: 400px; /* Fixed height to maintain aspect ratio */
            object-fit: cover; /* Ensure the image covers the area */
            margin-top: 20px;
            border-radius: 8px;
        }

        .share-section {
            margin-top: 30px;
        }

        .btn-custom {
            background-color: #ffffff !important; /* White background for button */
            color: #000000 !important; /* Black text color */
            border: 2px solid #4CAF50 !important; /* Green border */
        }

        .btn-custom:hover {
            background-color: #f1f1f1 !important; /* Light gray background on hover */
            color: #000000 !important; /* Black text color on hover */
        }

        .btn-custom i {
            margin-right: 5px; /* Space between icon and text */
        }
    </style>
</head>
<body>
      <?php echo $__env->make('admin.mobile_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 


    <main>
        <!-- Custom Slider Bar Section -->
        <section class="custom-slider-bar">
            <div>
                <h1><?php echo e($blog->title); ?></h1>
                <p>Découvrez nos derniers articles</p>
            </div>
        </section>

        <!-- Blog Content -->
        <section class="container">
            <!-- Meta Information: Category and Tags -->
            <div class="blog-meta">
                <p><strong>Category:</strong> <?php echo e($blog->category); ?></p>
                <p><strong>Tags:</strong> <?php echo e($blog->tags); ?></p>
            </div>

            <div class="short-content">
                <?php echo nl2br(e($blog->short_content)); ?>

            </div>

            <div class="blog-content">
                <?php echo nl2br(e($blog->content)); ?>

            </div>

            <?php if($blog->image): ?>
                <img src="<?php echo e(asset('images/' . $blog->image)); ?>" alt="Image for <?php echo e($blog->title); ?>" class="blog-image">
            <?php endif; ?>

            <!-- Share section -->
            <div class="share-section">
                <h3>Partager cet article</h3>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(request()->fullUrl())); ?>" class="btn btn-custom" target="_blank">
                    <i class="fab fa-facebook-f"></i>Partager sur Facebook
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(request()->fullUrl())); ?>" class="btn btn-custom" target="_blank">
                    <i class="fab fa-twitter"></i>Partager sur Twitter
                </a>
                <a href="sms:?&body=<?php echo e(urlencode(request()->fullUrl())); ?>" class="btn btn-custom" target="_blank">
                    <i class="fas fa-sms"></i>Partager par SMS
                </a>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
<?php /**PATH /htdocs/resources/views/front/blog/show.blade.php ENDPATH**/ ?>