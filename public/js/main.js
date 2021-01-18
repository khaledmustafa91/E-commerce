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
                console.log('Item Deleted')
            }
            else{
                console.log('Error');
            }
            console.log(_response);
        },
        error: function (_response) {
            console.log(_response);
        }
    });
}
function changeBill($id){

    var effect = document.getElementById('qty'+$id);
    var qty = effect.value;
    if( !isNaN( qty ) && qty > 1 ) {
        effect.value--;
    }

    $.ajax({
        url: '/cart',
        type: 'get',
        // data: {_token: CSRF_TOKEN},
        success: function (_response) {
            // Handle your response..
            if(_response === '') {

            }
            else{

            }
            console.log(_response);
        },
        error: function (_response) {
            console.log(_response);
        }
    });
    return false;
}
