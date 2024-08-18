<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovoitGo - Trouvez un Covoiturage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
        }
        .content {
            flex: 1;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
        .custom-hero {
            position: relative;
            padding: 100px 0;
            text-align: left;
            color: white;
            background-color: #222;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: url('/A.jpg') no-repeat center center;
            background-size: cover;
        }
        .custom-hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 1;
        }
        .custom-hero .container {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }
        .custom-hero .text-container {
            max-width: 60%;
        }
        .custom-hero img {
            max-width: 310px;
            height: auto;
            display: none;
        }
        .custom-hero h1 {
            font-size: 42px;
            margin-bottom: 20px;
            font-family: 'Montserrat', sans-serif;
        }
        .custom-hero h1 .bold {
            font-weight: bold;
        }
        .custom-hero h2 {
            font-size: 20px;
            font-family: 'Montserrat', sans-serif;
        }
        .search-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
            margin: -30px auto 20px auto;
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
            width: 100%;
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
            .custom-hero {
                background: #222;
                flex-direction: column;
                text-align: center;
            }
            .custom-hero::before {
                background: none;
            }
            .custom-hero .text-container {
                max-width: 100%;
                margin-bottom: 20px;
            }
            .custom-hero img {
                display: none;
            }
            .search-container {
                flex-direction: column;
                padding: 0;
                margin-top: -80px;
                width: 90%;
            }
            .search-field, .search-button {
                margin: 5px 0;
                width: calc(100% - 20px);
            }
            .search-field {
                margin-right: 0;
                border-right: none;
                border-bottom: none;
            }
            .search-field:not(:first-child)::before {
                display: none;
            }
            hr.divider-horizontal {
                display: block;
                width: calc(100% - 40px);
                margin: 10px auto;
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
            color: white !important;
        }
        .ui-autocomplete .suggestion-item {
            display: flex !important;
            justify-content: space-between !important;
            width: 100% !important;
        }
        .ui-autocomplete .city-name {
            font-weight: bold !important;
            color: #555 !important;
        }
        .ui-autocomplete .icon {
            color: #555 !important;
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
     
<div class="content">
    <div class="hero custom-hero">
        <div class="container">
            <div class="text-container">
                <h1>TROUVEZ UN <span class="bold">COVOITURAGE</span></h1>
                <h2>Covoiturez sur tous vos types de trajets sans aucune commission.</h2>
            </div>
        </div>
    </div>

    <div class="search-container">
        <div class="search-field" id="depart-field-container">
            <span class="icon"><i data-feather="map-pin"></i></span>
            <input type="text" id="depart-field" placeholder="Départ">
            <div class="autocomplete-popup" id="depart-popup"></div>
        </div>
        <hr class="divider-horizontal">
        <div class="search-field" id="arrive-field-container">
            <span class="icon"><i data-feather="map-pin"></i></span>
            <input type="text" id="arrive-field" placeholder="Destination">
            <div class="autocomplete-popup" id="arrive-popup"></div>
        </div>
        <hr class="divider-horizontal">
        <div class="search-field">
            <span class="icon"><i data-feather="calendar"></i></span>
            <input type="text" id="date-field" placeholder="Aujourd'hui">
        </div>
        <hr class="divider-horizontal">
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
</div>

<footer>
    <div id="encrypted-content"></div>
    <script>
        (function() {
            // ÙØµÙØµ ÙØ´ÙØ±Ø© Ø¨Ø§Ø³ØªØ®Ø¯Ø§Ù ØªØ´ÙÙØ± ÙØ®ØµØµ
            const encryptedContent = [65, 108, 108, 32, 114, 105, 103, 104, 116, 115, 32, 114, 101, 115, 101, 114, 118, 101, 100, 32, 98, 121, 32, 83, 111, 103, 98, 105, 110, 97, 46, 32, 68, 101, 118, 101, 108, 111, 112, 101, 100, 32, 98, 121, 32, 65, 104, 109, 101, 100, 32, 78, 109, 105, 99, 104, 101, 46];
            const decodedContent = encryptedContent.map(c => String.fromCharCode(c)).join('');
            document.getElementById('encrypted-content').innerText = decodedContent;

            // ÙØ³Ù Ø§ÙØ¥ØºÙØ§Ù </footer> ÙØ´ÙØ± Ø¨Ø§Ø³ØªØ®Ø¯Ø§Ù ÙÙØ³ Ø§ÙØ·Ø±ÙÙØ©
            const encryptedFooterClose = [60, 47, 102, 111, 111, 116, 101, 114, 62];
            const decodedFooterClose = encryptedFooterClose.map(c => String.fromCharCode(c)).join('');
            document.write(decodedFooterClose);
        })();
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
<script>
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
