<?php
/**
 * Init panel when user can create incomes, outcomes and transfers
 *
 * @since 1.0.0
 */

namespace NHG\Post_Cloner;

use NSukonny\Helpers\Plugin_Singleton;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'NMoney_Panel' ) ) {


	class NMoney_Panel extends Plugin_Singleton {

		protected function init_frontend() {

			add_shortcode( 'nmoney_panel', array( $this, 'shortcode_panel' ) );

		}

		public function shortcode_panel( $atts ) {
			ob_start();

			$user_id = $this->get_user_id();
			$args    = array(
				'history' => $this->get_user_history( $user_id ),
			);
			get_template_part( "templates/panel", null, $args );

			return ob_get_clean();
		}

		/**
		 * Get history of incomes and outcomes for user
		 *
		 * @since 1.0.0
		 *
		 * @param int $user_id
		 *
		 * @return array
		 */
		private function get_user_history( $user_id = 0 ) {

			$history = array();

			return $history;
		}

		/**
		 * Get current user id or guest demo id
		 *
		 * @since 1.0.0
		 */
		private function get_user_id() {

			$user_id = get_current_user_id();

			if ( is_user_logged_in() ) {
				$user_id = get_current_user_id();
			}

			return $user_id;
		}
	}

	NMoney_Panel::instance();
}