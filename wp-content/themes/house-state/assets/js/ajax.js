jQuery( document ).ready(function( $ ) {
  
    /*------------------------------------------------
                        Services
    ------------------------------------------------*/
    var $container = $('#our-services .section-content');

    var pageNumber = 1;

    function house_state_load_posts(){
        pageNumber++;

        $.ajax({
            type: "POST",
            dataType: "html",
            url: House_State.ajaxurl,
            data: {action: 'house_state_service_ajax_handler',
                pageNumber: pageNumber,
            },
            success: function(data){
                console.log(data);
                if( data.length > 0 ){
                    $container.append(data);
                    $("#Sloadmore").removeClass("hide");
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }



    $("#Sloadmore").click(function(e){ // When btn is pressed.
        e.preventDefault();
        $("#Sloadmore").addClass("hide");
        setTimeout(house_state_load_posts, 500)
    });

});