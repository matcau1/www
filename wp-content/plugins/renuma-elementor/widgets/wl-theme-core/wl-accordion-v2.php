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
class WlAccordionV2 extends \Elementor\Widget_Base {

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
		return 'wl-accordion-v2';
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
		return __( 'Wl Accordion V2', 'wl-elementor' );
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
		return 'eicon-accordion';
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
		return [ 'Wl Accordion V2' ];
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
			'section_wl-accordion-v2',
			[
				'label' => esc_html__( 'Wl Accordion V2', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'accordion_items',
			[
				'label' => esc_html__( 'Accordion Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [
					[
						'name'        => 'custom_margin',
						'label'       => esc_html__( 'Custom Margin', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Margin' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'animation_delay',
						'label'       => esc_html__( 'Animatioin Delay', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Add Custom Animatioin Delay' , 'wl-elementor' ),
						'label_block' => true,
					],				
					[
						'name'        => 'accordion_heading',
						'label'       => esc_html__( 'Accordian Heading', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Accordion Heading' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'custom_header_id',
						'label'      => esc_html__( 'Custom Header Id', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Header Id', 'wl-elementor' ),
					],
					[
						'name'       => 'custom_butn_link',
						'label'      => esc_html__( 'Custom Button Link', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Button Link', 'wl-elementor' ),
					],
					[
						'name'       => 'custom_data_target',
						'label'      => esc_html__( 'Custom Data Target', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Data Target', 'wl-elementor' ),
					],
					[
						'name'       => 'custom_aria_expanded',
						'label'      => esc_html__( 'Custom Aria Expanded', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Aria Expanded', 'wl-elementor' ),
					],
					[
						'name'       => 'custom_aria_controls',
						'label'      => esc_html__( 'Custom Aria Controls', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Aria Controls', 'wl-elementor' ),
					],
					[
						'name'       => 'accordion_content',
						'label'      => esc_html__( 'Accordion Content', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Accordion Content', 'wl-elementor' ),
					],
					[
						'name'       => 'custom_collapse_id',
						'label'      => esc_html__( 'Custom Collapse Id', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Collapse Id', 'wl-elementor' ),
					],
					[
						'name'       => 'custom_show',
						'label'      => esc_html__( 'Custom Show', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Show', 'wl-elementor' ),
					],
					[
						'name'       => 'custom_aria_labelledby',
						'label'      => esc_html__( 'Custom Aria Labelledby', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Aria Labelledby', 'wl-elementor' ),
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

        <div id="accordion" class="accordion-style style1">

        	<?php foreach ( $settings['accordion_items'] as $item ) : ?>

	            <div class="card <?php echo wp_kses_post($item['custom_margin']); ?> wow fadeInUp" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
	            	<?php if ( '' !== $item['accordion_heading'] ) : ?>
		                <div class="card-header" id="<?php echo wp_kses_post($item['custom_header_id']); ?>">
		                    <h5 class="mb-0">
		                        <button class="<?php echo wp_kses_post($item['custom_butn_link']); ?>" data-bs-toggle="collapse" data-bs-target="<?php echo wp_kses_post($item['custom_data_target']); ?>" aria-expanded="<?php echo wp_kses_post($item['custom_aria_expanded']); ?>" aria-controls="<?php echo wp_kses_post($item['custom_aria_controls']); ?>"><?php echo wp_kses_post($item['accordion_heading']); ?></button>
		                    </h5>
		                </div>
	                <?php endif; ?>

	                <?php if ( '' !== $item['accordion_content'] ) : ?>
		                <div id="<?php echo wp_kses_post($item['custom_collapse_id']); ?>" class="<?php echo wp_kses_post($item['custom_show']); ?>" aria-labelledby="<?php echo wp_kses_post($item['custom_aria_labelledby']); ?>" data-bs-parent="#accordion">
		                    <div class="card-body text-muted">
		                        <?php echo wp_kses_post($item['accordion_content']); ?>
		                    </div>
		                </div>
	                <?php endif; ?>
	            </div>

            <?php endforeach; ?>

        </div>

	<?php
	}

}