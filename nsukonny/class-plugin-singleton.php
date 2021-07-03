<?php
/**
 * This is Core class for create singleton as core of the plugin
 *
 * @since 1.0.0
 */

namespace NSukonny\Helpers;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Plugin_Singleton' ) ) {
	/**
	 * Core class for NSukonny plugins
	 *
	 * @since 1.0.0
	 *
	 * @package NHG\Post_Cloner
	 */
	class Plugin_Singleton {

		/**
		 * Instance
		 *
		 * @since 1.0.0
		 */
		protected static $instance;

		/**
		 * It is backend?
		 *
		 * @since 1.0.0
		 *
		 * @var null
		 */
		protected static $is_backend = false;

		/**
		 * Plugin_Singleton constructor.
		 *
		 * @since 1.0.0
		 */
		final protected function __construct() {

			$this->init_global();

			if ( self::is_frontend() ) {
				$this->init_frontend();
			}

			if ( self::is_backend() ) {
				$this->init_backend();
			}
		}

		/**
		 * Init methods for global use
		 *
		 * @since 1.0.0
		 */
		protected function init_global() {

		}

		/**
		 * Protected method for init FrontEnd actions
		 *
		 * @since 1.0.0
		 */
		protected function init_frontend() {

		}

		/**
		 * Protected method for init BackEnd actions
		 *
		 * @since 1.0.0
		 */
		protected function init_backend() {

		}

		/**
		 * Get instance by Singleton
		 *
		 * @since 1.0.0
		 * @retun self|mixed
		 */
		final public static function instance() {

			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public static function is_backend() {

			if ( null !== static::$is_backend ) {
				return static::$is_backend;
			}

			static::$is_backend = (
				( defined( 'DOING_CRON' ) && DOING_CRON ) ||
				( defined( 'WP_CLI' ) && WP_CLI ) ||
				( isset( $_SERVER['HTTP_REFERER'] ) && strpos( $_SERVER['HTTP_REFERER'], 'wp-admin' ) !== false ) ||
				( is_admin() && ! wp_doing_ajax() )
			);

			return static::$is_backend;
		}

		public static function is_frontend() {

			return ! self::is_backend();
		}

	}
}