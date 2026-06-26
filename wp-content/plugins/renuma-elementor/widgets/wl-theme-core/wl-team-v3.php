<?php
namespace WLElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;

/**
 * WL Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class WlTeamV3 extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve WL Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'wl-team-v3';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve WL Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'WL Team V3', 'wl-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve WL Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the WL Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'wl-theme-core' ];
	}

	public function get_keywords() {
		return [ 'WL Team V3' ];
	}

	public function get_script_depends() {
		return [ 'wl-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'wl-elementor'),
	        'top-left'      => esc_html__('Top Left', 'wl-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'wl-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'wl-elementor') ,
	        'center'        => esc_html__('Center', 'wl-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'wl-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'wl-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'wl-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'wl-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'wl-elementor') ,
	    ];

	    return $position_options;
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_wl-team-v3',
			[
				'label' => esc_html__( 'WL Team V3 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'custom_class',
			[
				'label'       => __( 'Custom Class', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your custom class', 'wl-elementor' ),
				'default'     => __( 'Custom Class', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'team_items',
			[
				'label' => esc_html__( 'Team Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'        => 'custom_column_class',
						'label'       => esc_html__( 'Custom Column Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Column Class' , 'wl-elementor' ),
						'label_block' => true,
					],	
					[
						'name'       => 'animation_delay',
						'label'      => esc_html__( 'Animation Delay', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Add Animation Delay', 'wl-elementor' ),
					],
					[
						'name'    => 'team_img',
						'label'   => esc_html__( 'Team Image (Recommend Size 551 * 591)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'team_image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( ' ', 'wl-elementor' ),
					],
					[
						'name'       => 'team_image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( ' ', 'wl-elementor' ),
					],
					[
						'name'        => 'team_icon',
						'label'       => esc_html__( 'Team Icon', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Team Icon' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'team_social_icon',
						'label'       => esc_html__( 'Team Social Icon', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Team Social Icon' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'team_detail_page_text_link',
						'label'      => esc_html__( 'Team Detail Page Text Link', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Team Detail Page Text Link', 'wl-elementor' ),
					],
					[
						'name'       => 'team_title',
						'label'      => esc_html__( 'Team Title', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Team Title', 'wl-elementor' ),
					],
					[
						'name'       => 'team_position',
						'label'      => esc_html__( 'Team Position', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Team Position', 'wl-elementor' ),
					],
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'wl-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'wl-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'wl-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'wl-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'wl-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'wl-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		?>

    <div class="<?php echo wp_kses_post($settings['custom_class']); ?>">

    	<?php foreach ( $settings['team_items'] as $item ) : ?>

	        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeIn" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
	            <div class="team-style">
	                <div class="team-style-01">
	                	<?php if ( '' !== $item['team_img']['url'] ) : ?>
	                    	<img decoding="async" src="<?php echo wp_kses_post($item['team_img']['url']); ?>" alt="<?php echo wp_kses_post($item['team_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['team_image_title_tag']); ?>">
	                    <?php endif; ?>
	                    <div class="team-social">
	                        <div class="side-icons">
	                            <div class="icon-share">
	                            	<?php if ( '' !== $item['team_icon'] ) : ?>
	                                	<i class="<?php echo wp_kses_post($item['team_icon']); ?>"></i>
	                                <?php endif; ?>
	                                <div class="icons-social">
	                                    <?php if ( '' !== $item['team_social_icon'] ) : ?>
											<?php echo wp_kses_post($item['team_social_icon']); ?>
										<?php endif; ?>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="team-details">
	                	<?php if ( '' !== $item['team_title'] ) : ?>
	                    	<h3 class="h5"><a href="<?php echo wp_kses_post($item['team_detail_page_text_link']); ?>"><?php echo wp_kses_post($item['team_title']); ?></a></h3>
	                    <?php endif; ?>

	                    <?php if ( '' !== $item['team_position'] ) : ?>
	                    	<span><?php echo wp_kses_post($item['team_position']); ?></span>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </div>

        <?php endforeach; ?>

    </div>
  
	<?php
	}

}