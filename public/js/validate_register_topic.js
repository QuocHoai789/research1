const formSubmit = document.querySelector('form[name="register_topic"]');
let inputType = document.querySelectorAll('input[name="type[]"]');
let typeCheck = 0;
let count = 0;

Array.from(inputType).forEach(function (e) {
    e.addEventListener('change', function () {
        if (e.matches(':checked')) {
            typeCheck++;
        } else {
            typeCheck--;
        }
        notifyTypeTopic(typeCheck);
    })
})
$('#diff-form').change(function () {
    if ($(this).is(':checked')) {
        typeCheck++;
    } else {
        typeCheck--;
    }
    notifyTypeTopic(typeCheck);
});


function notifyTypeTopic(typeCheck) {
    if (typeCheck > 0) {
        document.querySelector('#type-topic').classList.remove('border');
        document.querySelector('#type-topic').classList.remove('border-danger');
        $('.notify-topic').html('');
    } else {
        document.querySelector('#type-topic').classList.add('border');
        document.querySelector('#type-topic').classList.add('border-danger');
        $('.notify-topic').html('<p class="text-danger notify-message">(*) Bạn vui lòng chọn ít nhất 1 lĩnh vực</p>')

    }
}

function notifyMagazine(count) {
    if (count > 0) {
        document.querySelector('.notify-magazine').parentElement.classList.remove('border');
        document.querySelector('.notify-magazine').parentElement.classList.remove('border-danger');
        $('.notify-magazine').html('');
    } else {
        document.querySelector('.notify-magazine').parentElement.classList.add('border');
        document.querySelector('.notify-magazine').parentElement.classList.add('border-danger');
        $('.notify-magazine').html('<p class="text-danger">(*) Hãy chọn ít nhất 1 sản phẩm khoa học</p>')
    }
}

const internation = document.querySelector('input[name="magazine_internation"]');
const domestic = document.querySelector('input[name="magazine_domestic"]');
const publish = document.querySelector('input[name="publish"]');

function checkRequredProduct(event = null) {
    switch (event) {
        case 'plus':
            count = parseInt(internation.value) + parseInt(domestic.value) + parseInt(publish.value) + 1;
            break;
        case 'minus':
            count = parseInt(internation.value) + parseInt(domestic.value) + parseInt(publish.value) - 1;
            if (count < 0) count = 0;
            break;
        default:
            count = parseInt(internation.value) + parseInt(domestic.value) + parseInt(publish.value);
            break;
    }
    if (count > 0) {
        notifyMagazine(count);
    } else {
        notifyMagazine(count);
    }
}
internation.addEventListener('change', function (event) {
    checkRequredProduct();
})
domestic.addEventListener('change', function (event) {
    checkRequredProduct();
})
publish.addEventListener('change', function (event) {
    checkRequredProduct();
})
Array.from(document.querySelectorAll('.magazine_plus')).forEach(function (e) {
    e.addEventListener('click', function (event) {
        checkRequredProduct('plus');
    })
})
Array.from(document.querySelectorAll('.magazine_minus')).forEach(function (e) {
    e.addEventListener('click', function (event) {
        if (e.parentElement.children[1].value > 0) {
            checkRequredProduct('minus');
        }
    })
})
formSubmit.addEventListener('submit', function (e) {
    $('.notify').html('');
    if (typeCheck <= 0 || count <= 0) {
        e.preventDefault();
        if (typeCheck <= 0) {
            $('.notify').append(`<div class="alert alert-danger" role="alert">Bạn vui lòng chọn ít nhất 1 lĩnh vực nghiên cứu </div>`);
        }
        if (count <= 0) {
            $('.notify').append(`<div class="alert alert-danger" role="alert">Bạn vui lòng chọn ít nhất 1 sản phẩm khoa học</div>`);
        }
        notifyMagazine(count);
        notifyTypeTopic(typeCheck);
    }
})
