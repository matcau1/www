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
class WlProgressBarV1 extends \Elementor\Widget_Base {

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
		return 'wl-progress-bar-v1';
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
		return __( 'WL Progress Bar V1', 'wl-elementor' );
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
		return 'eicon-skill-bar';
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
		return [ 'WL Progress Bar V1' ];
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
			'section_wl-progress-bar-v1',
			[
				'label' => esc_html__( 'WL Progress Bar V1 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'custom_class',
			[
				'label'       => __( 'Custom Class', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your custom class', 'wl-elementor' ),
				'default'     => __( 'It is Custom Class', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'progress_items',
			[
				'label' => esc_html__( 'Progress Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [	
					[
						'name'       => 'progress_heading',
						'label'      => esc_html__( 'Heading', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Progress Heading', 'wl-elementor' ),
					],
					[
						'name'        => 'custom_class',
						'label'       => esc_html__( 'Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Class' , 'wl-elementor' ),
						'label_block' => true,
					],	
					[
						'name'       => 'progress_value',
						'label'      => esc_html__( 'Progress Value', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Progress Value', 'wl-elementor' ),
					],
					[
						'name'        => 'custom_class_01',
						'label'       => esc_html__( 'Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Class' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'custom_color',
						'label'       => esc_html__( 'Color', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Color' , 'wl-elementor' ),
						'label_block' => true,
					],	
					[
						'name'       => 'process_width',
						'label'      => esc_html__( 'Progress Width', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'       => 'aria_value',
						'label'      => esc_html__( 'Aria Value', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
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

        <!-- PROGRESS BAR V1
        ================================================== -->
		<div class="<?php echo wp_kses_post($settings['custom_class']); ?>">

			<?php foreach ( $settings['progress_items'] as $item ) : ?>
				<div class="progress-text small">
					<div class="row">

						<?php if ( '' !== $item['progress_heading'] ) : ?>
							<div class="col-6 <?php echo wp_kses_post($item['custom_class']); ?>"><strong class="text-uppercase"><?php echo wp_kses_post($item['progress_heading']); ?></strong></div>
						<?php endif; ?>

						<?php if ( '' !== $item['progress_value'] ) : ?>
							<div class="col-6 text-end"><?php echo wp_kses_post($item['progress_value']); ?></div>
						<?php endif; ?>

					</div>
				</div>
				<div class="custom-progress progress <?php echo wp_kses_post($item['custom_class_01']); ?>">
					<div class="animated custom-bar progress-bar slideInLeft <?php echo wp_kses_post($item['custom_color']); ?>" style="width: <?php echo wp_kses_post($item['process_width']); ?>" role="progressbar" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo wp_kses_post($item['aria_value']); ?>"></div>
				</div>
			<?php endforeach; ?>

		</div>

	<?php
	}

}