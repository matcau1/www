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
class WlPortfolioGrid extends \Elementor\Widget_Base {

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
		return 'wl-portfoli-grid';
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
		return __( 'WL Portfolio Grid', 'wl-elementor' );
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
		return 'eicon-posts-justified';
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
		return [ 'WL Portfolio Grid' ];
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
			'section_wl-portfolio-grid',
			[
				'label' => esc_html__( 'WL Portfolio Grid Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'tab_custom_class',
			[
				'label'   => esc_html__( 'Tab Custom Class for Portfolio', 'wl-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'    => esc_html__( 'Tab Custom Class for Portfolio', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'tab_items',
			[
				'label' => esc_html__( 'Tab Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'       => 'tab_list',
						'label'      => esc_html__( 'Tab List', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Tab List', 'wl-elementor' ),
					],	
				],
			]
		);

		$this->add_control(
			'custom_class',
			[
				'label'   => esc_html__( 'Custom Class for Portfolio', 'wl-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'    => esc_html__( 'Custom Class for Portfolio', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'portfolio_items',
			[
				'label' => esc_html__( 'Portfolio Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'       => 'custom_class_column',
						'label'      => esc_html__( 'Custom Class for Column', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'col-', 'wl-elementor' ),
					],
					[
						'name'    => 'portfolio_img',
						'label'   => esc_html__( 'Portfolio Image (Recommend Size 800 * 800)', 'wl-elementor' ),
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
						'name'        => 'portfolio_detail_page_link',
						'label'       => esc_html__( 'Portfolio Link', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Portfolio Link' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'portfolio_icon',
						'label'       => esc_html__( 'Portfolio Icon', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Portfolio Icon' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'portfolio_category',
						'label'      => esc_html__( 'Portfolio Category', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Category', 'wl-elementor' ),
					],
					[
						'name'       => 'portfolio_name',
						'label'      => esc_html__( 'Portfolio Name', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Portfolio Name', 'wl-elementor' ),
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

    <div class="row">
        <!-- start links -->
        <div class="<?php echo wp_kses_post($settings['tab_custom_class']); ?>">
            <?php foreach ( $settings['tab_items'] as $item ) : ?>
        		<?php if ( '' !== $item['tab_list'] ) : ?>
                    <?php echo wp_kses_post($item['tab_list']); ?>
                <?php endif; ?>
        	<?php endforeach; ?>
        </div>
        <!-- end links -->
    </div>

    <div class="<?php echo wp_kses_post($settings['custom_class']); ?>">

    	<?php foreach ( $settings['portfolio_items'] as $item ) : ?>

    		<div class="<?php echo wp_kses_post($item['custom_class_column']); ?>" data-src="<?php echo wp_kses_post($item['portfolio_img']['url']); ?>" data-sub-html="<h4 class='text-white'><?php echo wp_kses_post($item['portfolio_name']); ?></h4><p><?php echo wp_kses_post($item['portfolio_category']); ?></p>">
    			<div class="card card-style3 border-0 rounded-0">

    				<?php if ( '' !== $item['portfolio_img']['url'] ) : ?>
    					<img src="<?php echo wp_kses_post($item['portfolio_img']['url']); ?>" alt="<?php echo wp_kses_post($item['image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['image_title_tag']); ?>">
    				<?php endif; ?>

    				<div class="card-body">
    					<div class="portfolio-icon">
    						<div class="top-icon">
    							<a href="<?php echo wp_kses_post($item['portfolio_detail_page_link']); ?>" class="portfolio-link">
    								<?php if ( '' !== $item['portfolio_icon'] ) : ?>
    									<i class="<?php echo wp_kses_post($item['portfolio_icon']); ?>"></i>
    								<?php endif; ?>
    							</a>
    						</div>
    					</div>
                        <div class="portfolio-content">

                        	<?php if ( '' !== $item['portfolio_category'] ) : ?>
                            	<span class="text-white"><?php echo wp_kses_post($item['portfolio_category']); ?></span>
                            <?php endif; ?>

                            <?php if ( '' !== $item['portfolio_name'] ) : ?>
                            	<h3 class="h4"><a href="<?php echo wp_kses_post($item['portfolio_detail_page_link']); ?>" class="text-white"><?php echo wp_kses_post($item['portfolio_name']); ?></a></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>	               
    
    </div>
        
      

	<?php
	}

}