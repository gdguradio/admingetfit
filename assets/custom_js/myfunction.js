 $(document).ready(function(){
    $(".modal").on("hidden.bs.modal", function(){
        modal_form_reset();
    });
});

function call_alert_error(modal_id,message){

    if(modal_id === 0){
        $('.focus_top').focus();
        $('.af_alert_message').text(message);
        $('.alert-danger').show();

        $('.alert-danger').fadeTo(2000, 500).slideUp(500, function(){
        });
    }else{
        $('#'+ modal_id +' .focus_top').focus();
        $('#'+ modal_id +' .af_alert_message').text(message);
        $('#'+ modal_id +' .alert-danger').show();

        $('#'+ modal_id +' .alert-danger').fadeTo(2000, 500).slideUp(500, function(){
             $('#'+ modal_id +' .alert-danger').slideUp(500);

        });
    }
}
function call_alert_success(modal_id,message,x){  
    if(typeof(x) !== 'undefined'){
        if(modal_id === 0){
            $('.focus_top').focus();
            $('.af_alert_message').text(message);
            $('.alert-success').show();

            $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
                modal_form_reset('1');
            });
        }else{
            $('#'+ modal_id +' .focus_top').focus();
            $('#'+ modal_id +' .af_alert_message').text(message);
            $('#'+ modal_id +' .alert-success').show();

            $('#'+ modal_id +' .alert-success').fadeTo(2000, 500).slideUp(500, function(){
                 $('#'+ modal_id +' .alert-success').slideUp(500);
                 modal_form_reset();
            });

        }
    }else{
        if(modal_id === 0){
            $('.focus_top').focus();
            $('.af_alert_message').text(message);
            $('.alert-success').show();

            $('.alert-success').fadeTo(2000, 500).slideUp(500, function(){
            });
        }else{
            $('#'+ modal_id +' .focus_top').focus();
            $('#'+ modal_id +' .af_alert_message').text(message);
            $('#'+ modal_id +' .alert-success').show();

            $('#'+ modal_id +' .alert-success').fadeTo(2000, 500).slideUp(500, function(){
                 $('#'+ modal_id +' .alert-success').slideUp(500);
                 $('#'+ modal_id).modal('hide');
            });

        }
    }
}
function modal_form_reset(x){
    if(typeof(x) !== 'undefined'){
        $('form').trigger('reset'); 
    }else{
        $('.modal').find('form').trigger('reset'); 
    }
    

}




            