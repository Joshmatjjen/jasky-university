<?php
/**
 * WCFM plugin controllers
 *
 * Plugin Enquiry Manage Controller
 *
 * @author 		WC Lovers
 * @package 	wcfm/controllers/enquiry
 * @version   3.2.8
 */

class wcfm_Enquiry_Manage_Controller {
	
	public function __construct() {
		global $WCFM;
		
		$this->processing();
	}
	
	public function processing() {
		global $WCFM, $wpdb;
		
		$wcfm_enquiry_manager_form_data = array();
	  parse_str($_POST['wcfm_enquiry_manage_form'], $wcfm_enquiry_manager_form_data);
	  
	  $wcfm_enquiry_messages = get_wcfm_enquiry_manage_messages();
	  $has_error = false;
	  
	  if(isset($wcfm_enquiry_manager_form_data['enquiry']) && !empty($wcfm_enquiry_manager_form_data['enquiry'])) {
	  	
	  	$enquiry = $wcfm_enquiry_manager_form_data['enquiry'];
	  	$reply   = apply_filters( 'wcfm_editor_content_before_save', stripslashes( html_entity_decode( $_POST['reply'], ENT_QUOTES, 'UTF-8' ) ) );
	  	$enquiry_id = $wcfm_enquiry_manager_form_data['enquiry_id'];
	  	
	  	// WCFM form custom validation filter
			$custom_validation_results = apply_filters( 'wcfm_form_custom_validation', $wcfm_enquiry_manager_form_data, 'enquiry_manage' );
			if(isset($custom_validation_results['has_error']) && !empty($custom_validation_results['has_error'])) {
				$custom_validation_error = __( 'There has some error in submitted data.', 'wc-frontend-manager' );
				if( isset( $custom_validation_results['message'] ) && !empty( $custom_validation_results['message'] ) ) { $custom_validation_error = $custom_validation_results['message']; }
				echo '{"status": false, "message": "' . $custom_validation_error . '"}';
				die;
			}
	  	
	  	$reply_by = apply_filters( 'wcfm_message_author', get_current_user_id() );
	  	$is_private = 0;
	  	if(isset($wcfm_enquiry_manager_form_data['is_private']) && !empty($wcfm_enquiry_manager_form_data['is_private'])) {
	  		$is_private = 1;
	  	}
	  	$replied = date('Y-m-d H:i:s');
	  	
	  	$wcfm_update_enquiry    = "UPDATE {$wpdb->prefix}wcfm_enquiries 
																SET 
																`enquiry` = '{$enquiry}', 
																`reply` = '{$reply}',
																`reply_by` = {$reply_by},
																`is_private` = {$is_private}, 
																`replied` = '{$replied}'
																WHERE 
																`ID` = {$enquiry_id}";
															
			$wpdb->query($wcfm_update_enquiry);
			
			// Send mail to customer
			if(isset($wcfm_enquiry_manager_form_data['notify']) && !empty($wcfm_enquiry_manager_form_data['notify'])) {
				$enquiry_datas = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wcfm_enquiries WHERE `ID` = {$enquiry_id}" );
				$mail_to = '';
				$mail_name = '';
				$vendor_id = '';
				$product_id = '';
				if( !empty( $enquiry_datas ) ) {
					foreach( $enquiry_datas as $enquiry_data ) {
						$mail_to = $enquiry_data->customer_email;
						$mail_name = $enquiry_data->customer_name;
						$vendor_id = $enquiry_data->vendor_id;
						$product_id = $enquiry_data->product_id;
					}
				}
				
				$enquiry_for_label =  __( 'Store', 'wc-frontend-manager' );
				if( $vendor_id ) $enquiry_for_label = $WCFM->wcfm_vendor_support->wcfm_get_vendor_store_name_by_vendor( $vendor_id ) . ' ' . __( 'Store', 'wc-frontend-manager' );
				if( $product_id ) $enquiry_for_label = get_the_title( $product_id );
				
				$enquiry_for =  __( 'Store', 'wc-frontend-manager' );
				if( $vendor_id ) $enquiry_for = $WCFM->wcfm_vendor_support->wcfm_get_vendor_store_by_vendor( $vendor_id );
				if( $product_id ) $enquiry_for = '<a target="_blank" class="wcfm_dashboard_item_title" href="' . get_permalink( $product_id ) . '">' . get_the_title( $product_id ) . '</a>';
				
				if( $mail_to ) {
					if( !defined( 'DOING_WCFM_EMAIL' ) ) 
						define( 'DOING_WCFM_EMAIL', true );
					
					$reply_mail_subject = "{site_name}: " . __( "Reply for your enquiry", "wc-frontend-manager" ) . " - {enquiry_for}";
					$reply_mail_body    =    '<br/>' . __( 'Hi', 'wc-frontend-manager' ) . ' {first_name}' .
																	 ',<br/><br/>' . 
																	 sprintf( __( 'We recently have a enquiry from you regarding "%s". Please check below for our input for the same: ', 'wc-frontend-manager' ), '{enquiry_for}' ) .
																	 '<br/><br/><strong><i>' . 
																	 '"{reply}"' . 
																	 '</i></strong><br/><br/>' .
																	 sprintf( __( 'Check more details %shere%s.', 'wc-frontend-manager' ), '<a href="{product_url}">', '</a>' ) .
																	 '<br /><br/>' . __( 'Thank You', 'wc-frontend-manager' ) .
																   '<br/><br/>';
																	 
					$subject = str_replace( '{site_name}', get_bloginfo( 'name' ), $reply_mail_subject );
					$subject = str_replace( '{enquiry_for}', $enquiry_for_label, $subject );
					$message = str_replace( '{enquiry_for}', $enquiry_for, $reply_mail_body );
					$message = str_replace( '{first_name}', $mail_name, $message );
					$message = str_replace( '{product_url}', get_permalink( $product_id ), $message );
					$message = str_replace( '{reply}', $reply, $message );
					$message = apply_filters( 'wcfm_email_content_wrapper', $message, __( 'Enquiry Reply', 'wc-frontend-manager' ) );
					
					wp_mail( $mail_to, $subject, $message );
				}
			}
				
			echo '{"status": true, "message": "' . $wcfm_enquiry_messages['enquiry_published'] . '"}';
		} else {
			echo '{"status": false, "message": "' . $wcfm_enquiry_messages['no_enquiry'] . '"}';
		}
		
		die;
	}
}