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
class UserList extends Widget_Base {
	/**
	 * Class constructor.
	 *
	 * @param array $data Widget data.
	 * @param array $args Widget arguments.
	 */
	public function __construct( $data = array(), $args = null ) {
		parent::__construct( $data, $args );

		wp_register_style( 'userlist', plugins_url( '/assets/css/userlists.css', ELEMENTOR_ELEDESIR ), array(), '1.0.0' );
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
		return 'userlist';
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
		return __( 'User list', 'elementor-eledesir' );
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
		return 'eicon-bullet-list';
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
		return array( 'userlist' );
	}

	function get_editable_roles() {
		global $wp_roles;
	
		$all_roles = $wp_roles->roles;
		$editable_roles = apply_filters('editable_roles', $all_roles);
	
		return $editable_roles;
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

		$editable_roles = $this->get_editable_roles();
		$option_roles = [];
		foreach ($editable_roles as $role => $details) {
			$option_roles[$role] = $details['name'];
		}

		$this->add_control(
			'role',
			[
				'label' => esc_html__( 'User Role', 'elementor-eledesir' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'subscriber',
				'options' => $option_roles,
			]
		);

		$this->add_control(
			'name',
			array(
				'label'   => __( 'Field Name', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'display_name',
			)
		);

		$this->add_control(
			'name_acf',
			[
				'label' => esc_html__( 'Is Name Field managed by ACF?', 'elementor-eledesir' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementor-eledesir' ),
				'label_off' => esc_html__( 'No', 'elementor-eledesir' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'title',
			array(
				'label'   => __( 'Field Title', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' =>'poste_souhaite',
			)
		);

		$this->add_control(
			'title_acf',
			[
				'label' => esc_html__( 'Is Title Field managed by ACF?', 'elementor-eledesir' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementor-eledesir' ),
				'label_off' => esc_html__( 'No', 'elementor-eledesir' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'address',
			array(
				'label'   => __( 'Field Address', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'ville_actuelle',
			)
		);

		$this->add_control(
			'address_acf',
			[
				'label' => esc_html__( 'Is Address Field managed by ACF?', 'elementor-eledesir' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'elementor-eledesir' ),
				'label_off' => esc_html__( 'No', 'elementor-eledesir' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		
		$this->add_control(
			'tag1_title',
			array(
				'label'   => __( 'Title Tag 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'French', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'tag1_value',
			array(
				'label'   => __( 'Field Tag 1', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'connaissance_du_francais', 'elementor-eledesir' ),
			)
		);
		
		$this->add_control(
			'tag2_title',
			array(
				'label'   => __( 'Title Tag 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'English', 'elementor-eledesir' ),
			)
		);

		$this->add_control(
			'tag2_value',
			array(
				'label'   => __( 'Field Tag 2', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'connaissance_de_langlais', 'elementor-eledesir' ),
			)
		);
		
		$this->add_control(
			'tag3_title',
			array(
				'label'   => __( 'Title Tag 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => "Activity Sector",
			)
		);

		$this->add_control(
			'tag3_value',
			array(
				'label'   => __( 'Field Tag 3', 'elementor-eledesir' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'secteur_dactivite', 'elementor-eledesir' ),
			)
		);
		
		// $this->add_control(
		// 	'tag4_title',
		// 	array(
		// 		'label'   => __( 'Title Tag 4', 'elementor-eledesir' ),
		// 		'type'    => Controls_Manager::TEXT,
		// 		'default' => 'Excel',
		// 	)
		// );

		// $this->add_control(
		// 	'tag4_value',
		// 	array(
		// 		'label'   => __( 'Field Tag 4', 'elementor-eledesir' ),
		// 		'type'    => Controls_Manager::TEXT,
		// 		'default' => __( 'connaissance_dexcel', 'elementor-eledesir' ),
		// 	)
		// );
		
		// $this->add_control(
		// 	'tag5_title',
		// 	array(
		// 		'label'   => __( 'Title Tag 5', 'elementor-eledesir' ),
		// 		'type'    => Controls_Manager::TEXT,
		// 		'default' => 'Power Point',
		// 	)
		// );

		// $this->add_control(
		// 	'tag5_value',
		// 	array(
		// 		'label'   => __( 'Field Tag 5', 'elementor-eledesir' ),
		// 		'type'    => Controls_Manager::TEXT,
		// 		'default' => __( 'connaissance_de_powerpoint', 'elementor-eledesir' ),
		// 	)
		// );

		$this->end_controls_section();
	}

	public function showColor($tag_value, $user_id) {
		switch (get_field($tag_value, $user_id)) {
			case 'Avancé':
				echo 'bd-green';
				break;
			case 'Avancé ou langue maternelle':
				echo 'bd-green';
				break;
			case 'Advanced':
				echo 'bd-green';
				break;
			case 'Advanced or mother tongue':
				echo 'bd-green';
				break;
			case 'Intermédiaire':
				echo 'bd-blue';
				break;
			case 'Intermediate':
				echo 'bd-blue';
				break;
			case 'Débutant':
				echo 'bd-yellow';
				break;
			case 'Beginner':
				echo 'bd-yellow';
				break;
			default:
				echo 'bd-none';
				break;
		}
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

		$args = array(
			'role'    => $settings['role'],
			'orderby' => 'user_user_nicename',
			'order'   => 'ASC'
		);
		$users = get_users( $args );
		$position = $_GET[$settings['title']];
		$location = $_GET[$settings['address']];
		$tag1 = $_GET[$settings['tag1_value']];
		$tag2 = $_GET[$settings['tag2_value']];
		$tag3 = $_GET[$settings['tag3_value']];
		?>

		<div class="candidates-wrapper items-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<?php foreach ($users as $key => $user) { 
						$user = $user->to_array();
						$showUser = true;
						if($position && strtolower(get_field($settings['title'], 'user_'.$user['ID']))!==strtolower($position)) {
							$showUser = false;
						}
						if($location && $showUser && strpos(strtolower(get_field($settings['address'], 'user_'.$user['ID'])),strtolower($location))===false) {
							$showUser = false;
						}
						if($tag1 && $showUser && (strtolower(get_field($settings['tag1_value'], 'user_'.$user['ID']))!==strtolower($tag1) && strtolower($tag1)!==strtolower(esc_html__(get_field($settings['tag1_value'], 'user_'.$user['ID']), 'elementor-eledesir' )))) {
							$showUser = false;
						}
						if($tag2 && $showUser && (strtolower(get_field($settings['tag2_value'], 'user_'.$user['ID']))!==strtolower($tag2) && strtolower($tag2)!==strtolower(esc_html__(get_field($settings['tag2_value'], 'user_'.$user['ID']), 'elementor-eledesir' )))) {
							$showUser = false;
						}
						if($tag3 && $showUser && (strtolower(get_field($settings['tag3_value'], 'user_'.$user['ID']))!==strtolower($tag3) && strtolower($tag3)!==strtolower(esc_html__(get_field($settings['tag3_value'], 'user_'.$user['ID']), 'elementor-eledesir' )))) {
							$showUser = false;
						}

						if($showUser) {
						?>
						<article id="post-<?php echo  $key ?>" class="map-item candidate-card post-<?php echo  $key ?> candidate type-candidate status-publish has-post-thumbnail hentry candidate_category-application candidate_location-new-york candidate_tag-app candidate_tag-design candidate_tag-digital is-featured">
							<div class="candidate-list candidate-archive-layout">
								<div class="flex-middle-sm">
									<div class="candidate-info">
										<div class="flex-middle">
											<div class="candidate-logo">
												<a href="#">
													<img src="http://0.gravatar.com/avatar/65ac01123f50ba0efbe05ca8c428675d?s=96&d=mm&r=g" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" width="100" height="100">
												</a>
											</div>
											<div class="candidate-info-content">
												<div class="title-wrapper">
													<h2 class="candidate-title">
														<a href="<?php echo get_author_posts_url( $user['ID'], $user['user_nicename'] ) ?>" rel="bookmark">
															<?php
																if($settings['title_acf']=='yes'){
																	echo get_field($settings['title'], 'user_'.$user['ID']);
																}
																else{
																	echo $user[$settings['title']];
																}
															?>
														</a>
													</h2>
													<span class="featured-text"><span class="dashicons dashicons-businessman"></span> <?php the_field('nombre_dannees_dexperience', 'user_'.$user['ID']) ?>+</span>
												</div>
												<div class="job-metas">
													<div class="candidate-category">
														<a href="<?php echo get_home_url().'/author/'.$user['user_login'] ?>">
															<?php
																if($settings['name_acf']=='yes'){
																	echo get_field($settings['name'], 'user_'.$user['ID']);
																}
																else{
																	echo $user[$settings['name']];
																}
															?>
														</a>
													</div>
													<div class="candidate-location with-icon"><span class="dashicons dashicons-location"></span>
														<a href="?<?php echo $settings['address']; ?>=<?php
																if($settings['address_acf']=='yes'){
																	echo get_field($settings['address'], 'user_'.$user['ID']);
																}
																else{
																	echo $user[$settings['address']];
																}
															?>">
															<?php
																if($settings['address_acf']=='yes'){
																	echo get_field($settings['address'], 'user_'.$user['ID']);
																}
																else{
																	echo $user[$settings['address']];
																}
															?>
														</a>            
													</div>
												</div>
												<div class="candidate-tags">
													<a class="tag-candidate" title="<?php echo esc_html__($settings['tag3_title'], 'elementor-eledesir'); ?>" href="?<?php echo $settings['tag3_value']; ?>=<?php echo get_field($settings['tag3_value'], 'user_'.$user['ID']); ?>">
														<?php echo esc_html__(get_field($settings['tag3_value'], 'user_'.$user['ID']), 'elementor-eledesir'); ?>
													</a>
													<a class="tag-candidate <?php $this->showColor($settings['tag1_value'],'user_'.$user['ID'])?>" title="<?php echo ucfirst(esc_html__(get_field($settings['tag1_value'], 'user_'.$user['ID']), 'elementor-eledesir')); ?>" href="?<?php echo $settings['tag1_value']; ?>=<?php echo get_field($settings['tag1_value'], 'user_'.$user['ID']); ?>">
														<?php echo esc_html__($settings['tag1_title'], 'elementor-eledesir'); ?>
													</a>
													<a class="tag-candidate <?php $this->showColor($settings['tag2_value'],'user_'.$user['ID'])?>" title="<?php echo ucfirst(esc_html__(get_field($settings['tag2_value'], 'user_'.$user['ID']), 'elementor-eledesir')); ?>" href="?<?php echo $settings['tag2_value']; ?>=<?php echo get_field($settings['tag2_value'], 'user_'.$user['ID']); ?>">
														<?php echo esc_html__($settings['tag2_title'], 'elementor-eledesir'); ?>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="ali-right">
										<a title="Shortlist" href="" class="btn-action-job btn-add-candidate-shortlist btn-follow" data-candidate_id="1770" data-nonce="c1f8220773"><span class="dashicons dashicons-star-empty"></span></a><a href="<?php echo get_author_posts_url( $user['ID'], $user['user_nicename'] ); ?>" class="btn btn-theme-lighten"><?php echo __('View Profile', 'elementor-eledesir') ?></a>
									</div>
								</div>
							</div>
						</article>
					<?php } } ?>
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
		<div class="candidates-wrapper items-wrapper">
			<div class="row">
				<div class="col-xs-12">
					<article id="post-1770" class="map-item candidate-card post-1770 candidate type-candidate status-publish has-post-thumbnail hentry candidate_category-application candidate_location-new-york candidate_tag-app candidate_tag-design candidate_tag-digital is-featured" data-latitude="40.69499198068389" data-longitude="-73.9959976171989" data-img="assets/member.jpg">
						<div class="candidate-list candidate-archive-layout">
							<div class="flex-middle-sm">
								<div class="candidate-info">
									<div class="flex-middle">
										<div class="candidate-logo">
											<a href="#">
												<img src="http://0.gravatar.com/avatar/65ac01123f50ba0efbe05ca8c428675d?s=96&d=mm&r=g" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" width="100" height="100">
											</a>
										</div>
										<div class="candidate-info-content">
											<div class="title-wrapper">
												<h2 class="candidate-title">
													<a href="#" rel="bookmark">Candidate</a>
												</h2>
												<span class="featured-text">Featured</span>
											</div>
											<div class="job-metas">
												<div class="candidate-category">
													<a href="#">Application</a>
												</div>
												<div class="candidate-location with-icon"><span class="dashicons dashicons-location"></span>
													<a href="#">New York</a>            
												</div>
												<div class="candidate-salary with-icon"><span class="dashicons dashicons-star-empty"></span> <span class="suffix">$</span><span class="price-text">10</span> / hour</div>
											</div>
											<div class="candidate-tags">
												<a class="tag-candidate" href="#">app</a>
												<a class="tag-candidate" href="#">design</a>
												<a class="tag-candidate" href="#">digital</a>
											</div>
										</div>
									</div>
								</div>
								<div class="ali-right">
									<a title="Shortlist" href="javascript:void(0);" class="btn-action-job btn-add-candidate-shortlist btn-follow" data-candidate_id="1770" data-nonce="c1f8220773"><span class="dashicons dashicons-star-empty"></span></a><a href="#" class="btn btn-theme-lighten">View Profile</a>
								</div>
							</div>
						</div>
					</article>
				</div>
			</div>
		</div>
		<?php
	}
}
