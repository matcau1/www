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
class WlBannerCarouselV2 extends \Elementor\Widget_Base {

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
		return 'wl-banner-carousel-v2';
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
		return __( 'Wl Banner Carousel V2', 'wl-elementor' );
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
		return 'eicon-slider-push';
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
		return [ 'Wl Banner Carousel V2' ];
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
			'section_wl-banner-carousel-v2',
			[
				'label' => esc_html__( 'Wl Banner Carousel V2 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'slider_class',
			[
				'label'       => __( 'Slider Class', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your slider class', 'wl-elementor' ),
				'default'     => __( 'Slider Class', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'banner_items',
			[
				'label' => esc_html__( 'Banner Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'		  =>'overlay_option',
						'label'       => __( 'Overlay Options (primary-overlay,secondary-overlay,left-overlay-secondary)', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'placeholder' => __( 'Enter your overlay class', 'wl-elementor' ),
						'default'     => __( 'left-overlay-dark', 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'data_overlay',
						'label'       => __( 'Overlay Value (0,1,2,3,4,5,55,6,65,7,75,8,85,9,91,92,93,94,95,96,97,98,99,10)', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Data Overlay Opacity' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'banner_bg_image',
						'label'   => esc_html__( 'Banner Bg Image (Recommend Size 1920 * 1000)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'        => 'banner_sub_title',
						'label'       => esc_html__( 'Banner Sub Title', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Banner Sub Title' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'banner_title',
						'label'       => esc_html__( 'Banner Title', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Banner Title' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'banner_link_01',
						'label'       => esc_html__( 'Banner Link 01', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Banner Link 01' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'banner_button_01',
						'label'       => esc_html__( 'Banner Button 01', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Banner Button 01' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'banner_link_02',
						'label'       => esc_html__( 'Banner Link 02', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Banner Link 02' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'banner_button_02',
						'label'       => esc_html__( 'Banner Button 02', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Banner Button 02' , 'wl-elementor' ),
						'label_block' => true,
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

    <div class="<?php echo wp_kses_post($settings['slider_class']); ?>">

    	<?php foreach ( $settings['banner_items'] as $item ) : ?>

	        <div class="item bg-img cover-background <?php echo wp_kses_post($item['overlay_option']); ?>" <?php if ( '' !== $item['banner_bg_image']['url'] ) : ?> data-overlay-dark="<?php echo wp_kses_post($item['data_overlay']); ?>" data-background="<?php echo wp_kses_post($item['banner_bg_image']['url']); ?>" <?php endif; ?>>
	            <div class="container d-flex flex-column">
	                <div class="row align-items-center min-vh-100 pt-6 pt-md-0">
	                    <div class="col-md-12 col-lg-10 col-xl-9 col-xxl-8 mb-1-9 mb-lg-0 pt-6 pb-12 py-sm-6">
	                        <div class="section-title01">
	                            <div class="mb-2-1 title-style5">
	                            	<?php if ( '' !== $item['banner_sub_title'] ) : ?>
	                                	<span class="text-secondary text-uppercase small letter-spacing-4 d-block mb-3 font-weight-700"><?php echo wp_kses_post($item['banner_sub_title']); ?></span>
	                                <?php endif; ?>

	                                <?php if ( '' !== $item['banner_title'] ) : ?>
	                                	<?php echo wp_kses_post($item['banner_title']); ?>
	                                <?php endif; ?>
	                            </div>                                    
	                        </div>
	                        <div class="banner-button">
	                        	<?php if ( '' !== $item['banner_button_01'] ) : ?>
		                            <a href="<?php echo wp_kses_post($item['banner_link_01']); ?>" class="btn-style7 m-2">
		                                <span><?php echo wp_kses_post($item['banner_button_01']); ?></span>
		                            </a>
	                            <?php endif; ?>

	                            <div class="button-text d-inline-block m-2">
	                            	<?php if ( '' !== $item['banner_button_02'] ) : ?>
	                                	<a href="<?php echo wp_kses_post($item['banner_link_02']); ?>" class="text-white text-primary-hover"><?php echo wp_kses_post($item['banner_button_02']); ?></a>
	                                <?php endif; ?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

        <?php endforeach; ?>

    </div>    

	<?php
	}

}