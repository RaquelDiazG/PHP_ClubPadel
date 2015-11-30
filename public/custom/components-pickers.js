var ComponentsPickers = function () {

    return {
        init: function () {

            if (jQuery().datepicker) {
                $(".form_datetime").datetimepicker({
                    autoclose: true,
                    format: "dd-mm-yyyy hh:ii",
                    orientation: "left",
                    todayHighlight: true,
                    language: 'es'
                });
            }
        }
    };

}();