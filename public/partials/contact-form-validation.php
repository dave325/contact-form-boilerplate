<?php
function ddata_form_data_function() {
	global $wpdb;
	$i = 1;
	function test_input($input) {
		$input = trim ( $input );
		$input = stripslashes ( $input );
		$input = htmlspecialchars ( $input );
		return $input;
	}
	$form_contents = array ();
	$ddata_json_data = array();
	while ( $i <= 10 ) {
		if (isset($_POST['ddata_contact_field_' . $i .'_selection_fields_' . $i])){
			$form_contents ['contact_field_' . $i] ['value'] += test_input ( $_POST ['ddata_contact_field_' . $i .'_selection_fields_' . $i] ['value'] );
			$form_contents ['contact_field_' . $i] ['type'] = $_POST ['ddata_contact_field_' . $i .'_selection_fields_' . $i] ['type'];
			$form_contents['contact_field_' .$i ] ['label'] =  $_POST ['ddata_contact_field_' . $i .'_selection_fields_' . $i] ['label'];
			
		}
		if (isset ( $_POST ['ddata_contact_field_' . $i] )) {
			$form_contents ['contact_field_' . $i] ['value'] = test_input ( $_POST ['ddata_contact_field_' . $i] ['value'] );
			$form_contents ['contact_field_' . $i] ['type'] = $_POST ['ddata_contact_field_' . $i] ['type'];
			$form_contents['contact_field_' .$i ] ['label'] =  $_POST ['ddata_contact_field_' . $i] ['label'];
		}
		if (isset($_POST['site'])){
			$form_contents['site'] = test_input($_POST['site']);
		}
		if (isset($_POST['ddata_send_email'])){
			$form_contents['email']['value'] = test_input($_POST['ddata_send_email']['value']);
			$form_contents['email']['type'] = test_input($_POST['ddata_send_email']['type']);
		}
		$i ++;
	}
	foreach ($form_contents as $k=>$v){
		$ddata_label_name = $v['label'];
		$ddata_value_test = $v['value'];
		if ($v['type'] === 'checkbox' || $v['type'] === 'radio'){
			$ddata_json_data[$ddata_label_name] = $ddata_value_test;	
			if(isset($k)){
				$ddata_json_data[$ddata_label_name] = $ddata_value_test;
			}else{
				$ddata_json_data['error'] .= 'No value for ' . $v['label'];
			}
		}else if($v['type'] === 'tel'){
			if(isset($k) && strlen($ddata_value_test) === 10){
				$ddata_json_data[$ddata_label_name] = $ddata_value_test;
			}else{
				$ddata_json_data['error'] .= 'No value for ' . $v['label'];
			}
		}else if($v['type'] === 'date'){
			if(isset($k) && preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/", $ddata_value_test)){
				$ddata_json_data[$ddata_label_name] = $ddata_value_test;
			}else{
				$ddata_json_data['error'] .= 'No value for ' . $v['label'];
			}
		}else if($v['type'] === 'password' || $v['type'] === 'search' || $v['type'] === 'text' || $v['type'] === 'number'){
			if(isset($k) && strlen($ddata_value_test) > 0){
				$ddata_json_data[$ddata_label_name] = $ddata_value_test;
			}else{
				$ddata_json_data['error'] .= 'No value for ' . $v['label'];
			}
		}else if($v['type'] === 'hidden'){
			if(isset($k)){
				$ddata_json_data['ddata-email'] = $ddata_value_test;
			}else{
				$ddata_json_data['error'] .= 'No value for ' . $v['label'];
			}
		}
		$ddata_json_data[$ddata_label_name] = $ddata_value_test;
	}
	$subject = 'Subject tester';
	
	foreach ( $ddata_json_data as $key => $value ) {
		if( $value !== 'davedataram@gmail.com'){
			if(strlen($key) > 2) {
				$message .= $key . ': ' . $value . "\n" ;
			}
		}
	}
	$to = $ddata_json_data['ddata-email'];
	$headers = "From: davedataram@gmail.com";
	$nonce = $_POST ['nonce'];
	if (! wp_verify_nonce ( $nonce, 'ddata-contact-nonce' )) {
		die ();
	} else {
			if (wp_mail ( $to, $subject, $message,$headers)){
				wp_mail ( $to, $subject, $message,$headers);
				wp_send_json($ddata_json_data);
			}else{
				wp_send_json($ddata_json_data['error']);
			}
	}
	wp_die();
}
add_action ( 'wp_ajax_ddata_form_data', 'ddata_form_data_function' );
add_action ( 'wp_ajax_nopriv_ddata_form_data', 'ddata_form_data_function' );
?>