   function increaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number').value = value;
        }

        function decreaseValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            var val=value.closest(".product_data");
            val = isNaN(val) ? 0 : val;
            val < 1 ? val = 1 : '';
            val--;
            document.getElementById('number').val = val;
        }
        $('.addToCart').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty_input').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty
                },
                success: function(response) {
                    swal(response.status);
                }
            });
        });

        $('.delete-cart-item').click(function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            $.ajax({
                method: "POST",
                url: "/cart-item-delete",
                data: {
                    'prod_id': prod_id,
                },
                success: function (response) {
                    swal("", response.status, "success");
                    window.location.reload();
                }
            });
        });
        $('.changeQty' ).click(function (e) {
            e.preventDefault();

            var prod_id = $(this).closest('.product_data').find('.prod_id').val();
            var prod_qty = $(this).closest('.product_data').find('.qty_input').val();
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
            $.ajax({
                method: "POST",
                url: "/update-cart",
                data: {
                    'prod_qty': prod_qty,
                    'prod_id':prod_id,
                },
                success: function (response) {
                    alert(response);
                }
            });

        });
