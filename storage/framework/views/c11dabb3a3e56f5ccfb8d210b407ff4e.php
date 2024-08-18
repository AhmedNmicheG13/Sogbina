<?php $__env->startSection('content'); ?>
<?php if(session('success')): ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '<?php echo e(session('success')); ?>',
                showConfirmButton: false,
                timer: 3000
            });
        });
    </script>
<?php endif; ?>

<div class="form-container mx-auto mt-5" style="width: 100%; border: none; box-shadow: none;">
    <form id="trajetForm" action="<?php echo e(route('trajet.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="step" id="step1">
            <h3>D’où partez-vous ?</h3>
            <div class="form-group">
                <label for="depart">Départ</label>
                <div class="input-group">
                    <input type="text" id="depart" name="depart" class="form-control form-control-custom" placeholder="Choisissez une ville" required>
                </div>
            </div>
            <button type="button" class="btn btn-success next-step mt-3 btn-custom">SUIVANT</button>
        </div>

        <div class="step" id="step2" style="display:none;">
            <h3>Où allez-vous?</h3>
            <div class="form-group">
                <label for="arrivee">Arrivée</label>
                <div class="input-group">
                    <input type="text" id="arrivee" name="arrivee" class="form-control form-control-custom" placeholder="Choisissez une ville" required>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="button" class="btn btn-success next-step btn-custom">SUIVANT</button>
            </div>
        </div>

        <div class="step" id="step3" style="display:none;">
            <h3>Quand partez-vous ?</h3>
            <div class="form-group">
                <label for="date">Date</label>
                <div class="input-group date-custom">
                    <div class="input-group-prepend">
                        <span class="input-group-text icon-custom"><i data-feather="calendar"></i></span>
                    </div>
                    <input type="text" id="date" name="date" class="form-control form-control-custom" required>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="button" class="btn btn-success next-step btn-custom">SUIVANT</button>
            </div>
        </div>

        <div class="step" id="step4" style="display:none;">
            <h3>À quelle heure partez-vous ?</h3>
            <div class="form-group">
                <label for="heure_depart">Heure de départ</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text icon-custom"><i data-feather="clock"></i></span>
                    </div>
                    <select id="heure_depart" name="heure_depart" class="form-control form-control-custom" required style="max-width: 120px;">
                        <?php for($i = 0; $i < 24; $i++): ?>
                            <?php for($j = 0; $j < 60; $j += 10): ?>
                                <option value="<?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:<?php echo e(str_pad($j, 2, '0', STR_PAD_LEFT)); ?>"><?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:<?php echo e(str_pad($j, 2, '0', STR_PAD_LEFT)); ?></option>
                            <?php endfor; ?>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="button" class="btn btn-success next-step btn-custom">SUIVANT</button>
            </div>
        </div>

        <div class="step" id="step5" style="display:none;">
            <h3>À quelle heure vous arrivez ?</h3>
            <div class="form-group">
                <label for="heure_arrivee">Heure d'arrivée</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text icon-custom"><i data-feather="clock"></i></span>
                    </div>
                    <select id="heure_arrivee" name="heure_arrivee" class="form-control form-control-custom" required style="max-width: 120px;">
                        <?php for($i = 0; $i < 24; $i++): ?>
                            <?php for($j = 0; $j < 60; $j += 10): ?>
                                <option value="<?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:<?php echo e(str_pad($j, 2, '0', STR_PAD_LEFT)); ?>"><?php echo e(str_pad($i, 2, '0', STR_PAD_LEFT)); ?>:<?php echo e(str_pad($j, 2, '0', STR_PAD_LEFT)); ?></option>
                            <?php endfor; ?>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="button" class="btn btn-success next-step btn-custom">SUIVANT</button>
            </div>
        </div>

        <div class="step" id="step6" style="display:none;">
            <h3>Combien de passagers pouvez-vous accepter ?</h3>
            <div class="form-group">
                <label for="places">Nombre de places</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-success" id="decreasePlaces">-</button>
                    </div>
                    <input type="number" id="places" name="places" class="form-control form-control-custom text-center" value="1" min="1" required style="max-width: 80px !important;">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-success" id="increasePlaces">+</button>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="button" class="btn btn-success next-step btn-custom">SUIVANT</button>
            </div>
        </div>

        <div class="step" id="step7" style="display:none;">
            <h3>Fixez votre prix par place</h3>
            <div class="form-group">
                <label for="prix">Prix (DZD)</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-outline-success" id="decreasePrix">-</button>
                    </div>
                    <input type="number" id="prix" name="prix" class="form-control form-control-custom text-center" value="0" min="0" required style="max-width: 100px !important;">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-outline-success" id="increasePrix">+</button>
                    </div>
                </div>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="gratuit" name="gratuit">
                    <label class="form-check-label" for="gratuit">Gratuit</label>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="button" class="btn btn-success next-step btn-custom">SUIVANT</button>
            </div>
        </div>

        <?php if(!Auth::user()->profile_picture || !Auth::user()->car_brand || !Auth::user()->car_serial || !Auth::user()->national_id_recto || !Auth::user()->national_id_verso): ?>
        <div class="step" id="step8" style="display:none;">
            <h3>Informations supplémentaires</h3>
            <div class="form-group">
                <label for="profile_picture">Photo de Profil</label>
                <input type="file" id="profile_picture" name="profile_picture" class="form-control form-control-custom" required>
            </div>
            <div class="form-group">
                <label for="car_brand">Marque de Voiture</label>
                <input type="text" id="car_brand" name="car_brand" class="form-control form-control-custom" placeholder="Entrez la marque de votre voiture" required>
            </div>
            <div class="form-group">
                <label for="car_serial">Numéro de Série de la Voiture</label>
                <input type="text" id="car_serial" name="car_serial" class="form-control form-control-custom" placeholder="Entrez le numéro de série de votre voiture" required>
            </div>
            <div class="form-group">
                <label for="national_id_recto">Carte Nationale Recto</label>
                <input type="file" id="national_id_recto" name="national_id_recto" class="form-control form-control-custom" required>
            </div>
            <div class="form-group">
                <label for="national_id_verso">Carte Nationale Verso</label>
                <input type="file" id="national_id_verso" name="national_id_verso" class="form-control form-control-custom" required>
            </div>
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" id="remisPluTard" name="remisPluTard">
                <label class="form-check-label" for="remisPluTard">REMIS PLU TARD</label>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="button" class="btn btn-success next-step btn-custom">SUIVANT</button>
            </div>
        </div>
        <?php endif; ?>

        <div class="step" id="step9" style="display:none;">
            <h3>Description de votre trajet</h3>
            <div class="form-group">
                <label for="description">Description</label>
                <div class="input-group">
                    <textarea id="description" name="description" class="form-control form-control-custom" rows="4" required></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button type="button" class="btn btn-secondary prev-step btn-custom">Précédent</button>
                <button type="submit" class="btn btn-success btn-custom">Publier</button>
            </div>
        </div>
    </form>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(function() {
        // Datepicker
        $("#date").datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPanel: true,
            closeText: 'Fermer',
            currentText: 'Aujourd\'hui',
            minDate: 0,
            monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
            dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
            beforeShow: function(input, inst) {
                setTimeout(function() {
                    inst.dpDiv.css({
                        backgroundColor: '#ffffff !important',
                        color: '#28a745 !important',
                        fontSize: '18px !important',
                        border: 'none'
                    });
                }, 0);
            },
            onChangeMonthYear: function(year, month, inst) {
                setTimeout(function() {
                    inst.dpDiv.css({
                        backgroundColor: '#ffffff !important',
                        color: '#28a745 !important',
                        fontSize: '18px !important',
                        border: 'none'
                    });
                }, 0);
            },
            onSelect: function(dateText, inst) {
                setTimeout(function() {
                    inst.dpDiv.css({
                        backgroundColor: '#ffffff !important',
                        color: '#28a745 !important',
                        fontSize: '18px !important',
                        border: 'none'
                    });
                }, 0);
            }
        });

        feather.replace();

        function validateStep(step) {
            var valid = true;
            $(step).find('input[required], select[required], textarea[required]').each(function() {
                if (!this.checkValidity()) {
                    valid = false;
                    this.reportValidity();
                    return false;
                }
            });
            return valid;
        }

        $('.next-step').click(function() {
            var currentStep = $(this).closest('.step');
            if (validateStep(currentStep)) {
                currentStep.hide().next('.step').show();
            }
        });

        $('.prev-step').click(function() {
            $(this).closest('.step').hide().prev('.step').show();
        });

        $('#gratuit').change(function() {
            if ($(this).is(':checked')) {
                $('#prix').prop('disabled', true).val('');
            } else {
                $('#prix').prop('disabled', false);
            }
        });

        // Contrôle du nombre de places
        $('#increasePlaces').click(function() {
            let places = parseInt($('#places').val());
            $('#places').val(places + 1);
        });

        $('#decreasePlaces').click(function() {
            let places = parseInt($('#places').val());
            if (places > 1) {
                $('#places').val(places - 1);
            }
        });

        // Contrôle du prix
        $('#increasePrix').click(function() {
            let prix = parseInt($('#prix').val());
            $('#prix').val(prix + 1);
        });

        $('#decreasePrix').click(function() {
            let prix = parseInt($('#prix').val());
            if (prix > 0) {
                $('#prix').val(prix - 1);
            }
        });

        // REMIS PLU TARD Functionality
        $('#remisPluTard').change(function() {
            if ($(this).is(':checked')) {
                $('#profile_picture').prop('disabled', true).prop('required', false);
                $('#car_brand').prop('disabled', true).prop('required', false);
                $('#car_serial').prop('disabled', true).prop('required', false);
                $('#national_id_recto').prop('disabled', true).prop('required', false);
                $('#national_id_verso').prop('disabled', true).prop('required', false);
            } else {
                $('#profile_picture').prop('disabled', false).prop('required', true);
                $('#car_brand').prop('disabled', false).prop('required', true);
                $('#car_serial').prop('disabled', false).prop('required', true);
                $('#national_id_recto').prop('disabled', false).prop('required', true);
                $('#national_id_verso').prop('disabled', false).prop('required', true);
            }
        });

        function setupAutocomplete(id) {
            $(id).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: '<?php echo e(route("search.index")); ?>',
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
</script>
<style>
    .form-control-custom {
        border: 1px solid #ccc !important;
        border-radius: 5px !important;
        background-color: #f9f9f9 !important;
        color: #555 !important;
        padding: 10px 15px !important;
        box-sizing: border-box !important;
        font-size: 16px !important;
        height: 50px !important;
    }

    .form-control-custom::placeholder {
        color: #aaa !important;
    }

    .input-group .input-group-text {
        background-color: rgba(40, 167, 69, 0.1) !important;
        border: none !important;
        color: #555 !important;
        font-size: 16px !important;
        height: 50px !important;
    }

    .icon-custom i {
        color: #555 !important;
    }

    .date-custom .form-control {
        font-weight: bold !important;
        border: none !important;
    }

    .ui-datepicker {
        background: #ffffff !important;
        border: 1px solid #555 !important;
        color: #28a745 !important;
        font-size: 18px !important;
    }

    .ui-datepicker a {
        color: #28a745 !important;
    }

    .ui-datepicker-header {
        background: #ffffff !important;
        color: #28a745 !important;
    }

    .ui-datepicker .ui-datepicker-prev, .ui-datepicker .ui-datepicker-next {
        background: #ffffff !important;
        border: none !important;
        color: #28a745 !important;
    }

    .ui-datepicker .ui-state-highlight {
        background: #28a745 !important;
        color: white !important;
    }

    .btn-custom {
        width: 120px !important;
        font-size: 14px !important;
        padding: 10px !important;
    }

    .btn-block {
        width: 100% !important;
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
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.user_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /htdocs/resources/views/front/publier_trajet.blade.php ENDPATH**/ ?>