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
class WlPriceBox extends \Elementor\Widget_Base {

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
		return 'wl-price-box';
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
		return __( 'WL Price Box', 'wl-elementor' );
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
		return [ 'WL Price Box' ];
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
			'section_wl-price-box',
			[
				'label' => esc_html__( 'WL Price Box Area', 'wl-elementor' ),
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
			'custom_column_class',
			[
				'label'       => __( 'Custom Column Class', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your custom class', 'wl-elementor' ),
				'default'     => __( 'Custom Column Class', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'custom_class_01',
			[
				'label'       => __( 'Custom Class 01', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your custom class 01', 'wl-elementor' ),
				'default'     => __( 'Custom Class 01', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'service_title',
			[
				'label'       => __( 'Service Title', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your service title', 'wl-elementor' ),
				'default'     => __( 'It is Service Title', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'service_sub_title',
			[
				'label'       => __( 'Service Sub Title', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your service sub title', 'wl-elementor' ),
				'default'     => __( 'It is Service Sub Title', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'service_items',
			[
				'label' => esc_html__( 'Service Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => [
					[
						'name'       => 'service_name',
						'label'      => esc_html__( 'Service Name', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Service Name', 'wl-elementor' ),
					],
					[
						'name'       => 'service_price',
						'label'      => esc_html__( 'Service Price', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Service Price', 'wl-elementor' ),
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

		$this->add_control(
			'show_service_title',
			[
				'label'   => esc_html__( 'Show Service Title', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_service_sub_title',
			[
				'label'   => esc_html__( 'Show Service Sub Title', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		?>

	<!-- PRICE BOX
    ================================================== --> 
    <div class="<?php echo wp_kses_post($settings['custom_class']); ?>" data-wow-delay="200ms">
		<div class="<?php echo wp_kses_post($settings['custom_column_class']); ?>">

			<ul class="<?php echo wp_kses_post($settings['custom_class_01']); ?>">

				<li>
					<?php if (( '' !== $settings['service_title'] ) && ( $settings['show_service_title'] )): ?>
						<h6 class="h5 mb-0"><?php echo wp_kses_post($settings['service_title']); ?></h6>
					<?php endif; ?>

					<?php if (( '' !== $settings['service_sub_title'] ) && ( $settings['show_service_sub_title'] )): ?>
						<p class="mb-0"><span class="font-weight-600"><?php echo wp_kses_post($settings['service_sub_title']); ?></span></p>
					<?php endif; ?>
				</li>
				<?php foreach ( $settings['service_items'] as $item ) : ?>
					<li>
						<?php if ( '' !== $item['service_name'] ) : ?>
							<p class="mb-0"><?php echo wp_kses_post($item['service_name']); ?></p>
						<?php endif; ?>

						<?php if ( '' !== $item['service_price'] ) : ?>
							<p class="mb-0"><span><?php echo wp_kses_post($item['service_price']); ?></span></p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>

        		
	<?php
	}

}