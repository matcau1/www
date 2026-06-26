<?php
/**
 * The Template for displaying all single posts
 */

$blog_default_banner_image = renuma_get_opt('blog_default_banner_image');
$pos_sidebar = renuma_get_opt( 'widget_sidebar_pos', 'right' );
$home_text = renuma_get_opt('home_text');

get_header();

if( (class_exists( 'WooCommerce' )) ) {
    $pos_sidebar = 'none';
}

?>
<?php 
    while (have_posts()): the_post();
?>

<!-- PAGE TITLE
================================================== -->
<?php if(isset ($blog_default_banner_image['url']) && !empty ($blog_default_banner_image['url']) ){?>
<section class="page-title-section bg-img cover-background theme-overlay-dark-blue left-overlay-dark" data-overlay-dark="7" data-background="<?php printf ( esc_url($blog_default_banner_image['url'])); ?>">
<?php }else{?>
<section class="page-title-section theme-overlay-dark-blue" data-overlay-dark="9">
<?php }
?>
    <div class="container">
        <h1> <?php the_title(); ?> </h1>        
        <ul>
            <li>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if(isset($home_text) && !empty($home_text)){?>
                        <?php echo wp_specialchars_decode(esc_attr($home_text)); ?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Home', 'renuma' );
                    }?>
                </a>
            </li>                            
            <li>
                <?php the_title(); ?>
            </li>
        </ul>
    </div>
    
</section>

<!-- PAGE
================================================== -->
<section class="page-section">
    <div class="container">
        
        <div <?php renuma_primary_class( $pos_sidebar ); ?>>

          <!--  start blog left-->
          <?php if ( ( 'left' == $pos_sidebar || 'right' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) ) ){?>
          <div class="col-lg-8 mb-2-9 mb-lg-0 mt-n2-9" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php }else{ ?>
          <div class="col-lg-12 mt-n2-9" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php } ?>
            <article class="card card-style4 border-0 mt-2-9 mb-2-9">
                <?php if (get_the_post_thumbnail_url() !='')  { ?>
                  <div class="blog-thumb">
                    <a href="<?php the_permalink();?>">
                      <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
                    </a>
                  </div>
                <?php } ?>
              <div class="card-body p-2-0 p-xl-2-4">
                <div class="page-content">
                    <?php the_content(); ?>
                    <?php wp_link_pages( array(
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'renuma' ),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                    ) ); ?>
                </div>
                <div class="next-prev-post clearfix">
                  <?php previous_post_link('%link',wp_specialchars_decode(esc_html__( '<i class="ion-arrow-left-c"></i> Previous Post','renuma'),ENT_QUOTES), true); ?>
                  <div class='right'><?php next_post_link('%link',wp_specialchars_decode(esc_html__('Next Post <i class="ion-arrow-right-c"></i>','renuma'),ENT_QUOTES), true); ?></div>
                </div>
              </div>
            </article>

            <?php           
              if ( comments_open() || get_comments_number() ) {
                comments_template();
              }
            ?>
          </div>
          
           <!--  start blog right-->
            <?php if ( 'left' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) || 'right' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div class="col-lg-4">
                <div <?php renuma_secondary_class( $pos_sidebar ); ?>>
                    <?php get_sidebar();?>
                </div>
            </div>
            <?php endif; ?>
            <!--  end blog right-->

    </div>
  </div>
</section>
<?php endwhile; ?>

<!-- blog-area end -->
<?php get_footer();?>