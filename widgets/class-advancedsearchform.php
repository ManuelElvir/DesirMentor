<?php
/**
 * Eledesir class.
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

namespace ElementorEledesir\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Eledesir widget class.
 *
 * @since 1.0.0
 */
class AvancedSearchForm extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'advancedsearchform', plugins_url( '/assets/css/advancedsearchform.css', ELEMENTOR_ELEDESIR ), array(), '1.0.0' );
		wp_register_script('advancedsearchform_jquery', plugins_url( '/assets/js/jquery-3.6.0.min.js', ELEMENTOR_ELEDESIR ), array(), '1.0.0' );
		wp_register_script('advancedsearchform_script', plugins_url( '/assets/js/advancedsearchform.js', ELEMENTOR_ELEDESIR ), array(), '1.0.0' );
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'advancedsearchform';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Advanced Search Form', 'elementor-eledesir' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-site-search';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return array( 'eledesir' );
	}
	
	/**
	 * Enqueue styles.
	 */
	public function get_style_depends() {
		return array( 'advancedsearchform' );
	}

	/**
	 * Enqueue scripts.
	 */
	public function get_script_depends() {
		return array('advancedsearchform_jquery','advancedsearchform_script' );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			array(
				'label' => __( 'Content', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'subtitle',
			array(
				'label'   => __( 'Subtitle', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Fast search', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'title',
			array(
				'label'   => __( 'Title', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Your title here.', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'clearButton',
			array(
				'label'   => __( 'Clear button', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Reinitialize', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'findButton',
			array(
				'label'   => __( 'See button', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'See All', 'elementor-eledesir' ),
			)
		);
		//Select 1
		$this->add_control(
			'titleParam1',
			array(
				'label'   => __( 'Title Select 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'keyParam1',
			array(
				'label'   => __( 'Key Select 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'valuesParam1',
			array(
				'label'   => __( 'Values Select 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'separate label and value with : and each item with |', 'elementor-eledesir' ),
			)
		);
		//Select 2
		$this->add_control(
			'titleParam2',
			array(
				'label'   => __( 'Title Select 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'keyParam2',
			array(
				'label'   => __( 'Key Select 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'valuesParam2',
			array(
				'label'   => __( 'Values Select 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'separate label and value with : and each item with |', 'elementor-eledesir' ),
			)
		);
		//Select 3
		$this->add_control(
			'titleParam3',
			array(
				'label'   => __( 'Title Select 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'keyParam3',
			array(
				'label'   => __( 'Key Select 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'valuesParam3',
			array(
				'label'   => __( 'Values Select 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'separate label and value with : and each item with |', 'elementor-eledesir' ),
			)
		);
		//Select 4
		$this->add_control(
			'titleParam4',
			array(
				'label'   => __( 'Title Select 4', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'keyParam4',
			array(
				'label'   => __( 'Key Select 4', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'elementor-eledesir' ),
			)
		);
		$this->add_control(
			'valuesParam4',
			array(
				'label'   => __( 'Values Select 4', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'separate label and value with : and each item with |', 'elementor-eledesir' ),
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$values1 = explode("|", $settings['valuesParam1']);
		$values2 = explode("|", $settings['valuesParam2']);
		$values3 = explode("|", $settings['valuesParam3']);
		$values4 = explode("|", $settings['valuesParam4']);
		for($i=0; $i<sizeof($values1); $i++) {
			$values1[$i] = explode(":", $values1[$i]);
		}
		for($i=0; $i<sizeof($values2); $i++) {
			$values2[$i] = explode(":", $values2[$i]);
		}
		for($i=0; $i<sizeof($values3); $i++) {
			$values3[$i] = explode(":", $values3[$i]);
		}
		for($i=0; $i<sizeof($values4); $i++) {
			$values4[$i] = explode(":", $values4[$i]);
		}
		?>

		<div class="advanced-search-form">
            <div class="item left">
                <span class="head-title"><?php echo wp_kses( $settings['subtitle'], array('') ); ?></span>
                <h2 class="main-title"><?php echo wp_kses( $settings['title'], array('') ); ?></h2>
            </div>
            <div class="item center">
                <form action="#" method="post" id="advanced-search-form">
                    <div class="form-row">
                        <div class="form-control">
                            <select name="<?php echo wp_kses( $settings['keyParam1'], array('') ); ?>" id="select1">
                                <option value=""><?php echo sprintf(__( 'All %s', 'elementor-eledesir' ), $settings['titleParam1']);?></option>
								<?php
									foreach ($values1 as $value) {
										?><option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option><?php
									}
								?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-control">
                            <select name="<?php echo wp_kses( $settings['keyParam2'], array('') ); ?>" id="select2">
                                <option value=""><?php echo sprintf(__( 'All %s', 'elementor-eledesir' ), $settings['titleParam2']); ?></option>
								<?php
									foreach ($values2 as $value) {
										?><option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option><?php
									}
								?>
                            </select>
                        </div>
                        <div class="form-control">
                            <select name="<?php echo wp_kses( $settings['keyParam3'], array('') ); ?>" id="select3">
                                <option value=""><?php echo sprintf(__( 'All %s', 'elementor-eledesir' ), $settings['titleParam3']); ?></option>
								<?php
									foreach ($values3 as $value) {
										?><option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option><?php
									}
								?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-control">
                            <select name="<?php echo wp_kses( $settings['keyParam3'], array('') ); ?>" id="select4">
                                <option value=""><?php echo sprintf(__( 'All %s', 'elementor-eledesir' ), $settings['titleParam4']); ?></option>
								<?php
									foreach ($values4 as $value) {
										?><option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option><?php
									}
								?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="item right">
                <span class="counter">46</span>
                <div class="actions">
                    <button class="empty_u" type="reset" id="btn-reset"><?php echo wp_kses( $settings['clearButton'], array('') ); ?></button>
                    <button class="full" id="btn-see-all"><?php echo wp_kses( $settings['findButton'], array('') ); ?></button>
                </div>
            </div>
        </div>
		
		
		<?php
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		
		<div class="advanced-search-form">
            <div class="item left">
                <span class="head-title">{{{ settings.subtitle }}}</span>
                <h2 class="main-title">{{{ settings.title }}}</h2>
            </div>
            <div class="item center">
                <form action="#" method="post" id="advanced-search-form">
                    <div class="form-row">
                        <div class="form-control">
                            <select name="select1" id="">
                                <option value="">{{{ settings.titleParam1 }}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-control">
                            <select name="select2" id="">
                                <option value="">{{{ settings.titleParam2 }}}</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <select name="select3" id="">
                                <option value="">{{{ settings.titleParam3 }}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-control">
                            <select name="select4" id="">
                                <option value="">{{{ settings.titleParam4 }}}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="item right">
                <span class="counter">46</span>
                <div class="actions">
                    <button class="empty_u">{{{ settings.clearButton }}}</button>
                    <button class="full">{{{ settings.findButton }}}</button>
                </div>
            </div>
        </div>

		<?php
	}
}
