@extends('front.user_dashboard')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Liste des Trajets</h1>
    @if ($trajets->isEmpty())
        <div class="alert alert-info" role="alert">
            Aucun trajet trouvé.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Départ</th>
                        <th scope="col">Arrivée</th>
                        <th scope="col">Date</th>
                        <th scope="col">Heure de départ</th>
                        <th scope="col">Heure d'arrivée</th>
                        <th scope="col">Places</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trajets as $trajet)
                        <tr>
                            <td data-label="Départ">{{ $trajet->depart }}</td>
                            <td data-label="Arrivée">{{ $trajet->arrivee }}</td>
                            <td data-label="Date">{{ $trajet->date }}</td>
                            <td data-label="Heure de départ">{{ $trajet->heure_depart }}</td>
                            <td data-label="Heure d'arrivée">{{ $trajet->heure_arrivee }}</td>
                            <td data-label="Places">{{ $trajet->places }}</td>
                            <td data-label="Prix">{{ $trajet->prix }}</td>
                            <td data-label="Description">{{ $trajet->description }}</td>
                            <td data-label="Actions">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('trajet.edit', $trajet->id) }}" class="btn btn-warning btn-sm mr-1">Modifier</a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $trajet->id }})">Supprimer</button>
                                    <form id="delete-form-{{ $trajet->id }}" action="{{ route('trajet.destroy', $trajet->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@if (session('success'))
    <div class="alert alert-success" role="alert" id="success-alert">
        {{ session('success') }}
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
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

        function setupAutocomplete(id) {
            $(id).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '{{ route("search.index") }}',
                        type: 'GET',
                        data: {
                            query: request.term
                        },
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.name
                                };
                            }));
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $(this).val(ui.item.value);
                    return false;
                }
            }).data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li>")
                    .append("<div class='suggestion-item'><span class='city-name'>" + item.label + "</span><span class='icon'><i class='fa fa-chevron-right'></i></span></div>")
                    .appendTo(ul);
            };
        }

        setupAutocomplete("#depart");
        setupAutocomplete("#arrivee");
    });

    function confirmDelete(id) {
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
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

<style>
    .suggestion-item {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .city-name {
        font-weight: bold;
        color: #555;
    }

    .icon {
        color: #555;
    }

    .ui-autocomplete {
        z-index: 1050;
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #eee;
    }

    .ui-autocomplete .ui-menu-item {
        padding: 10px;
        font-size: 16px;
        display: flex;
        justify-content: space-between;
        color: #555;
    }

    .ui-autocomplete .ui-state-active {
        background-color: #28a745;
        color: white;
    }

    @media (max-width: 767px) {
        table thead {
            display: none !important;
        }

        table, table tbody, table tr, table td {
            display: block !important;
            width: 100% !important;
            text-align: left !important;
            margin-bottom: 10px !important;
        }

        table tr {
            margin-bottom: 15px !important;
        }

        table td {
            text-align: left !important;
            padding: 10px !important;
            border: 1px solid #ddd !important;
            position: relative !important;
            padding-left: 50% !important;
        }

        table td::before {
            content: attr(data-label) !important;
            position: absolute !important;
            left: 10px !important;
            top: 10px !important;
            font-weight: bold !important;
            text-align: left !important;
            white-space: nowrap !important;
        }

        .d-flex.justify-content-center {
            justify-content: center !important;
            gap: 5px !important;
        }
    }
</style>
@endsection
