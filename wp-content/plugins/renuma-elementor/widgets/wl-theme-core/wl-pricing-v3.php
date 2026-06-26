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
class WlPricingV3 extends \Elementor\Widget_Base {

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
		return 'wl-pricing-v3';
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
		return __( 'WL Pricing V3', 'wl-elementor' );
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
		return 'eicon-price-table';
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
		return [ 'Wl Pricing V3' ];
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
			'section_wl_pricing-v3',
			[
				'label' => esc_html__( 'Wl Pricing V3 Area', 'wl-elementor' ),
			]	
		);	

		$this->add_control(
			'custom_class',
			[
				'label'       => __( 'Custom Class', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your custom class', 'wl-elementor' ),
				'default'     => __( 'Add Custom Class', 'wl-elementor' ),
				'label_block' => true,
			]
		);			

		$this->add_control(
			'pricing_items',
			[
				'label' => esc_html__( 'Pricing Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [
					[
						'name'        => 'pricing_chosen',
						'label'     => esc_html__( 'Pricing Chosen', 'wl-elementor' ),
						'type'      => Controls_Manager::SELECT,
						'dynamic' => [ 'active' => true ],
						'options'   => [
							'1'  => esc_html__( 'No', 'wl-elementor' ),
							'2'  => esc_html__( 'Yes', 'wl-elementor' ),
						],
						'default'   => '1',
					],
					[
						'name'        => 'custom_column_class',
						'label'       => esc_html__( 'Custom Column Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Add Custom Column Class' , 'wl-elementor' ),
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
						'name'        => 'pricing_title',
						'label'       => esc_html__( 'Pricing Title', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Title' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'pricing_value',
						'label'       => esc_html__( 'Pricing Value', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Value' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'pricing_month',
						'label'       => esc_html__( 'Pricing Month', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Month' , 'wl-elementor' ),
						'label_block' => true,
					],			
					[
						'name'       => 'pricing_list',
						'label'      => esc_html__( 'Pricing List', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Pricing List', 'wl-elementor' ),
					],
					[
						'name'        => 'pricing_link',
						'label'       => esc_html__( 'Pricing Link', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Link' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'pricing_button',
						'label'       => esc_html__( 'Pricing Button', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Button' , 'wl-elementor' ),
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

    <div class="<?php echo wp_kses_post($settings['custom_class']); ?>">

    	<?php foreach ( $settings['pricing_items'] as $item ) : ?>
            <?php if( wp_kses_post($item['pricing_chosen']) == '1'): ?>

		        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeInUp" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
		            <div class="card card-style15">
		                <div class="card-header bg-transparent border-0 text-center p-0 mb-4">
		                    <div class="top-content mb-1-6">
		                    	<?php if ( '' !== $item['pricing_title'] ) : ?>
		                        	<h3 class="h4 mb-0"><?php echo wp_kses_post($item['pricing_title']); ?></h3>
		                        <?php endif; ?>
		                    </div>
		                    <h4 class="display-15 display-lg-12 display-xxl-11 font-weight-800 text-center text-xxl-end mb-0 lh-1">
		                    	<?php if ( '' !== $item['pricing_value'] ) : ?> 
		                    		<?php echo wp_kses_post($item['pricing_value']); ?>
		                    	<?php endif; ?>

		                    	<?php if ( '' !== $item['pricing_month'] ) : ?> 
		                    		<span class="display-29 display-lg-28 font-weight-300 w-25 d-inline-block text-start lh-sm"><?php echo wp_kses_post($item['pricing_month']); ?></span>
		                    	<?php endif; ?>
		                    </h4>
		                </div>
		                <div class="card-body p-0 mb-3">
		                    <?php if ( '' !== $item['pricing_list'] ) : ?>
	                            <?php echo wp_kses_post($item['pricing_list']); ?>
	                        <?php endif; ?>
		                </div>
		                <div class="text-center">
		                	<?php if ( '' !== $item['pricing_button'] ) : ?>
		                    	<a href="<?php echo wp_kses_post($item['pricing_link']); ?>" class="btn-style5 w-100"><?php echo wp_kses_post($item['pricing_button']); ?></a>
		                    <?php endif; ?>
		                </div>
		            </div>
		        </div>

		   	<?php elseif( wp_kses_post($item['pricing_chosen']) == '2'): ?>
		        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeInUp" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
		            <div class="card card-style15">
		                <div class="card-header bg-transparent border-0 text-center p-0 mb-4">
		                    <div class="top-content mb-1-6">
		                    	<?php if ( '' !== $item['pricing_title'] ) : ?>
		                        	<h3 class="h4 mb-0"><?php echo wp_kses_post($item['pricing_title']); ?></h3>
		                        <?php endif; ?>
		                    </div>
		                    <h4 class="display-15 display-lg-12 display-xxl-11 font-weight-800 text-center text-xxl-end mb-0 lh-1">
		                    	<?php if ( '' !== $item['pricing_value'] ) : ?> 
		                    		<?php echo wp_kses_post($item['pricing_value']); ?>
		                    	<?php endif; ?>

		                    	<?php if ( '' !== $item['pricing_month'] ) : ?> 
		                    		<span class="display-29 display-lg-28 font-weight-300 w-25 d-inline-block text-start lh-sm"><?php echo wp_kses_post($item['pricing_month']); ?></span>
		                    	<?php endif; ?>
		                    </h4>
		                </div>
		                <div class="card-body p-0 mb-3">
		                    <?php if ( '' !== $item['pricing_list'] ) : ?>
	                            <?php echo wp_kses_post($item['pricing_list']); ?>
	                        <?php endif; ?>
		                </div>
		                <div class="text-center">
		                	<?php if ( '' !== $item['pricing_button'] ) : ?>
		                    	<a href="<?php echo wp_kses_post($item['pricing_link']); ?>" class="btn-style5 secondary w-100"><?php echo wp_kses_post($item['pricing_button']); ?></a>
		                    <?php endif; ?>
		                </div>
		            </div>
		        </div>

		    <?php endif; ?>
		<?php endforeach; ?>

    </div>       

	<?php
	}

}