<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Contact_Form_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * The options of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $options    The current option of this plugin.
	 */
	private $options;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->options = get_option('ddata_contact_options');
		$this->display_contact_form();
	}
	public function display_contact_form(){
		require_once "partials/contact-form-public-display.php";
		require_once 'css/css_file.php';
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( $this->plugin_name . '-default-stylesheet', plugin_dir_url( __FILE__ ) . 'css/defaultContactFormValues.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-dynamic-stylesheet', plugin_dir_url( __FILE__ ) . 'css/contact-form-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-datepicker-css', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), $this->version, 'all' );
		wp_enqueue_style($this->plugin_name . '-mobile-stylesheet', plugin_dir_url(__FILE__) . 'css/contact-form-mobile-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name .'-datepicker', plugin_dir_url( __FILE__ ) . 'js/jquery-ui.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name .'-main-javascript', plugin_dir_url( __FILE__ ) . 'js/Contact.js', array( 'jquery' ), $this->version, false );
		$ddata_nonce = wp_create_nonce('ddata-contact-nonce');
		wp_localize_script($this->plugin_name . '-main-javascript', 'ajaxObj', array(
			'ajaxurl' => admin_url('admin-ajax.php'),
			'nonce' => $ddata_nonce
		));
	}
}
