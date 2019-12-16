$(document).ready(function () {
    // обновляем цену продукта
    $('.js-form-update-price').submit(function (e) {
        e.preventDefault();
        var formFields = $(this).serialize();
        $.ajax({
            url: "/product/update/price",
            data: formFields,
            method: "POST",
        }).done(function (msg) {
            alert(msg.message);
        });
    })
});