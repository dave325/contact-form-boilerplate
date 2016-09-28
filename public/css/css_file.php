<?php
// declare the output for th estylesheet
$css_style_output = '';

// File path
$file = plugin_dir_path(__FILE__) . 'contact-form-public.css';

// Store the style options from the user in $contact options variable
$contact_options = get_option ( 'ddata_contact_style_options' );

// Form Container Styles
$container_background_color = $contact_options ['ddata_style_section_background_color'];
$container_height = $contact_options ['ddata_style_section_height'] ['value'] . $contact_options ['ddata_style_section_height'] ['type'];
$container_width = $contact_options ['ddata_style_section_width'] ['value'] . $contact_options ['ddata_style_section_width'] ['type'];
$container_border_color = $contact_options ['ddata_style_section_border_color'];
$container_border_style = $contact_options ['ddata_style_section_border_style'];
$container_border_width = $contact_options ['ddata_style_section_border_width'] . 'px';
$container_orientation = $contact_options ['ddata_style_section_orientation'];
$container_margin = $contact_options ['ddata_style_section_orientation'];

// Form Styles
$form_background_color = $contact_options ['ddata_style_background_color'];
$form_width = $contact_options ['ddata_style_width'] ['value'] . $contact_options ['ddata_style_width'] ['type'];
$form_border_style = $contact_options ['ddata_style_border_style'];
$form_border_color = $contact_options ['ddata_style_border_color'];
$form_border_width = $contact_options ['ddata_style_border_width'] . 'px';

// Row Styles
$input_row_space = $contact_options ['ddata_style_input_space'] . '%';

// Input Field Styles
$label_color = $contact_options ['ddata_style_label_color'];
$input_text_color = $contact_options ['ddata_style_input_text_color'];
$input_background_color = $contact_options ['ddata_style_input_color'];
$input_border_color = $contact_options ['ddata_style_input_border_color'];
$input_border_style = $contact_options ['ddata_style_input_border_style'];
$input_border_width = $contact_options ['ddata_style_input_border_width'] . 'px';
$input_orientaion = $contact_options ['ddata_style_input_orientation'];

// Submit Styles
$submit_background_color = $contact_options ['ddata_style_submit_background_color'];
$submit_border_style = $contact_options ['ddata_style_submit_border_style'];
$submit_border_color = $contact_options ['ddata_style_submit_border_color'];

// Submit Hover Styles
$submit_background_hover_color = $contact_options ['ddata_style_hover_submit_background_color'];
$submit_border_hover_style = $contact_options ['ddata_style_hover_submit_border_style'];
$submit_border_hover_color = $contact_options ['ddata_style_hover_submit_border_color'];

// Incorrect Box styles
$incorrect_box_height = $contact_options ['ddata_style_incorrect_box_height']['value'] .$contact_options ['ddata_style_incorrect_box_height']['type'] ;
$incorrect_box_width = $contact_options ['ddata_style_incorrect_box_width']['value'] . $contact_options ['ddata_style_incorrect_box_width']['type'];
$incorrect_box_border_style = $contact_options ['ddata_style_incorrect_box_border_style'];
$incorrect_box_border_color = $contact_options ['ddata_style_incorrect_box_border_color'];
$incorrect_box_border_width = $contact_options ['ddata_style_incorrect_box_border_width'];

// Form Container Array
$container_styles = array (
		'background-color' => $container_background_color,
		'width' => $container_width,
		'height' => $container_height,
		'border-style' => $container_border_style,
		'border-color' => $container_border_color,
		'border-width' => $container_border_width 
);

// Form Styles Array
$form_styles = array (
		'background-color' => $form_background_color,
		'width' => $form_width,
		'border-style' => $form_border_style,
		'border-color' => $form_border_color,
		'border-width' => $form_border_width,
		'text-align' => $input_orientaion 
);

if ($container_orientation == 'center') {
	$form_styles ['margin'] = '0px auto';
	$form_styles ['margin'] = '0px auto';
} else if ($container_orientation == 'right') {
	$form_styles ['float'] = 'right';
	$form_styles ['position'] = 'relative';
} else if ($container_orientation == 'left') {
	$form_styles ['float'] = 'left';
	$form_styles ['position'] = 'relative';
}

// Input Row Styles Array
$input_row_styles = array (
		'margin-bottom' => $input_row_space 
);
// Input Styles Array
$input_styles = array (
		'color' => $input_text_color,
		'background-color' => $input_background_color,
		'border-color' => $input_border_color,
		'border-style' => $input_border_style,
		'border-width' => $input_border_width 
);

// Submit Styles Array
$submit_styles = array (
		'background-color' => $submit_background_color,
		'borser-style' => $submit_border_style,
		'border-color' => $submit_border_color 
);

// Submit Hover Styles Array
$submit_hover_styles = array (
		'background-color' => $submit_background_hover_color,
		'border-style' => $submit_border_hover_style,
		'border-color' => $submit_border_hover_color 
);

// Incorrect Box Styles Array
$incorrect_box_styles = array (
		'border-color' => $incorrect_box_border_color,
		'border-style' => $incorrect_box_border_style,
		'border-width' => $incorrect_box_border_width 
);

if (file_exists ( $file )) {
	
	// output for the form container
	$css_style_output .= '#contact {';
	foreach ( $container_styles as $k => $v ) {
		$css_style_output .= $k . ':' . $v . ';';
	}
	$css_style_output .= '}';
	
	// output for the form
	$css_style_output .= '#ddata-form {';
	foreach ( $form_styles as $k => $v ) {
		$css_style_output .= $k . ':' . $v . ';';
	}
	$css_style_output .= '}';
	
	// output for the input rows
	$css_style_output .= '#ddata-form .ddata-input-row {';
	foreach ( $input_row_styles as $k => $v ) {
		$css_style_output .= $k . ':' . $v . ';';
	}
	$css_style_output .= '}';
	
	// output for the label
	$css_style_output .= '#ddata-form label{color:' . $label_color . ';}';
	
	// output for the input fields
	$css_style_output .= '#ddata-form input{';
	foreach ( $input_styles as $k => $v ) {
		$css_style_output .= $k . ':' . $v . ';';
	}
	$css_style_output .= '}';
	
	// output for the submit button
	$css_style_output .= '#ddata-form #ddata_submit{';
	foreach ( $submit_styles as $k => $v ) {
		$css_style_output .= $k . ':' . $v . ';';
	}
	$css_style_output .= '}';
	
	// output for the submit hover button
	$css_style_output .= '#ddata-form #ddata_submit:hover{';
	foreach ( $submit_hover_styles as $k => $v ) {
		$css_style_output .= $k . ':' . $v . ';';
	}
	$css_style_output .= '}';
	
	// output for the incorrect box
	$css_style_output .= '#ddata-form #ddata-incorrect-box{';
	foreach ( $incorrect_box_styles as $k => $v ) {
		$css_style_output .= $k . ':' . $v . ';';
	}
	$css_style_output .= '}';
	// writes the css in an external stylesheet
	file_put_contents($file, $css_style_output);
}
?>