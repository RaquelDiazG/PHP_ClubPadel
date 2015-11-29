var ComponentsPickers = function () {

    return {
        init: function () {

            if (jQuery().datepicker) {
                $('.date-picker').datepicker({
                    orientation: "left",
                    autoclose: true,
                    todayHighlight: true,
                    language: 'es'
                });
                $('.date-picker').on("changeDate", function () {
                    $('#fechaReserva').val(
                            $('.date-picker').datepicker('getFormattedDate')
                            );
                });
            }
        }
    };

}();