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
class WlFeaturesBoxV2 extends \Elementor\Widget_Base {

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
		return 'wl-features-box-v2';
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
		return __( 'WL Features Box V2', 'wl-elementor' );
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
		return 'eicon-featured-image';
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
		return [ 'WL Features Box V2' ];
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
			'section_wl-features-box-v2',
			[
				'label' => esc_html__( 'WL Features Box V2 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'featrues_image_01',
			[
				'label'   => esc_html__( 'Features Image 01 (Recommend Size 270 * 270)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Features Image 01', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'featrues_alt_tag_01',
			[
				'label'       => __( 'Featrues Alt Tag 01 for Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Featrues Alt Tag 01 for Image', 'wl-elementor' ),
				'default'     => __( 'It is Featrues Alt Tag 01 for Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'featrues_title_tag_01',
			[
				'label'       => __( 'Featrues Title Tag 01 For Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Featrues Title Tag 01 For Image', 'wl-elementor' ),
				'default'     => __( 'It is Featrues Title Tag 01 For Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_thumb_image_01',
			[
				'label'   => esc_html__( 'Featrues Thumb Image 01 (Recommend Size 70 * 70)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Featrues Thumb Image 01', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'features_thumb_alt_tag_01',
			[
				'label'       => __( 'Features Thumb Alt Tag 01 for Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Thumb Alt Tag 01 for Image', 'wl-elementor' ),
				'default'     => __( 'It is Features Thumb Alt Tag 01 for Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_thumb_title_tag_01',
			[
				'label'       => __( 'Features Thumb Title Tag 01 For Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Thumb Title Tag 01 For Image', 'wl-elementor' ),
				'default'     => __( 'It is Features Thumb Title Tag 01 For Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'animation_delay_01',
			[
				'label'       => __( 'Animation Delay 01', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Animation Delay 01', 'wl-elementor' ),
				'default'     => __( 'It is Animation Delay 01', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_thumb_image_02',
			[
				'label'   => esc_html__( 'Features Thumb Image 02 (Recommend Size 70 * 70)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Features Image 02', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'features_thumb_alt_tag_02',
			[
				'label'       => __( 'Features Thumb Alt Tag 02 for Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Thumb Alt Tag 02 for Image', 'wl-elementor' ),
				'default'     => __( 'It is Features Thumb Alt Tag 02 for Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_thumb_title_tag_02',
			[
				'label'       => __( 'Features Thumb Title Tag 02 For Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Thumb Title Tag 02 For Image', 'wl-elementor' ),
				'default'     => __( 'It is Features Thumb Title Tag 02 For Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'animation_delay_02',
			[
				'label'       => __( 'Animation Delay 02', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Animation Delay 02', 'wl-elementor' ),
				'default'     => __( 'It is Animation Delay 02', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_thumb_image_03',
			[
				'label'   => esc_html__( 'Features Thumb Image 03 (Recommend Size 70 * 70)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Features Thumb Image 03', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'features_thumb_alt_tag_03',
			[
				'label'       => __( 'Features Thumb Alt Tag 03 for Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Thumb Alt Tag 03 for Image', 'wl-elementor' ),
				'default'     => __( 'It is Features Thumb Alt Tag 03 for Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_thumb_title_tag_03',
			[
				'label'       => __( 'Features Thumb Title Tag 03 For Image', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Thumb Title Tag 03 For Image', 'wl-elementor' ),
				'default'     => __( 'It is Features Thumb Title Tag 03 For Image', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'animation_delay_03',
			[
				'label'       => __( 'Animation Delay 03', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Animation Delay 03', 'wl-elementor' ),
				'default'     => __( 'It is Animation Delay 03', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'animation_delay_04',
			[
				'label'       => __( 'Animation Delay 04', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Animation Delay 04', 'wl-elementor' ),
				'default'     => __( 'It is Animation Delay 04', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_counter_value',
			[
				'label'       => __( 'Features Counter Value', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Counter Value', 'wl-elementor' ),
				'default'     => __( 'It is Features Counter Value', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_counter_text',
			[
				'label'       => __( 'Features Counter Text', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Counter Text', 'wl-elementor' ),
				'default'     => __( 'It is Features Counter Text', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_text',
			[
				'label'       => __( 'Features Text', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features text', 'wl-elementor' ),
				'default'     => __( 'It is Features Text', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'features_content',
			[
				'label'       => __( 'Features Content', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Features Content', 'wl-elementor' ),
				'default'     => __( 'It is Features Content', 'wl-elementor' ),
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
			'show_featrues_image_01',
			[
				'label'   => esc_html__( 'Show Features Image 01', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_features_thumb_image_01',
			[
				'label'   => esc_html__( 'Show Features Thumb Image 01', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_features_thumb_image_02',
			[
				'label'   => esc_html__( 'Show Features Thumb Image 02', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_features_thumb_image_03',
			[
				'label'   => esc_html__( 'Show Features Thumb Image 03', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_features_counter_value',
			[
				'label'   => esc_html__( 'Show Features Counter Value', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_features_counter_text',
			[
				'label'   => esc_html__( 'Show Features Counter Text', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_features_text',
			[
				'label'   => esc_html__( 'Show Features Text', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_features_content',
			[
				'label'   => esc_html__( 'Show Features Content', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		?>

	<div class="row g-0 align-items-center">
        <div class="col-sm-5 col-xl-6 d-none d-sm-block">
            <div class="position-relative">
            	<?php if (( '' !== $settings['featrues_image_01']['url'] ) && ( $settings['show_featrues_image_01'] )): ?>
                	<img src="<?php echo wp_kses_post($settings['featrues_image_01']['url']); ?>" alt="<?php echo wp_kses_post($settings['featrues_alt_tag_01']); ?>" title="<?php echo wp_kses_post($settings['featrues_title_tag_01']); ?>" class="rounded">
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-7 col-xl-6">
            <div class="left-content">
                <div class="left-img mb-3">
                	<?php if (( '' !== $settings['features_thumb_image_01']['url'] ) && ( $settings['show_features_thumb_image_01'] )): ?>
                    	<img src="<?php echo wp_kses_post($settings['features_thumb_image_01']['url']); ?>" alt="<?php echo wp_kses_post($settings['features_thumb_alt_tag_01']); ?>" title="<?php echo wp_kses_post($settings['features_thumb_title_tag_01']); ?>" class="rounded-circle border border-width-2 border-color-white wow fadeInRight" data-wow-delay="<?php echo wp_kses_post($settings['animation_delay_01']); ?>ms">
                    <?php endif; ?>

                    <?php if (( '' !== $settings['features_thumb_image_02']['url'] ) && ( $settings['show_features_thumb_image_02'] )): ?>
                    	<img src="<?php echo wp_kses_post($settings['features_thumb_image_02']['url']); ?>" alt="<?php echo wp_kses_post($settings['features_thumb_alt_tag_02']); ?>" title="<?php echo wp_kses_post($settings['features_thumb_title_tag_02']); ?>" class="img1 rounded-circle border border-width-2 border-color-white wow fadeInRight" data-wow-delay="<?php echo wp_kses_post($settings['animation_delay_02']); ?>ms">
                    <?php endif; ?>

                    <?php if (( '' !== $settings['features_thumb_image_03']['url'] ) && ( $settings['show_features_thumb_image_03'] )): ?>
                    	<img src="<?php echo wp_kses_post($settings['features_thumb_image_03']['url']); ?>" alt="<?php echo wp_kses_post($settings['features_thumb_alt_tag_03']); ?>" title="<?php echo wp_kses_post($settings['features_thumb_title_tag_03']); ?>" class="img1 rounded-circle border border-width-2 border-color-white wow fadeInRight" data-wow-delay="<?php echo wp_kses_post($settings['animation_delay_03']); ?>ms">
                    <?php endif; ?>

                    <div class="content-no wow fadeInRight" data-wow-delay="<?php echo wp_kses_post($settings['animation_delay_04']); ?>ms">
                    	<?php if (( '' !== $settings['features_counter_value'] ) && ( $settings['show_features_counter_value'] )): ?>
                        	<?php echo wp_kses_post($settings['features_counter_value']); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (( '' !== $settings['features_counter_text'] ) && ( $settings['show_features_counter_text'] )): ?>
                	<h6 class="mb-1-6"><?php echo wp_kses_post($settings['features_counter_text']); ?></h6>
                <?php endif; ?>
                <div class="exp-line position-relative w-100 d-flex justify-content-center mb-4">
                    <div class="exp-content">
                    	<?php if (( '' !== $settings['features_text'] ) && ( $settings['show_features_text'] )): ?>
                        	<span><?php echo wp_kses_post($settings['features_text']); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if (( '' !== $settings['features_content'] ) && ( $settings['show_features_content'] )): ?>
                	<p class="mb-0 display-30"><?php echo wp_kses_post($settings['features_content']); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

	<?php
	}

}