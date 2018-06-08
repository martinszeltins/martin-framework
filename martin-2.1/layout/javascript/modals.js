/*
 * Martin modal and poppup window
 *
 * Usage: $("#modal-id").showModal({ overlay : 0.4, closeButton: ".modal_close" });
*/

(function($) {
    $.fn.extend({
        showModal: function(options) {
            var defaults = {
                overlay: 0.3, // Opacity
                closeButton: ".modal_close"
            };
			
            // Add modal background
            var overlay = $("<div id='martin_modal_bg'></div>");
            $("body").append(overlay);
			
            // Merge defaults into options
            options = $.extend(defaults, options);
			
            return this.each(function() {
                $(this).click(function(e) {

                    // Show modal background
                    $("#martin_modal_bg").css({
                        "display": "block",
                        opacity: 0
                    });
					
                    $("#martin_modal_bg").fadeTo(200, options.overlay);


                    // Show modal dialog itself
					var modal_id = $(this).data("show-modal");
                    
                   $('[data-modal-id="' + modal_id + '"]').css({
                        "display": "block",
                        "position": "fixed",
                        "opacity": 0,
                        "z-index": 11000,
                        "top": "50%",
                        "left": "50%",
                        "transform": "translate(-50%, -50%)"
                    });
					
                   $('[data-modal-id="' + modal_id + '"]').fadeTo(200, 1);


                    // Background and close button
                    $("#martin_modal_bg").click(function() {
                        close_modal(modal_id)
                    });
                    
                    $(options.closeButton).click(function() {
                        close_modal(modal_id)
                    });
                })
            });

            function close_modal(modal_id) {
                $("#martin_modal_bg").fadeOut(200);
				
                $('[data-modal-id="' + modal_id + '"]').css({
                    "display": "none"
                })
            }
        }
    })


    $.fn.extend({
        showPopup: function(options) {
            var defaults = {
                closeButton: ".popup_close"
            };
            
            // Add modal background
            var overlay = $("<div id='martin_popup_bg'></div>");
            $("body").append(overlay);
            
            // Merge defaults into options
            options = $.extend(defaults, options);
            
            return this.each(function() {
                $(this).click(function(e) {

                    // Show modal background
                    $("#martin_popup_bg").css({
                        "display": "block"
                    });

                    // Show modal dialog itself
                    var popup_id = $(this).data("show-popup");
                    
                   $('[data-popup-id="' + popup_id + '"]').css({
                        "display": "block",
                        "z-index": 11000
                    });
                    
                   $('[data-popup-id="' + popup_id + '"]').fadeTo(200, 1);


                    // Background and close button
                    $("#martin_popup_bg").click(function() {
                        close_popup(popup_id)
                    });
                    
                    $(options.closeButton).click(function() {
                        close_popup(popup_id)
                    });
                })
            });

            function close_popup(popup_id) {
                $("#martin_popup_bg").hide();

                $('[data-popup-id="' + popup_id + '"]').css({
                    "display": "none"
                })
            }
        }
    })

})(jQuery);


// Initialize modal window
$( document ).ready(function() {
    $('[data-show-modal]').showModal();
    $('[data-show-popup').showPopup();
});