// Class definition

var KTBootstrapDatepicker = function () {

    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }
    
    // Private functions
    var demos = function () {
        // minimum setup
        $('#kt_datepicker_1, #kt_datepicker_1_validate').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows
        });

        // minimum setup for modal demo
        $('#kt_datepicker_1_modal').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows
        });

        // input group layout 
        $('#kt_datepicker_2, #kt_datepicker_2_validate').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows
        });

        // input group layout for modal demo
        $('#kt_datepicker_2_modal').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows
        });

        // enable clear button 
        $('#kt_datepicker_3, #kt_datepicker_3_validate').datepicker({
            rtl: KTUtil.isRTL(),
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            templates: arrows
        });

        // enable clear button for modal demo
        $('#kt_datepicker_3_modal').datepicker({
            rtl: KTUtil.isRTL(),
            todayBtn: "linked",
            clearBtn: true,
            todayHighlight: true,
            templates: arrows
        });

        // orientation 
        $('#kt_datepicker_4_1').datepicker({
            rtl: KTUtil.isRTL(),
            orientation: "top left",
            todayHighlight: true,
            templates: arrows
        });

        $('#kt_datepicker_4_2').datepicker({
            rtl: KTUtil.isRTL(),
            orientation: "top right",
            todayHighlight: true,
            templates: arrows
        });

        $('#kt_datepicker_4_3').datepicker({
            rtl: KTUtil.isRTL(),
            orientation: "bottom left",
            todayHighlight: true,
            templates: arrows
        });

        $('#kt_datepicker_4_4').datepicker({
            rtl: KTUtil.isRTL(),
            orientation: "bottom right",
            todayHighlight: true,
            templates: arrows
        });
        $.fn.datepicker.dates['fr'] = {
		    days: ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
		    daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
		    daysMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
		    months: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"],
		    monthsShort: ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Juil", "Aou", "Sep", "Oct", "Nov", "Dec"],
		    today: "Aujourd'hui",
		    clear: "Effacer",
		    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
		    weekStart: 0
		};

        // range picker
        $('#kt_datepicker_5').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            templates: arrows,
            format: 'dd/mm/yyyy',
            language: 'fr',
        });

         // inline picker
        $('#kt_datepicker_6').datepicker({
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            templates: arrows
        });
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

jQuery(document).ready(function() {    
    KTBootstrapDatepicker.init();
});