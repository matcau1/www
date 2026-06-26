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
class WlTestimonialsV2 extends \Elementor\Widget_Base {

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
		return 'wl-testimonials-v2';
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
		return __( 'WL Testimonials V2', 'wl-elementor' );
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
		return [ 'WL Testimonials V2' ];
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
			'section_wl-testimonials-v2',
			[
				'label' => esc_html__( 'WL Testimonials V2 Area', 'wl-elementor' ),
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
						'name'    => 'quote_image',
						'label'   => esc_html__( 'Quote Image (Recommend Size 50 * 50)', 'wl-elementor' ),
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
						'name'        => 'custom_class',
						'label'       => esc_html__( 'Custom Class', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Class' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'custom_margin',
						'label'       => esc_html__( 'Custom Margin', 'wl-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Custom Margin' , 'wl-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'author_image',
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

    <div class="<?php echo wp_kses_post($settings['slider_class']); ?>" data-slider-id="1">

    	<?php foreach ( $settings['testimonial_items'] as $item ) : ?>

	        <div class="text-center">
	        	<?php if ( '' !== $item['quote_image']['url'] ) : ?>
	            	<img src="<?php echo wp_kses_post($item['quote_image']['url']); ?>" alt="<?php echo wp_kses_post($item['quote_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['quote_image_title_tag']); ?>" class="w-45px mb-1-9">
	            <?php endif; ?>

	            <?php if ( '' !== $item['testimonial_content'] ) : ?>
	            	<p class="display-26 display-xl-24 text-dark mb-1-9"><?php echo wp_kses_post($item['testimonial_content']); ?></p>
	            <?php endif; ?>

	            <?php if ( '' !== $item['author_name'] ) : ?>
	            	<h4 class="h5"><?php echo wp_kses_post($item['author_name']); ?></h4>
	            <?php endif; ?>

	            <?php if ( '' !== $item['author_position'] ) : ?>
	            	<span><?php echo wp_kses_post($item['author_position']); ?></span>
	            <?php endif; ?>
	        </div>

        <?php endforeach; ?>

    </div>

    <div class="<?php echo wp_kses_post($item['custom_class']); ?>" data-slider-id="1">
    	<?php foreach ( $settings['testimonial_items'] as $item ) : ?>
	    	<button class="owl-thumb-item rounded-circle <?php echo wp_kses_post($item['custom_margin']); ?>">
	    		<?php if ( '' !== $item['author_image']['url'] ) : ?>
	    			<img src="<?php echo wp_kses_post($item['author_image']['url']); ?>" class="rounded-circle" alt="<?php echo wp_kses_post($item['author_image_alt_tag']); ?>" title="<?php echo wp_kses_post($item['author_image_title_tag']); ?>">
	    		<?php endif; ?>
	    	</button>
	    <?php endforeach; ?>
	</div>
        
	<?php
	}

}