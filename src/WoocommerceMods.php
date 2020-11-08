<?php
/**
 * Customizations for WooCommerce
 *
 * @package dottxado\theartisaint
 */

namespace dottxado\theartisaint;

/**
 * Class WoocommerceMods
 *
 * @package dottxado\theartisaint
 */
class WoocommerceMods {
	/**
	 * Singleton instance
	 *
	 * @var WoocommerceMods $instance This instance.
	 */
	private static $instance = null;

	/**
	 * Get class instance
	 *
	 * @return WoocommerceMods
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}

		return self::$instance;
	}

	/**
	 * WoocommerceMods constructor.
	 */
	private function __construct() {
		add_action( 'wp', array( $this, 'remove_actions' ) );
	}

	/**
	 * Remove WooCommerce actions
	 */
	public function remove_actions() {
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	}

}
