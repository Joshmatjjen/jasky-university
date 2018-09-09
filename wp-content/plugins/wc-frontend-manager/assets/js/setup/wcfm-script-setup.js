jQuery(document).ready(function($) {
	$('#vendor_commission_mode').change(function() {
		$vendor_commission_mode = $(this).val();
		$('.commission_mode_field').addClass('wcfm_ele_hide');
		$('.commission_mode_'+$vendor_commission_mode).removeClass('wcfm_ele_hide');
	}).change();
	
	$('#withdrawal_payment_methods').find('.payment_options').each(function() {
		$(this).change(function() {
			$payment_option = $(this).val();
			if( $(this).is(':checked') ) {
				$('.withdrawal_mode_'+$payment_option).parent().removeClass('wcfm_ele_hide');
			} else {
				$('.withdrawal_mode_'+$payment_option).parent().addClass('wcfm_ele_hide');
			}
		}).change();
	});
	
	$('#withdrawal_test_mode').change(function() {
		if( $(this).is(':checked') ) {
			$('.withdrawal_mode_live').parent().addClass('wcfm_custom_hide');
			$('.withdrawal_mode_test').parent().removeClass('wcfm_custom_hide');
		} else {
			$('.withdrawal_mode_live').parent().removeClass('wcfm_custom_hide');
			$('.withdrawal_mode_test').parent().addClass('wcfm_custom_hide');
		}
	}).change();
	
	$('#withdrawal_charge_type').change(function() {
		$withdrawal_charge_type = $(this).val();
		$('.withdraw_charge_field').addClass('wcfm_ele_hide');
		$('.withdraw_charge_'+$withdrawal_charge_type).removeClass('wcfm_ele_hide');
	}).change();
	
	$('#vendor_withdrawal_mode').change(function() {
		$vendor_withdrawal_mode = $(this).val();
		$('.withdrawal_mode_field').addClass('wcfm_ele_hide');
		$('.withdrawal_mode_'+$vendor_withdrawal_mode).removeClass('wcfm_ele_hide');
		if( $vendor_withdrawal_mode != 'global' ) {
			$('#withdrawal_charge_type').change();
		}
	}).change();
});