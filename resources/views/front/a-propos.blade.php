<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->page_title ?? 'À propos' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .hero-section {
            background: url('{{ asset('images/hero-bg.jpg') }}') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 60px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #4CAF50 !important; /* Green color */
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            color: #000 !important; /* Black color */
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
        .about-content {
            padding: 60px 0;
        }
        .about-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .section-title {
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }
        .section-content {
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
     @include('admin.mobile_nav') 
    @include('admin.navbar') 

    <main>
        <!-- Hero Section -->
        <section class="custom-slider-bar">
            <div class="container">
                <h1>{{ $settings->page_title ?? 'À propos de Sogbina' }}</h1>
                <p>{{ $settings->header_subtitle ?? 'La route des vacances, pas des dépenses' }}</p>
            </div>
        </section>
        <!-- About Content -->
        <section class="about-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1>{{ $settings->Slug ?? 'Sogbina' }}</h1>
                        <p class="section-content">{{ $settings->about_text ?? 'Bienvenue sur la page À propos ! Ici vous trouverez des informations sur nous.' }}</p>
                    </div>
                    <div class="col-lg-6">
                        @if ($settings->header_image)
                            <img src="{{ asset('images/' . $settings->header_image) }}" alt="À propos" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
