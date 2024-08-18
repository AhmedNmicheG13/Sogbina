@extends('admin.dashboard')

@section('content')
<div class="container" style="font-family: 'Outfit', sans-serif;">
    <h1>{{ __('Edit Home Page Settings') }}</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('homepage-settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Header Title -->
        <div class="row mb-3">
            <label for="header_title" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-fonts"></i> {{ __('Header Title') }}
            </label>
            <div class="col-md-6">
                <input id="header_title" type="text" class="form-control @error('header_title') is-invalid @enderror" name="header_title" value="{{ old('header_title', $settings->header_title ?? '') }}">
                @error('header_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Header Image -->
        <div class="row mb-3">
            <label for="header_image" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-image"></i> {{ __('Header Image') }}
            </label>
            <div class="col-md-6 position-relative">
                @if(isset($settings->header_image))
                <div class="mb-2 position-relative">
                    <img src="{{ asset('images/' . $settings->header_image) }}" alt="Header Image" class="img-thumbnail" width="150">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="event.preventDefault(); document.getElementById('delete-form-header_image').submit();" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                @endif
                <input id="header_image" type="file" class="form-control @error('header_image') is-invalid @enderror" name="header_image">
                @error('header_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Site Text Color -->
        <div class="row mb-3">
            <label for="site_text_color" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette-fill"></i> {{ __('Header Text Color') }}
            </label>
            <div class="col-md-6">
                <input id="site_text_color" type="color" class="form-control color-picker @error('site_text_color') is-invalid @enderror" name="site_text_color" value="{{ old('site_text_color', $settings->site_text_color ?? '#fff') }}">
                @error('site_text_color')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Header Subtitle -->
        <div class="row mb-3">
            <label for="header_subtitle" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-subtitles"></i> {{ __('Header Subtitle') }}
            </label>
            <div class="col-md-6">
                <input id="header_subtitle" type="text" class="form-control @error('header_subtitle') is-invalid @enderror" name="header_subtitle" value="{{ old('header_subtitle', $settings->header_subtitle ?? '') }}">
                @error('header_subtitle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Logo -->
        <div class="row mb-3">
            <label for="logo" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-image"></i> {{ __('Logo') }}
            </label>
            <div class="col-md-6 position-relative">
                @if(isset($settings->logo))
                <div class="mb-2 position-relative">
                    <img src="{{ asset('images/' . $settings->logo) }}" alt="Logo" class="img-thumbnail" width="150">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="event.preventDefault(); document.getElementById('delete-form-logo').submit();" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                @endif
                <input id="logo" type="file" class="form-control @error('logo') is-invalid @enderror" name="logo">
                @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Favicon -->
        <div class="row mb-3">
            <label for="favicon" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-image"></i> {{ __('Favicon') }}
            </label>
            <div class="col-md-6 position-relative">
                @if(isset($settings->favicon))
                <div class="mb-2 position-relative">
                    <img src="{{ asset('images/' . $settings->favicon) }}" alt="Favicon" class="img-thumbnail" width="32" height="32">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="event.preventDefault(); document.getElementById('delete-form-favicon').submit();" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                @endif
                <input id="favicon" type="file" class="form-control @error('favicon') is-invalid @enderror" name="favicon">
                @error('favicon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Button Color -->
        <div class="row mb-3">
            <label for="buton_color" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette-fill"></i> {{ __('navbar secondry') }}
            </label>
            <div class="col-md-6">
                <input id="buton_color" type="color" class="form-control color-picker @error('buton_color') is-invalid @enderror" name="buton_color" value="{{ old('buton_color', $settings->buton_color ?? '#000000') }}">
                @error('buton_color')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> 

        <!-- Menu Text Color -->
        <div class="row mb-3">
            <label for="text_color_menu" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette-fill"></i> {{ __('Text Color Menu') }}
            </label>
            <div class="col-md-6">
                <input id="text_color_menu" type="color" class="form-control color-picker @error('text_color_menu') is-invalid @enderror" name="text_color_menu" value="{{ old('text_color_menu', $settings->text_color_menu ?? '#000000') }}">
                @error('text_color_menu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Navbar Color -->
        <div class="row mb-3">
            <label for="header_color_large" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-palette"></i> {{ __('Navbar Color') }}
            </label>
            <div class="col-md-6">
                <input id="header_color_large" type="color" class="form-control color-picker @error('header_color_large') is-invalid @enderror" name="header_color_large" value="{{ old('header_color_large', $settings->header_color_large ?? '#000000') }}">
                @error('header_color_large')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Page Title for About Page -->
        <div class="row mb-3">
            <label for="page_title" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-earmark-text"></i> {{ __('Page Title for About Page') }}
            </label>
            <div class="col-md-6">
                <input id="page_title" type="text" class="form-control @error('page_title') is-invalid @enderror" name="page_title" value="{{ old('page_title', $settings->page_title ?? '') }}">
                @error('page_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- About Text -->
        <div class="row mb-3">
            <label for="about_text" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-text"></i> {{ __('About Page Content') }}
            </label>
            <div class="col-md-6">
                <textarea id="about_text" class="form-control @error('about_text') is-invalid @enderror" name="about_text" rows="5">{{ old('about_text', $settings->about_text ?? '') }}</textarea>
                @error('about_text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- SEO Title -->
        <div class="row mb-3">
            <label for="seo_title" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-file-earmark-font"></i> {{ __('SEO Title') }}
            </label>
            <div class="col-md-6">
                <input id="seo_title" type="text" class="form-control @error('seo_title') is-invalid @enderror" name="seo_title" value="{{ old('seo_title', $settings->seo_title ?? '') }}">
                @error('seo_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- SEO Description -->
        <div class="row mb-3">
            <label for="seo_description" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-text"></i> {{ __('SEO Description') }}
            </label>
            <div class="col-md-6">
                <input id="seo_description" type="text" class="form-control @error('seo_description') is-invalid @enderror" name="seo_description" value="{{ old('seo_description', $settings->seo_description ?? '') }}">
                @error('seo_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Slug -->
        <div class="row mb-3">
            <label for="slug" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-link-45deg"></i> {{ __('Slug') }}
            </label>
            <div class="col-md-6">
                <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $settings->slug ?? '') }}">
                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Settings') }}
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
<form id="delete-form-header_image" action="{{ route('homepage-settings.deleteImage', ['type' => 'header_image']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<form id="delete-form-logo" action="{{ route('homepage-settings.deleteImage', ['type' => 'logo']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<form id="delete-form-favicon" action="{{ route('homepage-settings.deleteImage', ['type' => 'favicon']) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>
@endsection
