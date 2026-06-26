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
class WlCounterV2 extends \Elementor\Widget_Base {

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
		return 'Wl-counter-v2';
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
		return __( 'WL Counter V2', 'wl-elementor' );
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
		return 'eicon-counter';
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
		return [ 'wl-theme-core-widgets' ];
	}

	public function get_keywords() {
		return [ 'WL Counter V2' ];
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
			'section_wl-counter-v2',
			[
				'label' => esc_html__( 'WL Counter V2 Area', 'wl-elementor' ),
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
			'count_items',
			[
				'label' => esc_html__( 'Count Items', 'wl-elementor' ),
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
						'name'       => 'count_heading',
						'label'      => esc_html__( 'Count Heading', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Count Heading', 'wl-elementor' ),
					],
					[
						'name'       => 'count_content',
						'label'      => esc_html__( 'Count Content', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Count Content', 'wl-elementor' ),
					],
					[
						'name'       => 'count_value',
						'label'      => esc_html__( 'Count Value', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Count Value', 'wl-elementor' ),
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

		<?php foreach ( $settings['count_items'] as $item ) : ?>

	        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeInRight" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
	            <div class="border p-1-9 rounded h-100">
	            	<?php if ( '' !== $item['count_heading'] ) : ?>
	                	<h5><?php echo wp_kses_post($item['count_heading']); ?></h5>
	                <?php endif; ?>

	                <?php if ( '' !== $item['count_content'] ) : ?>
	                	<p class="text-muted border-bottom pb-3"><?php echo wp_kses_post($item['count_content']); ?></p>
	                <?php endif; ?>
	                <div class="display-15 text-dark font-weight-800 lh-1">
	                    <?php if ( '' !== $item['count_value'] ) : ?>
	                    	<?php echo wp_kses_post($item['count_value']); ?>
	                    <?php endif; ?>
	                </div>
	            </div>
	        </div>

        <?php endforeach; ?>

    </div>

<?php
	}

}