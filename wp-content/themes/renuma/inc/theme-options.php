<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = renuma_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'renuma'),
    'page_title'           => esc_html__('Theme Options', 'renuma'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'icon' => 'el el-cogs',
    'title' => __('General Settings', 'renuma'),
    'fields' => array(  
         array(
            'id' => 'default_logo',
            'type' => 'media',
            'url' => true,
            'title' => __('Dark Default Logo', 'renuma'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => __('', 'renuma'),
            'subtitle' => __('Upload your Logo Image, Recommended size 452 * 126', 'renuma'),
            'default' => ''
        ),
         array(
            'id' => 'logo',
            'type' => 'media',
            'url' => true,
            'title' => __('Light Logo', 'renuma'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => __('', 'renuma'),
            'subtitle' => __('Upload your Logo Image, Recommended size 452 * 126', 'renuma'),
            'default' => ''
        ),
         array(
            'id' => 'preloader',
            'type' => 'switch',
            'title' => __('Page Loader', 'renuma'),
            'subtitle' => __('Show page loader.', 'renuma'),
            'default' => true
         ),
         array(
            'id' => 'top_bar',
            'type' => 'switch',
            'title' => __('Header Topbar - Email ID & Phone Number', 'renuma'),
            'subtitle' => __('Show topbar - Email ID & Phone Number.', 'renuma'),
            'default' => true
         ),
         array(
            'id' => 'header_top_search_bar',
            'type' => 'switch',
            'title' => __('Header Top Searchbar', 'renuma'),
            'subtitle' => __('Show Top Searchbar', 'renuma'),
            'default' => true
         ),
         array(
            'id' => 'header_top_cart_bar',
            'type' => 'switch',
            'title' => __('Header Top Carticon', 'renuma'),
            'subtitle' => __('Show Top Carticon', 'renuma'),
            'default' => true
         ),
         array(
            'id' => 'header_top_button',
            'type' => 'switch',
            'title' => __('Header Top Button', 'renuma'),
            'subtitle' => __('Show Top Button', 'renuma'),
            'default' => true
         ),
         array(
            'id' => 'scroll_to_top',
            'type' => 'switch',
            'title' => __('Scroll to Top Button', 'renuma'),
            'subtitle' => __('Show scroll to top button.', 'renuma'),
            'default' => true
         ),
         array(
            'id' => 'cursor_helper',
            'type' => 'switch',
            'title' => __('Set Cursor Helper', 'renuma'),
            'subtitle' => __('Click Off to Default Cursor.', 'renuma'),
            'default' => true
         ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'icon' => 'el el-adjust-alt',
    'title' => __('Header Settings', 'renuma'),
    'fields' => array(  
        array(
            'id'       => 'header_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Header Layout For Home01 & All Inner Pages', 'renuma'),
            'subtitle' => esc_html__('Select a header layout for home01 & all inner pages.', 'renuma'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/img/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/img/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/img/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/img/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/img/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/img/header-layout/h6.jpg',
            ),
            'default'  => '1'
        ),
        array(
            'id'       => 'header_layout_home2',
            'type'     => 'image_select',
            'title'    => esc_html__('Header Layout For Home02', 'renuma'),
            'subtitle' => esc_html__('Select a header layout for home02.', 'renuma'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/img/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/img/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/img/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/img/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/img/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/img/header-layout/h6.jpg',
            ),
            'default'  => '2'
        ),
        array(
            'id'       => 'header_layout_home3',
            'type'     => 'image_select',
            'title'    => esc_html__('Header Layout For Home03', 'renuma'),
            'subtitle' => esc_html__('Select a header layout for home05.', 'renuma'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/img/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/img/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/img/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/img/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/img/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/img/header-layout/h6.jpg',
            ),
            'default'  => '3'
        ),
        array(
            'id'       => 'header_layout_home4',
            'type'     => 'image_select',
            'title'    => esc_html__('Header Layout For Home04', 'renuma'),
            'subtitle' => esc_html__('Select a header layout for home07.', 'renuma'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/img/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/img/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/img/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/img/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/img/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/img/header-layout/h6.jpg',
            ),
            'default'  => '4'
        ),
        array(
            'id'       => 'header_layout_home5',
            'type'     => 'image_select',
            'title'    => esc_html__('Header Layout For Home05', 'renuma'),
            'subtitle' => esc_html__('Select a header layout for home08.', 'renuma'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/img/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/img/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/img/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/img/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/img/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/img/header-layout/h6.jpg',
            ),
            'default'  => '5'
        ),
        array(
            'id'       => 'header_layout_home6',
            'type'     => 'image_select',
            'title'    => esc_html__('Header Layout For Home06', 'renuma'),
            'subtitle' => esc_html__('Select a header layout for home06.', 'renuma'),
            'options'  => array(
                '1' => get_template_directory_uri() . '/img/header-layout/h1.jpg',
                '2' => get_template_directory_uri() . '/img/header-layout/h2.jpg',
                '3' => get_template_directory_uri() . '/img/header-layout/h3.jpg',
                '4' => get_template_directory_uri() . '/img/header-layout/h4.jpg',
                '5' => get_template_directory_uri() . '/img/header-layout/h5.jpg',
                '6' => get_template_directory_uri() . '/img/header-layout/h6.jpg',
            ),
            'default'  => '6'
        ),
        array(
            'id'       => 'sticky_off',
            'type'     => 'switch',
            'title'    => esc_html__('Fixed Header', 'renuma'),
            'subtitle' => esc_html__('Header will be fixed when applicable (Currently It is sticky header).', 'renuma'),
            'default'  => false
        ),
         array(
            'id' => 'header_button',
            'type' => 'text',
            'title' => __('Header Button', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Button'
         ),
         array(
            'id' => 'header_link_button',
            'type' => 'text',
            'title' => __('Link Button', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => '#'
         ),
         array(
            'id' => 'header_phone',
            'type' => 'textarea',
            'title' => __('Header Phone', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Phone'
         ),
         array(
            'id' => 'header_mail',
            'type' => 'textarea',
            'title' => __('Header Mail', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Email'
         ),
         array(
            'id' => 'header_phone_link',
            'type' => 'textarea',
            'title' => __('Header Phone Link', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'tel:+1234567890'
         ),
         array(
            'id' => 'header_mail_link',
            'type' => 'textarea',
            'title' => __('Header Mail Link', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'mailto:info@yourdomain.com'
         ),
         array(
            'id' => 'link_fb',
            'type' => 'text',
            'title' => __('Link Facebook', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => ''
         ),
         array(
            'id' => 'link_tw',
            'type' => 'text',
            'title' => __('Link Twitter', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => ''
         ),
         array(
            'id' => 'link_ins',
            'type' => 'text',
            'title' => __('Link Instagram', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => ''
         ),
         array(
            'id' => 'link_yt',
            'type' => 'text',
            'title' => __('Link YouTube', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => ''
         ),
         array(
            'id' => 'link_lin',
            'type' => 'text',
            'title' => __('Link Linkedin', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => ''
         ),
          array(
            'id' => 'link_tiktok',
            'type' => 'text',
            'title' => __('Link Tiktok', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => ''
         ),
         array(
            'id' => 'link_pinterest',
            'type' => 'text',
            'title' => __('Link Pinterest', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => ''
         ),
    )
));

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'icon' => 'el el-adjust',
    'title' => __('Footer Settings', 'renuma'),
    'fields' => array(
        array(
            'id'          => 'footer_layout_custom',
            'type'        => 'select',
            'title'       => esc_html__('Footer Layout For All Inner Pages.', 'renuma'),
            'subtitle'    => esc_html__('Select a footer layout for all inner pages.', 'renuma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','renuma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>renuma_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'          => 'footer_layout_home1',
            'type'        => 'select',
            'title'       => esc_html__('Footer Layout For Home01', 'renuma'),
            'subtitle'    => esc_html__('Select a footer layout for home01.', 'renuma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','renuma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>renuma_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'footer_layout_home2',
            'type'        => 'select',
            'title'    => esc_html__('Footer Layout For Home02', 'renuma'),
            'subtitle' => esc_html__('Select a footer layout for home02.', 'renuma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','renuma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>renuma_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'footer_layout_home3',
            'type'        => 'select',
            'title'    => esc_html__('Footer Layout For Home03', 'renuma'),
            'subtitle' => esc_html__('Select a footer layout for home03.', 'renuma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','renuma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>renuma_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'footer_layout_home4',
            'type'        => 'select',
            'title'    => esc_html__('Footer Layout For Home04', 'renuma'),
            'subtitle' => esc_html__('Select a footer layout for home04.', 'renuma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','renuma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>renuma_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'footer_layout_home5',
            'type'        => 'select',
            'title'    => esc_html__('Footer Layout For Home05', 'renuma'),
            'subtitle' => esc_html__('Select a footer layout for home05.', 'renuma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','renuma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>renuma_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'footer_layout_home6',
            'type'        => 'select',
            'title'    => esc_html__('Footer Layout For Home06', 'renuma'),
            'subtitle' => esc_html__('Select a footer layout for home06.', 'renuma'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','renuma'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>renuma_list_post('footer'),
            'default'     => '',
        ),
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'renuma'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id' => 'shop_default_banner_image',
                'type' => 'media',
                'url' => true,
                'title' => __('Shop Default Banner Image', 'renuma'),
                'compiler' => 'true',
                //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc' => __('', 'renuma'),
                'subtitle' => __('Upload your Image', 'renuma'),
                'default' => ''
            ),
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'renuma'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'renuma'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'renuma'),
                    'right' => esc_html__('Right', 'renuma'),
                    'none'  => esc_html__('Disabled', 'renuma')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'renuma'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'renuma'),
                'default' => 8,
                'min'  => 4,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Blog
--------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'icon' => 'el-icon-list',
    'title' => __('Blog Settings', 'renuma'),
    'fields' => array(
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Post Details Sidebar Position', 'renuma'),
            'subtitle' => esc_html__('Select a sidebar position', 'renuma'),
            'options'  => array(
                'left'  => esc_html__('Left', 'renuma'),
                'right' => esc_html__('Right', 'renuma'),
                'none'  => esc_html__('Disabled', 'renuma')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'widget_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position For Blog Default, Archive, etc.', 'renuma'),
            'subtitle' => esc_html__('Sidebar position for blog default, archive, category, search, etc.', 'renuma'),
            'options'  => array(
                'left'  => esc_html__('Left', 'renuma'),
                'right' => esc_html__('Right', 'renuma'),
                'none'  => esc_html__('Disabled', 'renuma')
            ),
            'default'  => 'right'
        ),
        array(
            'id' => 'blog_default_title',
            'type' => 'text',
            'title' => __('Blog Default Page Title', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Blog'
         ),
        array(
            'id' => 'home_text',
            'type' => 'text',
            'title' => __('Home Text on Breadcrumb', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Home'
         ),
        array(
            'id' => 'blog_default_banner_image',
            'type' => 'media',
            'url' => true,
            'title' => __('Blog Default Banner Image', 'renuma'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => __('', 'renuma'),
            'subtitle' => __('Upload your Image', 'renuma'),
            'default' => ''
        ),
        array(
            'id' => 'blog_details_banner_image',
            'type' => 'media',
            'url' => true,
            'title' => __('Blog Details Banner Image', 'renuma'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => __('', 'renuma'),
            'subtitle' => __('Upload your Image Background', 'renuma'),
            'default' => ''
        ),
        array(
            'id' => 'blog_excerpt',
            'type' => 'text',
            'title' => __('Blog custom excerpt length', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => '30'
        ),
        array(
            'id' => 'grid_number',
            'type' => 'text',
            'title' => __('Number of posts in blog grid page.', 'renuma'),
            'subtitle' => __('', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => '6'
         ),
        array(
            'id' => 'post_tags_on',
            'type' => 'switch',
            'title' => __('Tags', 'renuma'),
            'subtitle' => __('Show tag names on single post.', 'renuma'),
            'default' => true
         ),
        array(
            'id' => 'post_social_share_on',
            'type' => 'switch',
            'title' => __('Social Share', 'renuma'),
            'subtitle' => __('Show social share on single post.', 'renuma'),
            'default' => true
        ),
    ) 
));

/*--------------------------------------------------------------
# 404
--------------------------------------------------------------*/
Redux::setSection( $opt_name, array(
    'icon' => 'el-cog-alt el',
    'title' => __('404 Settings', 'renuma'),
    'fields' => array(
        array(
            'id' => 'error_four_image',
            'type' => 'media',
            'url' => true,
            'title' => __('404 Image', 'renuma'),
            'compiler' => 'true',
            //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'desc' => __('', 'renuma'),
            'subtitle' => __('Upload your Image', 'renuma'),
            'default' => ''
        ),
        array(
            'id' => 'error_four_title',
            'type' => 'text',
            'title' => __('404 title', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => '404'
         ),
        array(
            'id' => 'error_four_subtitle',
            'type' => 'text',
            'title' => __('404 Subtitle', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Sorry we are not finding anything'
         ),
        array(
            'id' => 'error_four_desc',
            'type' => 'text',
            'title' => __('404 Description', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Please try one of the following page'
         ),
        array(
            'id' => 'error_four_button',
            'type' => 'text',
            'title' => __('404 Button', 'renuma'),
            'desc' => __('', 'renuma'),
            'default' => 'Return Home'
         ),
     )
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors - After doing the color change, it is necessary to clear the cache of your browser.', 'renuma'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'renuma'),
            'transparent' => false,
            'default'     => '#1388d7'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'renuma'),
            'transparent' => false,
            'default'     => '#1cbfaa'
        ),
        array(
            'id'          => 'dark_color',
            'type'        => 'color',
            'title'       => esc_html__('Dark Color', 'renuma'),
            'transparent' => false,
            'default'     => '#20252d'
        ),
        array(
            'id'          => 'body_text_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Text Color', 'renuma'),
            'transparent' => false,
            'default'     => '#575a7b'
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$select_custom_font_1 = Redux::get_option($opt_name, 'select_custom_font_1');
$select_custom_font_1 = !empty($select_custom_font_1) ? explode(',', $select_custom_font_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'renuma'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'renuma'),
            'options'  => array(
                'Open Sans'  => esc_html__('Default', 'renuma'),
                'Google-Font'  => esc_html__('Google Font', 'renuma'),
            ),
            'default'  => 'Open Sans',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'renuma'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body', '.main-font', '.elementor .elementor-widget-text-editor'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'renuma'),
            'options'  => array(
                'Mulish'  => esc_html__('Default', 'renuma'),
                'Google-Font'  => esc_html__('Google Font', 'renuma'),
            ),
            'default'  => 'Mulish',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'renuma'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1', '.h1', 'h1 a', '.h1 a'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'renuma'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2', '.h2', 'h2 a', '.h2 a', '.alt-font'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'renuma'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3', '.h3', 'h3 a', '.h3 a'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'renuma'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4', '.h4', 'h4 a', '.h4 a'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'renuma'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5', '.h5', 'h5 a', '.h5 a'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'renuma'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6', '.h6', 'h6 a', '.h6 a'),
            'units'       => 'px',
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# Custom Fonts
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'renuma'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'renuma'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'renuma'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $select_custom_font_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'select_custom_font_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'renuma'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'renuma'),
            'validate' => 'no_html'
        )
    )
));

/* Custom CSS /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom CSS', 'renuma'),
    'icon'   => 'el-icon-adjust-alt',
    'fields' => array(

        array(
            'id'   => 'customcss',
            'type' => 'info',
            'desc' => esc_html__('Custom CSS', 'renuma')
        ),

        array(
            'id'       => 'site_css',
            'type'     => 'ace_editor',
            'title'    => esc_html__('CSS Code', 'renuma'),
            'subtitle' => esc_html__('Advanced CSS Options. You can paste your custom CSS Code here.', 'renuma'),
            'mode'     => 'css',
            'validate' => 'css',
            'theme'    => 'chrome',
            'default'  => ""
        ),

    ),
));