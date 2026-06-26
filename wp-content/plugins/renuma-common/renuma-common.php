<?php
/*-----------------------------------------------------------------------------------
 *
 * Plugin Name: Renuma Common
 * Plugin URI: https://renumawp.websitelayout.net/
 * Author: Website Layout
 * Author URI: https://www.websitelayout.net/
 * Description: A plugin to create custom post type, metabox...
 * Version: 1.2
 * License: GNU General Public License v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * ----------------------------------------------------------------------------------- */
include dirname( __FILE__ ) . '/meta-box/meta-box.php';
include dirname( __FILE__ ) . '/custom-post-type/post_type.php';
include dirname( __FILE__ ) . '/widget/recent-post.php';
include dirname( __FILE__ ) . '/post-share/post-share.php';

// SCSS load and complie
final class renuma_theme_color {

    private static $_instance = null;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function __construct() {
        add_action( 'init', [ $this, 'load_scss_lib' ], 2 );
    }

    public function load_scss_lib(){
        $scssc_lib = apply_filters('renuma_scssc_lib', 'old');
        $renuma_scssc_on = apply_filters('renuma_scssc_on', false);
        if ($renuma_scssc_on && $scssc_lib === 'old' && !class_exists('scssc')) {
            // scss compiler library v0.0.12
            require_once __DIR__ . '/lib/scss.inc.php';
        }
        if ($renuma_scssc_on && $scssc_lib === 'new' && !class_exists('\Leafo\ScssPhp\Compiler')) {
            // scss compiler library v0.7.5
            require_once __DIR__ . '/lib/scss/scss.inc.php';
        }
    }

}

renuma_theme_color::instance();

return true;