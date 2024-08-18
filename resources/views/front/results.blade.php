<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/antd/4.16.13/antd.min.css">
       <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        body {
             font-family: 'Outfit', sans-serif !important;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header, .filters, .results {
            margin-bottom: 20px;
        }
        .header {
            display: none; /* Hide the header section */
        }
        .content {
            display: flex;
            flex-direction: column;
        }
        .filters {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .filters-title {
            font-size: 20px;
            font-weight: bold;
            color: #fff;
            background-color: #333;
            padding: 10px;
            cursor: pointer;
            text-align: center;
            border-radius: 10px;
        }
        .filters-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .filters-buttons button {
            flex: 1;
            border: 1px solid #333;
            background-color: transparent;
            color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        .filters-buttons button:hover, .filters-buttons button.active {
            background-color: #52c41a;
            color: #fff;
        }
        .results {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-grow: 1;
            background-color: #f8f8f8; /* Light grey background for results section */
            padding: 20px;
            border-radius: 10px;
        }
        .result-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 15px;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid darkgray;
            position: relative;
            max-height: 480px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .result-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .driver-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
            margin-bottom: 20px;
            width: calc(100% + 30px);
            margin-left: -15px;
            padding-left: 15px;
            padding-right: 15px;
        }
        .driver-image-wrapper {
            position: relative;
            border-radius: 50%;
        }
        .driver-info img, .default-profile {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            font-size: 24px;
            color: #333;
            cursor: pointer;
            border: 3px solid;
        }
        .badge-inside {
            position: absolute;
            bottom: 0;
            right: 0;
            border-radius: 50%;
            padding: 2px 5px;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .badge-inside i {
            color: #52c41a;
        }
        .badge-inside.inactive i {
            color: #ccc;
        }
        .driver-info .name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 5px;
        }
        .trip-details {
            position: relative;
            font-size: 18px;
        }
        .trip-details .city-time {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .trip-details .city-time div {
            flex: 1;
            text-align: center;
            position: relative;
        }
        .trip-details .city-time .line {
            flex: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        .trip-details .city-time .line::before, .trip-details .city-time .line::after {
            content: '';
            display: block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        .trip-details .city-time .line::before {
            background: transparent;
            border: 2px solid #52c41a;
        }
        .trip-details .city-time .line::after {
            background: #52c41a;
            border: 2px solid #52c41a;
        }
        .trip-details .city-time .line span {
            display: block;
            width: 40px;
            height: 2px;
            background: #52c41a;
            margin: 0 5px;
        }
        .trip-details .date, .trip-details .places {
            text-align: center;
            display: block;
            margin-top: 10px;
        }
        .passenger-icons {
            text-align: center;
            margin-top: 5px;
            font-size: 24px;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .passenger-icons i {
            margin: 0 4px;
            color: #52c41a;
        }
        .duration-container {
            background-color: rgba(0, 0, 0, 0.1);
            color: darkgray;
            padding: 3px 6px;
            border-radius: 5px;
            text-align: center;
            border: 1px solid #52c41a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        .duration-container .duration-h {
            color: darkgray;
            font-weight: bold;
        }
        .duration-container .duration-icon {
            margin-right: 5px;
            font-size: 16px;
            color: darkgray;
        }
        .price {
            font-size: 24px;
            font-weight: bold;
            color: #52c41a;
            text-align: right;
            margin-bottom: 10px;
        }
        .btn-reserver {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
            max-width: 150px;
            align-self: flex-end;
        }
        .btn-reserver:hover {
            background-color: #555;
        }
        .btn-status {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: default;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
        }
        .btn-status.active {
            background-color: #28a745;
        }
        .btn-status.inactive {
            background-color: #dc3545;
        }
        @media (min-width: 992px) {
            .content {
                flex-direction: row;
            }
            .filters {
                flex-direction: column;
                width: 250px;
            }
            .results {
                flex-grow: 1;
                margin-left: 20px;
            }
            .filters-buttons {
                flex-direction: column;
                gap: 10px;
                margin-top: 20px;
            }
            .result-card {
                max-height: 500px;
            }
        }
        @media (max-width: 768px) {
            .filters-buttons {
                flex-direction: row;
                gap: 10px;
            }
            .trip-details .city-time {
                flex-direction: column;
            }
            .trip-details .city-time .line {
                flex-direction: column;
            }
            .trip-details .city-time .line span {
                width: 2px;
                height: 50px;
                margin: 5px 0;
            }
            .result-card {
                max-height: 800px  !important;
            }
            .btn-reserver {
                width: 100%;
            }
            .duration-container {
                width: auto;
                padding: 5px 10px;
                font-size: 14px;
            }
            .btn-status {
                font-size: 12px;
                padding: 3px 8px;
            }
            .filters-title {
                display: block;
                cursor: pointer;
                background-color: #333;
                color: #fff;
                padding: 10px;
                border-radius: 5px;
                text-align: center;
                font-size: 18px;
            }
            .filters-buttons {
                display: none;
                flex-direction: column;
                gap: 10px;
                background-color: #f0f2f5;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .filters-buttons.show {
                display: flex;
            }
        }
        .modal-dialog {
            max-width: 400px;
            margin: 1.75rem auto;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header, .modal-body, .modal-footer {
            text-align: center;
        }
        .badge-level {
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 20px;
            margin-top: 10px;
            color: #fff;
        }
        .badge-debutant {
            background-color: #6c757d;
        }
        .badge-amateur {
            background-color: #17a2b8;
        }
        .badge-proficient {
            background-color: #28a745;
        }
        .badge-professional {
            background-color: #ffc107;
        }
        .driver-info-modal {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .driver-info-modal img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid;
        }
        .driver-info-modal .name {
            font-size: 20px;
            font-weight: bold;
        }
        .info-icons {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            justify-content: center;
            font-size: 18px;
        }
        .info-icons i {
            margin-right: 5px;
            color: darkgray;
        }
        .info-icons .verified {
            color: darkgray;
        }
        .info-icons .not-verified {
            color: #dc3545;
        }

        .search-container {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            margin: 20px 0 20px 0; /* Add space above and below search container */
            position: relative;
            z-index: 3;
        }
        .search-field {
            display: flex;
            align-items: center;
            background-color: #fff;
            border: 1px solid #fff;
            border-radius: 10px;
            padding: 10px;
            margin-right: 5px;
            flex: 1;
            position: relative;
            font-family: 'Montserrat', sans-serif;
        }
        .search-field:not(:first-child)::before {
            content: "";
            display: block;
            width: 1px;
            height: 30px;
            background-color: #dcdcdc;
            margin: 0 10px;
            position: absolute;
            left: -10px;
        }
        .search-field input {
            border: none;
            background: none;
            font-size: 16px;
            margin-left: 10px;
            outline: none;
            width: 100%;
            font-family: 'Montserrat', sans-serif;
        }
        .search-field .icon {
            color: #000;
        }
        .search-button {
            background-color: #28a745;
            border: none;
            padding: 10px 20px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s ease;
            flex-shrink: 0;
            width: auto;
            font-family: 'Montserrat', sans-serif;
        }
        .search-button:hover {
            background-color: #218838;
        }
        .ui-datepicker {
            font-size: 16px;
            background-color: #fff;
        }
        .ui-datepicker-calendar .ui-state-hover {
            background-color: #28a745 !important;
        }
        .passenger-popup {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            font-family: 'Montserrat', sans-serif;
        }
        .passenger-popup button {
            background-color: #28a745;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 30px;
            height: 30px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }
        .passenger-popup button:focus {
            outline: none;
        }
        .passenger-popup .passenger-count {
            font-size: 16px;
            margin: 0 10px;
        }
        hr.divider-horizontal {
            display: none;
            border: 0;
            border-top: 1px solid #dcdcdc;
            margin: 10px 0;
        }
        .autocomplete-popup {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            font-family: 'Montserrat', sans-serif;
            max-height: 200px;
            overflow-y: auto;
        }
        .autocomplete-popup .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }
        .autocomplete-popup .suggestion-item:hover {
            background-color: #f0f0f0;
        }
        @media (max-width: 768px) {
            .search-container {
                display: none;
            }
            .filters-buttons {
                flex-direction: row;
                gap: 10px;
            }
            .trip-details .city-time {
                flex-direction: column;
            }
            .trip-details .city-time .line {
                flex-direction: column;
            }
            .trip-details .city-time .line span {
                width: 2px;
                height: 50px;
                margin: 5px 0;
            }
            .result-card {
                max-height: 800px  !important;
            }
            .btn-reserver {
                width: 100%;
            }
            .duration-container {
                width: auto;
                padding: 5px 10px;
                font-size: 14px;
            }
            .btn-status {
                font-size: 12px;
                padding: 3px 8px;
            }
            .filters-title {
                display: block;
                cursor: pointer;
                background-color: #333;
                color: #fff;
                padding: 10px;
                border-radius: 5px;
                text-align: center;
                font-size: 18px;
            }
            .filters-buttons {
                display: none;
                flex-direction: column;
                gap: 10px;
                background-color: #f0f2f5;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
            .filters-buttons.show {
                display: flex;
            }
        }
        @media (min-width: 769px) {
            hr.divider-horizontal {
                display: none;
            }
            .search-field:not(:first-child::before {
                display: block;
            }
        }
        .ui-autocomplete {
            z-index: 1050 !important;
            max-height: 200px !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
            border: 1px solid #ddd !important;
            border-radius: 5px !important;
            background-color: #eee !important;
        }
        .ui-autocomplete .ui-menu-item {
            padding: 10px !important;
            font-size: 16px !important;
            display: flex !important;
            justify-content: space-between !important;
            color: #555 !important;
        }
        .ui-autocomplete .ui-state-active {
            background-color: #28a745 !important;
            color: white !éè¦;
        }
        .ui-autocomplete .suggestion-item {
            display: flex !éè¦;
            justify-content: space-between !éè¦;
            width: 100% !éè¦;
        }
        .ui-autocomplete .city-name {
            font-weight: bold !éè¦;
            color: #555 !éè¦;
        }
        .ui-autocomplete .icon {
            color: #555 !éè¦;
        }
        .ui-autocomplete .suggestion-item .fa-chevron-right {
            margin-left: auto;
            color: #28a745;
        }
    </style>
</head>
<body>
    
     @include('front.menu_mobile') 
     @include('front.menu_nav') 
     
    
    <div class="container">
        <!-- Search Form -->
        <div class="search-container">
            <div class="search-field" id="depart-field-container">
                <span class="icon"><i data-feather="map-pin"></i></span>
                <input type="text" id="depart-field" placeholder="Départ">
                <div class="autocomplete-popup" id="depart-popup"></div>
            </div>
            <div class="search-field" id="arrive-field-container">
                <span class="icon"><i data-feather="map-pin"></i></span>
                <input type="text" id="arrive-field" placeholder="Destination">
                <div class="autocomplete-popup" id="arrive-popup"></div>
            </div>
            <div class="search-field">
                <span class="icon"><i data-feather="calendar"></i></span>
                <input type="text" id="date-field" placeholder="Aujourd'hui">
            </div>
            <div class="search-field">
                <span class="icon"><i data-feather="user"></i></span>
                <input type="text" id="passenger-field" placeholder="1 passager" readonly>
                <div class="passenger-popup">
                    <button id="decrease-passenger">-</button>
                    <span class="passenger-count" id="passenger-count">1</span>
                    <button id="increase-passenger">+</button>
                </div>
            </div>
            <button class="search-button" style="flex: 1;" id="search-button">Rechercher</button>
        </div>
        
        <div class="content">
            <div class="filters">
                <div class="filters-title">Filter</div>
                <div class="filters-buttons">
                    <button id="filter-depart" class="custom-filter-btn">Départ le plus tôt</button>
                    <button id="filter-prix" class="custom-filter-btn">Prix le plus bas</button>
                    <button id="filter-duree" class="custom-filter-btn">Trajet le plus court</button>
                </div>
            </div>
        
            <div class="results" id="results-container">
                @if ($trajets->isEmpty())
                    <div class="ant-alert ant-alert-info" role="alert">
                        Aucun trajet trouvé pour vos critères de recherche.
                    </div>
                @else
                    @foreach ($trajets as $trajet)
                        @php
                            $level = '';
                            $tripsCount = $trajet->user->trips_count;
                            if ($tripsCount <= 3) {
                                $level = 'badge-debutant';
                                $levelText = 'DEBUTANT';
                            } elseif ($tripsCount <= 10) {
                                $level = 'badge-amateur';
                                $levelText = 'AMATEUR';
                            } elseif ($tripsCount <= 20) {
                                $level = 'badge-proficient';
                                $levelText = 'PROFICIENT';
                            } else {
                                $level = 'badge-professional';
                                $levelText = 'PROFESSIONNEL';
                            }

                            $profileCompletion = 0;
                            if ($trajet->user->phone) $profileCompletion++;
                            if ($trajet->user->email) $profileCompletion++;
                            if ($trajet->user->national_id_recto && $trajet->user->national_id_verso) $profileCompletion++;
                            $borderColor = 'gray';
                            $badgeColor = 'badge-debutant';

                            if ($profileCompletion === 3) {
                                $borderColor = 'green';
                                $badgeColor = 'badge-professional';
                            } elseif ($profileCompletion === 2) {
                                $borderColor = 'orange';
                                $badgeColor = 'badge-amateur';
                            } elseif ($profileCompletion === 1) {
                                $borderColor = 'gray';
                                $badgeColor = 'badge-debutant';
                            }
                        @endphp
                        <div class="result-card">
                            <div class="driver-info">
                                <div>
                                    <div class="name">
                                        @php
                                            $nameParts = explode(' ', $trajet->user->name);
                                            $firstNameInitial = $nameParts[0][0];
                                            $lastName = $nameParts[count($nameParts) - 1];
                                        @endphp
                                        {{ $firstNameInitial }}. {{ $lastName }}
                                    </div>
                                    @if($trajet->user->national_id_recto || $trajet->user->national_id_verso)
                                        <button class="btn-status active">Compte vérifié</button>
                                    @else
                                        <button class="btn-status inactive">Compte non vérifié</button>
                                    @endif
                                </div>
                                <div class="driver-image-wrapper" style="border-color: {{ $borderColor }};">
                                    @if($trajet->user->profile_picture)
                                        <img src="{{ asset('images/' . $trajet->user->profile_picture) }}" alt="Photo du conducteur" class="driver-image" data-toggle="modal" data-target="#driverInfoModal{{ $trajet->user->id }}">
                                    @else
                                        <div class="default-profile driver-image" data-toggle="modal" data-target="#driverInfoModal{{ $trajet->user->id }}"><i class="fas fa-user"></i></div>
                                    @endif
                                    <div class="badge-inside {{ $trajet->user->national_id_recto && $trajet->user->national_id_verso ? '' : 'inactive' }}"><i class="fas fa-check-circle"></i></div>
                                </div>
                            </div>
                            <div class="trip-details">
                                <div class="city-time">
                                    <div>
                                        <strong>{{ $trajet->depart }}</strong>
                                        <div class="time">{{ $trajet->heure_depart }}</div>
                                    </div>
                                    <div class="line">
                                        <span></span>
                                    </div>
                                    <div>
                                        <strong>{{ $trajet->arrivee }}</strong>
                                        <div class="time">{{ $trajet->heure_arrivee }}</div>
                                    </div>
                                </div>
                                <div class="duration-container">
                                    <i class="fas fa-clock duration-icon"></i>
                                    {{ gmdate('H', strtotime($trajet->heure_arrivee) - strtotime($trajet->heure_depart)) }}<span class="duration-h">h</span>
                                    {{ gmdate('i', strtotime($trajet->heure_arrivee) - strtotime($trajet->heure_depart)) }} min
                                </div>
                                <span class="date">{{ \Carbon\Carbon::parse($trajet->date)->translatedFormat('d F Y') }}</span>
                                <span class="places">{{ $trajet->places }} places disponibles</span>
                                <span class="passenger-icons" data-places="{{ $trajet->places }}"></span>
                            </div>
                            <div class="price">{{ $trajet->prix }} €</div>
                            <button class="btn-reserver">Réserver</button>
                        </div>

                        <!-- Driver Info Modal -->
                        <div class="modal fade" id="driverInfoModal{{ $trajet->user->id }}" tabindex="-1" role="dialog" aria-labelledby="driverInfoModalLabel{{ $trajet->user->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="driver-info-modal">
                                            <img src="{{ asset('images/' . $trajet->user->profile_picture) }}" alt="Photo du conducteur" style="border-color: {{ $borderColor }};">
                                            <div class="name">{{ $trajet->user->name }}</div>
                                            <div class="badge {{ $badgeColor }}">{{ $levelText }}</div>
                                        </div>
                                        <div class="info-icons">
                                            <i class="fas fa-phone"></i> <span class="{{ $trajet->user->phone ? 'verified' : 'not-verified' }}">{{ $trajet->user->phone ? 'Numéro de téléphone vérifié' : 'Numéro de téléphone non vérifié' }}</span>
                                        </div>
                                        <div class="info-icons">
                                            <i class="fas fa-envelope"></i> <span class="{{ $trajet->user->email ? 'verified' : 'not-verified' }}">{{ $trajet->user->email ? 'Adresse e-mail vérifiée' : 'Adresse e-mail non vérifiée' }}</span>
                                        </div>
                                        <div class="info-icons">
                                            <i class="fas fa-car"></i> <span>Marque de voiture: {{ $trajet->user->car_brand }}</span>
                                        </div>
                                        <div class="info-icons">
                                            <i class="fas fa-id-card"></i> 
                                            @if($trajet->user->national_id_recto && $trajet->user->national_id_verso)
                                                <span class="verified">Pièce d'identité vérifiée</span>
                                            @else
                                                <span class="not-verified">Pièce d'identité non vérifiée</span>
                                            @endif
                                        </div>
                                        <div class="info-icons">
                                            <i class="fas fa-flag"></i> <span>Pays: {{ $trajet->user->country }}</span>
                                        </div>
                                        <div class="info-icons">
                                            <i class="fas fa-city"></i> <span>Ville: {{ $trajet->user->city }}</span>
                                        </div>
                                        <div class="info-icons">
                                            <i class="fas fa-map-pin"></i> <span>Code postal: {{ $trajet->user->postal_code }}</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/17.0.2/umd/react.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react-dom/17.0.2/umd/react-dom.production.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/antd/4.16.13/antd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#filter-depart').on('click', function(){
                sortResults('depart');
                setActiveButton($(this));
            });
            $('#filter-prix').on('click', function(){
                sortResults('prix');
                setActiveButton($(this));
            });
            $('#filter-duree').on('click', function(){
                sortResults('duree');
                setActiveButton($(this));
            });

            function sortResults(criteria) {
                let $cards = $('#results-container .result-card');
                $cards.sort(function(a, b) {
                    let aValue, bValue;
                    if (criteria === 'depart') {
                        aValue = $(a).find('.city-time .time').first().text();
                        bValue = $(b).find('.city-time .time').first().text();
                    } else if (criteria === 'prix') {
                        aValue = parseFloat($(a).find('.price').text().replace('€', ''));
                        bValue = parseFloat($(b).find('.price').text().replace('€', ''));
                    } else if (criteria === 'duree') {
                        aValue = parseInt($(a).find('.duration-container .duration-h').text()) * 60 + parseInt($(a).find('.duration-container .duration-h').next().text().replace(' min', ''));
                        bValue = parseInt($(b).find('.duration-container .duration-h').text()) * 60 + parseInt($(b).find('.duration-container .duration-h').next().text().replace(' min', ''));
                    }
                    return aValue > bValue ? 1 : -1;
                });
                $('#results-container').html($cards);
            }

            function setActiveButton(button) {
                $('.custom-filter-btn').removeClass('active');
                button.addClass('active');
            }

            // Toggle filter buttons on mobile
            $('.filters-title').on('click', function() {
                $('.filters-buttons').toggleClass('show');
            });

            // Add passenger icons based on available places
            $('.passenger-icons').each(function() {
                let places = $(this).data('places');
                for (let i = 0; i < places; i++) {
                    $(this).append('<i class="fas fa-walking"></i>');
                }
            });

            // Show/hide avis and probleme forms
            $('[id^=btn-avis-]').on('click', function() {
                let id = $(this).attr('id').replace('btn-avis-', '');
                $('#avis-container-' + id).toggle();
                $('#probleme-container-' + id).hide();
            });

            $('[id^=btn-probleme-]').on('click', function() {
                let id = $(this).attr('id').replace('btn-probleme-', '');
                $('#probleme-container-' + id).toggle();
                $('#avis-container-' + id).hide();
            });
        });

        $(function() {
            $("#date-field").datepicker({
                minDate: 0,
                dateFormat: "yy-mm-dd",
                beforeShow: function(input, inst) {
                    setTimeout(function() {
                        inst.dpDiv.css({
                            background: "#fff",
                            color: "#000"
                        });
                    }, 0);
                },
                onSelect: function(dateText, inst) {
                    $(this).val(dateText);
                }
            });

            function setupAutocomplete(id, popupId) {
                $(id).on("input", function() {
                    let query = $(this).val();
                    if (query.length >= 2) {
                        $.ajax({
                            url: '{{ route("search.index") }}',
                            type: 'GET',
                            data: {
                                query: query
                            },
                            success: function(data) {
                                let suggestions = data.map(item => {
                                    return '<div class="suggestion-item" data-value="' + item.name + '">' + item.name.charAt(0).toUpperCase() + item.name.slice(1).toLowerCase() + '</div>';
                                }).join('');
                                $(popupId).html(suggestions).show();
                            }
                        });
                    } else {
                        $(popupId).hide();
                    }
                });

                $(document).on("click", function(event) {
                    if (!$(event.target).closest(id).length && !$(event.target).closest(popupId).length) {
                        $(popupId).hide();
                    }
                });

                $(popupId).on("click", ".suggestion-item", function() {
                    let value = $(this).data("value");
                    $(id).val(value);
                    $(popupId).hide();
                });
            }

            setupAutocomplete("#depart-field", "#depart-popup");
            setupAutocomplete("#arrive-field", "#arrive-popup");

            let passengerCount = 1;
            $("#passenger-field").on("focus", function() {
                $(".passenger-popup").show();
            });

            $(document).on("click", function(event) {
                if (!$(event.target).closest(".search-field").length) {
                    $(".passenger-popup").hide();
                }
            });

            $("#increase-passenger").on("click", function() {
                passengerCount++;
                $("#passenger-count").text(passengerCount);
                $("#passenger-field").val(passengerCount + " passager" + (passengerCount > 1 ? "s" : ""));
            });

            $("#decrease-passenger").on("click", function() {
                if (passengerCount > 1) {
                    passengerCount--;
                    $("#passenger-count").text(passengerCount);
                    $("#passenger-field").val(passengerCount + " passager" + (passengerCount > 1 ? "s" : ""));
                }
            });

            $("#search-button").on("click", function() {
                const depart = $("#depart-field").val();
                const arrive = $("#arrive-field").val();
                const date = $("#date-field").val();
                const passengers = "1+passager";

                if (!depart || !arrive || !date) {
                    alert("Veuillez remplir tous les champs obligatoires.");
                    return;
                }

                const searchUrl = `results?depart=${encodeURIComponent(depart)}&arrive=${encodeURIComponent(arrive)}&date=${date}&passengers=${passengers}`;
                window.location.href = searchUrl;
            });

            feather.replace();
        });
    </script>
</body>
</html>
