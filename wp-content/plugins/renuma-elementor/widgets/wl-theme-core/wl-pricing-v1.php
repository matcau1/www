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
class WlPricingV1 extends \Elementor\Widget_Base {

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
		return 'wl-pricing-v1';
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
		return __( 'WL Pricing V1', 'wl-elementor' );
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
		return [ 'WL Pricing V1' ];
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
			'section_wl-pricing-v1',
			[
				'label' => esc_html__( 'WL Pricing V1 Area', 'wl-elementor' ),
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
						'label'       => esc_html__( 'Class', 'wl-elementor' ),
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
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'    => 'pricing_title',
						'label'   => esc_html__( 'Pricing Title', 'wl-elementor' ),
						'type'    => Controls_Manager::TEXTAREA,
						'dynamic' => [ 'active' => true ],
					],			
					[
						'name'        => 'pricing_value',
						'label'       => esc_html__( 'Value', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Value' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'pricing_month',
						'label'       => esc_html__( 'Month', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Month' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'pricing_image',
						'label'   => esc_html__( 'Pricing Image (Recommend Size 106 * 125)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'pricing_list',
						'label'      => esc_html__( 'Pricing List', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Pricing List', 'wl-elementor' ),
					],
					[
						'name'        => 'pricing_button',
						'label'       => esc_html__( 'Button', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Button' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'pricing_link',
						'label'       => esc_html__( 'Link', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Pricing Link' , 'wl-elementor' ),
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

	<!-- PRICING
    ================================================== --> 
	<div class="<?php echo wp_kses_post($settings['custom_class']); ?>">

	<?php foreach ( $settings['pricing_items'] as $item ) : ?>
    	<?php if( wp_kses_post($item['pricing_chosen']) == '1'): ?>

    		<div class="<?php echo wp_kses_post($item['custom_column_class']); ?>" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>">
                <div class="price-table primary-shadow">
                    <div class="bg-dark p-1-6 p-xl-2-3 position-relative overflow-hidden">
                        <div class="position-relative mb-3">
                        	<?php if ( '' !== $item['pricing_title'] ) : ?>
                            	<span class="price-title text-secondary h5"><?php echo wp_kses_post($item['pricing_title']); ?></span>
	                        <?php endif; ?>
                        </div>
                        
                        <h4 class="h1 text-white mb-0">

                        	<?php if ( '' !== $item['pricing_value'] ) : ?> 
                        		<?php echo wp_kses_post($item['pricing_value']); ?>
                        	<?php endif; ?>

                            <?php if ( '' !== $item['pricing_month'] ) : ?> 
		                        <span class="text-white display-30"><?php echo wp_kses_post($item['pricing_month']); ?></span>
	                        <?php endif; ?>

			     		</h4>
                        
                        <div class="right bottom position-absolute">
                        	<?php if ( '' !== $item['pricing_image']['url'] ) : ?>
	                            <img src="<?php echo wp_kses_post($item['pricing_image']['url']); ?>" alt="<?php echo esc_attr__('Pricing Image', 'renuma'); ?>">
	                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="p-1-9 p-sm-2-3">
                    	<?php if ( '' !== $item['pricing_list'] ) : ?>
                            <ul class="list-unstyled mb-4 display-28">
                                <?php echo wp_kses_post($item['pricing_list']); ?>
                            </ul>
                        <?php endif; ?>
                        <div class="text-center">
                        	<?php if ( '' !== $item['pricing_button'] ) : ?>
		                        <a href="<?php echo wp_kses_post($item['pricing_link']); ?>" class="btn-style4 w-100"><?php echo wp_kses_post($item['pricing_button']); ?></a>
	                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php elseif( wp_kses_post($item['pricing_chosen']) == '2'): ?>
        	<div class="<?php echo wp_kses_post($item['custom_column_class']); ?>" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>">
                <div class="price-table primary-shadow">
                    <div class="bg-primary p-1-6 p-xl-2-3 position-relative overflow-hidden">
                        <div class="position-relative mb-3">
                        	<?php if ( '' !== $item['pricing_title'] ) : ?>
	                        	<span class="price-title text-white h5"><?php echo wp_kses_post($item['pricing_title']); ?></span>
			                <?php endif; ?>
                        </div>
                        
                        <h4 class="h1 text-white mb-0">

                        	<?php if ( '' !== $item['pricing_value'] ) : ?> 
                        		<?php echo wp_kses_post($item['pricing_value']); ?>
                        	<?php endif; ?>

                            <?php if ( '' !== $item['pricing_month'] ) : ?> 
		                        <span class="text-white display-30"><?php echo wp_kses_post($item['pricing_month']); ?></span>
	                        <?php endif; ?>

			     		</h4>
                        
                        <div class="right bottom position-absolute">
                        	<?php if ( '' !== $item['pricing_image']['url'] ) : ?>
			                    <img src="<?php echo wp_kses_post($item['pricing_image']['url']); ?>" alt="<?php echo esc_attr__('Pricing Image', 'renuma'); ?>">
			                <?php endif; ?>
                        </div>
                    </div>
                    <div class="p-1-9 p-sm-2-3">
                    	<?php if ( '' !== $item['pricing_list'] ) : ?>
		                    <ul class="list-unstyled mb-4 display-28">
	                            <?php echo wp_kses_post($item['pricing_list']); ?>
	                        </ul>
		                <?php endif; ?>
                        <div class="text-center">
                        	<?php if ( '' !== $item['pricing_button'] ) : ?>
			                    <a href="<?php echo wp_kses_post($item['pricing_link']); ?>" class="btn-style4 primary w-100"><?php echo wp_kses_post($item['pricing_button']); ?></a>
		                    <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

    	<?php endif; ?>
	<?php endforeach; ?>

	</div>
        		
	<?php
	}

}