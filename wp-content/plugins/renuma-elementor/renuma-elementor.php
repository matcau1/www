<?php
/**
 * Plugin Name: Renuma Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  https://renumawp.websitelayout.net/
 * Version:     1.2
 * Author:      Website Layout
 * Author URI:  https://www.websitelayout.net/
 * Text Domain: renuma-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main WL Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class WLElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var WLElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return WLElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'wl-elementor' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'wl-elementor' ),
			'<strong>' . esc_html__( 'renuma Elementor', 'wl-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wl-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wl-elementor' ),
			'<strong>' . esc_html__( 'renuma Elementor', 'wl-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'wl-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'wl-elementor' ),
			'<strong>' . esc_html__( 'WL Elementor', 'wl-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'wl-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-02-page',
	      	array(
					'title' => __( 'Home 02 Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-03-page',
	      	array(
					'title' => __( 'Home 03 Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('about-01-page',
	      	array(
					'title' => __( 'About 01 Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('company-history-page',
	      	array(
					'title' => __( 'Company History Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('faq-page',
	      	array(
					'title' => __( 'Faq Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('team-01-page',
	      	array(
					'title' => __( 'Team 01 Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('coming-soon-page',
	      	array(
					'title' => __( 'Coming Soon Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );	 
	    \Elementor\Plugin::instance()->elements_manager->add_category('service-01-page',
	      	array(
					'title' => __( 'Service 01 Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('portfolio-01-page',
	      	array(
					'title' => __( 'Portfolio 01 Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('portfolio-02-page',
	      	array(
					'title' => __( 'Portfolio 02 Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );   
	    \Elementor\Plugin::instance()->elements_manager->add_category('contact-page',
	      	array(
					'title' => __( 'Contact Page', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );	 
	    \Elementor\Plugin::instance()->elements_manager->add_category('wl-theme-core',
	      	array(
					'title' => __( 'Wl Theme Core', 'wl-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );     
	    
	}

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'wl-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/wl-elementor.js', array( 'jquery' ), self::VERSION );
	}

	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
	wp_register_style( 'wl-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/wl-elementor.css', self::VERSION );
	}




	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files

		// Wl Theme Core
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-banner-carousel.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-counter-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-service-v4.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-process-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-portfolio-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-animation-line.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-team-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-testimonials-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-blog-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-banner-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-about-image-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-service-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-testimonials-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-pricing-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-team-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-call-to-action-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-service-v3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-portfolio-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-process-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-accordion.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-counter-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-blog-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-banner-carousel-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v4.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-service-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-pricing-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-counter-v3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-clients-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-portfolio-carousel.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-about-image-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-service-v5.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-portfolio-carousel-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-tab-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-testimonials-v3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v5.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-service-v6.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-accordion-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-pricing-v3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-process-v3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-counter-v4.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-testimonials-v4.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-animation-line-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v6.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-testimonials-v5.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-team-v3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v7.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-history.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-service-v7.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-clients-carousel.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-map.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-team-v4.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v8.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-features-box-v9.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-portfolio-grid.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-count-down.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-price-box.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-why-choose-box.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-progress-bar-v2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-portfolio-v3.php';
		
		
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-fancy-box-v1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/wl-theme-core/wl-progress-bar-v1.php';

		// Register widget

		// Wl Theme Core
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlBannerCarousel() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlCounterV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlServiceV4() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlProcessV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPortfolioV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlAnimationLine() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTeamV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTestimonialsV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlBlogV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlBannerV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlAboutImageV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlServiceV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTestimonialsV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPricingV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTeamV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlCallToActionV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlServiceV3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPortfolioV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlProcessV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlAccordion() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlCounterV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlBlogV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlBannerCarouselV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV4() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlServiceV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPricingV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlCounterV3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlClientsV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPortfolioCarousel() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlAboutImageV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlServiceV5() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPortfolioCarouselV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTabV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTestimonialsV3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV5() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlServiceV6() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlAccordionV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPricingV3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlProcessV3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlCounterV4() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTestimonialsV4() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlAnimationLineV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV6() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTestimonialsV5() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTeamV3() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV7() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlHistory() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlServiceV7() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlClientsCarousel() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlMap() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlTeamV4() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV8() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFeaturesBoxV9() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPortfolioGrid() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlCountDown() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPriceBox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlWhyChooseBox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlProgressBarV2() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlPortfolioV3() );

		
		
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlFancyBoxV1() );
		\Elementor\Plugin::instance()->widgets_manager->register( new \WLElementor\Widget\WlProgressBarV1() );
	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

WLElementor::instance();
