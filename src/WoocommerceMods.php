<?php

namespace dottxado\theartisaint;

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

	private function __construct() {
		//add_filter( 'woocommerce_show_page_title', array( $this, 'hide_shop_page_title' ) );
		add_action( 'wp', array( $this, 'remove_actions' ) );
	}

	public function remove_actions() {

		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	}

	public function hide_shop_page_title() {
		if ( is_shop() && is_post_type_archive( 'product' ) ) {
			return false;
		}

		return true;
	}
}
