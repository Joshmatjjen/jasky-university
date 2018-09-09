jQuery(document).ready( function($) {
		
	function wcfm_enquiry_manage_form_validate() {
		$is_valid = true;
		$('.wcfm-message').html('').removeClass('wcfm-error').slideUp();
		var enquiry = $.trim($('#wcfm_enquiry_manage_form').find('#enquiry').val());
		if(enquiry.length == 0) {
			$is_valid = false;
			$('#wcfm_enquiry_manage_form .wcfm-message').html('<span class="wcicon-status-cancelled"></span>' + wcfm_enquiry_manage_messages.no_enquiry).addClass('wcfm-error').slideDown();
			audio.play();
		}
		
		$wcfm_is_valid_form = $is_valid;
		$( document.body ).trigger( 'wcfm_form_validate', $('#wcfm_enquiry_manage_form') );
		$( document.body ).trigger( 'wcfm_enquiry_manage_form_validate', $('#wcfm_enquiry_manage_form') );
		$is_valid = $wcfm_is_valid_form;
		
		return $is_valid;
	}
	
	// Submit Enquiry
	$('#wcfm_enquiry_manager_submit_button').click(function(event) {
	  event.preventDefault();
	  
	  var reply = getWCFMEditorContent( 'reply' );
		$('#reply').val(reply);
	  
	  // Validations
	  $is_valid = wcfm_enquiry_manage_form_validate();
	  
	  if($is_valid) {
			$('#wcfm-content').block({
				message: null,
				overlayCSS: {
					background: '#fff',
					opacity: 0.6
				}
			});
			
			var data = {
				action                   : 'wcfm_ajax_controller',
				controller               : 'wcfm-enquiry-manage',
				wcfm_enquiry_manage_form : $('#wcfm_enquiry_manage_form').serialize(),
				reply                    : reply,
				status                   : 'submit'
			}	
			$.post(wcfm_params.ajax_url, data, function(response) {
				if(response) {
					$response_json = $.parseJSON(response);
					$('.wcfm-message').html('').removeClass('wcfm-success').removeClass('wcfm-error').slideUp();
					wcfm_notification_sound.play();
					if($response_json.status) {
						$('#wcfm_enquiry_manage_form .wcfm-message').html('<span class="wcicon-status-completed"></span>' + $response_json.message).addClass('wcfm-success').slideDown( "slow", function() {
						  if( $response_json.redirect ) window.location = $response_json.redirect;	
						} );
					} else {
						$('#wcfm_enquiry_manage_form .wcfm-message').html('<span class="wcicon-status-cancelled"></span>' + $response_json.message).addClass('wcfm-error').slideDown();
					}
					if($response_json.id) $('#enquiry_id').val($response_json.id);
					wcfmMessageHide();
					$('#wcfm-content').unblock();
				}
			});
		}
	});
} );