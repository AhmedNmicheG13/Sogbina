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
