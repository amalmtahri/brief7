jQuery( document ).ready( function ($) {
    "use strict";
    
    // Get URL
    var getURL  = window.location.href,
        baseURL = getURL.substring(0, getURL.indexOf('/wp-admin') + 9);

    // Install and Activate
    $( '#astral-demo-content-inst' ).on( 'click', function() {

            $('#astral-demo-content-inst').html( 'Installing Import Plugin...' );

            var data = {
                action: 'astral_plugin_auto_activation'
            };

            wp.updates.installPlugin({
                slug: 'one-click-demo-import',
                success: function(){
                    $.post(ajaxurl, data, function(response) {
                        $('#astral-demo-content-inst').html( 'Redirecting...' );
                        window.location.replace( baseURL + '/admin.php?page=pt-one-click-demo-import' );
                    })
                }
            });

        }
    );

    // Activate
    $( '#astral-demo-content-act' ).on( 'click', function() {

            $('#astral-demo-content-act').html( 'Installing Import Plugin...' );

            var data = {
                action: 'astral_plugin_auto_activation'
            };

            $.post(ajaxurl, data, function(response) {
                $('#astral-demo-content-act').html( 'Redirecting...' );
                window.location.replace( baseURL + '/admin.php?page=pt-one-click-demo-import' );
            })

        }
    );

});