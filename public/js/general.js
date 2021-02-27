$(document).ready(function() {
    const formatter = new Intl.NumberFormat();
    $('.only-number').on('keyup', function() {
        this.value = formatNumber($(this).val());
    })
    $('.only-number').on('change', function() {
        this.value = formatNumber($(this).val());
    })
    $('.number-format').on('keyup', function() {
        this.value = formatter.format(formatNumber($(this).val()));
    })
    $('.number-format').on('change', function() {
        this.value = formatter.format(formatNumber($(this).val()));
    })

    function formatNumber(e) {
        let value = e.replace(/[^0-9]+/g, "");
        return value;
    }
})