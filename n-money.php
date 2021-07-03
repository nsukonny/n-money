<?php
/**
 * Plugin Name: NMoney
 * Description: Service for control of expenses and income
 * Version: 1.0.0
 *
 * Author: NSukonny
 * Author URI: https://nsukonny.ru/
 *
 * Text Domain: n-money
 * Domain Path: /languages
 *
 * Requires at least: 5.0
 * Tested up to: 5.7.2
 *
 * @package NSukonny\NMoney
 */

namespace NSukonny\NMoney;

use NSukonny\Helpers\Plugin_Singleton;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NMoney' ) ) {

	require_once __DIR__ . '/nsukonny/class-plugin-singleton.php';

	/**
	 * Main class of the plugin
	 * @package NSukonny\NMoney
	 *
	 * @since 1.0.0
	 */
	final class NMoney extends Plugin_Singleton {

		/**
		 * Prepare actions for Global
		 *
		 * @since 1.0.0
		 */
		public function init_global() {

			require_once __DIR__ . '/includes/class-params.php';

		}

		/**
		 * Prepare actions for FrontEnd
		 *
		 * @since 1.0.0
		 */
		public function init_frontend() {

			add_action( 'wp_loaded', array( $this, 'wp_loaded' ) );

		}

		/**
		 * Init Backend side
		 *
		 * @since 1.0.0
		 */
		public function init_backend() {

			add_action( 'wp_loaded', array( $this, 'wp_loaded_backend' ) );

		}

		/**
		 * Run our plugin when WP will be ready
		 *
		 * @since 1.0.0
		 */
		public function wp_loaded() {

			require_once __DIR__ . '/includes/class-panel.php';

		}

		/**
		 * Run backend side when WP will be ready
		 *
		 * @since 1.0.0
		 */
		public function wp_loaded_backend() {

		}

	}

}

/**
 * Init NMoney
 */
NMoney::instance();