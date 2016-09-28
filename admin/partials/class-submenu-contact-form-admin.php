<?php

/**
 * Provide a submenu admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Portfolio_Gsllery
 * @subpackage Plugin_Name/admin/partials
 */
require 'admin_functions.php';
class ddata_Contact_Form_Options_Submenu {
	private $options;
	/**
	 * The reference to the construct for the class ddata_Contact_Form_Options_Submenu.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action ( 'admin_init', function () {
			$this->options = get_option ( 'ddata_contact_style_options' );
			$this->register_settings_and_fields ();
		} );
		add_action ( 'admin_menu', function () {
			$this->ddata_add_submenu ();
		} );
	}
	/**
	 * The reference to the function that registers the submenu 'style' to the plugin.
	 *
	 * @since 1.0.0
	 */
	public function ddata_add_submenu() {
		add_submenu_page ( 'ddata-contact-form', 'Style for form', 'Styling', 'manage_options', 'ddata-style-submenu', array (
				$this,
				'display_submenu_page' 
		) );
	}
	/**
	 * The reference to the function that displays the page on the submenu.
	 *
	 * @since 1.0.0
	 */
	public function display_submenu_page() {
		?>
<div class="wrap">
					<?php settings_errors();?>
					<?php screen_icon();?>
					<h2>Contact Form Options</h2>
	<form method="POST" action="options.php" id="contact-form"
		enctype="multipart/form-data">
						<?php settings_fields('ddata_contact_submenu_plugin_section');?>
						
						<?php do_settings_sections(__FILE__);?>
						
						<input type="submit" id="submit" class="button-primary"
			value="Save Changes" />
			<?php submit_button( 'Delete Options', 'delete', 'ddata-delete-options' );?>
	</form>
</div>
<?php
	}
	/**
	 * The reference to the function that registers the fields and properties to the submenu.
	 *
	 * @since 1.0.0
	 */
	public function register_settings_and_fields() {
		register_setting ( 'ddata_contact_submenu_plugin_section', 'ddata_contact_style_options' );
		add_settings_section ( 'ddata_contact_style_submenu_section', 'Contact Form Form Container Style ', array (
				$this,
				'ddata_main_style_section_cb' 
		), __FILE__ );
		add_settings_section ( 'ddata_contact_style_submenu', 'Contact Form Style Menu', array (
				$this,
				'ddata_main_style_section_cb' 
		), __FILE__ );
		add_settings_section ( 'ddata_contact_style_submenu_submit_button', 'Contact Form Submit Button Style ', array (
				$this,
				'ddata_main_style_section_cb' 
		), __FILE__ );
		add_settings_section ( 'ddata_contact_style_submenu_hover_submit_button', 'Contact Form Hover Submit Button Style ', array (
				$this,
				'ddata_main_style_section_cb' 
		), __FILE__ );
		add_settings_section ( 'ddata_contact_style_submenu_error_field', 'Contact Form Error Style ', array (
				$this,
				'ddata_main_style_section_cb' 
		), __FILE__ );
		add_settings_field ( 'ddata_style_section_background_color', 'Background Color of Form Container', array (
				$this,
				'ddata_style_section_background_color' 
		), __FILE__, 'ddata_contact_style_submenu_section', array (
				'label_for' => 'ddata-style-section-background-color' 
		) );
		add_settings_field ( 'ddata_style_section_border_color', 'Border Color of Form Container', array (
				$this,
				'ddata_style_section_border_color' 
		), __FILE__, 'ddata_contact_style_submenu_section', array (
				'label_for' => 'ddata-style-section-border-color' 
		) );
		add_settings_field ( 'ddata_style_section_border_style', 'Border Style of Form Container', array (
				$this,
				'ddata_style_section_border_style' 
		), __FILE__, 'ddata_contact_style_submenu_section', array (
				'label_for' => 'ddata-style-section-border-style' 
		) );
		add_settings_field ( 'ddata_style_section_border_width', 'Border Width of Form Container', array (
				$this,
				'ddata_style_section_border_width' 
		), __FILE__, 'ddata_contact_style_submenu_section', array (
				'label_for' => 'ddata-style-section-border-width' 
		) );
		add_settings_field ( 'ddata_style_section_height', 'Height of Form Container', array (
				$this,
				'ddata_style_section_height' 
		), __FILE__, 'ddata_contact_style_submenu_section', array (
				'label_for' => 'ddata-style-section-height' 
		) );
		add_settings_field ( 'ddata_style_section_width', 'Width of Form Container', array (
				$this,
				'ddata_style_section_width' 
		), __FILE__, 'ddata_contact_style_submenu_section', array (
				'label_for' => 'ddata-style-section-width' 
		) );
		add_settings_field ( 'ddata_style_title', 'Title of Form', array (
				$this,
				'ddata_style_title' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-title' 
		) );
		add_settings_field ( 'ddata_style_width', 'Width of Form', array (
				$this,
				'ddata_style_width' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-width' 
		) );
		add_settings_field ( 'ddata_style_orientation', 'Orientation of Form', array (
				$this,
				'ddata_style_orientation' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-orientation' 
		) );
		add_settings_field ( 'ddata_style_label_color', 'Label Color', array (
				$this,
				'ddata_style_label_color' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-label-color' 
		) );
		add_settings_field ( 'ddata_style_input_color', 'Input Color', array (
				$this,
				'ddata_style_input_color' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-input-color' 
		) );
		add_settings_field ( 'ddata_style_input_text_color', 'Input Text Color', array (
				$this,
				'ddata_style_input_text_color' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-input-text-color' 
		) );
		add_settings_field ( 'ddata_style_input_border_color', 'Input Border Color', array (
				$this,
				'ddata_style_input_border_color' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-input-border-color' 
		) );
		add_settings_field ( 'ddata_style_input_border_width', 'Input Border Width', array (
				$this,
				'ddata_style_input_border_width' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-input-border-width' 
		) );
		add_settings_field ( 'ddata_style_input_border_style', 'Input Border Style', array (
				$this,
				'ddata_style_input_border_style' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-input-border-style' 
		) );
		add_settings_field ( 'ddata_style_input_space', 'Space between input fields (percentage)', array (
				$this,
				'ddata_style_input_input_space' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-input-space' 
		) );
		add_settings_field ( 'ddata_style_input_orientation', 'Text Alignment of input fields ', array (
				$this,
				'ddata_style_input_orientation' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-input-orientation' 
		) );
		add_settings_field ( 'ddata_style_background_color', 'Background Color', array (
				$this,
				'ddata_style_background_color' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-background-color' 
		) );
		add_settings_field ( 'ddata_style_border_style', 'Border Style', array (
				$this,
				'ddata_style_border_style' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-border-style' 
		) );
		add_settings_field ( 'ddata_style_border_color', 'Border Color', array (
				$this,
				'ddata_style_border_color' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-border-color' 
		) );
		add_settings_field ( 'ddata_style_border_width', 'Form Border Width', array (
				$this,
				'ddata_style_border_width' 
		), __FILE__, 'ddata_contact_style_submenu', array (
				'label_for' => 'ddata-style-border-width' 
		) );
		add_settings_field ( 'ddata_style_submit_background_color', 'Submit Button <br /> Background Color', array (
				$this,
				'ddata_style_submit_background_color' 
		), __FILE__, 'ddata_contact_style_submenu_submit_button', array (
				'label_for' => 'ddata-style-submit_background-color' 
		) );
		add_settings_field ( 'ddata_style_submit_border_style', 'Submit Button <br /> Border Style', array (
				$this,
				'ddata_style_submit_border_style' 
		), __FILE__, 'ddata_contact_style_submenu_submit_button', array (
				'label_for' => 'ddata-style-submit_border-style' 
		) );
		add_settings_field ( 'ddata_style_submit_border_color', 'Submit Button <br /> Border Color', array (
				$this,
				'ddata_style_submit_border_color' 
		), __FILE__, 'ddata_contact_style_submenu_submit_button', array (
				'label_for' => 'ddata-style-submit_border-color' 
		) );
		add_settings_field ( 'ddata_style_submit_hover_background_color', 'Submit Button <br /> Background Color', array (
				$this,
				'ddata_style_submit_hover_background_color' 
		), __FILE__, 'ddata_contact_style_submenu_hover_submit_button', array (
				'label_for' => 'ddata-style-submit_hover_background-color' 
		) );
		add_settings_field ( 'ddata_style_submit_hover_border_style', 'Submit Button <br /> Border Style', array (
				$this,
				'ddata_style_submit_hover_border_style' 
		), __FILE__, 'ddata_contact_style_submenu_hover_submit_button', array (
				'label_for' => 'ddata-style-submit_hover_border-style' 
		) );
		add_settings_field ( 'ddata_style_submit_hover_border_color', 'Submit Button <br /> Border Color', array (
				$this,
				'ddata_style_submit_hover_border_color' 
		), __FILE__, 'ddata_contact_style_submenu_hover_submit_button', array (
				'label_for' => 'ddata-style-submit_hover_border-color' 
		) );
		add_settings_field ( 'ddata_incorrect_box_border_style', 'Incorrect Box Border Style', array (
				$this,
				'ddata_style_incorrect_box_border_style' 
		), __FILE__, 'ddata_contact_style_submenu_error_field', array (
				'label_for' => 'ddata-style-incorrect-box-border-style' 
		) );
		add_settings_field ( 'ddata_incorrect_box_border_color', 'Incorrect Box Border Color', array (
				$this,
				'ddata_style_incorrect_box_border_color' 
		), __FILE__, 'ddata_contact_style_submenu_error_field', array (
				'label_for' => 'ddata-style-incorrect-box-border-color' 
		) );
		add_settings_field ( 'ddata_incorrect_box_border_width', 'Incorrect Box Border Width', array (
				$this,
				'ddata_style_incorrect_box_border_width' 
		), __FILE__, 'ddata_contact_style_submenu_error_field', array (
				'label_for' => 'ddata-style-incorrect-box-border-width' 
		) );
		add_settings_field ( 'ddata_incorrect_box_height', 'Incorrect Box Border Height', array (
				$this,
				'ddata_style_incorrect_box_height' 
		), __FILE__, 'ddata_contact_style_submenu_error_field', array (
				'label_for' => 'ddata-style-incorrect-box-height' 
		) );
		add_settings_field ( 'ddata_incorrect_box_width', 'Incorrect Box Border Width', array (
				$this,
				'ddata_style_incorrect_box_width' 
		), __FILE__, 'ddata_contact_style_submenu_error_field', array (
				'label_for' => 'ddata-style-incorrect-box-width' 
		) );
		add_settings_field ( 'ddata_incorrect_box_error_background_color', 'Error Background Color', array (
				$this,
				'ddata_style_incorrect_box_error_background_color' 
		), __FILE__, 'ddata_contact_style_submenu_error_field', array (
				'label_for' => 'ddata-style-incorrect-box-error-background-color' 
		) );
		add_settings_field ( 'ddata_incorrect_box_error_text_color', 'Error Text Color', array (
				$this,
				'ddata_style_incorrect_box_error_text_color'
		), __FILE__, 'ddata_contact_style_submenu_error_field', array (
				'label_for' => 'ddata-style-incorrect-box-error-text-color'
		) );
		
	}
	public function ddata_main_style_section_cb() {
		// optional
	}
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
	/**
	 * The reference to the function that chooses the background color for the form container.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_section_background_color() {
		if (isset ( $this->options ['ddata_style_section_background_color'] )) {
			echo "<input id='ddata-style-section-background-color' name='ddata_contact_style_options[ddata_style_section_background_color]' type='color' value='{$this->options['ddata_style_section_background_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_section_background_color'] );
		} else {
			echo "<input id='ddata-style-section-background-color' name='ddata_contact_style_options[ddata_style_section_background_color]' type='color' value=''/>";
		}
	}
	public function ddata_style_section_height() {
		$height_types = array (
				'px',
				'em',
				'%',
				'cm',
				'pt' 
		);
		$this->options ['ddata_style_section_height'] = array (
				'value' => $this->options ['ddata_style_section_height'] ['value'],
				'type' => $this->options ['ddata_style_section_height'] ['type'] 
		);
		if (isset ( $this->options ['ddata_style_section_height'] ['value'] )) {
			echo "<input id='ddata-style-section-height' name='ddata_contact_style_options[ddata_style_section_height][value]' min='50' type='number' value='{$this->options['ddata_style_section_height']['value']}' />";
		} else {
			echo "<input id='ddata-style-section-height' name='ddata_contact_style_options[ddata_style_section_height][value]' type='text' value='' />";
		}
		echo "<select id='ddata_style_section_height_type' name='ddata_contact_style_options[ddata_style_section_height][type]'>";
		foreach ( $height_types as $height_type ) {
			if ($this->options ['ddata_style_section_height'] ['type'] == $height_type) {
				echo "<option value='$height_type' selected='selected'>$height_type</option>";
			} else {
				echo "<option value='$height_type'>$height_type</option>";
			}
		}
		echo "</select>";
		
		echo "<button value='Update' class='button-primary ddata-update-button'>Update</button>";
	}
	public function ddata_style_section_width() {
		$width_types = array (
				'px',
				'em',
				'%',
				'cm',
				'pt' 
		);
		$this->options ['ddata_style_section_width'] = array (
				'value' => $this->options ['ddata_style_section_width'] ['value'],
				'type' => $this->options ['ddata_style_section_width'] ['type'] 
		);
		if (isset ( $this->options ['ddata_style_section_width'] ['value'] )) {
			echo "<input id='ddata-style-section-width' name='ddata_contact_style_options[ddata_style_section_width][value]' min='50' type='number' value='{$this->options['ddata_style_section_width']['value']}' />";
		} else {
			echo "<input id='ddata-style-section-width' name='ddata_contact_style_options[ddata_style_section_width][value]' type='text' value='' />";
		}
		echo "<select id='ddata_style_section_width_type' name='ddata_contact_style_options[ddata_style_section_width][type]'>";
		foreach ( $width_types as $width_type ) {
			if ($this->options ['ddata_style_section_width'] ['type'] == $width_type) {
				echo "<option value='$width_type' selected='selected'>$width_type</option>";
			} else {
				echo "<option value='$width_type'>$width_type</option>";
			}
		}
		echo "</select>";
		
		echo "<button value='Update' class='button-primary ddata-update-button'>Update</button>";
	}
	/**
	 * The reference to the function that chooses the border width for the form container.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_section_border_width() {
		if (isset ( $this->options ['ddata_style_section_border_width'] )) {
			echo "<input id='ddata-style-section-border-width' name='ddata_contact_style_options[ddata_style_section_border_width]' type='number' value='{$this->options['ddata_style_section_border_width']}'/>";
		} else {
			echo "<input id='ddata-style-section-border-width' name='ddata_contact_style_options[ddata_style_section_border_width]' type='number' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the border color for the form container.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_section_border_color() {
		if (isset ( $this->options ['ddata_style_section_border_color'] )) {
			echo "<input id='ddata-style-section-border-color' name='ddata_contact_style_options[ddata_style_section_border_color]' type='color' value='{$this->options['ddata_style_section_border_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_section_border_color'] );
		} else {
			echo "<input id='ddata-style-section-border-color' name='ddata_contact_style_options[ddata_style_section_border_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the border style for the form container
	 * 
	 * @since 1.0.0
	 */
	public function ddata_style_section_border_style() {
		$border_styles = array (
				'dotted',
				'dashed',
				'solid',
				'double',
				'groove',
				'ridge',
				'inset',
				'outset',
				'none',
				'hidden' 
		);
		echo "<select id='ddata-style-section-border-style' name='ddata_contact_style_options[ddata_style_section_border_style]'>";
		foreach ( $border_styles as $border_style ) {
			if ($this->options ['ddata_style_section_border_style'] === $border_style) {
				echo "<option value='{$border_style}' selected='selected'>{$border_style}</option>";
			} else {
				echo "<option value='{$border_style}'>$border_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the orientation for the form container.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_input_orientation() {
		$orientation_styles = array (
				'left',
				'center',
				'right' 
		);
		echo "<select id='ddata-style-input-orientation' name='ddata_contact_style_options[ddata_style_input_orientation]'>";
		foreach ( $orientation_styles as $orientation_style ) {
			if ($this->options ['ddata_style_input_orientation'] === $orientation_style) {
				echo "<option value='{$orientation_style}' selected='selected'>{$orientation_style}</option>";
			} else {
				echo "<option value='{$orientation_style}'>$orientation_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the orientation for the form container.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_orientation() {
		$orientation_styles = array (
				'left',
				'center',
				'right' 
		);
		echo "<select id='ddata-style-section-orientation' name='ddata_contact_style_options[ddata_style_section_orientation]'>";
		foreach ( $orientation_styles as $orientation_style ) {
			if ($this->options ['ddata_style_section_orientation'] === $orientation_style) {
				echo "<option value='{$orientation_style}' selected='selected'>{$orientation_style}</option>";
			} else {
				echo "<option value='{$orientation_style}'>$orientation_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the color for the labels.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_label_color() {
		if (isset ( $this->options ['ddata_style_label_color'] )) {
			echo "<input id='ddata-style-label-color' name='ddata_contact_style_options[ddata_style_label_color]' type='color' value='{$this->options['ddata_style_label_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_label_color'] );
		} else {
			echo "<input id='ddata-style-label-color' name='ddata_contact_style_options[ddata_style_label_color]' type='color' value=''/>";
		}
	}
	public function ddata_style_input_text_color() {
		if (isset ( $this->options ['ddata_style_input_text_color'] )) {
			echo "<input id='ddata-style-input-text-color' name='ddata_contact_style_options[ddata_style_input_text_color]' type='color' value='{$this->options['ddata_style_input_text_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_input_text_color'] );
		} else {
			echo "<input id='ddata-style-input_text-color' name='ddata_contact_style_options[ddata_style_input_text_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the color for the input fields.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_input_color() {
		if (isset ( $this->options ['ddata_style_input_color'] )) {
			echo "<input id='ddata-style-input-color' name='ddata_contact_style_options[ddata_style_input_color]' type='color' value='{$this->options['ddata_style_input_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_input_color'] );
		} else {
			echo "<input id='ddata-style-input-color' name='ddata_contact_style_options[ddata_style_input_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the color for the input borders.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_input_border_color() {
		if (isset ( $this->options ['ddata_style_input_border_color'] )) {
			echo "<input id='ddata-style-input-border-color' name='ddata_contact_style_options[ddata_style_input_border_color]' type='color' value='{$this->options['ddata_style_input_border_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_input_border_color'] );
		} else {
			echo "<input id='ddata-style-input-border-color' name='ddata_contact_style_options[ddata_style_input_border_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the border style for the input.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_input_border_style() {
		$border_styles = array (
				'dotted',
				'dashed',
				'solid',
				'double',
				'groove',
				'ridge',
				'inset',
				'outset',
				'none',
				'hidden' 
		);
		echo "<select id='ddata-style-input-border-style' name='ddata_contact_style_options[ddata_style_input_border_style]'>";
		foreach ( $border_styles as $border_style ) {
			if ($this->options ['ddata_style_input_border_style'] === $border_style) {
				echo "<option value='{$border_style}' selected='selected'>{$border_style}</option>";
			} else {
				echo "<option value='{$border_style}'>$border_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the border width for the input fields.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_input_border_width() {
		if (isset ( $this->options ['ddata_style_input_border_width'] )) {
			echo "<input id='ddata-style-input-border-width' name='ddata_contact_style_options[ddata_style_input_border_width]' type='number' value='{$this->options['ddata_style_input_border_width']}'/>";
		} else {
			echo "<input id='ddata-style-input-border-width' name='ddata_contact_style_options[ddata_style_input_border_width]' type='number' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the color for the form background.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_background_color() {
		if (isset ( $this->options ['ddata_style_background_color'] )) {
			echo "<input id='ddata-style-background-color' name='ddata_contact_style_options[ddata_style_background_color]' type='color' value='{$this->options['ddata_style_background_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_background_color'] );
		} else {
			echo "<input id='ddata-style-background-color' name='ddata_contact_style_options[ddata_style_background_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the input space for the form.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_input_input_space() {
		if (isset ( $this->options ['ddata_style_input_space'] )) {
			echo "<input id='ddata-style-input-space' name='ddata_contact_style_options[ddata_style_input_space]' type='number' min='2' value='{$this->options['ddata_style_input_space']}'/>";
		} else {
			echo "<input id='ddata-style-input-space' name='ddata_contact_style_options[ddata_style_input_space]' type='number' min='2' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the style for the form border.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_border_style() {
		$border_styles = array (
				'dotted',
				'dashed',
				'solid',
				'double',
				'groove',
				'ridge',
				'inset',
				'outset',
				'none',
				'hidden' 
		);
		echo "<select id='ddata-style-border-style' name='ddata_contact_style_options[ddata_style_border_style]'>";
		foreach ( $border_styles as $border_style ) {
			if ($this->options ['ddata_style_border_style'] === $border_style) {
				echo "<option value='{$border_style}' selected='selected'>{$border_style}</option>";
			} else {
				echo "<option value='{$border_style}'>$border_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the color for the form border.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_border_color() {
		if (isset ( $this->options ['ddata_style_border_color'] )) {
			echo "<input id='ddata-style-border-color' name='ddata_contact_style_options[ddata_style_border_color]' type='color' value='{$this->options['ddata_style_border_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_border_color'] );
		} else {
			echo "<input id='ddata-style-border-color' name='ddata_contact_style_options[ddata_style_border_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the border width for the input fields.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_border_width() {
		if (isset ( $this->options ['ddata_style_border_width'] )) {
			echo "<input id='ddata-style-border-width' name='ddata_contact_style_options[ddata_style_border_width]' type='number' value='{$this->options['ddata_style_border_width']}'/>";
		} else {
			echo "<input id='ddata-style-border-width' name='ddata_contact_style_options[ddata_style_border_width]' type='number' value=''/>";
		}
		echo "<br /><button value='Update' class='button-primary ddata-style-update-button'>Update</button>";
	}
	/**
	 * The reference to the function that chooses the color for the background color of teh submit button.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_submit_background_color() {
		if (isset ( $this->options ['ddata_style_submit_background_color'] )) {
			echo "<input id='ddata-style-submit-background-color' name='ddata_contact_style_options[ddata_style_submit_background_color]' type='color' value='{$this->options['ddata_style_submit_background_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_submit_background_color'] );
		} else {
			echo "<input id='ddata-style-submit-background-color' name='ddata_contact_style_options[ddata_style_submit_background_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the style for the border of the submit button.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_submit_border_style() {
		$border_styles = array (
				'dotted',
				'dashed',
				'solid',
				'double',
				'groove',
				'ridge',
				'inset',
				'outset',
				'none',
				'hidden' 
		);
		echo "<select id='ddata-style-submit-border-style' name='ddata_contact_style_options[ddata_style_submit_border_style]'>";
		foreach ( $border_styles as $border_style ) {
			if ($this->options ['ddata_style_submit_border_style'] === $border_style) {
				echo "<option value='{$border_style}' selected='selected'>{$border_style}</option>";
			} else {
				echo "<option value='{$border_style}'>$border_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the color for the border of the submit button.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_submit_border_color() {
		if (isset ( $this->options ['ddata_style_submit_border_color'] )) {
			echo "<input id='ddata-style-submit-border-color' name='ddata_contact_style_options[ddata_style_submit_border_color]' type='color' value='{$this->options['ddata_style_submit_border_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_submit_border_color'] );
		} else {
			echo "<input id='ddata-style-submit-border-color' name='ddata_contact_style_options[ddata_style_submit_border_color]' type='color' value=''/>";
		}
		echo "<br /><button value='Update' class='button-primary ddata-style-update-button'>Update</button>";
	}
	/**
	 * The reference to the function that chooses the background color for the submit button on hover.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_submit_hover_background_color() {
		if (isset ( $this->options ['ddata_style_hover_submit_background_color'] )) {
			echo "<input id='ddata-style-hover-submit-background-color' name='ddata_contact_style_options[ddata_style_hover_submit_background_color]' type='color' value='{$this->options['ddata_style_hover_submit_background_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_submit_background_color'] );
		} else {
			echo "<input id='ddata-style-hover-submit-background-color' name='ddata_contact_style_options[ddata_style_hover_submit_background_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the border style for the submit button on hover.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_submit_hover_border_style() {
		$border_styles = array (
				'dotted',
				'dashed',
				'solid',
				'double',
				'groove',
				'ridge',
				'inset',
				'outset',
				'none',
				'hidden' 
		);
		echo "<select id='ddata-style-hover-submit-border-style' name='ddata_contact_style_options[ddata_style_hover_submit_border_style]'>";
		foreach ( $border_styles as $border_style ) {
			if ($this->options ['ddata_style_hover_submit_border_style'] === $border_style) {
				echo "<option value='{$border_style}' selected='selected'>{$border_style}</option>";
			} else {
				echo "<option value='{$border_style}'>$border_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the border color for the submit button on hover.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_submit_hover_border_color() {
		if (isset ( $this->options ['ddata_style_hover_submit_border_color'] )) {
			echo "<input id='ddata-style-hover-submit-border-color' name='ddata_contact_style_options[ddata_style_hover_submit_border_color]' type='color' value='{$this->options['ddata_style_hover_submit_border_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_hover_submit_border_color'] );
		} else {
			echo "<input id='ddata-style-hover-submit-border-color' name='ddata_contact_style_options[ddata_style_hover_submit_border_color]' type='color' value=''/>";
		}
	}
	
	/**
	 * The reference to the function that chooses the border style for the Incorrect Box.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_incorrect_box_border_style() {
		$border_styles = array (
				'dotted',
				'dashed',
				'solid',
				'double',
				'groove',
				'ridge',
				'inset',
				'outset',
				'none',
				'hidden' 
		);
		echo "<select id='ddata-style-incorrect-box-border-style' name='ddata_contact_style_options[ddata_style_incorrect_box_border_style]'>";
		foreach ( $border_styles as $border_style ) {
			if ($this->options ['ddata_style_incorrect_box_border_style'] === $border_style) {
				echo "<option value='{$border_style}' selected='selected'>{$border_style}</option>";
			} else {
				echo "<option value='{$border_style}'>$border_style</option> ";
			}
		}
		echo "</select>";
	}
	/**
	 * The reference to the function that chooses the color for the incorrect box.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_incorrect_box_border_color() {
		if (isset ( $this->options ['ddata_style_incorrect_box_border_color'] )) {
			echo "<input id='ddata-style-incorrect-box-border-color' name='ddata_contact_style_options[ddata_style_incorrect_box_border_color]' type='color' value='{$this->options['ddata_style_incorrect_box_border_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_incorrect_box_border_color'] );
		} else {
			echo "<input id='ddata-style-incorrect-box-border-color' name='ddata_contact_style_options[ddata_style_incorrect_box_border_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the border width for the input fields.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_incorrect_box_border_width() {
		if (isset ( $this->options ['ddata_style_incorrect_box_border_width'] )) {
			echo "<input id='ddata-style-incorrect-box-border-width' name='ddata_contact_style_options[ddata_style_incorrect_box_border_width]' type='number' value='{$this->options['ddata_style_incorrect_box_border_width']}'/>";
		} else {
			echo "<input id='ddata-style-incorrect-box-border-width' name='ddata_contact_style_options[ddata_style_incorrect_box_border_width]' type='number' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the height for the incorrect field.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_incorrect_box_height() {
		$height_types = array (
				'px',
				'em',
				'%',
				'cm',
				'pt' 
		);
		$this->options ['ddata_style_incorrect_box_height'] = array (
				'value' => $this->options ['ddata_style_incorrect_box_height'] ['value'],
				'type' => $this->options ['ddata_style_incorrect_box_height'] ['type'] 
		);
		if (isset ( $this->options ['ddata_style_incorrect_box_height'] ['value'] )) {
			echo "<input id='ddata-style-inorrect-box-height' name='ddata_contact_style_options[ddata_style_incorrect_box_height][value]' min='50' type='number' value='{$this->options['ddata_style_incorrect_box_height']['value']}' />";
		} else {
			echo "<input id='ddata-style-incorrect-box-height' name='ddata_contact_style_options[ddata_style_incorrect_box_height][value]' type='text' value='' />";
		}
		echo "<select id='ddata_style_incorrect_box_height_type' name='ddata_contact_style_options[ddata_style_incorrect_box_height][type]'>";
		foreach ( $height_types as $height_type ) {
			if ($this->options ['ddata_style_incorrect_box_height'] ['type'] == $height_type) {
				echo "<option value='$height_type' selected='selected'>$height_type</option>";
			} else {
				echo "<option value='$height_type'>$height_type</option>";
			}
		}
		echo "</select>";
		echo "<button value='Update' class='button-primary ddata-update-button'>Update</button>";
	}
	/**
	 * The reference to the function that chooses the width for the incorrect field.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_incorrect_box_width() {
		$width_types = array (
				'px',
				'em',
				'%',
				'cm',
				'pt' 
		);
		$this->options ['ddata_style_incorrect_box_width'] = array (
				'value' => $this->options ['ddata_style_incorrect_box_width'] ['value'],
				'type' => $this->options ['ddata_style_incorrect_box_width'] ['type'] 
		);
		if (isset ( $this->options ['ddata_style_incorrect_box_width'] ['value'] )) {
			echo "<input id='ddata-style-incorrect-box-width' name='ddata_contact_style_options[ddata_style_incorrect_box_width][value]' min='50' type='number' value='{$this->options['ddata_style_incorrect_box_width']['value']}' />";
		} else {
			echo "<input id='ddata-style-incorrect-box-width' name='ddata_contact_style_options[ddata_style_incorrect_box_width][value]' type='text' value='' />";
		}
		echo "<select id='ddata_style_incorrect_box_width_type' name='ddata_contact_style_options[ddata_style_incorrect_box_width][type]'>";
		foreach ( $width_types as $width_type ) {
			if ($this->options ['ddata_style_incorrect_box_width'] ['type'] == $width_type) {
				echo "<option value='$width_type' selected='selected'>$width_type</option>";
			} else {
				echo "<option value='$width_type'>$width_type</option>";
			}
		}
		echo "</select>";
		
		echo "<button value='Update' class='button-primary ddata-update-button'>Update</button>";
	}
	/**
	 * The reference to the function that chooses the background color for the error incorrect field.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_incorrect_box_error_background_color() {
		if (isset ( $this->options ['ddata_style_incorrect_box_error_background_color'] )) {
			echo "<input id='ddata-style-incorrect-box-error-background-color' name='ddata_contact_style_options[ddata_style_incorrect_box_error_background_color]' type='color' value='{$this->options['ddata_style_incorrect_box_error_background_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_incorrect_box_error_background_color'] );
		} else {
			echo "<input id='ddata-style-incorrect-box-error-background-color' name='ddata_contact_style_options[ddata_style_incorrect_box_error-background_color]' type='color' value=''/>";
		}
	}
	/**
	 * The reference to the function that chooses the text color for the error incorrect field.
	 *
	 * @since 1.0.0
	 */
	public function ddata_style_incorrect_box_error_text_color() {
		if (isset ( $this->options ['ddata_style_incorrect_box_error_text_color'] )) {
			echo "<input id='ddata-style-incorrect-box-error-text-color' name='ddata_contact_style_options[ddata_style_incorrect_box_error_text_color]' type='color' value='{$this->options['ddata_style_incorrect_box_error_text_color']}'/>";
			echo hex2rgb ( $this->options ['ddata_style_incorrect_box_error_text_color'] );
		} else {
			echo "<input id='ddata-style-incorrect-box-error-text-color' name='ddata_contact_style_options[ddata_style_incorrect_box_error_text_color]' type='color' value=''/>";
		}
	}
}
