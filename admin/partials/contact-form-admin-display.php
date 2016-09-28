<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Portfolio_Gsllery
 * @subpackage Plugin_Name/admin/partials
 */
?>
<?php

class ddata_Contact_Options {
	private $options;
	public function __construct() {
		add_action ( 'admin_menu', function () {
			$this->add_menu_page ();
			
		} );
		add_action ( 'admin_init', function () {
			$this->options = get_option ( 'ddata_contact_options' );
			$this->register_settings_and_fields ();
		} );
	}
	/**
	 * The reference to the function that adds the menu page to the dashboard.
	 *
	 * @since 1.0.0
	 */
	public function add_menu_page() {
		add_menu_page ( 'Theme Options', 'Contact Form', 'administrator', 'ddata-contact-form', array (
				$this,
				'display_options_page' 
		), '', '59' );
	}
	/**
	 * The reference to the function that displays the menu page to the admin page.
	 *
	 * @since 1.0.0
	 */
	public function display_options_page() {
		?>
<div class="wrap">
			<?php settings_errors();?>
			<?php screen_icon();?>
			<h2>Contact Form Options</h2>
	<p>To activate plugin on your website, please add "[ddata1_contact_form]" onto
		the page you wish for the contact form to appear on.</p>
	<form method="POST" action="options.php" id="contact-form"
		enctype="multipart/form-data">
				<?php settings_fields('ddata_contact_plugin_section');?>
				<?php do_settings_sections(__FILE__);?>
				
				<input type="submit" id="submit" class="button-primary"
			value="Save Changes" />
	</form>
</div>
<?php
	}
	/**
	 * The reference to the function that registers the fields and properties to the plugin.
	 *
	 * @since 1.0.0
	 */
	public function register_settings_and_fields() {
		register_setting ( 'ddata_contact_plugin_section', 'ddata_contact_options' );
		add_settings_section ( 'ddata_contact', 'Contact Form Menu', array (
				$this,
				'ddata_main_section_cb' 
		), __FILE__ );
		add_settings_section ( 'ddata_contact_input_fields', 'Contact Form  Input Fields', array (
				$this,
				'ddata_main_section_cb' 
		), __FILE__ );
		add_settings_field ( 'ddata_title', 'Form Title', array (
				$this,
				'ddata_title' 
		), __FILE__, 'ddata_contact', array (
				'label_for' => 'ddata-title' 
		) );
		add_settings_field ( 'ddata_send-email', 'What email do you want the form to send to?', array (
				$this,
				'ddata_send_email'
		), __FILE__, 'ddata_contact', array (
				'label_for' => 'ddata-notification'
		) );
		add_settings_field ( 'ddata_notification', 'Do you want error field?', array (
				$this,
				'ddata_notification' 
		), __FILE__, 'ddata_contact', array (
				'label_for' => 'ddata-notification' 
		) );
		if ($this->options ['ddata_notification'] == 'Yes') {
			add_settings_field ( 'ddata_notification_message', 'What do you want the error field to say?', array (
					$this,
					'ddata_notification_message' 
			), __FILE__, 'ddata_contact', array (
					'label_for' => 'ddata-notification-message' 
			) );
		}
		add_settings_field ( 'ddata_amount', 'Amount of Form Fields', array (
				$this,
				'ddata_amount' 
		), __FILE__, 'ddata_contact_input_fields', array (
				'label_for' => 'ddata-amount' 
		) );
		if (isset ( $this->options ['ddata_amount'] )) {
			$gallery_fields = $this->options ['ddata_amount'];
			$i = 1;
			while ( $i <= $gallery_fields ) {
				$args = array (
						'ddata_contact_field_' . $i,
						'label_for' => 'ddata_contact_field_' . $i 
				);
				add_settings_field ( "ddata_contact_form_" . $i, 'Contact Field ' . $i, array (
						$this,
						'ddata_contact_field' 
				), __FILE__, 'ddata_contact_input_fields', $args );
				$i ++;
			}
		}
	}
	public function ddata_main_section_cb() {
		// optional
	}
	/**
	 * The reference to the function that creates the input field for the title.
	 *
	 * @since 1.0.0
	 */
	public function ddata_title() {
		if (isset ( $this->options ['ddata_title'] )) {
			echo "<input id='ddata-title' name='ddata_contact_options[ddata_title]' required='required' type='text' value='{$this->options['ddata_title']}'/>";
		} else {
			echo "<input id='ddata-title' name='ddata_contact_options[ddata_title]' required='required' type='text' value=''/>";
		}
	}
	/**
	 * The reference to the function that creates the input field for the title.
	 *
	 * @since 1.0.0
	 */
	public function ddata_amount() {
		echo "<select required='required' id='ddata-amount' name='ddata_contact_options[ddata_amount]'>";
		$i = 1;
		while ( $i <= 10 ) {
			if ($this->options ['ddata_amount'] == $i) {
				echo "<option value='$i' selected='selected'>$i</option> ";
			} else {
				echo "<option value='$i'>$i</option> ";
			}
			$i ++;
		}
		echo "</select>";
		echo "<button value='Update' class='button-primary ddata-update-button'>Update</button>";
	}
	/**
	 * The reference to the function that creates the input field for the title.
	 *
	 * @since 1.0.0
	 */
	public function ddata_contact_field($args) {
		$input_options = array (
				'text',
				'password',
				'submit',
				'radio',
				'checkbox',
				'number',
				'date',
				'color',
				'email',
				'search',
				'tel' 
		);
		$required_options = array(
				'Yes',
				'No'
		);
		foreach ( $args as $key ) {
			$name = $key;
		}
		if (isset ( $this->options [$name] )) {
			$this->options [$name] = array (
					'value' => $this->options [$name] ['value'],
					'type' => $this->options [$name] ['type'],
					'amount' => $this->options [$name] ['amount'],
					'required' => $this->options [$name] ['required']
			);
		} else {
			$this->options [$name] = array (
					'value' => '',
					'type' => 'text',
					'amount' => '1',
					'required' => 'No'
			);
		}
		echo "<select name='ddata_contact_options[$name][type]' required='required'>";
		foreach ( $input_options as $input_option ) {
			if ($this->options [$name] ['type'] == $input_option) {
				echo "<option value='$input_option' selected='selected'>$input_option</option>";
			} else {
				echo "<option value='$input_option'>$input_option</option>";
			}
		}
		
		echo "</select><br/>";
		echo "<p>Is this field a required field?</p><select name='ddata_contact_options[$name][required]' required='required'>";
		foreach ( $required_options as $required_option ) {
			if ($this->options [$name] ['type'] == $required_option) {
				echo "<option value='$required_option' selected='selected'>$required_option</option>";
			} else {
				echo "<option value='$required_option'>$required_option</option>";
			}
		}
		
		echo "</select><br/>";
		include 'contact_field_selection.php';
	}
	/**
	 * The reference to the function that creates the select field for the notificaiton.
	 *
	 * @since 1.0.0
	 */
	public function ddata_notification() {
		$notification_options = array (
				'Yes',
				'No' 
		);
		echo "<select id='ddata-notification' name='ddata_contact_options[ddata_notification]' required='required'>";
		foreach ( $notification_options as $notification_option ) {
			if ($this->options ['ddata_notification'] == $notification_option) {
				echo "<option value='$notification_option' selected='selected'>$notification_option</option>";
			} else {
				echo "<option value='$notification_option'>$notification_option</option>";
			}
		}
		echo "</select>";
		echo "<button value='Update' class='button-primary ddata-update-button'>Update</button>";
	}
	/**
	 * The reference to the function that creates the message field for the notificaiton.
	 *
	 * @since 1.0.0
	 */
	public function ddata_notification_message() {
		if (isset ( $this->options ['ddata_notification_message'] )) {
			echo "<input id='ddata-notification-message' name='ddata_contact_options[ddata_notification_message]' required='required' type='text' value='{$this->options['ddata_notification_message']}'/>";
		} else {
			echo "<input id='ddata-notification-message' name='ddata_contact_options[ddata_notification_message]' required='required' type='text' value=''/>";
		}
	}
	/**
	 * The reference to the function that creates the send email input field.
	 *
	 * @since 1.0.0
	 */
	public function ddata_send_email(){
		if (isset ( $this->options ['ddata_send_email'] )) {
			echo "<input id='ddata-send-email' name='ddata_contact_options[ddata_send_email]' required='required' type='text' value='{$this->options['ddata_send_email']}'/>";
		} else {
			echo "<input id='ddata-send-email' name='ddata_contact_options[ddata_send_email]' required='required' type='text' value=''/>";
		}
	}
		
}

?>