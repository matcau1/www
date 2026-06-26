<?php
/**
 * Template part for displaying default header layout
 */
    $default_logo = renuma_get_opt('default_logo');
    $header_phone = renuma_get_opt('header_phone');
    $header_mail = renuma_get_opt('header_mail');
    $header_phone_link = renuma_get_opt('header_phone_link');
    $header_mail_link = renuma_get_opt('header_mail_link');
    $header_button = renuma_get_opt('header_button');
    $header_link_button = renuma_get_opt('header_link_button');
    $top_bar = renuma_get_opt('top_bar', true);
    $header_top_search_bar = renuma_get_opt('header_top_search_bar', true);
    $header_top_cart_bar = renuma_get_opt('header_top_cart_bar', true);
    $header_top_button = renuma_get_opt('header_top_button', true);

    $link_fb = renuma_get_opt('link_fb');
    $link_tw = renuma_get_opt('link_tw');
    $link_ins = renuma_get_opt('link_ins');
    $link_lin = renuma_get_opt('link_lin');
    $link_tiktok = renuma_get_opt('link_tiktok');
    $link_pinterest = renuma_get_opt('link_pinterest');
    $link_yt = renuma_get_opt('link_yt');
?>

<!-- start header section -->
<header class="header-style2">
    
    <?php if (isset($top_bar) && $top_bar) : ?>
        <div class="top-bar bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-xs-12">
                        <div class="top-bar-info">
                            <ul class="ps-0">
                                <?php if(isset($header_phone) && !empty($header_phone)){?>
                                    <li><a href="<?php echo esc_url($header_phone_link); ?>"><i class="ti-mobile"></i><?php echo esc_attr($header_phone); ?></a></li>
                                <?php } ?>

                                <?php if(isset($header_mail) && !empty($header_mail)){?>
                                    <li class="d-none d-sm-inline-block"><a href="<?php echo esc_url($header_mail_link); ?>"><i class="ti-email"></i><?php echo esc_attr($header_mail); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 d-none d-md-block">
                        <ul class="top-social-icon ps-0">
                            <?php if(isset($link_fb) && !empty($link_fb)){?>
                                <li><a target="_blank" href="<?php echo esc_url($link_fb); ?>"><i class="fab fa-facebook-f"></i></a></li>
                            <?php } ?>
                            <?php if(isset($link_tw) && !empty($link_tw)){?>
                                <li><a target="_blank" href="<?php echo esc_url($link_tw); ?>"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <?php } ?>
                            <?php if(isset($link_ins) && !empty($link_ins)){?>
                                <li><a target="_blank" href="<?php echo esc_url($link_ins); ?>"><i class="fab fa-instagram"></i></a></li>
                            <?php } ?>
                            <?php if(isset($link_lin) && !empty($link_lin)){?>
                                <li><a target="_blank" href="<?php echo esc_url($link_lin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                            <?php } ?>
                            <?php if(isset($link_tiktok) && !empty($link_tiktok)){?>
                                <li><a target="_blank" href="<?php echo esc_url($link_tiktok); ?>"><i class="fa-brands fa-tiktok"></i></a></li>
                            <?php } ?>
                            <?php if(isset($link_pinterest) && !empty($link_pinterest)){?>
                                <li><a target="_blank" href="<?php echo esc_url($link_pinterest); ?>"><i class="fa-brands fa-pinterest"></i></a></li>
                            <?php } ?>
                            <?php if(isset($link_yt) && !empty($link_yt)){?>
                                <li><a target="_blank" href="<?php echo esc_url($link_yt); ?>"><i class="fa-brands fa-youtube"></i></a></li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="navbar-default border-bottom border-color-light-white">

        <?php if (isset($header_top_search_bar) && $header_top_search_bar) : ?>
        <!-- start top search -->
        <div class="top-search bg-dark">
            <div class="container">
                <div class="search-form">
                    <?php get_search_form(); ?>
                    <span class="input-group-addon close-search mt-1"><i class="fas fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- end top search -->        
        <?php endif; ?>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="menu_area alt-font">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">

                            <div class="navbar-header navbar-header-custom">
                                <!-- start logo -->
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="navbar-brand">
                                <?php if(isset ($default_logo['url']) && !empty ($default_logo['url']) ){?>
                                    <img id="redux_logo" src="<?php printf ( esc_url( ($default_logo['url'])) ); ?>" alt="<?php echo esc_attr__('Logo', 'renuma'); ?>">
                                <?php }else{?>
                                    <img id="default_logo" src="<?php echo get_template_directory_uri();?>/img/logos/logo.png" alt="<?php echo esc_attr__('Logo', 'renuma'); ?>">
                                <?php }?>
                                </a>
                                <!-- end logo -->
                            </div>

                            <div class="navbar-toggler bg-primary"></div>

                            <?php 
                              wp_nav_menu( 
                              array( 
                                    'theme_location'  => 'primary',
                                    'container'       => '',
                                    'menu_class'      => 'navbar-nav align-items-lg-center ms-auto', 
                                    'menu_id'         => '',
                                    'menu'            => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                                    'walker'          => new WP_Bootstrap_Navwalker(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul id="nav" class="navbar-nav align-items-lg-center ms-auto %2$s">%3$s</ul>',
                                    'depth'           => 0,        
                                )
                            ); ?>

                            <!-- start attribute navigation -->
                            <div class="attr-nav align-items-xl-center ms-xl-auto main-font">
                                <ul>
                                    <?php if(class_exists('Woocommerce')){?>
                                        <?php if (isset($header_top_cart_bar) && $header_top_cart_bar) : ?>
                                            <li class="mini-cart">
                                                <a class="cart-contents ot-minicart" href="<?php echo esc_url( wc_get_cart_url() ) ?>" title="<?php esc_attr_e( 'View your shopping cart', 'renuma' ); ?>"><i class="fa-solid fa-bag-shopping"></i> <span class="counter" id="cart-count"><?php
                                                $cart_count = WC()->cart->get_cart_contents_count();
                                                echo sprintf ( _n( '%d', '%d', $cart_count, 'renuma' ), $cart_count );
                                                ?></span></a>                                                   
                                                <?php if( !is_cart() && !is_checkout() ) { ?>
                                                <div class="mini-cart-box">
                                                    <?php the_widget( 'WC_Widget_Cart', array( 'title' => '' ) ); ?>
                                                </div>  
                                                <?php } ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php } ?>
                                    <?php if (isset($header_top_search_bar) && $header_top_search_bar) : ?>
                                    <li class="search"><a href="#!"><i class="fas fa-search"></i></a></li>  
                                    <?php endif; ?>
                                    <?php if(isset($header_button) && !empty($header_button)){?>
                                        <?php if (isset($header_top_button) && $header_top_button) : ?>
                                            <li class="d-none d-xl-inline-block"><a class="butn-style8 md" href="<?php echo esc_url($header_link_button); ?>"><span><?php echo esc_html($header_button); ?><i class="ti-arrow-right"></i></span></a></li>
                                        <?php endif; ?>
                                    <?php }else{?>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- end attribute navigation -->

                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- end header section -->