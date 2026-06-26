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
class WlFeaturesBoxV1 extends \Elementor\Widget_Base {

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
		return 'wl-features-box-v1';
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
		return __( 'WL Features Box V1', 'wl-elementor' );
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
		return 'eicon-featured-image';
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
		return [ 'WL Features Box V1' ];
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
			'section_wl-features-box-v1',
			[
				'label' => esc_html__( 'WL Features Box V1 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'custom_class',
			[
				'label'   => esc_html__( 'Custom Class for Features Box', 'wl-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'    => esc_html__( 'Custom Class for Features Box', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'custom_class_01',
			[
				'label'   => esc_html__( 'Custom Class 01 for Features Box', 'wl-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'    => esc_html__( 'row mt-n1-9', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'features_items',
			[
				'label' => esc_html__( 'Features Items', 'wl-elementor' ),
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
						'name'        => 'features_shape',
						'label'       => esc_html__( 'Features Shape', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Features Shape' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'features_icon',
						'label'       => esc_html__( 'Features Icon (You can check more icons here: https://www.flaticon.com/packs/ecology-98)', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Features Icon' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'features_heading',
						'label'      => esc_html__( 'Features Heading', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Features Heading', 'wl-elementor' ),
					],
					[
						'name'       => 'features_content',
						'label'      => esc_html__( 'Features Content', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Features Content', 'wl-elementor' ),
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
    		<div class="<?php echo wp_kses_post($settings['custom_class_01']); ?>">

    			<?php foreach ( $settings['features_items'] as $item ) : ?>
                    <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeIn" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
        				<div class="card card-style5 border-0">
	        				<div class="card-body d-flex p-0">
	                            <div class="flex-shrink-0 icon-holder position-relative">

	                            	<?php if ( '' !== $item['features_shape'] ) : ?>
		                                <?php echo wp_kses_post($item['features_shape']); ?>
		                            <?php endif; ?>
								    
	                                <?php if ( '' !== $item['features_icon'] ) : ?>
		                                <span class="<?php echo wp_kses_post($item['features_icon']); ?>"></span>
		                            <?php endif; ?>
								</div>
								<div class="flex-grow-1 ms-4">
								    <?php if ( '' !== $item['features_heading'] ) : ?>
			                            <h4><?php echo wp_kses_post($item['features_heading']); ?></h4>
			                        <?php endif; ?>
			                        <?php if ( '' !== $item['features_content'] ) : ?>
			                            <p class="mb-0"><?php echo wp_kses_post($item['features_content']); ?></p>
			                        <?php endif; ?>
								</div>
	                        </div>
	                    </div>
        			</div>
                <?php endforeach; ?>

    		</div>
		</div>

	<?php
	}

}