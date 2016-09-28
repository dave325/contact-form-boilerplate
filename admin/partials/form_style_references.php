<?php 
class ddata_form_styles extends ddata_Contact_Options{
/**
 * The reference to the function that chooses the style of the title.
 *
 * @since 1.0.0
 */
public function ddata_style_title() {
	if (isset ( $this->options ['ddata_style_title'] )) {
		echo "<input id='ddata-style-title' name='ddata_contact_style_options[ddata_style_title]' type='color' value='{$this->options['ddata_style_title']}'/>";
		echo hex2rgb ( $this->options ['ddata_style_title'] );
	} else {
		echo "<input id='ddata-style-label-color' name='ddata_contact_style_options[ddata_style_title]' type='color' value=''/>";
	}
}
/**
 * The reference to the function that chooses the width of the form.
 *
 * @since 1.0.0
 */
public function ddata_style_width() {
	$width_types = array (
			'px',
			'em',
			'%',
			'cm',
			'pt'
	);
	$this->options ['ddata_style_width'] = array (
			'value' => $this->options ['ddata_style_width'] ['value'],
			'type' => $this->options ['ddata_style_width'] ['type']
	);
	if (isset ( $this->options ['ddata_style_width'] ['value'] )) {
		echo "<input id='ddata-style-width' name='ddata_contact_style_options[ddata_style_width][value]' min='50' type='number' value='{$this->options['ddata_style_width']['value']}' />";
	} else {
		echo "<input id='ddata-style-width' name='ddata_contact_style_options[ddata_style_width][value]' type='text' value='' />";
	}
	echo "<select id='ddata_style_width_type' name='ddata_contact_style_options[ddata_style_width][type]'>";
	foreach ( $width_types as $width_type ) {
		if ($this->options ['ddata_style_width'] ['type'] == $width_type) {
			echo "<option value='$width_type' selected='selected'>$width_type</option>";
		} else {
			echo "<option value='$width_type'>$width_type</option>";
		}
	}
	echo "</select>";

	echo "<button value='Update' class='button-primary ddata-update-button'>Update</button>";
}
}
?>