<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Contact Form
 * @subpackage Contact_Form/public/partials
 */
?>
<?php
require_once 'contact-form-validation.php';
function ddata_display_contact_form($atts) {
	$plugin_options = get_option ( 'ddata_contact_options' );
	$output = '';
	$i = 1;
	$defaults = shortcode_atts ( array (
			'title' => $plugin_options ['ddata_title'] 
	), $atts );
	$output .= "<h2 class='ddata-contact-title' >{$defaults['title']} </h2>";
	$output .= "<form id='ddata-form' class='ddata-contact-form' method='POST' action='contact-form-validation.php'>";
	$output .= "<div id='ddata-incorrect-box'></div>"; 
	foreach ( $plugin_options as $key => $value ) {
		if (substr ( $key, '6', '7' ) == 'contact') {
			if ($value['required'] == 'Yes'){
				$ddata_required = 'required';
			}else{
				$ddata_required = '';
			}
			if ($value ['type'] == 'password' || $value ['type'] == 'color' || $value ['type'] == 'text' || $value ['type'] == 'email' || $value ['type'] == 'search') {
				$output .= "<div class='ddata-input-row'><label for='$key'> {$value['value']}</label><input type='{$value['type']}' id='{$key}' name='{$key}' class='ddata_input_field' required='{$ddata_required}'/></div> <br />";
			}
			if ($value ['type'] == 'radio' || $value ['type'] == 'checkbox') {
				$output .= "<div class='ddata-input-row'><label for='{$key}'>{$value['value']['label']}</label> <br />";
				// add title question here for radio and checkbox 
				while ( $i <= $value ['amount'] ) {
					$output .= "<p data-for-input='ddata-{$value['value'][$i]}'>{$value['value'][$i]}</p>";
					$output .= "<input type='{$value['type']}' value='ddata-{$value['value'][$i]}' name='{$key}' class='ddata_input_field {$key}_selection_fields_{$i}' id='ddata-{$value['value'][$i]}'/> <br />";
					$i ++;
				}
				$output .= "</div>";
			}
			if ($value ['type'] == 'number') {
				$output .= "<div class='ddata-input-row'><label for='$key'> {$value['value']['label']}</label>";
				$output .= " <input type='{$value['type']}' name='{$key}' min='{$value['value']['min']}' max='{$value['value']['max']}' class='ddata_input_field' id='{$key}' required='{$ddata_required}'/></div><br/>";
			}
			if ($value ['type'] == 'date') {
				$output .= "<div class='ddata-input-row'><label for='$key'> {$value['value']['label']}</label>";
				$output .= "<input name='{$key}' type='{$value['type']}' class='ddata_input_field' id='{$key}'/> </div><br/>";
			}
			if ($value ['type'] == 'tel'){
				$output .= "<div class='ddata-input-row'><label for='$key'> {$value['value']}</label><input type='{$value['type']}' id='{$key}' name='{$key}' class='ddata_input_field' required='{$ddata_required}'/></div> <br />";
			}
		}
		if($key == 'ddata_send_email'){
			$output .= "<input name='{$key}' type='hidden' class='ddata_input_field' id='{$key}' value='{$value}'/><br/>";
		}
	}
	$output .= "<input type='hidden' name='ddata-hidden-honeypot' id='ddata-honeypot' value=''/>";
	$output .= "<div class='ddata-input-row'><button type='submit' id='ddata-submit-button' name='ddata_submit_button'>Submit</button></div> <br />";
	$output .= "</form>";
	
	return $output;
}
add_shortcode ( 'ddata_contact_form', 'ddata_display_contact_form' );
?>