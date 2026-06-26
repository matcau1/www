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
class WlHistory extends \Elementor\Widget_Base {

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
		return 'wl-history';
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
		return __( 'WL History', 'wl-elementor' );
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
		return 'eicon-history';
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
		return [ 'WL History' ];
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
			'section_wl-history',
			[
				'label' => esc_html__( 'WL History Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'custom_class',
			[
				'label'       => __( 'Custom Class', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your custom class', 'wl-elementor' ),
				'default'     => __( 'row', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'custom_column_class',
			[
				'label'       => __( 'Custom Column Class', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your custom column class', 'wl-elementor' ),
				'default'     => __( 'col-', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'history_items',
			[
				'label' => esc_html__( 'History Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [
					[
						'name'        => 'history_date',
						'label'       => esc_html__( 'History Date', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'History Date' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'history_title',
						'label'       => esc_html__( 'History Title', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'History Title' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'history_content',
						'label'       => esc_html__( 'History Content', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'History Content' , 'wl-elementor' ),
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

		<!-- COMPANY HISTORY
        ================================================== -->
        <div class="<?php echo wp_kses_post($settings['custom_class']); ?>">
            <div class="<?php echo wp_kses_post($settings['custom_column_class']); ?>">
                <div class="vertical-timeline">
                    <div class="timeline-items">

                        <?php foreach ( $settings['history_items'] as $item ) : ?> 
                            <div class="item">
                                <div class="icon d-none d-md-block"></div>
                                <div class="timeline-circle d-none d-md-block"><span class="circle"></span></div>
                                <div class="timeline-content">
                                	<?php if ( '' !== $item['history_date'] ) : ?>
							            <span class="count"><?php echo wp_kses_post($item['history_date']); ?></span>
									<?php endif; ?>
                                    <div class="text">
                                        <?php if ( '' !== $item['history_title'] ) : ?>
							                <h3 class="h5"><?php echo wp_kses_post($item['history_title']); ?></h3>
										<?php endif; ?>
                                        <?php if ( '' !== $item['history_content'] ) : ?>
							                <p class="mb-0"><?php echo wp_kses_post($item['history_content']); ?></p>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>                            		
		                <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>

	<?php
	}

}