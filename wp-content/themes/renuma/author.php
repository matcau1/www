<?php

     $blog_default_banner_image = renuma_get_opt('blog_default_banner_image');
     $pos_sidebar = renuma_get_opt( 'widget_sidebar_pos', 'right' );
     get_header(); 

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
        
        <div class="row text-center">
            <div class="col-md-12">
                <h1><?php the_post(); printf( esc_html__( 'All posts by %s', 'renuma' ), get_the_author() );?></h1>
            </div>
        </div>

    </div>
</section>

<!-- AUTHOR PAGE
================================================== -->
<section class="page-section">
    <div class="container">

        <div <?php renuma_primary_class( $pos_sidebar ); ?>>

            <!--  start blog left-->
            <?php if ( ( 'left' == $pos_sidebar || 'right' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) ) ){?>
            <div class="col-lg-8 mb-2-9 mb-lg-0 mt-n2-9">
            <?php }else{ ?>
            <div class="col-lg-12 mt-n2-9">

                <?php } ?>
                <?php  
                $i =0;
                while (have_posts()): the_post(); 
                    $i=$i+100; ?>

                <article class="card card-style4 border-0 primary-shadow mt-2-9 wow fadeInUp" data-wow-delay="<?php echo html_entity_decode ( esc_html($i) ); ?>ms">
                    <?php if (get_the_post_thumbnail_url() !='')  { ?>
                    <div class="blog-img position-relative overflow-hidden">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                        <span class="category"><?php echo get_the_tag_list(); ?></span>
                    </div>
                    <?php } ?>
                    <div class="card-body p-2-0 p-xl-2-4">
                        <span class="text-secondary mb-2 d-block font-weight-700"><?php the_time(get_option( 'date_format' ));?></span>
                        <h3 class="mb-4"><a href="<?php the_permalink();?>"><?php if(is_sticky()) { ?><i class="fas fa-thumbtack me-3"></i><?php } ?><?php the_title();?></a></h3>
                        <p class="mb-4"><?php echo esc_attr(renuma_excerpt()); ?></p>
                        <a href="<?php the_permalink();?>" class="text-secondary text-primary-hover fw-bold display-28">Read More &#10230;</a>
                    </div>
                    <div class="card-footer bg-white px-2-0 px-xl-2-4 py-3 border-color-light-gray">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-capitalize font-weight-700"><i class="ti-user pe-2"></i><?php the_author_posts_link(); ?></div>
                            <span><i class="ti-comment-alt me-2"></i><?php comments_number( esc_html__('0' , 'renuma') , esc_html__('1' , 'renuma' ), esc_html__('%' , 'renuma')); ?></span>
                        </div>
                    </div>
                </article>
                <?php endwhile; ?>

                <!-- start pager  -->
                <div class="col-md-12 wow fadeIn p-0 m-0" data-wow-delay="200ms">
                    <?php 
                      $pagination = array(
                          'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                          'format'    => '',
                          'prev_text' => wp_specialchars_decode(esc_html__( '<i class = "fa fa-angle-left"></i>', 'renuma' ),ENT_QUOTES),
                          'next_text' => wp_specialchars_decode(esc_html__( '<i class = "fa fa-angle-right"></i>', 'renuma' ),ENT_QUOTES),
                          'type'      => 'list',
                          'end_size'    => 3,
                          'mid_size'    => 3
                        );
                      if(paginate_links( $pagination )!= ''){
                        $return =  paginate_links( $pagination );
                        echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination justify-content-center d-block text-center mt-2-9 ms-0 mb-0">', $return );
                    }
                    ?>
                </div>
                <!-- end pager -->
                
            </div>
            <!--  end blog left-->

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

<?php
    get_footer();
?>