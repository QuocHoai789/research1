$(document).ready(function () {

	$(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        duration: "fast"
    });

    function datepickerMonth() {
        $(".datepicker-month").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "mm-yy",
            showButtonPanel: true,
            yearRange: '1970:2025',
            duration: "fast",
            onClose: function (dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            },
        });
        $(".datepicker-month").focus(function () {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });
    }
    datepickerYear();
    datepickerMonth();

    function datepickerYear() {
        $(".datepicker-year").datepicker({
            changeMonth: false,
            changeYear: true,
            showButtonPanel: true,
            yearRange: '1950:2020',
            dateFormat: 'yy',
            onClose: function (dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 0, 1));
            }
        });
        $(".datepicker-year").focus(function () {
            $(".ui-datepicker-calendar").hide();
            $("#ui-datepicker-div").position({
                my: "center top",
                at: "center bottom",
                of: $(this)
            });
        });
    }
});
