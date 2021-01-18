function addToCart($id) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/cart/' + $id,
        type: 'post',
        data: {_token: CSRF_TOKEN},
        success: function (_response) {
            // Handle your response..
            if(_response === '') {
                $('.successAlert').fadeIn("slow",function (){
                    $(this).delay(5000).fadeOut("slow");
                });
            }else if(_response === 'added before'){

                $('.DangerMessage').html("This item already in your cart") ;
                $('.DangerMessage').fadeIn("slow",function (){
                    $(this).delay(5000).fadeOut("slow");
                });
            }
            else{
                $('.DangerMessage').fadeIn("slow",function (){
                    $(this).delay(5000).fadeOut("slow");
                });
            }

            console.log(_response);
        },
        error: function (_response) {
            console.log(_response);
        }
    });
}

function deleteFromCart($id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: '/cart/' + $id,
        type: 'delete',
        data: {_token: CSRF_TOKEN},
        success: function (_response) {
            // Handle your response..
            if(_response === '') {
                $('.successAlert').fadeIn("slow",function (){
                    $(this).delay(5000).fadeOut("slow");
                });
                $('.product' + $id).hide();
            }
            else{
                $('.DangerMessage').fadeIn("slow",function (){
                    $(this).delay(5000).fadeOut("slow");
                });
            }
            console.log(_response);
        },
        error: function (_response) {
            console.log('here');
        }
    });
}

function decreaseQuantity($id){
    var effect = document.getElementById('qty'+$id);
    var qty = effect.value;
    if( !isNaN( qty ) && qty > 1 ) {
        effect.value--;
    }
    changeBill($id,'minus');
    return false;
}
function increaseQuantity($id){
    var effect = document.getElementById('qty'+$id);
    var qty = effect.value;
    if( !isNaN( qty ) ) {
        effect.value++;
    }
    changeBill($id,'plus');
    return false;
}

function changeBill($id , operation){
    $.ajax({
        url: '/cart/changeBill/' + $id,
        type: 'get',
        // data: {_token: CSRF_TOKEN},
        success: function (_response, status) {
            // Handle your response..
            if(status === 'success') {
                console.log($('.subtotal').text());
                $subtotal = parseInt($('.subtotal').text());
                $total = parseInt($('.total').text());
                $price = parseInt(_response);

                $taxs = parseInt(($price*14) / 100);
                if(operation === 'plus'){
                    $subtotal += $price;
                    $total += $taxs + $price;
                }
                else{
                    $subtotal -= $price;
                    $total -= $taxs + $price;
                }
                $('.subtotal').html($subtotal + "<b>$</b>");
                $('.total').html($total + "<b>$</b>");
            }
            else{

            }

        },
        error: function (_response) {
            console.log(_response);
        }
    });
}


// $(document).ready(function () {
//     n =  new Date();
//     y = n.getFullYear();
//     m = n.getMonth() + 1;
//     d = n.getDate();
//     if( (d+5) > 31 ){
//         m++;
//     }
//     d += 5;
//     const monthNames = ["January", "February", "March", "April", "May", "June",
//         "July", "August", "September", "October", "November", "December"
//     ];
//     document.getElementById("date").innerHTML = "Time for delivery " + d + " " + monthNames[m];
// });
