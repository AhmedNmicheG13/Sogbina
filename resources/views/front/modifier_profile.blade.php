<!-- resources/views/front/modifier_profile.blade.php -->

@extends('front.user_dashboard')

@section('content')
<div class="container" style="font-family: 'Outfit', sans-serif;">
    <h1>{{ __('Modifier le Profil') }}</h1>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Photo de Profil -->
        <div class="row mb-3">
            <label for="profile_picture" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-image-fill"></i> {{ __('Photo de Profil') }}
            </label>
            <div class="col-md-6 position-relative">
                @if(Auth::user()->profile_picture)
                <div class="mb-2 position-relative">
                    <img src="{{ asset('images/' . Auth::user()->profile_picture) }}" alt="Photo de Profil" class="img-thumbnail" style="max-height: 150px;">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="confirmDeletion('{{ route('profile.deletePicture') }}')" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                @endif
                <input id="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture">
                @error('profile_picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Nom -->
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-person-fill"></i> {{ __('Nom') }}
            </label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Adresse E-mail -->
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-envelope-fill"></i> {{ __('Adresse E-mail') }}
            </label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Téléphone -->
        <div class="row mb-3">
            <label for="phone" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-telephone-fill"></i> {{ __('Téléphone') }}
            </label>
            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', Auth::user()->phone) }}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Pays -->
        <div class="row mb-3">
            <label for="country" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-geo-alt-fill"></i> {{ __('Pays') }}
            </label>
            <div class="col-md-6">
                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country', Auth::user()->country) }}" required>
                @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Ville -->
        <div class="row mb-3">
            <label for="city" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-building"></i> {{ __('Ville') }}
            </label>
            <div class="col-md-6">
                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', Auth::user()->city) }}" required>
                @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Code Postal -->
        <div class="row mb-3">
            <label for="postal_code" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-mailbox"></i> {{ __('Code Postal') }}
            </label>
            <div class="col-md-6">
                <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code', Auth::user()->postal_code) }}" required>
                @error('postal_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Marque de Voiture -->
        <div class="row mb-3">
            <label for="car_brand" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-car-front-fill"></i> {{ __('Marque de Voiture') }}
            </label>
            <div class="col-md-6">
                <input id="car_brand" type="text" class="form-control @error('car_brand') is-invalid @enderror" name="car_brand" value="{{ old('car_brand', Auth::user()->car_brand) }}" required>
                @error('car_brand')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Numéro de Série de la Voiture -->
        <div class="row mb-3">
            <label for="car_serial" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-123"></i> {{ __('Numéro de Série de la Voiture') }}
            </label>
            <div class="col-md-6">
                <input id="car_serial" type="text" class="form-control @error('car_serial') is-invalid @enderror" name="car_serial" value="{{ old('car_serial', Auth::user()->car_serial) }}" required>
                @error('car_serial')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Numéro de la Carte Nationale -->
        <div class="row mb-3">
            <label for="national_id" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-heading"></i> {{ __('Numéro de la Carte Nationale') }}
            </label>
            <div class="col-md-6">
                <input id="national_id" type="text" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id', Auth::user()->national_id) }}" required>
                @error('national_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Carte Nationale Recto -->
        <div class="row mb-3">
            <label for="national_id_recto" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-image"></i> {{ __('Carte Nationale Recto') }}
            </label>
            <div class="col-md-6">
                @if(Auth::user()->national_id_recto)
                <div class="mb-2 position-relative">
                    <img src="{{ asset('national_ids/' . Auth::user()->national_id_recto) }}" alt="Carte Nationale Recto" class="img-thumbnail" style="max-height: 150px;">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="confirmDeletion('{{ route('profile.deleteNationalIdRecto') }}')" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                @endif
                <input id="national_id_recto" type="file" class="form-control @error('national_id_recto') is-invalid @enderror" name="national_id_recto">
                @error('national_id_recto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Carte Nationale Verso -->
        <div class="row mb-3">
            <label for="national_id_verso" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-card-image"></i> {{ __('Carte Nationale Verso') }}
            </label>
            <div class="col-md-6">
                @if(Auth::user()->national_id_verso)
                <div class="mb-2 position-relative">
                    <img src="{{ asset('national_ids/' . Auth::user()->national_id_verso) }}" alt="Carte Nationale Verso" class="img-thumbnail" style="max-height: 150px;">
                    <a href="#" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" onclick="confirmDeletion('{{ route('profile.deleteNationalIdVerso') }}')" style="text-decoration:none; color:white;">
                        &times;
                    </a>
                </div>
                @endif
                <input id="national_id_verso" type="file" class="form-control @error('national_id_verso') is-invalid @enderror" name="national_id_verso">
                @error('national_id_verso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- RIB Bancaire -->
        <div class="row mb-3">
            <label for="rib_bancaire" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-credit-card-2-front-fill"></i> {{ __('RIB Bancaire') }}
            </label>
            <div class="col-md-6">
                <input id="rib_bancaire" type="text" class="form-control @error('rib_bancaire') is-invalid @enderror" name="rib_bancaire" value="{{ old('rib_bancaire', Auth::user()->rib_bancaire) }}" required>
                @error('rib_bancaire')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Mot de Passe -->
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-lock-fill"></i> {{ __('Mot de Passe') }}
            </label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Confirmer le Mot de Passe -->
        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">
                <i class="bi bi-lock-fill"></i> {{ __('Confirmer le Mot de Passe') }}
            </label>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Mettre à Jour le Profil') }}
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
@endsection
