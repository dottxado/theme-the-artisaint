<?php

namespace dottxado\theartisaint;

class ThemeDocumentation {
	/**
	 * Singleton instance
	 *
	 * @var ThemeDocumentation $instance This instance.
	 */
	private static $instance = null;

	const PAGE_SLUG = 'dottxado-the-artisaint';

	/**
	 * Get class instance
	 *
	 * @return ThemeDocumentation
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}

		return self::$instance;
	}

	private function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_page' ) );
	}

	public function add_admin_page() {
		add_menu_page(
			__( 'The ArtiSaint Docs', 'dottxado-the-artisaint' ),
			__( 'The ArtiSaint Docs', 'dottxado-the-artisaint' ),
			'manage_options',
			self::PAGE_SLUG,
			array( $this, 'create_admin_page' ),
			'dashicons-book-alt',
			3
		);

	}

	public function create_admin_page() {
		?>
		<div class="wrap">
			<style>
				ul {
					list-style-type: disc;
				}
			</style>
			<h2><?php esc_html_e( 'The ArtiSaint Docs', 'dottxado-the-artisaint' ); ?></h2>
			<h3>Documentazione del tema child custom realizzato per The ArtiSaint</h3>

			<p>
				Il tema è costruito sul tema parent Storefront, tema ufficiale di WooCommerce, e ne modifica alcune caratteristiche. Inoltre il tema porta con sè delle personalizzazioni realizzate per il plugin CoBlocks.
			</p>

			<h4>Personalizzazioni di Storefront</h4>
			<p>
				A parte delle personalizzazioni di base atte a rendere il progetto più professionale, sono state eseguite le seguenti modifiche:
			</p>
			<ul>
				<li>
					Aggiunta dello stesso logo utilizzato nell'header anche nel footer
				</li>
				<li>
					Aggiunto programmaticamente il link per l'area utente al "secondary menu" visibile nell'header
				</li>
				<li>
					Spostato il minicart all'interno dell'header
				</li>
				<li>
					Modificato lo stile "inline" per adattarsi in maniera universali ai colori utilizzati all'interno del customizer
				</li>
				<li>
					Aggiunti i colori utilizzati nel customizer all'interno della palette di colori disponibile nei blocchi Gutenberg
				</li>
				<li>
					Aggiunto il font Poppins ed utilizzato su tutto il sito
				</li>
			</ul>

			<h4>Personalizzazioni di CoBlocks</h4>
			<p>CoBlock è un plugin molto utile per aggiungere ulteriori blocchi all'editor di WordPress. Le personalizzazioni realizzate sono le seguenti:</p>
			<ul>
				<li>
					Creata una classe CSS che può essere applicata al blocco Carousel. La classe si chiama "caption-on-slide" e può essere inserita nella colonna di destra sotto l'impostazione "Advanced" per visualizzare il caption di tutta la galleria sopra le immagini.
				</li>
				<li>
					Aggiunta una spaziatura laterale al blocco "Row" quando non viene selezionata nessuna altra spaziatura tramite le impostazioni del blocco.
				</li>
			</ul>
		</div>

		<h4>Personalizzazioni di WooCommerce</h4>
		<p>Similmente, anche per WooCommerce sono state eseguite delle modifiche:</p>
		<ul>
			<li>
				Rimossi contenuti "meta" (SKU, tag e categorie) dalla pagina del singolo prodotto
			</li>
		</ul>
		<?php
	}

}
