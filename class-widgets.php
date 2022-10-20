<?php
/**
 * Widgets class.
 *
 * @category   Class
 * @package    ElementorEledesir
 * @subpackage WordPress
 * @author     Manuel Njiakim <manuel.njiakim@gmail.com>
 * @copyright  2022 Manuel Njiakim
 * @license    https://opensource.org/licenses/GPL-3.0 GPL-3.0-only
 * @link       link(https://www.manuel-njiakim.com/eledesir/,
 *             Some Advanced Elementor Features)
 * @since      1.0.0
 * php version 7.3.9
 */

namespace ElementorEledesir;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Class Plugin
 *
 * Main Plugin class
 *
 * @since 1.0.0
 */
class Widgets {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.0.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once 'widgets/class-productgrid.php';
		require_once 'widgets/class-categorygrid.php';
		require_once 'widgets/class-advancedsearchform.php';
		require_once 'widgets/class-userlist.php';
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function register_widgets() {
		// It's now safe to include Widgets files.
		$this->include_widgets_files();

		// Register the plugin widget classes.
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\ProductGrid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\CategoryGrid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\AvancedSearchForm() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\UserList() );
	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		// Register the widgets.
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'register_widgets' ) );
	}
}

// Instantiate the Widgets class.
Widgets::instance();
