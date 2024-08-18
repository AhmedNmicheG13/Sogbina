@extends('front.dashboard')

@section('content')
@if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
@endif

<div class="form-container">
    <h1>Éditer un Trajet</h1>
    <form id="editForm" action="{{ route('trajet.update', $trajet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="depart">Départ</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="map-pin"></i></span>
                </div>
                <select id="depart" name="depart" class="form-control" required>
                    @foreach ($villes as $ville)
                        <option value="{{ $ville->name }}" {{ $trajet->depart == $ville->name ? 'selected' : '' }}>{{ $ville->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="arrivee">Arrivée</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="map-pin"></i></span>
                </div>
                <select id="arrivee" name="arrivee" class="form-control" required>
                    @foreach ($villes as $ville)
                        <option value="{{ $ville->name }}" {{ $trajet->arrivee == $ville->name ? 'selected' : '' }}>{{ $ville->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="calendar"></i></span>
                </div>
                <input type="text" id="date" name="date" class="form-control" value="{{ $trajet->date }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="heure">Heure</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="clock"></i></span>
                </div>
                <input type="text" id="heure" name="heure" class="form-control" value="{{ $trajet->heure }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="places">Nombre de Places</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="users"></i></span>
                </div>
                <input type="number" id="places" name="places" class="form-control" value="{{ $trajet->places }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="dollar-sign"></i></span>
                </div>
                <input type="text" id="prix" name="prix" class="form-control" value="{{ $trajet->prix }}" required>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i data-feather="file-text"></i></span>
                </div>
                <textarea id="description" name="description" class="form-control" rows="4">{{ $trajet->description }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Éditer</button>
        </div>
    </form>
    <div class="form-group">
        <button class="btn btn-danger btn-block" id="deleteButton">Supprimer</button>
        <form id="deleteForm" action="{{ route('trajet.destroy', $trajet->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        $("#date").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        feather.replace();

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        $('#deleteButton').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Êtes-vous sûr de vouloir supprimer ce trajet ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteForm').submit();
                }
            });
        });
    });
</script>
@endsection
