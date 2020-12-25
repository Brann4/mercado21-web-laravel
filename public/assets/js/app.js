(function($) {
    'use strict';

    // Preloader
	jQuery(window).on('load', function() {
		$('.preloader').fadeOut();
    });

    // Header Sticky
	$(window).on('scroll',function() {
        if ($(this).scrollTop() > 120){  
            $('.navbar-area').addClass("is-sticky");
        }
        else{
            $('.navbar-area').removeClass("is-sticky");
        }
    });

    // Go to Top
	$(function(){
		// Scroll Event
		$(window).on('scroll', function(){
			var scrolled = $(window).scrollTop();
			if (scrolled > 600) $('.go-top').addClass('active');
			if (scrolled < 600) $('.go-top').removeClass('active');
		});  
		// Click Event
		$('.go-top').on('click', function() {
			$("html, body").animate({ scrollTop: "0" },  500);
		});
	})
    
    //cart plus minus
	$(function () {
		var i = $(".quantity").attr("min"),
			a = $(".quantity").attr("max");
		$(".plus-btn").on("click", function () {
			var i = parseInt($(this).prev(".quantity").val(), 10);
			i != a && $(this).prev(".quantity").val(i + 1);
		})
		
		$(".minus-btn").on("click", function () {
			var a = parseInt($(this).next(".quantity").val(), 10);
			a != i && $(this).next(".quantity").val(a - 1);
		})
	})

	//cart
	$(function () {
        $(document).on('click', '.add_to_cart', function(e){
            e.preventDefault();
            var code = $(this).attr('data-code');
            var qty = parseInt($(this).attr('data-qty'));
            addToCart(code, qty);
        });

        $(document).on('click', '.update_to_cart', function(e){
            e.preventDefault();
            var code = $(this).parent().attr("data-row");
            var qty = parseInt($(this).parent().find("#product_cart_quantity").val());
			updateToCart(code, qty);
        });

        $(document).on('click', '.remove_from_cart', function(e){
            e.preventDefault();
            var code = $(this).attr("data-row");
            removeFromCart(code);
        });

        $(document).on('click', '.add_to_cart_detail', function(e) {
            e.preventDefault();
            var button = $(this);
            var code = $(this).attr("data-code");
            var qty = parseInt(button.parent().find("#product_detail_quantity").val());
            addToCart(code, qty);
        })

        //Add to cart
        function addToCart(code, qty){
            //ajax
            $.ajax({
                type: "POST",
                url: `${APP_URL}/cart/add`,
                cache: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { code: code, qty: qty },
                beforeSend: function(){
                    //loading
                },
                success: function(response){
                    $('#cart_added_message').html(response);
                    $('#ModalCartResponse').modal('show');
                }
            });
        };

        //Update to cart
        function updateToCart(code,qty){
            //ajax
            $.ajax({
                type: "POST",
                url: `${APP_URL}/cart/update`,
                cache: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {code: code, qty: qty },
                beforeSend: function(){
					//loading
                },
                success: function(response){
                    if(response.status == 'success')
                    {
                        location.reload();
                    }
                }
            });
        };

        //Remove to cart
        function removeFromCart(code){
            //ajax
            $.ajax({
                type: "POST",
                url: `${APP_URL}/cart/remove`,
                cache: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: { code: code },
                beforeSend: function(){
                },
                success: function(response){
                    if(response.status == 'success')
                    {
                        $("#"+code).hide('slow');
                        location.reload();
                    }
                }
            });
		};
    });

    //invoicing
    $(function () {

        function requiredInvoiceData(required){
            $('#collapseInvoiceData .form-control').prop('required', required);
        }

        $(document).on('change', '#switchInvoice', function(){
            var checkInvoice = $(this).is(":checked");
            if(checkInvoice){
                requiredInvoiceData(true);
            }else{
                requiredInvoiceData(false);
            }
            $('#collapseInvoiceData').collapse('toggle');
        })

        $(document).on('change', '#invoice_type', function(e){
            e.preventDefault();
            if($(this).val() == '01')
            {
                $('#doc_type').html('(RUC)');
                $('#document_type').val('06');
            }else if($(this).val() == '03'){
                $('#doc_type').html('(DNI)');
                $('#document_type').val('01');
            }
        })

        $(document).on('click', '#validate_data_person', function(e){
            e.preventDefault();
            var invoice_type = $('#invoice_type').val();
            var document_number = $('#document_number').val();
            var person_type = 1;
            if(document_number)
            {
                var url_api = '';
                if(invoice_type == '01') person_type = 2;
                if(person_type == 1){
                    url_api = `${APP_URL}/checkout/denomination/dni/${document_number}`;
                }else if(person_type == 2){
                    url_api = `${APP_URL}/checkout/denomination/ruc/${document_number}`;
                }
                $.ajax({
                    type: "GET",
                    url: url_api,
                    cache: false,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    beforeSend: function(){
                        $('#button_order_submit').prop('disabled', true);
                        $('#denomination').val('Buscando..');
                    },
                    success: function(response){
                        $('#denomination').val(response.denomination);
                        $('#button_order_submit').prop('disabled', false);
                    }
                });
            }
        })
        
        requiredInvoiceData(false);
    })

    //validations
    $(function () {
        // validate form checkout
        $("#form_checkout").validate({
            rules: {
                cell_phone: {
                    required: true
                },
                district_id: {
                    required: true
                },
                address : {
                    required: true
                },
                invoice_type: { 
                    required: true
                },
                document_number: {
                    required: true
                },
                denomination: {
                    required: true
                }
            },
            messages: {
                cell_phone: {
                    required: "Este campo es requerido."
                },
                district_id: {
                    required: "Este campo es requerido."
                },
                address: {
                    required: "Este campo es requerido."
                },
                invoice_type: {
                    required: "Este campo es requerido."
                },
                document_number: {
                    required: "Este campo es requerido."
                },
                denomination: {
                    required: "Este campo es requerido."
                }
            }
        });
    })

})(jQuery);
  