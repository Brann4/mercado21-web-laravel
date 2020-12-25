//data
var order_code = document.getElementById("order_code");
var order_total = document.getElementById("order_total");
var total_number = document.getElementById("order_total_number");
//public key
Culqi.publicKey = PUBLIC_KEY;

//culqi options
Culqi.options({
    lang: 'auto',
    modal: true,
    customButton: 'Pagar S/ '+order_total.value+' PEN',
    style: {
        maincolor: '#000000',
        buttontext: '#FFFFFF',
        maintext: '#000000',
        desctext: '#000000'
    }
});

//culqi setting
Culqi.settings({
    title: 'Mercado 21',
    currency: 'PEN',
    description: 'Pedido '+order_code.value,
    amount: total_number.value
});

Culqi.open();
// culqi open
$('#btn-culqi-open').on('click', function(e) {
    Culqi.open();
    e.preventDefault();
});

function culqi() {
    if (Culqi.token) {
        var token = Culqi.token.id;
        var order = order_code.value;
        var amount = order_total.value;
        //send
        sendPayment(token, order, amount);
    } else {
        // console.log(Culqi.error);
        Swal.fire({
            icon: 'warning',
            text: 'Ocurrio algún error. Inténtalo de nuevo más tarde.',
            confirmButtonColor: '#000000',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.value) {
                window.location.reload();
            }
        })
    }
};

function sendPayment(token, order, amount){
    var _token = $("meta[name='csrf-token']").attr("content");
    var endpoint = document.getElementById("order_endpoint").value;
    $.ajax({
        type: "POST",
        url: endpoint,
        cache: false,
        data: { token: token, order: order, amount: amount, _token: _token },
        beforeSend: function(){
            $("#dimmer_pay").addClass('active');
        },
        success: function (response)
        {
            if(response.status == 'success'){
                Swal.fire({
                    icon: 'success',
                    text: response.message,
                    confirmButtonColor: '#000000',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location.reload();
                    }
                })
            }else if(response.status == 'failed'){
                Swal.fire({
                    icon: 'warning',
                    text: response.message,
                    confirmButtonColor: '#000000',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location.reload();
                    }
                })
            }
            $("#dimmer_pay").removeClass('active');
        }
    });
};