$('body').on('DOMSubtreeModified', '.selected-dial-code', function () {
    if ($(this)[0].innerText != "") {
        for (var i = 0; i < $('.phonecc').length; i++) {
            $('.phonecc')[i].value = $(this)[0].innerText
        }
    }
})

function forceNumeric() {
    var $input = $(this);
    $input.val($input.val().replace(/[^\d -]+/g, ''));
}

$('.phone').on('input', forceNumeric);
      