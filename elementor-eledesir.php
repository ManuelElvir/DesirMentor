<?php
/**
 * Elementor Eledesir WordPress Plugin
 *
 * @package ElementorEledesir
 *
 * Plugin Name: Elementor Eledesir
 * Description: some advanced elementor features
 * Plugin URI:  https://www.manuel-njiakim.com/eledesir/
 * Version:     1.0.0
 * Author:      Manuel Njiakim
 * Author URI:  https://www.manuel-njiakim.com
 * Text Domain: elementor-eledesir
 */

define( 'ELEMENTOR_ELEDESIR', __FILE__ );

function add_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'eledesir',
		[
			'title' => __( 'Eledesir', 'elementor-eledesir' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

function my_plugin_init() {
    load_plugin_textdomain( 'elementor-eledesir', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'my_plugin_init' );


/**
 * Include the Elementor_Eledesir class.
 */
require plugin_dir_path( ELEMENTOR_ELEDESIR ) . 'class-elementor-eledesir.php';
