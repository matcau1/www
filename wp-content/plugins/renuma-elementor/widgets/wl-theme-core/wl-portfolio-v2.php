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
class WlPortfolioV2 extends \Elementor\Widget_Base {

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
		return 'wl-portfolio-v2';
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
		return __( 'WL Portfolio V2', 'wl-elementor' );
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
		return 'eicon-gallery-grid';
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
		return [ 'WL Portfolio V2' ];
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
			'section_wl-portfolio-v2',
			[
				'label' => esc_html__( 'WL Portfolio V2 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'custom_class',
			[
				'label'   => esc_html__( 'Custom Class', 'wl-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'    => esc_html__( 'Add Custom Class', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'portfolio_items',
			[
				'label' => esc_html__( 'Portfolio Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'        => 'custom_column_class',
						'label'       => esc_html__( 'Custom Column Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Add Custom Column Class' , 'wl-elementor' ),
						'label_block' => true,
					],	
					[
						'name'    => 'portfolio_bg_image_01',
						'label'   => esc_html__( 'Portfolio Bg Image 01 (Recommend Size 738 * 800)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'    => 'portfolio_bg_image_02',
						'label'   => esc_html__( 'Portfolio Bg Image 02 (Recommend Size 738 * 800)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'    => 'portfolio_img',
						'label'   => esc_html__( 'Portfolio Image (Recommend Size 738 * 800)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[						
						'name'       => 'image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[						
						'name'       => 'image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'       => 'portfolio_title',
						'label'      => esc_html__( 'Portfolio Title', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Title', 'wl-elementor' ),
					],
					[
						'name'       => 'portfolio_content',
						'label'      => esc_html__( 'Portfolio Content', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Content', 'wl-elementor' ),
					],
					[
						'name'       => 'portfolio_detail_page_link',
						'label'      => esc_html__( 'Portfolio Detail Page Link', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Detail Page Link', 'wl-elementor' ),
					],
					[
						'name'       => 'arrow_icon',
						'label'      => esc_html__( 'Arrow Icon', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Arrow Icon', 'wl-elementor' ),
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

	<div class="container-fluid p-sm-0">

		<div class="<?php echo wp_kses_post($settings['custom_class']); ?>">

			<?php foreach ( $settings['portfolio_items'] as $item ) : ?>

		        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?>" <?php if ( '' !== $item['portfolio_bg_image_01']['url'] ) : ?> data-src="<?php echo wp_kses_post($item['portfolio_bg_image_01']['url']); ?>" data-sub-html="<h4 class='text-white'><a href='<?php echo wp_kses_post($item['portfolio_detail_page_link']); ?>' class='text-white'><?php echo wp_kses_post($item['portfolio_title']); ?></a></h4>" <?php endif; ?>>
		            <div class="portfolio-box">
		                <div class="bg-img" <?php if ( '' !== $item['portfolio_bg_image_02']['url'] ) : ?> data-background="<?php echo wp_kses_post($item['portfolio_bg_image_02']['url']); ?>" <?php endif; ?>>

		                	<?php if ( '' !== $item['portfolio_img']['url'] ) : ?>
		                		<img src="<?php echo wp_kses_post($item['portfolio_img']['url']); ?>" alt="<?php echo wp_kses_post($item['image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['image_title_tag']); ?>" class="d-none">
		                	<?php endif; ?>
		                </div>
		                <div class="content-box">
		                	<?php if ( '' !== $item['portfolio_title'] ) : ?>
		                    	<h3 class="mb-2"><a href="<?php echo wp_kses_post($item['portfolio_detail_page_link']); ?>"><?php echo wp_kses_post($item['portfolio_title']); ?></a></h3>
		                    <?php endif; ?>

		                    <?php if ( '' !== $item['portfolio_content'] ) : ?>
		                    	<p class="text-white opacity7"><?php echo wp_kses_post($item['portfolio_content']); ?></p>
		                    <?php endif; ?>

		                    <?php if ( '' !== $item['arrow_icon'] ) : ?>
		                    	<div class="link text-end"><a href="<?php echo wp_kses_post($item['portfolio_detail_page_link']); ?>" class="portfolio-link"><i class="<?php echo wp_kses_post($item['arrow_icon']); ?>"></i></a></div>
		                    <?php endif; ?>
		                </div>
		            </div>
		        </div>

	        <?php endforeach; ?>

	    </div>

	</div>

	<?php
	}

}