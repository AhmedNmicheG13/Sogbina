@extends('admin.dashboard')

@section('content')
<div class="container">
    <h2>Modifier les Informations de l'Administrateur</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($admin)
        <!-- Formulaire de changement d'email -->
        <form action="{{ route('admin.updateEmail') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_email">Adresse Email Actuelle</label>
                <input type="email" class="form-control" id="current_email" name="current_email" value="{{ old('current_email', $admin->email) }}" readonly>
            </div>

            <div class="form-group">
                <label for="new_email">Nouvelle Adresse Email</label>
                <input type="email" class="form-control" id="new_email" name="new_email" value="{{ old('new_email') }}" required>
                @if ($errors->has('new_email'))
                    <span class="text-danger">{{ $errors->first('new_email') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Modifier l'Email</button>
        </form>

        <!-- Formulaire de changement de mot de passe -->
        <form action="{{ route('admin.updatePassword') }}" method="POST" style="margin-top: 30px;">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password">Mot de Passe Actuel</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
                @if ($errors->has('current_password'))
                    <span class="text-danger">{{ $errors->first('current_password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="new_password">Nouveau Mot de Passe</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
                @if ($errors->has('new_password'))
                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Confirmer le Nouveau Mot de Passe</label>
                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                @if ($errors->has('new_password_confirmation'))
                    <span class="text-danger">{{ $errors->first('new_password_confirmation') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Modifier le Mot de Passe</button>
        </form>
    @else
        <div class="alert alert-danger">L'utilisateur n'a pas été trouvé.</div>
    @endif
</div>
@endsection
