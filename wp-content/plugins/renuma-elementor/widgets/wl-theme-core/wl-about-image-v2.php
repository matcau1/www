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
class WlAboutImageV2 extends \Elementor\Widget_Base {

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
		return 'wl-about-image-v2';
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
		return __( 'WL About Image V2', 'wl-elementor' );
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
		return 'eicon-image';
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
		return [ 'WL About Image V2' ];
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
			'section_wl-about-image-v2',
			[
				'label' => esc_html__( 'WL About Image V2 Area', 'wl-elementor' ),
			]	
		);

		$this->add_control(
			'about_image_01',
			[
				'label'   => esc_html__( 'About Image 01 (Recommend Size 430 * 553)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image 01', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'about_image_alt_tag_01',
			[
				'label'       => __( 'About Image Alt Tag 01', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'    => esc_html__( ' ', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_image_title_tag_01',
			[
				'label'       => __( 'About Image Title Tag 01', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'    => esc_html__( ' ', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_image_02',
			[
				'label'   => esc_html__( 'About Image 02 (Recommend Size 352 * 452)', 'wl-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
				'dynamic' => [ 'active' => true ],
				'description' => esc_html__( 'Add About Image 02', 'wl-elementor' ),
			]
		);

		$this->add_control(
			'about_image_alt_tag_02',
			[
				'label'       => __( 'About Image Alt Tag 02', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'    => esc_html__( ' ', 'wl-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'about_image_title_tag_02',
			[
				'label'       => __( 'About Image Title Tag 02', 'wl-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'    => esc_html__( ' ', 'wl-elementor' ),
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

		$this->end_controls_section();

	}

	public function render() {
		$settings  = $this->get_settings_for_display();
		?>

	<div class="position-relative">

		<?php if (( '' !== $settings['about_image_01']['url'] ) && ( $settings['show_about_image_01'] )): ?>
        	<img src="<?php echo wp_kses_post($settings['about_image_01']['url']); ?>" alt="<?php echo wp_kses_post($settings['about_image_alt_tag_01']); ?>" title="<?php echo wp_kses_post($settings['about_image_title_tag_01']); ?>" class="rounded">
        <?php endif; ?>

        <div class="left-img d-none d-sm-block">
        	<?php if (( '' !== $settings['about_image_02']['url'] ) && ( $settings['show_about_image_02'] )): ?>
            	<img src="<?php echo wp_kses_post($settings['about_image_02']['url']); ?>" alt="<?php echo wp_kses_post($settings['about_image_alt_tag_02']); ?>" title="<?php echo wp_kses_post($settings['about_image_title_tag_02']); ?>" class="rounded">
            <?php endif; ?>
        </div>

    </div>

	<?php
	}

}