<?php
/**
 * Contains constant settings for the plugin
 *
 * @since 1.0.0
 */

namespace NSukonny\NMoney;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NMoney_Params' ) ) {
	
	/**
	 * Contains all parameters and settings for this plugin
	 *
	 * @since 1.0.0
	 *
	 * @package NSukonny\NMoney
	 */
	final class NMoney_Params {

		/**
		 * Demo user for guests
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		public static $demo_user_id = 1;

	}
}