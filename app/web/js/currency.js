let wto;
$('.currency-input').on( 'input', function(e) {
    clearTimeout(wto);
    let data = {
        code: e.target.id,
        value: $(e.target).val() || 0
    };

    wto = setTimeout(function() {
        $.get('/site/exchange', data, function (response) {
            response = JSON.parse(response);
            response.currencies.forEach(function (currency) {
                $('#' + currency.code).val(currency.value);
            });
        });
    }, 500);
} );
