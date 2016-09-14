<?php

class Themify_Shortcodes {

	private static $instance = null;

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @return	A single instance of this class.
	 */
	public static function get_instance() {
		return null == self::$instance ? self::$instance = new self : self::$instance;
	}

	private function __construct() {
		if( $this->is_using_themify_theme() ) {
			// if we're using a Themify theme, bail out, shortcodes are included with the theme.
			return;
		} else {
			add_action( 'init', array( $this, 'load_themify_library' ), 1 );
			add_action( 'init', array( $this, 'includes' ), 5 );
			add_action( 'init', array( $this, 'admin' ), 9 );
			add_action( 'admin_enqueue_scripts', 'themify_enqueue_scripts' );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 11 );
			add_filter( 'themify_twitter_credentials', array( $this, 'themify_twitter_credentials' ) );
			add_filter( 'themify_get_shortcode_template_file', array( $this, 'themify_get_shortcode_template_file' ), 10, 3 );
			add_filter( 'themify_twitter_missing_key_message', array( $this, 'themify_twitter_missing_key_message' ) );
		}
	}

	/**
	 * Returns true if the active theme is using Themify framework
	 *
	 * @return bool
	 */
	public function is_using_themify_theme() {
		return file_exists( get_template_directory() . '/themify/themify-utils.php' );
	}

	public function load_themify_library() {
		if( ! defined( 'THEMIFY_VERSION' ) ) {
			define( 'THEMIFY_VERSION', '2.3.3' );
			define( 'THEMIFY_URI', THEMIFY_SHORTCODES_URI . 'themify' );
			define( 'THEMIFY_DIR', THEMIFY_SHORTCODES_DIR . 'themify' );
			include( THEMIFY_DIR . '/themify-database.php' );
			include( THEMIFY_DIR . '/img.php' );
			include( THEMIFY_DIR . '/themify-utils.php' );
			include( THEMIFY_DIR . '/themify-hooks.php' );
		}
		if( ! class_exists( 'Themify_TinyMCE' ) ) {
			define( 'THEMIFY_TINYMCE_URI', THEMIFY_SHORTCODES_URI . 'themify/tinymce/' );
			define( 'THEMIFY_TINYMCE_DIR', THEMIFY_SHORTCODES_DIR . 'themify/tinymce/' );

			include( THEMIFY_TINYMCE_DIR . 'class-themify-tinymce.php' );
			include( THEMIFY_TINYMCE_DIR . 'dialog.php' );
		}
	}

	public function includes() {
		include( THEMIFY_SHORTCODES_DIR . 'themify/themify-shortcodes.php' );
		include( THEMIFY_SHORTCODES_DIR . 'includes/theme-options.php' );
	}

	public function enqueue() {
		wp_enqueue_style( 'themify-icon-font', THEMIFY_URI . '/fontawesome/css/font-awesome.min.css', array(), THEMIFY_VERSION );
		wp_enqueue_script( 'jquery' );
		wp_dequeue_style( 'themify-framework' );
		wp_enqueue_style( 'themify-shortcodes', THEMIFY_SHORTCODES_URI . 'assets/style.css' );
	}

	public function admin() {
		if( is_admin() ) {
			include( THEMIFY_SHORTCODES_DIR . 'includes/admin.php' );
			new Builder_Shortcodes_Admin();
		}
	}

	/**
	 * Filter the credentials used by Twitter API, retrieve from plugin options
	 *
	 * @return array
	 */
	public function themify_twitter_credentials( $credentials ) {
		$options = get_option( 'themify_shortcodes' );
		if( isset( $options['twitter_consumer_key'] ) ) {
			$credentials['consumer_key'] = $options['twitter_consumer_key'];
		}
		if( isset( $options['twitter_consumer_secret'] ) ) {
			$credentials['consumer_secret'] = $options['twitter_consumer_secret'];
		}

		return $credentials;
	}

	/**
	 * When loop template file does not exist, use the one bundled in the plugin
	 *
	 * To override the loop.php template file copy it to /includes folder in the theme and rename
	 * the file to "themify-list-posts-loop.php".
	 *
	 * @return string
	 */
	public function themify_get_shortcode_template_file( $file, $slug, $name ) {
		if( $theme_file = locate_template( array( 'includes/themify-list-posts-loop.php' ) ) ) {
			$file = $theme_file;
		} else {
			$file = THEMIFY_SHORTCODES_DIR . 'includes/loop.php';
		}

		return $file;
	}

	public function themify_twitter_missing_key_message( $message ) {
		return sprintf( __( 'Error: access keys missing in <a href="%s">Settings > Themify Shortcodes</a>', 'themify-shortcodes' ), admin_url( 'options-general.php?page=themify-shortcodes' ) );
	}
}