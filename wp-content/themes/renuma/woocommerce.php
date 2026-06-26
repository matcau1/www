<?php
/**
 * Custom Woocommerce shop page.
 */
$shop_default_banner_image = renuma_get_opt('shop_default_banner_image');

get_header();

if( (class_exists( 'WooCommerce' ) && is_shop()) || (class_exists( 'WooCommerce' ) && is_product_category()) ) {
    $pos_sidebar = (isset($_GET['sidebar-shop'])) ? trim($_GET['sidebar-shop']) :renuma_get_opt( 'sidebar_shop', 'right' );
} else {
    $pos_sidebar = 'none';
}

?>

<!-- PAGE TITLE
================================================== -->
<?php if(isset ($shop_default_banner_image['url']) && !empty ($shop_default_banner_image['url']) ){?>
<section class="page-title-section bg-img cover-background theme-overlay-dark-blue left-overlay-dark" data-overlay-dark="7" data-background="<?php printf ( esc_url($shop_default_banner_image['url'])); ?>">
<?php }else{?>
<section class="page-title-section theme-overlay-dark-blue" data-overlay-dark="9">
<?php }
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-start">
                        <div class="position-relative">
                            <h1>
                                <?php wp_title(''); ?>
                            </h1>
                        </div>
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if(isset($home_text) && !empty($home_text)){?>
                                <?php echo wp_specialchars_decode(esc_attr($home_text)); ?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Home', 'renuma' );
                            }?>
                            </a></li>
                            <li>
                                <?php wp_title(''); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- PRODUCT
================================================== -->
<section class="page-section">
    <div class="container">
        <div <?php renuma_primary_class( $pos_sidebar ); ?>>

          <!--  start page left-->
          <?php if ( ( 'left' == $pos_sidebar || 'right' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) ) ){?>
          <div class="col-lg-8 mb-2-9 mb-lg-0">
          <?php }else{ ?>
          <div class="col-lg-12">
            <?php } ?>
                <?php woocommerce_content(); ?>
          </div>
          
          <!--  start blog right-->
            <?php if ( 'left' == $pos_sidebar && is_active_sidebar( 'sidebar-shop' ) || 'right' == $pos_sidebar && is_active_sidebar( 'sidebar-shop' ) ) : ?>
            <div class="col-lg-4">
                <div <?php renuma_secondary_class( $pos_sidebar ); ?>>
                    <?php dynamic_sidebar( 'sidebar-shop' ); ?>
                </div>
            </div>
            <?php endif; ?>
          <!--  end blog right-->

    </div>
  </div>

</section>
    
<?php
get_footer();