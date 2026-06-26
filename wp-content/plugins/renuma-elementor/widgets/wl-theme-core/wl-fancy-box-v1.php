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
class WlFancyBoxV1 extends \Elementor\Widget_Base {

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
		return 'wl-fancy-box-v1';
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
		return __( 'WL Fancy Box V1', 'wl-elementor' );
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
		return 'eicon-icon-box';
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
		return [ 'WL Fancy Box V1' ];
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
			'section_wl-fancy-box-v1',
			[
				'label' => esc_html__( 'WL Fancy Box V1 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'custom_class',
			[
				'label'   => esc_html__( 'Custom Class for Fancy Box', 'wl-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'    => esc_html__( 'Custom Class', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'fancy_box_items',
			[
				'label' => esc_html__( 'Fancy Box Items', 'wl-elementor' ),
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
						'name'    => 'main_image',
						'label'   => esc_html__( 'Main Image', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],	
				    [
						'name'    => 'fancy_box_icon',
						'label'   => esc_html__( 'Fancy Box Icon', 'wl-elementor' ),
						'type'    => Controls_Manager::TEXTAREA,
						'dynamic' => [ 'active' => true ],
					],			
					[
						'name'        => 'fancy_box_heading',
						'label'       => esc_html__( 'Heading', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Fancy Box Heading' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'fancy_box_content',
						'label'      => esc_html__( 'Content', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Fancy Box Content', 'wl-elementor' ),
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

		<!-- FANCY BOX V1
        ================================================== -->
        <div class="<?php echo wp_kses_post($settings['custom_class']); ?>">
    		<?php foreach ( $settings['fancy_box_items'] as $item ) : ?>
                <div class="<?php echo wp_kses_post($item['custom_column_class']); ?>">
        			<div class="contact-info-block h-100">
						<div class="contact-img position-relative bg-img" <?php if ( '' !== $item['main_image']['url'] ) : ?> data-background="<?php echo wp_kses_post($item['main_image']['url']); ?>" <?php endif; ?>>
							<div class="bg-overlay"></div>
							<div class="content-text">
								<?php if ( '' !== $item['fancy_box_icon'] ) : ?>
									<i class="<?php echo wp_kses_post($item['fancy_box_icon']); ?> display-15 mb-3 d-block"></i>
								<?php endif; ?>
								<?php if ( '' !== $item['fancy_box_heading'] ) : ?>
                                	<h3 class="h4 mb-3"><?php echo wp_kses_post($item['fancy_box_heading']); ?></h3>
                                <?php endif; ?>
								<?php if ( '' !== $item['fancy_box_content'] ) : ?>
                                	<?php echo wp_kses_post($item['fancy_box_content']); ?>
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