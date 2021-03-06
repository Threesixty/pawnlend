"use strict";

// Class definition
var KTProductsAdd = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			if (wizard.getStep() != 4) {
				$('.product-name').html($('input[name="name"]').val());
				$('.product-description').html($('textarea[name="description"]').val());
				$('.product-category').html($('select[name="category_id"] option:selected').text());
				$('.product-reference').html($('input[name="reference"]').val());
				$('.product-stock').html($('input[name="stock"]').val());
				$('.product-stock-mini').html($('input[name="stock_mini"]').val());
				var status = $('input[name="status"]').is(':checked') ? 'Oui' : 'Non';
				$('.product-status').html(status);
				var url = $('.image-input-wrapper').attr('style') != undefined && $('.image-input-wrapper').attr('style') != 'background-image: none;' ? $('.image-input-wrapper').attr('style') : $('#kt_image_5').attr('style');
				$('.product-photo span').attr('style', url);
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Attention ! Il semblerait que certains champs requis n'aient pas été renseignés.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "C'est compris",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			_formEl.submit();
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'Le nom du produit est requis'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// Step 2
					category_id: {
						validators: {
							notEmpty: {
								message: 'Veuillez sélectionner la catégorie du produit'
							}
						}
					},
					reference: {
						validators: {
							notEmpty: {
								message: 'Une référence produit est requise'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					stock: {
						validators: {
							notEmpty: {
								message: 'Veuillez saisir le stock actuel'
							}
						}
					},
					stock_mini: {
						validators: {
							notEmpty: {
								message: 'Veuillez définir une valeur pour l‘alerte de stock minimum'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_products_add');
			_formEl = KTUtil.getById('kt_products_add_form');

			if ($('#kt_products_add').length)
				_initWizard();
			if ($('#kt_products_add_form').length)
				_initValidation();
		}
	};
}();

// Class definition
var KTLendsAdd = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			if (wizard.getStep() != 4) {
				$('.lend-reference').html($('input[name="reference"]').val());
				$('.lend-client').html($('select[name="client_id"] option:selected').text());
				$('.lend-start').html($('input[name="startdate"]').val());
				$('.lend-end').html($('input[name="enddate"]').val());
				var productList = '';
				$('select[name="products"] option:selected').each(function() {
					if (productList != '')
						productList += '<br>'
					productList += $(this).text();
				});
				$('.lend-products').html(productList);
				var status = $('input[name="status"]').is(':checked') ? 'Oui' : 'Non';
				$('.lend-status').html(status);
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Attention ! Il semblerait que certains champs requis n'aient pas été renseignés.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "C'est compris",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			_formEl.submit();
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					reference: {
						validators: {
							notEmpty: {
								message: 'Une référence produit est requise'
							}
						}
					},
					client_id: {
						validators: {
							notEmpty: {
								message: 'Veuillez sélectionner un client loueur'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					// Step 2
					startdate: {
						validators: {
							notEmpty: {
								message: 'Veuillez sélectionner une date de prêt'
							}
						}
					},
					enddate: {
						validators: {
							notEmpty: {
								message: 'Veuillez sélectionner une date de restitution'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 3
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					products: {
						validators: {
							notEmpty: {
								message: 'Veuillez saisir au moins 1 produit ou lot'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_lends_add');
			_formEl = KTUtil.getById('kt_lends_add_form');

			if ($('#kt_lends_add').length)
				_initWizard();
			if ($('#kt_lends_add_form').length)
				_initValidation();
		}
	};
}();

// Class definition
var KTProductLotsAdd = function () {
	// Base elements
	var _wizardEl;
	var _formEl;
	var _wizardObj;
	var _validations = [];

	// Private functions
	var _initWizard = function () {
		// Initialize form wizard
		_wizardObj = new KTWizard(_wizardEl, {
			startStep: 1, // initial active step number
			clickableSteps: true  // allow step clicking
		});

		// Validation before going to next page
		_wizardObj.on('change', function (wizard) {
			if (wizard.getStep() > wizard.getNewStep()) {
				return; // Skip if stepped back
			}

			if (wizard.getStep() != 4) {
				$('.product-lot-reference').html($('input[name="reference"]').val());
				$('.product-lot-name').html($('input[name="name"]').val());
				var productList = '';
				$('select[name="products"] option:selected').each(function() {
					if (productList != '')
						productList += '<br>'
					productList += $(this).text();
				});
				$('.product-lot-products').html(productList);
				var status = $('input[name="status"]').is(':checked') ? 'Oui' : 'Non';
				$('.product-lot-status').html(status);
			}

			// Validate form before change wizard step
			var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step

			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						wizard.goTo(wizard.getNewStep());

						KTUtil.scrollTop();
					} else {
						Swal.fire({
							text: "Attention ! Il semblerait que certains champs requis n'aient pas été renseignés.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "C'est compris",
							customClass: {
								confirmButton: "btn font-weight-bold btn-light"
							}
						}).then(function () {
							KTUtil.scrollTop();
						});
					}
				});
			}

			return false;  // Do not change wizard step, further action will be handled by he validator
		});

		// Change event
		_wizardObj.on('changed', function (wizard) {
			KTUtil.scrollTop();
		});

		// Submit event
		_wizardObj.on('submit', function (wizard) {
			_formEl.submit();
		});
	}

	var _initValidation = function () {
		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		// Step 1
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					reference: {
						validators: {
							notEmpty: {
								message: 'Une référence lot est requise'
							}
						}
					},
					name: {
						validators: {
							notEmpty: {
								message: 'Un nom de lot de produits est requis'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));

		// Step 2
		_validations.push(FormValidation.formValidation(
			_formEl,
			{
				fields: {
					products: {
						validators: {
							notEmpty: {
								message: 'Veuillez sélectionner au moins un produit'
							}
						}
					},
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap({
						//eleInvalidClass: '',
						eleValidClass: '',
					})
				}
			}
		));
	}

	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_product_lot_add');
			_formEl = KTUtil.getById('kt_product_lot_add_form');

			if ($('#kt_product_lot_add').length)
				_initWizard();
			if ($('#kt_product_lot_add_form').length)
				_initValidation();
		}
	};
}();

jQuery(document).ready(function () {
	KTProductsAdd.init();
	KTLendsAdd.init();
	KTProductLotsAdd.init();
});
