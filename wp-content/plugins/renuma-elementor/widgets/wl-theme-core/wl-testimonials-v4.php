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
class WlTestimonialsV4 extends \Elementor\Widget_Base {

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
		return 'wl-testimonials-v4';
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
		return __( 'WL Testimonials V4', 'wl-elementor' );
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
		return 'eicon-testimonial-carousel';
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
		return [ 'WL Testimonials V4' ];
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
			'section_wl-testimonials-v4',
			[
				'label' => esc_html__( 'WL Testimonials V4 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'slider_class',
			[
				'label'   => esc_html__( 'Slider Class', 'wl-elementor' ),
				'type'    => Controls_Manager::TEXTAREA,
				'dynamic' => [ 'active' => true ],
				'default'    => esc_html__( 'Slider Class', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'testimonial_items',
			[
				'label' => esc_html__( 'Testimonial Items', 'wl-elementor' ),
				'type' => Controls_Manager::REPEATER,
				
				'fields' => [
					[
						'name'    => 'author_img',
						'label'   => esc_html__( 'Author Image (Recommend Size 100 * 100)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[						
						'name'       => 'author_image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[						
						'name'       => 'author_image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'    => 'quote_img',
						'label'   => esc_html__( 'Quote Image Icon (Recommend Size 40 * 41)', 'wl-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
						'dynamic' => [ 'active' => true ],
					],
					[						
						'name'       => 'quote_image_alt_tag',
						'label'      => esc_html__( 'Add Alt Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[						
						'name'       => 'quote_image_title_tag',
						'label'      => esc_html__( 'Add Title Tag For Image', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( '', 'wl-elementor' ),
					],
					[
						'name'        => 'testimonial_content',
						'label'       => esc_html__( 'Testimonial Content', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Testimonial Content' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'testimonial_line',
						'label'       => esc_html__( 'Testimonial Line', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Testimonial Line' , 'wl-elementor' ),
						'label_block' => true,
					],	
					[
						'name'        => 'author_name',
						'label'       => esc_html__( 'Author Name', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Author Name' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'author_position',
						'label'       => esc_html__( 'Author Position', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Author Position' , 'wl-elementor' ),
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

    <div class="<?php echo wp_kses_post($settings['slider_class']); ?>">

    	<?php foreach ( $settings['testimonial_items'] as $item ) : ?>

	        <div>
	            <div class="row align-items-center justify-content-center py-1-9 ps-1-9 pe-1-9 pe-lg-0 mt-n3">
	                <div class="col-lg-8 col-xxl-9 mt-3">
	                    <div>
	                        <div class="row g-0 align-items-center justify-content-center mt-n3">
	                            <div class="col-auto col-sm-2 mt-3">
	                                <div class="position-relative d-inline-block">
	                                	<?php if ( '' !== $item['author_img']['url'] ) : ?>
	                                    	<img src="<?php echo wp_kses_post($item['author_img']['url']); ?>" class="rounded-circle" alt="<?php echo wp_kses_post($item['author_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['author_image_title_tag']); ?>">
	                                    <?php endif; ?>
	                                    <div>
	                                    	<?php if ( '' !== $item['quote_img']['url'] ) : ?>
	                                        	<img src="<?php echo wp_kses_post($item['quote_img']['url']); ?>" class="position-absolute top-5 right-n20 right-xl-n15 right-xxl-5" alt="<?php echo wp_kses_post($item['quote_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['quote_image_title_tag']); ?>">
	                                        <?php endif; ?>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="col-lg-10 mt-3">
	                            	<?php if ( '' !== $item['testimonial_content'] ) : ?>
	                                	<p class="ms-lg-1-9 mb-0 text-center text-lg-start"><?php echo wp_kses_post($item['testimonial_content']); ?></p>
	                                <?php endif; ?>
	                            </div>
	                        </div>   
	                    </div>     
	                </div>
	                <div class="col-lg-1 d-none d-lg-inline-block mt-3">
	                	<?php if ( '' !== $item['testimonial_line'] ) : ?>
	                    	<div class="<?php echo wp_kses_post($item['testimonial_line']); ?>"></div>
	                    <?php endif; ?>
	                </div>
	                <div class="col-lg-3 col-xxl-2 mt-3">
	                    <div class="text-center text-lg-start">
	                    	<?php if ( '' !== $item['author_name'] ) : ?>
	                        	<h4 class="h5"><?php echo wp_kses_post($item['author_name']); ?></h4>
	                        <?php endif; ?>

	                        <?php if ( '' !== $item['author_position'] ) : ?>
	                        	<span class="display-29"><?php echo wp_kses_post($item['author_position']); ?></span>
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