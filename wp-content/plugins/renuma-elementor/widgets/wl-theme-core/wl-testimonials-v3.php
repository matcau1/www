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
class WlTestimonialsV3 extends \Elementor\Widget_Base {

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
		return 'wl-testimonials-v3';
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
		return __( 'WL Testimonials V3', 'wl-elementor' );
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
		return [ 'WL Testimonials V3' ];
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
			'section_wl-testimonials-v3',
			[
				'label' => esc_html__( 'WL Testimonials V3 Area', 'wl-elementor' ),
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
			'testimonial_items',
			[
				'label' => esc_html__( 'Testimonial Items', 'wl-elementor' ),
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
						'name'    => 'author_image',
						'label'   => esc_html__( 'Author Image (Recommend Size 60 * 60)', 'wl-elementor' ),
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
						'name'       => 'testimonial_icons',
						'label'      => esc_html__( 'Testimonial Icons', 'wl-elementor' ),
						'type'       => Controls_Manager::TEXTAREA,
						'dynamic'    => [ 'active' => true ],
						'default'    => esc_html__( 'Testimonial Icons', 'wl-elementor' ),
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
					[
						'name'        => 'testimonial_content',
						'label'       => esc_html__( 'Testimonial Content', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Testimonial Content' , 'wl-elementor' ),
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

    	<?php foreach ( $settings['testimonial_items'] as $item ) : ?>

	        <div class="<?php echo wp_kses_post($item['custom_column_class']); ?> wow fadeInUp" data-wow-delay="<?php echo wp_kses_post($item['animation_delay']); ?>ms">
	            <div class="card card-style20 bg-white py-1-9 py-xxl-5 px-1-9 px-xxl-6 rounded border-0">
	                <div class="card-body p-0">
	                    <div class="d-flex align-items-center mb-1-6">
	                    	<?php if ( '' !== $item['author_image']['url'] ) : ?>
	                        	<img src="<?php echo wp_kses_post($item['author_image']['url']); ?>"  class="rounded-circle w-60px me-4 " alt="<?php echo wp_kses_post($item['author_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['author_image_title_tag']); ?>">
	                        <?php endif; ?>
	                        <div>
	                            <?php if ( '' !== $item['testimonial_icons'] ) : ?>
				                	<?php echo wp_kses_post($item['testimonial_icons']); ?>
				                <?php endif; ?>

				                <?php if ( '' !== $item['author_name'] ) : ?>
	                            	<span class="font-weight-800 lh-1 d-block display-30 mb-1"><?php echo wp_kses_post($item['author_name']); ?></span>
	                            <?php endif; ?>

	                            <?php if ( '' !== $item['author_position'] ) : ?>
	                            	<span class="display-31"><?php echo wp_kses_post($item['author_position']); ?></span>
	                            <?php endif; ?>
	                        </div>
	                    </div>
	                    <div class="bg-white">
	                    	<?php if ( '' !== $item['testimonial_content'] ) : ?>
	                        	<p class="mb-0"><?php echo wp_kses_post($item['testimonial_content']); ?></p>
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