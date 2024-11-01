<?php
/**!
 * Plugin Name:     Social Media Buttons
 * Plugin URI:      https://wordpress.org/plugins/social-media-button/
 * Description:     A WordPress plugin that displays various social media button at Wordpress widgets area.
 * Version:         1.2.0
 * Author:          Sayful Islam
 * Author URI:      http://sayfulislam.com
 * Text Domain:     social-media-button
 * Domain Path:     languages/
 * License:         GPLv2 or later
 */

if ( ! class_exists( 'Social_Media_Button' ) ) {

	class Social_Media_Button {

		/**
		 * Instance of this class.
		 *
		 * @var self
		 */
		protected static $instance = null;

		/**
		 * Return an instance of this class.
		 *
		 * @return self A single instance of this class.
		 */
		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self;

				self::$instance->includes();
				add_action( 'admin_enqueue_scripts', array( self::$instance, 'color_picker' ) );
			}

			return self::$instance;
		}

		/**
		 * Load admin script
		 *
		 * @param string $hook
		 */
		public function color_picker( $hook ) {
			if ( 'widgets.php' == $hook ) {
				wp_enqueue_style( 'wp-color-picker' );
				wp_enqueue_script( 'wp-color-picker' );
			}
		}

		/**
		 * include widget file
		 */
		public function includes() {
			include_once( 'widget-social-media-button.php' );
		}
	}
}

Social_Media_Button::instance();
