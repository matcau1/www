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
class WlPortfolioCarousel extends \Elementor\Widget_Base {

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
		return 'wl-portfolio-carousel';
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
		return __( 'WL Portfolio Carousel', 'wl-elementor' );
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
		return 'eicon-posts-carousel';
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
		return [ 'WL Portfolio Carousel' ];
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
			'section_wl-portfolio-carousel',
			[
				'label' => esc_html__( 'WL Portfolio Carousel Area', 'wl-elementor' ),
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
			'portfolio_items',
			[
				'label' => esc_html__( 'Portfolio Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'        => 'data_overlay',
						'label'       => __( 'Overlay Value (0,1,2,3,4,5,55,6,65,7,75,8,85,9,91,92,93,94,95,96,97,98,99,10)', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Data Overlay Opacity' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'portfolio_bg_image',
						'label'   => esc_html__( 'Portfolio Bg Image (Recommend Size 1920 * 1494)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'portfolio_detail_page_link',
						'label'      => esc_html__( 'Portfolio Detail Page Link', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Detail Page Link', 'wl-elementor' ),
					],
					[
						'name'       => 'portfolio_title_01',
						'label'      => esc_html__( 'Portfolio Title 01', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Title 01', 'wl-elementor' ),
					],
					[
						'name'        => 'custom_class',
						'label'       => esc_html__( 'Custom Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Class' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'custom_margin',
						'label'       => esc_html__( 'Custom Margin', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Margin' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'portfolio_img',
						'label'   => esc_html__( 'Portfolio Image (Recommend Size 137 * 75)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[						
						'name'       => 'portfolio_image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[						
						'name'       => 'portfolio_image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'       => 'portfolio_title_02',
						'label'      => esc_html__( 'Portfolio Title 02', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Title 02', 'wl-elementor' ),
					],
					[
						'name'       => 'portfolio_catagory',
						'label'      => esc_html__( 'Portfolio Catagory', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Catagory', 'wl-elementor' ),
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

	<div class="<?php echo wp_kses_post($settings['slider_class']); ?>" data-slider-id="1">

		<?php foreach ( $settings['portfolio_items'] as $item ) : ?>

	        <div>
	            <div class="bg-img cover-background py-10 py-md-12 py-lg-14 py-xl-16 py-xxl-18" <?php if ( '' !== $item['portfolio_bg_image']['url'] ) : ?> data-overlay-dark="<?php echo wp_kses_post($item['data_overlay']); ?>" data-background="<?php echo wp_kses_post($item['portfolio_bg_image']['url']); ?>" <?php endif; ?>>
	                <div class="pt-md-8 pt-xl-15 pt-xxl-18 pb-sm-14 pb-md-20 position-relative z-index-9">
	                	<?php if ( '' !== $item['portfolio_title_01'] ) : ?>
	                    	<h4 class="display-2 text-center mb-0"><a href="<?php echo wp_kses_post($item['portfolio_detail_page_link']); ?>" class="text-white"><?php echo wp_kses_post($item['portfolio_title_01']); ?></a></h4>
	                    <?php endif; ?>
	                </div>        
	            </div>
	        </div>

        <?php endforeach; ?>

    </div>

    <div class="<?php echo wp_kses_post($item['custom_class']); ?>" data-slider-id="1">

    	<?php foreach ( $settings['portfolio_items'] as $item ) : ?>

	        <button class="owl-thumb-item bg-transparent <?php echo wp_kses_post($item['custom_margin']); ?>">
	            <div class="d-flex">
	                <div class="flex-shrink-0 me-lg-3">
	                	<?php if ( '' !== $item['portfolio_img']['url'] ) : ?>
	                    	<img src="<?php echo wp_kses_post($item['portfolio_img']['url']); ?>" class="rounded" alt="<?php echo wp_kses_post($item['portfolio_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['portfolio_image_title_tag']); ?>">
	                    <?php endif; ?>
	                </div>
	                <div class="flex-grow-1 d-none d-lg-block">
	                	<?php if ( '' !== $item['portfolio_title_02'] ) : ?>
	                    	<h3 class="display-29 text-start mb-1-5 w-90"><a href="<?php echo wp_kses_post($item['portfolio_detail_page_link']); ?>"><?php echo wp_kses_post($item['portfolio_title_02']); ?></a></h3>
	                    <?php endif; ?>

	                    <?php if ( '' !== $item['portfolio_catagory'] ) : ?>
	                    	<p class="display-30 text-start mb-0"><?php echo wp_kses_post($item['portfolio_catagory']); ?></p>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </button>

        <?php endforeach; ?>

    </div>
      
	<?php
	}

}