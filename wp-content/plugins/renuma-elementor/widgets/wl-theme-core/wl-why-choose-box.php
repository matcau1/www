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
class WlWhyChooseBox extends \Elementor\Widget_Base {

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
		return 'wl-why-choose-box';
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
		return __( 'WL Why Choose Box', 'wl-elementor' );
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
		return [ 'WL Why Choose Box' ];
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
			'section_wl-why-choose-box',
			[
				'label' => esc_html__( 'WL Why Choose Box Area', 'wl-elementor' ),
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
			'why_choose_items',
			[
				'label' => esc_html__( 'Why Choose Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [	
					[
						'name'        => 'custom_column_class',
						'label'       => esc_html__( 'Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Column Class' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'custom_class_01',
						'label'       => esc_html__( 'Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Column Class 01' , 'wl-elementor' ),
						'label_block' => true,
					],		
					[
						'name'        => 'why_choose_icon',
						'label'       => esc_html__( 'Icon', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Why Choose Icon' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'custom_class_02',
						'label'       => esc_html__( 'Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Column Class 02' , 'wl-elementor' ),
						'label_block' => true,
					],		
					[
						'name'       => 'why_choose_heading',
						'label'      => esc_html__( 'Heading', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXT,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Why Choose Heading', 'wl-elementor' ),
					],
					[
						'name'       => 'why_choose_content',
						'label'      => esc_html__( 'Content', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Why Choose Content', 'wl-elementor' ),
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

		<!-- WHY CHOOSE BOX
        ================================================== -->
        <div class="<?php echo wp_kses_post($settings['custom_class']); ?>" data-wow-delay="200ms">
	        <?php foreach ( $settings['why_choose_items'] as $item ) : ?>
	        	<div class="<?php echo wp_kses_post($item['custom_column_class']); ?>">
					<div class="d-flex">
						<div class="flex-shrink-0 <?php echo wp_kses_post($item['custom_class_01']); ?>">
							<?php if ( '' !== $item['why_choose_icon'] ) : ?>
								<i class="<?php echo wp_kses_post($item['why_choose_icon']); ?> primary-shadow p-2 p-sm-3 text-secondary rounded-circle display-31 display-sm-28"></i>
							<?php endif; ?>
						</div>
						<div class="flex-grow-1 <?php echo wp_kses_post($item['custom_class_02']); ?>">
							<?php if ( '' !== $item['why_choose_heading'] ) : ?>
								<h3 class="h5"><?php echo wp_kses_post($item['why_choose_heading']); ?></h3>
							<?php endif; ?>

							<?php if ( '' !== $item['why_choose_content'] ) : ?>
								<p class="mb-0 w-90 w-xl-80"><?php echo wp_kses_post($item['why_choose_content']); ?></p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	<?php
	}

}