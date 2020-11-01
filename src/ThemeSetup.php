<?php

namespace dottxado\theartisaint;

class ThemeSetup {

	/**
	 * Singleton instance
	 *
	 * @var ThemeSetup $instance This instance.
	 */
	private static $instance = null;

	/**
	 * Get class instance
	 *
	 * @return ThemeSetup
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}

		return self::$instance;
	}

	private function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ), 11 );
		add_action( 'wp_head', array( $this, 'add_fonts' ) );
		add_filter( 'storefront_customizer_css', array( $this, 'add_gutenberg_palette' ), 1000 );
	}

	public function enqueue_styles() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	}

	public function theme_setup() {
		load_theme_textdomain( 'dottxado-the-artisaint', get_stylesheet_directory() . '/languages' );
		add_theme_support(
			'editor-color-palette',
			$this->get_palette_colors_for_gutenberg()
		);

	}

	public function add_fonts() {
		?>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
		<?php
	}

	public function add_gutenberg_palette( $style ) {
		$palette = $this->get_palette_colors_for_gutenberg();
		$tmp     = '';
		foreach ( $palette as $color ) {
			$tmp .= '.has-' . $color['slug'] . '-color {color: ' . $color['color'] . '}';
			$tmp .= '.has-' . $color['slug'] . '-background-color {background-color: ' . $color['color'] . '}';
		}

		return $style . $tmp;
	}

	private function get_palette_colors_for_gutenberg() {
		$palette              = StorefrontMods::get_storefront_theme_mods();
		$palette              = array_unique( array_values( $palette ) );
		$editor_color_palette = array();
		$counter              = 1;
		foreach ( $palette as $single_color ) {
			$editor_color_palette[] = array(
				'name'  => 'Palette ' . $counter,
				'slug'  => 'artisaint-palette-' . $counter,
				'color' => $single_color,
			);
			$counter ++;
		}

		return $editor_color_palette;
	}
}
