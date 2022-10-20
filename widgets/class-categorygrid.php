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
use Elementor\Utils;
use Elementor\Control_Media;

// Security Note: Blocks direct access to the plugin PHP files.
defined( 'ABSPATH' ) || die();

/**
 * Eledesir widget class.
 *
 * @since 1.0.0
 */
class CategoryGrid extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'categorygrid', plugins_url( '/assets/css/categorygrid.css', ELEMENTOR_ELEDESIR ), array(), '1.0.0' );
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
		return 'categorygrid';
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
		return __( 'Category Grid', 'elementor-eledesir' );
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
		return 'eicon-gallery-grid';
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
		return array( 'categorygrid' );
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

		//Category 1
		$this->add_control(
			'title1',
			array(
				'label'   => __( 'Category Title 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Category Title 1', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link1',
			array(
				'label' => __( 'Category Link 1', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-category-link.com', 'elementor-eledesir' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			)
		);

		$this->add_control(
			'image1',
			array(
				'label' => __( 'Category Image 1', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		//Category 2
		$this->add_control(
			'title2',
			array(
				'label'   => __( 'Category Title 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Category Title 2', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link2',
			array(
				'label' => __( 'Category Link 2', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-category-link.com', 'elementor-eledesir' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			)
		);

		$this->add_control(
			'image2',
			array(
				'label' => __( 'Category Image 2', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		//Category 3
		$this->add_control(
			'title3',
			array(
				'label'   => __( 'Category Title 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Category Title 3', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link3',
			array(
				'label' => __( 'Category Link 3', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-category-link.com', 'elementor-eledesir' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			)
		);

		$this->add_control(
			'image3',
			array(
				'label' => __( 'Category Image 3', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		//Category 4
		$this->add_control(
			'title4',
			array(
				'label'   => __( 'Category Title 4', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Category Title 4', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link4',
			array(
				'label' => __( 'Category Link 4', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-category-link.com', 'elementor-eledesir' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			)
		);

		$this->add_control(
			'image4',
			array(
				'label' => __( 'Category Image 4', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		//Category 5
		$this->add_control(
			'title5',
			array(
				'label'   => __( 'Category Title 5', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Category Title 5', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link5',
			array(
				'label' => __( 'Category Link 5', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-category-link.com', 'elementor-eledesir' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					'custom_attributes' => '',
				],
				'label_block' => true,
			)
		);

		$this->add_control(
			'image5',
			array(
				'label' => __( 'Category Image 5', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
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

		//Category1
		if ( ! empty( $settings['link1']['url'] ) ) {
			$this->add_link_attributes( 'link1', $settings['link1'] );
		}

		//Category2
		if ( ! empty( $settings['link2']['url'] ) ) {
			$this->add_link_attributes( 'link2', $settings['link2'] );
		}

		//Category3
		if ( ! empty( $settings['link3']['url'] ) ) {
			$this->add_link_attributes( 'link3', $settings['link3'] );
		}

		//Category4
		if ( ! empty( $settings['link4']['url'] ) ) {
			$this->add_link_attributes( 'link4', $settings['link4'] );
		}

		//Category5
		if ( ! empty( $settings['link5']['url'] ) ) {
			$this->add_link_attributes( 'link5', $settings['link5'] );
		}

		$this->add_inline_editing_attributes( 'title1', 'none' );
		$this->add_inline_editing_attributes( 'title2', 'none' );
		$this->add_inline_editing_attributes( 'title3', 'none' );
		$this->add_inline_editing_attributes( 'title4', 'none' );
		$this->add_inline_editing_attributes( 'title5', 'none' );
		?>
		
		<div class="desir-container2">
            <div class="category-widget cat1">
                <a <?php echo $this->get_render_attribute_string( 'link1' ); ?>>
                    <div class="image-container">
                        <img 
							src="<?php echo $settings['image1']['url']; ?>" 
							alt="<?php Control_Media::get_image_alt( $settings['image1'] ); ?>"
							title="<?php Control_Media::get_image_title( $settings['image1'] ); ?>"
						>
                    </div>
                    <div class="category-title">
                        <span class="title" <?php echo $this->get_render_attribute_string( 'title1' ); ?>><?php echo wp_kses( $settings['title1'], array('') ); ?></span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat2">
                <a <?php echo $this->get_render_attribute_string( 'link2' ); ?>>
                    <div class="image-container">
                        <img 
							src="<?php echo $settings['image2']['url']; ?>" 
							alt="<?php Control_Media::get_image_alt( $settings['image2'] ); ?>"
							title="<?php Control_Media::get_image_title( $settings['image2'] ); ?>"
						>
                    </div>
                    <div class="category-title">
                        <span class="title" <?php echo $this->get_render_attribute_string( 'title2' ); ?>><?php echo wp_kses( $settings['title2'], array('') ); ?></span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat3">
                <a <?php echo $this->get_render_attribute_string( 'link3' ); ?>>
                    <div class="image-container">
                        <img 
							src="<?php echo $settings['image3']['url']; ?>" 
							alt="<?php Control_Media::get_image_alt( $settings['image3'] ); ?>"
							title="<?php Control_Media::get_image_title( $settings['image3'] ); ?>"
						>
                    </div>
                    <div class="category-title text-dark">
                        <span class="title" <?php echo $this->get_render_attribute_string( 'title3' ); ?>><?php echo wp_kses( $settings['title3'], array('') ); ?></span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat4">
                <a <?php echo $this->get_render_attribute_string( 'link4' ); ?>>
                    <div class="image-container">
                        <img 
							src="<?php echo $settings['image4']['url']; ?>" 
							alt="<?php Control_Media::get_image_alt( $settings['image4'] ); ?>"
							title="<?php Control_Media::get_image_title( $settings['image4'] ); ?>"
						>
                    </div>
                    <div class="category-title">
                        <span class="title" <?php echo $this->get_render_attribute_string( 'title4' ); ?>><?php echo wp_kses( $settings['title4'], array('') ); ?></span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat5">
                <a <?php echo $this->get_render_attribute_string( 'link5' ); ?>>
                    <div class="image-container">
                        <img 
							src="<?php echo $settings['image5']['url']; ?>" 
							alt="<?php Control_Media::get_image_alt( $settings['image5'] ); ?>"
							title="<?php Control_Media::get_image_title( $settings['image5'] ); ?>"
						>
                    </div>
                    <div class="category-title">
                        <span class="title" <?php echo $this->get_render_attribute_string( 'title5' ); ?>><?php echo wp_kses( $settings['title5'], array('') ); ?></span>
                    </div>
                </a>
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
		
		<#
		view.addInlineEditingAttributes( 'title1', 'none' );
		view.addInlineEditingAttributes( 'title2', 'none' );
		view.addInlineEditingAttributes( 'title3', 'none' );
		view.addInlineEditingAttributes( 'title4', 'none' );
		view.addInlineEditingAttributes( 'title5', 'none' );
		#>

		<div class="desir-container2">
            <div class="category-widget cat1">
                <a  href="{{ settings.link1.url }}">
                    <div class="image-container">
                        <img src="{{ settings.image1.url }}">
                    </div>
                    <div class="category-title">
                        <span class="title" {{{ view.getRenderAttributeString( 'title1' ) }}}>{{{ settings.title1 }}}</span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat2">
                <a  href="{{ settings.link2.url }}">
                    <div class="image-container">
                        <img src="{{ settings.image2.url }}">
                    </div>
                    <div class="category-title">
                        <span class="title" {{{ view.getRenderAttributeString( 'title2' ) }}}>{{{ settings.title2 }}}</span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat3">
                <a  href="{{ settings.link3.url }}">
                    <div class="image-container">
                        <img src="{{ settings.image3.url }}">
                    </div>
                    <div class="category-title">
                        <span class="title"  {{{ view.getRenderAttributeString( 'title3' ) }}}>{{{ settings.title3 }}}</span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat4">
                <a  href="{{ settings.link4.url }}">
                    <div class="image-container">
                        <img src="{{ settings.image4.url }}">
                    </div>
                    <div class="category-title">
                        <span class="title"  {{{ view.getRenderAttributeString( 'title3' ) }}}>{{{ settings.title4 }}}</span>
                    </div>
                </a>
            </div>
            <div class="category-widget cat5">
                <a  href="{{ settings.link5.url }}">
                    <div class="image-container">
                        <img src="{{ settings.image5.url }}">
                    </div>
                    <div class="category-title">
                        <span class="title"  {{{ view.getRenderAttributeString( 'title5' ) }}}>{{{ settings.title5 }}}</span>
                    </div>
                </a>
            </div>
        </div>

		<?php
	}
}
