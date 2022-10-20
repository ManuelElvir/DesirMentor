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
class ProductGrid extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'productgrid', plugins_url( '/assets/css/productgrid.css', ELEMENTOR_ELEDESIR ), array(), '1.0.0' );
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
		return 'productgrid';
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
		return __( 'Product Grid', 'elementor-eledesir' );
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
		return 'eicon-gallery-justified';
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
		return array( 'productgrid' );
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

		//Product 1
		$this->add_control(
			'title1',
			array(
				'label'   => __( 'Product Title 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Title 1', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'description1',
			array(
				'label'   => __( 'Product Description 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Description 1', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link1',
			array(
				'label' => __( 'Product Link 1', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-product-link.com', 'elementor-eledesir' ),
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
				'label' => __( 'Product Image 1', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		$this->add_control(
			'button1',
			array(
				'label'   => __( 'Product Button 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'know More', 'elementor-eledesir' ),
			)
		);
		
		//Product 2
		$this->add_control(
			'title2',
			array(
				'label'   => __( 'Product Title 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Title 2', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'description2',
			array(
				'label'   => __( 'Product Description 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Description 2', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link2',
			array(
				'label' => __( 'Product Link 2', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-product-link.com', 'elementor-eledesir' ),
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
				'label' => __( 'Product Image 2', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		$this->add_control(
			'button2',
			array(
				'label'   => __( 'Product Button 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'know More', 'elementor-eledesir' ),
			)
		);
		
		//Product 3
		$this->add_control(
			'title3',
			array(
				'label'   => __( 'Product Title 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Title 3', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'description3',
			array(
				'label'   => __( 'Product Description 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Description 3', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link3',
			array(
				'label' => __( 'Product Link 3', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-product-link.com', 'elementor-eledesir' ),
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
				'label' => __( 'Product Image 3', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		$this->add_control(
			'button3',
			array(
				'label'   => __( 'Product Button 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'know More', 'elementor-eledesir' ),
			)
		);
		
		//Product 4
		$this->add_control(
			'title4',
			array(
				'label'   => __( 'Product Title 4', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Title 4', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'description4',
			array(
				'label'   => __( 'Product Description 4', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Description 4', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link4',
			array(
				'label' => __( 'Product Link 4', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-product-link.com', 'elementor-eledesir' ),
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
				'label' => __( 'Product Image 4', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		$this->add_control(
			'button4',
			array(
				'label'   => __( 'Product Button 4', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'know More', 'elementor-eledesir' ),
			)
		);
		
		//Product 5
		$this->add_control(
			'title5',
			array(
				'label'   => __( 'Product Title 5', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Title 5', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'description5',
			array(
				'label'   => __( 'Product Description 5', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Product Description 5', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'link5',
			array(
				'label' => __( 'Product Link 5', 'elementor-eledesir' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-product-link.com', 'elementor-eledesir' ),
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
				'label' => __( 'Product Image 5', 'elementor-eledesir' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			)
		);

		$this->add_control(
			'button5',
			array(
				'label'   => __( 'Product Button 5', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'know More', 'elementor-eledesir' ),
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
		
		//Product1
		if ( ! empty( $settings['link1']['url'] ) ) {
			$this->add_link_attributes( 'link1', $settings['link1'] );
		}

		//Product2
		if ( ! empty( $settings['link2']['url'] ) ) {
			$this->add_link_attributes( 'link2', $settings['link2'] );
		}

		//Product3
		if ( ! empty( $settings['link3']['url'] ) ) {
			$this->add_link_attributes( 'link3', $settings['link3'] );
		}

		//Product4
		if ( ! empty( $settings['link4']['url'] ) ) {
			$this->add_link_attributes( 'link4', $settings['link4'] );
		}

		//Product5
		if ( ! empty( $settings['link5']['url'] ) ) {
			$this->add_link_attributes( 'link5', $settings['link5'] );
		}
		?>

		<div class="desir-container">
            <div class="product-widget1 card item1">
                <a class="card-full" <?php echo $this->get_render_attribute_string( 'link1' ); ?>>
                    <div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" 
								src="<?php echo $settings['image1']['url']; ?>" 
								alt="<?php Control_Media::get_image_alt( $settings['image1'] ); ?>"
								title="<?php Control_Media::get_image_title( $settings['image1'] ); ?>"
							>
                        </div>
                        <div class="card-content">
                            <div class="card-product-name">
                                <span class="card-product-name-desktop"><?php echo wp_kses( $settings['title1'], array('span') ); ?></span>
                            </div>
                            <div class="card-product-desc">
                                <span class="card-product-description-desktop"><?php echo wp_kses( $settings['description1'], array('span') ); ?></span>
                            </div>
                            <div class="card-product-button">
                                <span class="card-product-button-contained"><?php echo wp_kses( $settings['button1'], array('span') ); ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item2">
                <a class="card-full" <?php echo $this->get_render_attribute_string( 'link2' ); ?>>
                    <div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" 
								src="<?php echo $settings['image2']['url']; ?>" 
								alt="<?php Control_Media::get_image_alt( $settings['image2'] ); ?>"
								title="<?php Control_Media::get_image_title( $settings['image2'] ); ?>"
							>
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop"><?php echo wp_kses( $settings['title2'], array('span') ); ?></span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop"><?php echo wp_kses( $settings['description2'], array('span') ); ?></span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained"><?php echo wp_kses( $settings['button2'], array('span') ); ?></span>
							</div>
                       	</div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item3 text-light">
                <a class="card-full" <?php echo $this->get_render_attribute_string( 'link3' ); ?>>
					<div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" 
								src="<?php echo $settings['image3']['url']; ?>" 
								alt="<?php Control_Media::get_image_alt( $settings['image3'] ); ?>"
								title="<?php Control_Media::get_image_title( $settings['image3'] ); ?>"
							>
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop"><?php echo wp_kses( $settings['title3'], array('span') ); ?></span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop"><?php echo wp_kses( $settings['description3'], array('span') ); ?></span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained"><?php echo wp_kses( $settings['button3'], array('span') ); ?></span>
							</div>
                       	</div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item4">
                <a class="card-full"  <?php echo $this->get_render_attribute_string( 'link4' ); ?>>
					<div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" 
								src="<?php echo $settings['image4']['url']; ?>" 
								alt="<?php Control_Media::get_image_alt( $settings['image4'] ); ?>"
								title="<?php Control_Media::get_image_title( $settings['image4'] ); ?>"
							>
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop"><?php echo wp_kses( $settings['title4'], array('span') ); ?></span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop"><?php echo wp_kses( $settings['description4'], array('span') ); ?></span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained"><?php echo wp_kses( $settings['button4'], array('span') ); ?></span>
							</div>
                       	</div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item5">
                <a class="card-full"  <?php echo $this->get_render_attribute_string( 'link5' ); ?>>
					<div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" 
								src="<?php echo $settings['image5']['url']; ?>" 
								alt="<?php Control_Media::get_image_alt( $settings['image5'] ); ?>"
								title="<?php Control_Media::get_image_title( $settings['image5'] ); ?>"
							>
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop"><?php echo wp_kses( $settings['title5'], array('span') ); ?></span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop"><?php echo wp_kses( $settings['description5'], array('span') ); ?></span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained"><?php echo wp_kses( $settings['button5'], array('span') ); ?></span>
							</div>
                       	</div>
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
		<div class="desir-container">
            <div class="product-widget1 card item1">
                <a class="card-full" href="{{ settings.link1.url }}">
                    <div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" src="{{ settings.image1.url }}">
                        </div>
                        <div class="card-content">
                            <div class="card-product-name">
                                <span class="card-product-name-desktop">{{{ settings.title1 }}}</span>
                            </div>
                            <div class="card-product-desc">
                                <span class="card-product-description-desktop">{{{ settings.description1 }}}</span>
                            </div>
                            <div class="card-product-button">
                                <span class="card-product-button-contained">{{{ settings.button1 }}}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item2">
                <a class="card-full" href="{{ settings.link2.url }}">
                    <div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" src="{{ settings.image2.url }}">
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop">{{{ settings.title2 }}}</span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop">{{{ settings.description2 }}}</span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained">{{{ settings.button2 }}}</span>
							</div>
                       	</div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item3 text-light">
                <a class="card-full" href="{{ settings.link3.url }}">
					<div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" src="{{ settings.image3.url }}">
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop">{{{ settings.title3 }}}</span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop">{{{ settings.description3 }}}</span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained">{{{ settings.button3 }}}</span>
							</div>
                       	</div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item4">
                <a class="card-full" href="{{ settings.link4.url }}">
					<div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" src="{{ settings.image4.url }}">
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop">{{{ settings.title4 }}}</span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop">{{{ settings.description4 }}}</span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained">{{{ settings.button4 }}}</span>
							</div>
                       	</div>
                    </div>
                </a>
            </div>
            
            <div class="product-widget1 card card-min item5">
                <a class="card-full" href="{{ settings.link5.url }}">
					<div class="card-img">
                        <div class="image image--main-loaded">
                            <img class="responsive-img" src="{{ settings.image5.url }}">
                        </div>
                        <div class="card-content">
							<div class="card-product-name">
								<span class="card-product-name-desktop">{{{ settings.title5 }}}</span>
							</div>
							<div class="card-product-desc">
								<span class="card-product-description-desktop">{{{ settings.description5 }}}</span>
							</div>
							<div class="card-product-button">
								<span class="card-product-button-contained">{{{ settings.button5 }}}</span>
							</div>
                       	</div>
                    </div>
                </a>
            </div>
        </div>
		<?php
	}
}
