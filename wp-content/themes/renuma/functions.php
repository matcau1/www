<?php

//Custom fields:
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';

//Theme Set up:
function renuma_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );  
      $lang = get_template_directory_uri() . '/languages';
      load_theme_textdomain('renuma', $lang);
      add_theme_support( 'post-thumbnails' );
      // Adds RSS feed links to <head> for posts and comments.
      add_theme_support( 'automatic-feed-links' );
      // Switches default core markup for search form, comment form, and comments
      // to output valid HTML5.
      add_theme_support( 'title-tag' );
      add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
      // This theme uses wp_nav_menu() in one location.
      register_nav_menus( array(
        'primary' =>  esc_html__( 'Primary Navigation Menu.', 'renuma' ),
	) );

      add_theme_support( 'woocommerce' );
      add_theme_support( 'wc-product-gallery-zoom' );
      add_theme_support( 'wc-product-gallery-lightbox' );
      add_theme_support( 'wc-product-gallery-slider' );
   
}
add_action( 'after_setup_theme', 'renuma_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;

function renuma_fonts_url() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'renuma' ) ) {
        
        $font_url = add_query_arg('family', urlencode("Plus Jakarta Sans:300,400,500,600,700,800&display=swap|Figtree:300,400,500,600,700,800&display=swap"), "//fonts.googleapis.com/css");
    }
    return $font_url;
}

function renuma_theme_scripts_styles() {
   $theme = wp_get_theme( get_template() );	
   $protocol = is_ssl() ? 'https' : 'http';
    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/plugins/bootstrap.min.css');
    wp_enqueue_style( 'animate', get_template_directory_uri().'/css/plugins/animate.css');
    wp_enqueue_style( 'animated-headline', get_template_directory_uri().'/css/plugins/animated-headline.css');
    wp_enqueue_style( 'fontawesome-all', get_template_directory_uri().'/css/plugins/fontawesome-all.min.css');
    wp_enqueue_style( 'flat-icon', get_template_directory_uri().'/css/plugins/flaticon.css');
    wp_enqueue_style( 'themify-icons', get_template_directory_uri().'/css/plugins/themify-icons.css');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/plugins/magnific-popup.css');
    wp_enqueue_style( 'lightgallery', get_template_directory_uri().'/css/plugins/lightgallery.css');
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/plugins/owl.carousel.css');
    wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/css/plugins/owl.theme.default.css');
    wp_enqueue_style( 'odometer', get_template_directory_uri().'/css/plugins/odometer-theme-default.css');
    wp_enqueue_style( 'renuma-default', get_template_directory_uri().'/css/plugins/default.css');
    wp_enqueue_style( 'renuma-nav-menu', get_template_directory_uri().'/css/plugins/nav-menu.css');
    wp_enqueue_style( 'renuma-styles', get_template_directory_uri().'/css/styles.css');
    wp_enqueue_style( 'renuma-fonts', renuma_fonts_url(), array(), '1.0.0' );
    wp_enqueue_style( 'renuma-css', get_stylesheet_uri(), array(), '2024-09-18' );
    
	  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
    //Javascript
    
    wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.min.js', array( 'jquery' ), false,true);   
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), false,true);
    wp_enqueue_script('renuma-nav-menu', get_template_directory_uri().'/js/nav-menu.js', array( 'jquery' ), false,true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri().'/js/owl.carousel.js', array( 'jquery' ), false,true);
    wp_enqueue_script('owl-carousel-thumbs', get_template_directory_uri().'/js/owl.carousel.thumbs.js', array( 'jquery' ), false,true);
    wp_enqueue_script('easy-responsive-tabs', get_template_directory_uri().'/js/easy.responsive.tabs.js', array( 'jquery' ), false,true);
    wp_enqueue_script('odometer', get_template_directory_uri().'/js/odometer.min.js', array( 'jquery' ), false,true);
    wp_enqueue_script('jquery-stellar', get_template_directory_uri().'/js/jquery.stellar.min.js', array( 'jquery' ), false,true);
    wp_enqueue_script('waypoints', get_template_directory_uri().'/js/waypoints.min.js', array( 'jquery' ), false,true);
    wp_enqueue_script('renuma-countdown', get_template_directory_uri().'/js/countdown.js', array( 'jquery' ), false,true);
    wp_enqueue_script('animated-headline', get_template_directory_uri().'/js/animated-headline.js', array( 'jquery' ), false,true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array( 'jquery' ), false,true);
    wp_enqueue_script('lightgallery-all', get_template_directory_uri().'/js/lightgallery-all.js', array( 'jquery' ), false,true);
    wp_enqueue_script('jquery-mousewheel', get_template_directory_uri().'/js/jquery.mousewheel.min.js', array( 'jquery' ), false,true);
    wp_enqueue_script('isotope-pkgd', get_template_directory_uri().'/js/isotope.pkgd.min.js', array( 'jquery' ), false,true);
    wp_enqueue_script('wow', get_template_directory_uri().'/js/wow.js', array(), false,true);
    wp_enqueue_script('smoothscroll', get_template_directory_uri().'/js/smoothscroll.js', array(), false,true);
    wp_enqueue_script('renuma-main', get_template_directory_uri().'/js/main.js', array( 'jquery' ), false,true);
    
}
    
add_action( 'wp_enqueue_scripts', 'renuma_theme_scripts_styles' );

// Widget Sidebar
function renuma_widgets_init() {
    register_sidebar( array(
    'name'          => esc_html__( 'Primary Sidebar', 'renuma' ),
    'id'            => 'sidebar-1',        
    'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'renuma' ),        
    'before_widget' => '<div id="%1$s" class="widget mb-1-9  %2$s" >',        
    'after_widget'  => '</div>',        
    'before_title'  => '<div class="widget-title"><h3 class="mb-0 h6">',        
    'after_title'   => '</h3></div>'
    ) );
    register_sidebar( array(
    'name'          => esc_html__( 'Page Sidebar', 'renuma' ),
    'id'            => 'page-sidebar',        
    'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'renuma' ),        
    'before_widget' => '<div id="%1$s" class="widget mb-1-9  %2$s" >',        
    'after_widget'  => '</div>',        
    'before_title'  => '<div class="widget-title"><h3 class="mb-0 h6">',        
    'after_title'   => '</h3></div>'
    ) );
    
   if ( class_exists( 'Woocommerce' ) ) {
        register_sidebar( array(
        'name'          => esc_html__( 'Shop Sidebar', 'renuma' ),
        'id'            => 'sidebar-shop',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'renuma' ),        
        'before_widget' => '<div id="%1$s" class="widget mb-1-9  %2$s" >',
        'after_widget'  => '</div>',         
        'before_title'  => '<div class="widget-title"><h3 class="mb-0 h6">',        
        'after_title'   => '</h3></div>'
        ) );
    }
   
}
add_action( 'widgets_init', 'renuma_widgets_init' );

/**
 * Helper functions for this theme.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Theme options
 */
require_once get_template_directory() . '/inc/theme-options.php';

// CSS Generator.
if ( ! class_exists( 'CSS_Generator' ) ) {
      require_once get_template_directory() . '/inc/classes/class-css-generator.php';
}

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'renuma_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function renuma_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'renuma' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__('* Redux Framework', 'renuma'),
            'slug'      => 'redux-framework',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Classic Editor', 'renuma' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Classic Widgets', 'renuma' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'renuma' ),
            'slug'      => 'widget-importer-exporter',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Contact Form 7', 'renuma' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Customizer Export/Import', 'renuma' ),
            'slug'      => 'customizer-export-import',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'renuma' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ),
       array(
            'name'      => esc_html__( 'Elementor', 'renuma' ),
            'slug'      => 'elementor',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Renuma Common', 'renuma' ),
            'slug'      => 'renuma-common',
            'required'  => true,
            'source'    => get_template_directory() . '/framework/plugins/renuma-common.zip',
        ),
      array(
            'name'      => esc_html__( 'Renuma Elementor', 'renuma' ),
            'slug'      => 'renuma-elementor',
            'required'  => true,
            'source'    => get_template_directory() . '/framework/plugins/renuma-elementor.zip',
        )
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
        'page_title'   => esc_html__( 'Install Required Plugins', 'renuma' ),
        'menu_title'   => esc_html__( 'Install Plugins', 'renuma' ),
        'installing'   => esc_html__( 'Installing Plugin: %s', 'renuma' ), // %s = plugin name.
        'oops'         => esc_html__( 'Something went wrong with the plugin API.', 'renuma' ),
        'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'renuma' ), // %1$s = plugin name(s).
        'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'renuma' ), // %1$s = plugin name(s).
        'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'renuma' ), // %1$s = plugin name(s).
        'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'renuma' ), // %1$s = plugin name(s).
        'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'renuma' ), // %1$s = plugin name(s).
        'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'renuma' ), // %1$s = plugin name(s).
        'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'renuma' ), // %1$s = plugin name(s).
        'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'renuma' ), // %1$s = plugin name(s).
        'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'renuma' ),
        'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'renuma' ),
        'return'                          => esc_html__( 'Return to Required Plugins Installer', 'renuma' ),
        'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'renuma' ),
        'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'renuma' ), // %s = dashboard link.
        'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>