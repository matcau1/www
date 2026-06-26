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
class WlCallToActionV1 extends \Elementor\Widget_Base {

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
		return 'wl-call-to-action-v1';
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
		return __( 'Wl Call To Action V1', 'wl-elementor' );
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
		return 'eicon-image-rollover';
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
		return [ 'Wl Call To Action V1' ];
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
			'section_wl-call-to-action-v1',
			[
				'label' => esc_html__( 'Wl Call To Action V1 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'call_to_action_bg_image_01',
			[
				'label'   => esc_html__( 'Call To Action Background Image 01 (Recommend Size 952 * 550)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Call To Action Background Image 01', 'wl-elementor' ),
			]
		);	

		$this->add_control(
			'call_to_action_sub_heading_01',
			[
				'label'       => __( 'Call To Action Sub Heading 01', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Call To Action Sub Heading 01', 'wl-elementor' ),
				'default'     => __( 'It is Call To Action Sub Heading 01', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'call_to_action_link_01',
			[
				'label'       => __( 'Call To Action Link 01', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Call To Action Link 01', 'wl-elementor' ),
				'default'     => __( 'It is Call To Action Link 01', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'call_to_action_heading_01',
			[
				'label'       => __( 'Call To Action Heading 01', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Call To Action heading 01', 'wl-elementor' ),
				'default'     => __( 'It is Call To Action Heading 01', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'call_to_action_bg_image_02',
			[
				'label'   => esc_html__( 'Call To Action Background Image 02 (Recommend Size 952 * 550)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add Your Call To Action Background Image 02', 'wl-elementor' ),
			]
		);	

		$this->add_control(
			'call_to_action_sub_heading_02',
			[
				'label'       => __( 'Call To Action Sub Heading 02', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Call To Action Sub Heading 02', 'wl-elementor' ),
				'default'     => __( 'It is Call To Action Sub Heading 02', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'call_to_action_link_02',
			[
				'label'       => __( 'Call To Action Link 02', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Call To Action Link 02', 'wl-elementor' ),
				'default'     => __( 'It is Call To Action Link 02', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'call_to_action_heading_02',
			[
				'label'       => __( 'Call To Action Heading 02', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Call To Action heading 02', 'wl-elementor' ),
				'default'     => __( 'It is Call To Action Heading 02', 'wl-elementor' ),
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
			'show_call_to_action_bg_image_01',
			[
				'label'   => esc_html__( 'Show Call To Action Background Image 01', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_call_to_action_sub_heading_01',
			[
				'label'   => esc_html__( 'Show Call To Action Sub Heading 01', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_call_to_action_heading_01',
			[
				'label'   => esc_html__( 'Show Call To Action Heading 01', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_call_to_action_bg_image_02',
			[
				'label'   => esc_html__( 'Show Call To Action Background Image 02', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_call_to_action_sub_heading_02',
			[
				'label'   => esc_html__( 'Show Call To Action Sub Heading 02', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_call_to_action_heading_02',
			[
				'label'   => esc_html__( 'Show Call To Action Heading 02', 'wl-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		?>

	<div class="row g-0">
        <div class="col-lg-6">
            <div class="bg-img cover-background wow fadeIn" <?php if (( '' !== $settings['call_to_action_bg_image_01'] ) && ( $settings['show_call_to_action_bg_image_01'] )): ?> data-wow-delay="100ms" data-background="<?php echo wp_kses_post($settings['call_to_action_bg_image_01']['url']); ?>" <?php endif; ?>>
                <div class="content rounded">
                	<?php if (( '' !== $settings['call_to_action_sub_heading_01'] ) && ( $settings['show_call_to_action_sub_heading_01'] )): ?>
                    	<span class="d-block position-relative text-white display-28 mb-4 lh-1 ps-3"><?php echo wp_kses_post($settings['call_to_action_sub_heading_01']); ?></span>
                    <?php endif; ?>

                    <?php if (( '' !== $settings['call_to_action_heading_01'] ) && ( $settings['show_call_to_action_heading_01'] )): ?>
                    	<h2 class="mb-0 h1"><a href="<?php echo wp_kses_post($settings['call_to_action_link_01']); ?>" class="text-white"><?php echo wp_kses_post($settings['call_to_action_heading_01']); ?></a></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="bg-img cover-background wow fadeIn" <?php if (( '' !== $settings['call_to_action_bg_image_02'] ) && ( $settings['show_call_to_action_bg_image_02'] )): ?> data-wow-delay="150ms" data-background="<?php echo wp_kses_post($settings['call_to_action_bg_image_02']['url']); ?>" <?php endif; ?>>
                <div class="content right rounded">
                	<?php if (( '' !== $settings['call_to_action_sub_heading_02'] ) && ( $settings['show_call_to_action_sub_heading_02'] )): ?>
                    	<span class="d-block position-relative text-white display-28 mb-4 lh-1 ps-3"><?php echo wp_kses_post($settings['call_to_action_sub_heading_02']); ?></span>
                    <?php endif; ?>

                    <?php if (( '' !== $settings['call_to_action_heading_02'] ) && ( $settings['show_call_to_action_heading_02'] )): ?>
                    	<h2 class="mb-0 h1"><a href="<?php echo wp_kses_post($settings['call_to_action_link_02']); ?>" class="text-white"><?php echo wp_kses_post($settings['call_to_action_heading_02']); ?></a></h2>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
        		
	<?php
	}

}