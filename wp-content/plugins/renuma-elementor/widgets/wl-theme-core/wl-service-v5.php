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
class WlServiceV5 extends \Elementor\Widget_Base {

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
		return 'Wl-Service-V5';
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
		return __( 'WL Service V5', 'wl-elementor' );
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
		return [ 'wl-theme-core-widgets' ];
	}

	public function get_keywords() {
		return [ 'Wl Service V5' ];
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
			'section_wl-service-v5',
			[
				'label' => esc_html__( 'Wl Service V5 Area', 'wl-elementor' ),
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
						'name'        => 'animation_delay',
						'label'       => esc_html__( 'Animation Delay', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Add Animation Delay' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'service_img',
						'label'   => esc_html__( 'Service Image Icon (Recommend Size 140 * 140)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[						
						'name'       => 'service_image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[						
						'name'       => 'service_image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'        => 'service_circle',
						'label'       => esc_html__( 'Service Circle', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Service Circle' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'service_detail_page_link',
						'label'       => esc_html__( 'Service Detail Page Link', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Service Detail Page Link' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'       => 'service_title',
						'label'      => esc_html__( 'Service Title', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Service Title', 'wl-elementor' ),
					],
					[
						'name'        => 'service_content',
						'label'       => esc_html__( 'Service Content', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Service Content' , 'wl-elementor' ),
						'label_block' => true,
					],	
					[
						'name'        => 'service_detail_page_text_01',
						'label'       => esc_html__( 'Service Detail Page Text 01', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Service Detail Page Text 01' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'service_detail_page_text_02',
						'label'       => esc_html__( 'Service Detail Page Text 02', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Service Detail Page Text 02' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'arrow_icon',
						'label'       => esc_html__( 'Arrow Icon', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Arrow Icon' , 'wl-elementor' ),
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

    <div class="<?php echo wp_kses_post($settings['custom_class']); ?>">

    	<?php foreach ( $settings['service_items'] as $item ) : ?>

	        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeInUp" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
	            <div class="card card-style16 border-color-light-black bg-white h-100">
	                <div class="card-body text-center">
	                    <div class="service-img">
	                    	<?php if ( '' !== $item['service_img']['url'] ) : ?>
	                        	<img src="<?php echo wp_kses_post($item['service_img']['url']); ?>" alt="<?php echo wp_kses_post($item['service_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['service_image_title_tag']); ?>" class="w-70px z-index-9 position-relative mt-1-6 mt-lg-2-2">
	                        <?php endif; ?>

	                        <?php if ( '' !== $item['service_circle'] ) : ?>
	                        	<div class="<?php echo wp_kses_post($item['service_circle']); ?>"></div>
	                        <?php endif; ?>
	                    </div>
	                    <?php if ( '' !== $item['service_title'] ) : ?>
	                    	<h3 class="h5"><a href="<?php echo wp_kses_post($item['service_detail_page_link']); ?>"><?php echo wp_kses_post($item['service_title']); ?></a></h3>
	                    <?php endif; ?>
	                    <?php if ( '' !== $item['service_content'] ) : ?>
	                    	<p class="mb-0"><?php echo wp_kses_post($item['service_content']); ?></p>
	                    <?php endif; ?>
	                </div>
	                <div class="card-btn">
	                    <div class="main-butn">
	                    	<?php if ( '' !== $item['service_detail_page_text_01'] ) : ?>
	                        	<span class="main-text"><?php echo wp_kses_post($item['service_detail_page_text_01']); ?></span>
	                        <?php endif; ?>
	                    </div>
	                    <div class="hover-butn">
	                        <a href="<?php echo wp_kses_post($item['service_detail_page_link']); ?>">
	                            <span class="inner-butn">
	                            	<?php if ( '' !== $item['service_detail_page_text_02'] ) : ?>
	                                	<span class="hover-text"><?php echo wp_kses_post($item['service_detail_page_text_02']); ?></span>
	                                <?php endif; ?>

	                                <?php if ( '' !== $item['arrow_icon'] ) : ?>
	                                	<span class="btn-icon"><i class="<?php echo wp_kses_post($item['arrow_icon']); ?>"></i></span>
	                                <?php endif; ?>
	                            </span>
	                        </a>
	                    </div>
	                </div>
	            </div>
	        </div>

        <?php endforeach; ?>
        
   	</div>
        
<?php
	}

}