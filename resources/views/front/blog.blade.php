<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Sogbina</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
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

        .post-cards-container {
            display: flex;
            overflow-x: auto;
            padding: 10px 0;
        }

        .post-card {
            flex: 0 0 auto;
            width: 300px;
            margin-right: 15px;
            border: 1px solid #ddd; /* حدود خفيفة */
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background-color: #fff; /* خلفية بيضاء للبطاقات */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .post-card:hover {
            transform: translateY(-10px); /* رفع البطاقة عند التمرير */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* ظل البطاقة */
        }

        .post-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .post-card-body {
            padding: 15px;
            flex: 1;
        }

        .post-card h2 {
            font-size: 1.25rem;
            margin-bottom: 10px;
        }

        .post-card p {
            font-size: 0.875rem;
            color: #666;
        }

        .post-card a {
            text-decoration: none;
            color: #222; /* لون الرابط */
        }

        .post-card a:hover {
            text-decoration: ; /* وضع خط تحت الرابط عند التمرير */
        }

        .btn-custom-green {
            background-color: GREEN !important; /* خلفية بيضاء للزر */
            border-color: #222 !important; /* حدود داكنة */
            color: #fff !important; /* نص أبيض */
            font-weight: 700; /* نص عريض */
        }

        .btn-custom-green:hover, .btn-custom-green:focus, .btn-custom-green:active {
            background-color: #27ae60 !important; /* أخضر داكن للزر عند التمرير */
            border-color: #27ae60 !important; /* حدود أخضر داكن عند التمرير */
            color: #fff !important; /* نص أبيض */
        }
    </style>
</head>
<body>
    @include('admin.mobile_nav') 
    @include('admin.navbar') 

    <main>
        <!-- Custom Slider Bar Section -->
        <section class="custom-slider-bar">
            <div>
                <h1>Blog</h1>
                <p>Découvrez nos derniers articles</p>
            </div>
        </section>

        <!-- Post Cards Section -->
        <section class="container">
            <div class="post-cards-container">
                @foreach($blogs as $blog)
                    <div class="card post-card">
                        @if($blog->image)
                            <img src="{{ asset('images/' . $blog->image) }}" alt="Image pour {{ $blog->title }}">
                        @endif
                        <div class="card-body post-card-body">
                            <h2 class="card-title"><a href="{{ route('front.blog.show', $blog->slug) }}">{{ $blog->title }}</a></h2>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($blog->short_content, 150) }}</p>
                            <p class="card-text"><strong>Catégorie:</strong> {{ $blog->category }}</p>
                            <p class="card-text"><strong>Tags:</strong> {{ $blog->tags }}</p>
                            <a href="{{ route('front.blog.show', $blog->slug) }}" class="btn btn-custom-green">Lire la suite</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
