let count = 0;
const inputProductScience = document.querySelectorAll('input[name="productScience[]"]');
const form = document.querySelector('form[name="scientific_explanation"]');
const productScience = document.querySelector('#productScience');
Array.from(inputProductScience).forEach(function (e) {
    if (e.matches(':checked')) {
        count++;
    }
    e.addEventListener('change', function () {
        if (e.matches(':checked')) {
            count++;
        } else {
            count--;
        }
        messageErrorProduct(count);
    })
})

function messageErrorProduct(count) {
    let message = `<p class="text-danger">(*) Bạn hãy chọn ít nhất 1 sản phẩm khoa học</p>`;
    if (count > 0) {
        productScience.classList.remove('border');
        productScience.classList.remove('border-danger');
        $('#productScience .message-error').html('');
    } else {
        productScience.classList.add('border');
        productScience.classList.add('border-danger');
        $('#productScience .message-error').html(message);
    }
}
form.addEventListener('submit', function (e) {
    if (count <= 0) {
        e.preventDefault();
        messageErrorProduct(count);
        $('.message-submit').html(`<div class="alert alert-danger" role="alert">
                                    Bạn hãy chọn ít nhất 1 sản phẩm khoa học
                                </div>`);
    } else {
        $('.message-submit').html('');
    }
})
