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
class WlBannerV1 extends \Elementor\Widget_Base {

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
		return 'wl-banner-v1';
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
		return __( 'Wl Banner V1', 'wl-elementor' );
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
		return 'eicon-slides';
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
		return [ 'Wl Banner V1' ];
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
			'section_wl-banner-v1',
			[
				'label' => esc_html__( 'Wl Banner V1', 'wl-elementor' ),
			]	
		);	

		$this->add_control(
			'banner_bg_image',
			[
				'label'   => esc_html__( 'Banner Background Image (Recommend Size 1920 * 900)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Banner Background Image', 'wl-elementor' ),
			]
		);	

		$this->add_control(
			'overlay_class',
			[
				'label'       => __( 'Overlay Value (0,1,2,3,4,5,55,6,65,7,75,8,85,9,91,92,93,94,95,96,97,98,99,10)', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your value for overlay', 'wl-elementor' ),
				'default'     => __( '95', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'banner_heading',
			[
				'label'       => __( 'Banner Heading', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your banner heading', 'wl-elementor' ),
				'default'     => __( 'It is Banner Heading', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_image_01',
			[
				'label'   => esc_html__( 'About Image 01 (Recommend Size 100 * 100)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image 01', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'about_alt_tag_01',
			[
				'label'       => __( 'About Alt Tag 01 for Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your About Alt Tag 01 for Image', 'wl-elementor' ),
				'default'     => __( 'It is About Alt Tag 01 for Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_title_tag_01',
			[
				'label'       => __( 'About Title Tag 01 For Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your About Title Tag 01 For Image', 'wl-elementor' ),
				'default'     => __( 'It is About Title Tag 01 For Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_image_02',
			[
				'label'   => esc_html__( 'About Image 02 (Recommend Size 100 * 100)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image 02', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'about_alt_tag_02',
			[
				'label'       => __( 'About Alt Tag 02 for Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your About Alt Tag 02 for Image', 'wl-elementor' ),
				'default'     => __( 'It is About Alt Tag 02 for Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_title_tag_02',
			[
				'label'       => __( 'About Title Tag 02 For Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your About Title Tag 02 For Image', 'wl-elementor' ),
				'default'     => __( 'It is About Title Tag 02 For Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_image_03',
			[
				'label'   => esc_html__( 'About Image 03 (Recommend Size 100 * 100)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image 03', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'about_alt_tag_03',
			[
				'label'       => __( 'About Alt Tag 03 for Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your About Alt Tag 03 for Image', 'wl-elementor' ),
				'default'     => __( 'It is About Alt Tag 03 for Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_title_tag_03',
			[
				'label'       => __( 'About Title Tag 03 For Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your About Title Tag 03 For Image', 'wl-elementor' ),
				'default'     => __( 'It is About Title Tag 03 For Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'banner_text',
			[
				'label'       => __( 'Banner Text', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your banner text', 'wl-elementor' ),
				'default'     => __( 'It is Banner Text', 'wl-elementor' ),
				'label_block' => true,
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
			'show_banner_bg_image',
			[
				'label'   => esc_html__( 'Show Banner Background Image', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_banner_heading',
			[
				'label'   => esc_html__( 'Show Banner Heading', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_about_image_01',
			[
				'label'   => esc_html__( 'Show About Image 01', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_about_image_02',
			[
				'label'   => esc_html__( 'Show About Image 02', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_about_image_03',
			[
				'label'   => esc_html__( 'Show About Image 03', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_banner_text',
			[
				'label'   => esc_html__( 'Show Banner Text', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		?>

    <div class="mx-xxl-1-9 py-8 py-lg-10 py-xl-14 position-relative bg-img banner-style02 cover-background left-overlay-dark" <?php if (( '' !== $settings['banner_bg_image'] ) && ( $settings['show_banner_bg_image'] )): ?> data-overlay-dark="<?php echo wp_kses_post($settings['overlay_class']); ?>" data-background="<?php echo wp_kses_post($settings['banner_bg_image']['url']); ?>" <?php endif; ?>>
        <div class="container">
            <div class="row min-vh-67 align-items-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6 mt-7 mt-sm-8 mt-xl-0">
                	<?php if (( '' !== $settings['banner_heading'] ) && ( $settings['show_banner_heading'] )): ?>
                    	<?php echo wp_kses_post($settings['banner_heading']); ?>
                    <?php endif; ?>

                    <div class="d-sm-flex align-items-center">
                        <div class="flex-shrink-0 mb-4 mb-sm-0">
                        	<?php if (( '' !== $settings['about_image_01']['url'] ) && ( $settings['show_about_image_01'] )): ?>
                            	<img src="<?php echo wp_kses_post($settings['about_image_01']['url']); ?>" class="w-50px border border-color-white border-width-2 rounded-circle" alt="<?php echo wp_kses_post($settings['about_alt_tag_01']); ?>" title="<?php echo wp_kses_post($settings['about_title_tag_01']); ?>">
                            <?php endif; ?>

                            <?php if (( '' !== $settings['about_image_02']['url'] ) && ( $settings['show_about_image_02'] )): ?>
                            	<img src="<?php echo wp_kses_post($settings['about_image_02']['url']); ?>" class="w-50px border border-color-white border-width-2 rounded-circle img1" alt="<?php echo wp_kses_post($settings['about_alt_tag_02']); ?>" title="<?php echo wp_kses_post($settings['about_title_tag_02']); ?>">
                            <?php endif; ?>

                            <?php if (( '' !== $settings['about_image_03']['url'] ) && ( $settings['show_about_image_03'] )): ?>
                            	<img src="<?php echo wp_kses_post($settings['about_image_03']['url']); ?>" class="w-50px border border-color-white border-width-2 rounded-circle img2" alt="<?php echo wp_kses_post($settings['about_alt_tag_03']); ?>" title="<?php echo wp_kses_post($settings['about_title_tag_03']); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="flex-grow-1 ms-sm-4">
                        	<?php if (( '' !== $settings['banner_text'] ) && ( $settings['show_banner_text'] )): ?>
                            	<p class="mb-0 w-sm-50 w-md-35 w-lg-40 text-white opacity7"><?php echo wp_kses_post($settings['banner_text']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-5 col-xxl-6"></div>
            </div>
        </div>
    </div>
        
	<?php
	}

}