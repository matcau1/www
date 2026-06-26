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
class WlServiceV1 extends \Elementor\Widget_Base {

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
		return 'wl-service-v1';
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
		return __( 'WL Service V1', 'wl-elementor' );
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
		return 'eicon-posts-justified';
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
		return [ 'WL Service V1' ];
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
			'section_wl-service-v1',
			[
				'label' => esc_html__( 'WL Service V1 Area', 'wl-elementor' ),
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
			'service_items',
			[
				'label' => esc_html__( 'Service Items', 'wl-elementor' ),
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
						'name'       => 'custom_border',
						'label'      => esc_html__( 'Custom Border', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Custom Border', 'wl-elementor' ),
					],
					[
						'name'    => 'service_main_img',
						'label'   => esc_html__( 'Service Main Image Icon (Recommend Size 110 * 110)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'service_main_image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'       => 'service_main_image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'    => 'service_hover_img',
						'label'   => esc_html__( 'Service Hover Image Icon (Recommend Size 110 * 110)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[
						'name'       => 'service_hover_image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'       => 'service_hover_image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'       => 'service_title',
						'label'      => esc_html__( 'Service Title', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Service Title', 'wl-elementor' ),
					],
					[
						'name'       => 'service_content',
						'label'      => esc_html__( 'Service Content', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Service Content', 'wl-elementor' ),
					],
					[
						'name'       => 'service_detail_page_link',
						'label'      => esc_html__( 'Service Detail Page Link', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Service Detail Page Link', 'wl-elementor' ),
					],
					[
						'name'       => 'service_detail_page_text',
						'label'      => esc_html__( 'Service Detail Page Text', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Service Detail Page Text', 'wl-elementor' ),
					],
					[
						'name'       => 'arrow_icon',
						'label'      => esc_html__( 'Arrow Icon', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Arrow Icon', 'wl-elementor' ),
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

    	<?php foreach ( $settings['service_items'] as $item ) : ?>

	        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeInUp" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
	            <div class="card card-style27 bg-transparent h-100 rounded-0 border-color-light-black <?php echo wp_kses_post($item['custom_border']); ?>">
	                <div class="card-body d-flex px-1-6 px-xxl-1-9 py-1-9 py-md-2-9">
	                    <div class="flex-shrink-0 me-1-6 me-xxl-6 position-relative">
	                        <div class="box"></div>
	                        <div class="icon position-relative">
	                        	<?php if ( '' !== $item['service_main_img']['url'] ) : ?>
	                            	<img src="<?php echo wp_kses_post($item['service_main_img']['url']); ?>" alt="<?php echo wp_kses_post($item['service_main_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['service_main_image_title_tag']); ?>" class="w-55px main-img">
	                            <?php endif; ?>

	                            <?php if ( '' !== $item['service_hover_img']['url'] ) : ?>
	                            	<img src="<?php echo wp_kses_post($item['service_hover_img']['url']); ?>" alt="<?php echo wp_kses_post($item['service_hover_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['service_hover_image_title_tag']); ?>" class="w-55px hover-img">
	                            <?php endif; ?>
	                        </div>
	                    </div>
	                    <div class="flex-grow-1">
	                    	<?php if ( '' !== $item['service_title'] ) : ?>
	                        	<h3 class="h4 mb-2"><a href="<?php echo wp_kses_post($item['service_detail_page_link']); ?>"><?php echo wp_kses_post($item['service_title']); ?></a></h3>
	                        <?php endif; ?>

	                        <?php if ( '' !== $item['service_content'] ) : ?>
	                        	<p class="mb-md-4"><?php echo wp_kses_post($item['service_content']); ?></p>
	                        <?php endif; ?>

	                        <?php if ( '' !== $item['service_detail_page_text'] ) : ?>
	                        	<a href="<?php echo wp_kses_post($item['service_detail_page_link']); ?>" class="service-butn"><?php echo wp_kses_post($item['service_detail_page_text']); ?><i class="<?php echo wp_kses_post($item['arrow_icon']); ?>"></i></a>
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