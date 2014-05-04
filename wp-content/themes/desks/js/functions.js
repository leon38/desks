/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
( function( $ ) {
	
} )( jQuery );

function userRegistration() {
	jQuery('.form-group').hide();
	jQuery.ajax({
		type: "POST",
		url: desksAjax.ajaxurl,
		data: "action=user_registration&firstname="+jQuery('#firstname').val()+"&lastname="+jQuery("#lastname").val()+"&email="+jQuery("#email").val()+"&pass="+jQuery("#pass").val()+"&confirm="+jQuery("#confirm").val(),
		success: function(msg) {
			if(msg == 0) {
				jQuery('.modal-body').append('<div class="alert alert-success"><p>An e-mail has just been sent to your address please click on the link to activate your account</p></div>');
			}
		}
	})
}