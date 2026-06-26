<?php

   $blog_details_banner_image = renuma_get_opt('blog_details_banner_image');
   $pos_sidebar = renuma_get_opt( 'post_sidebar_pos', 'right' );
   $home_text = renuma_get_opt('home_text');
   $post_social_share_on = renuma_get_opt('post_social_share_on');
   $post_tags_on = renuma_get_opt('post_tags_on');

   get_header(); 
   while (have_posts()): the_post();
?>

<!-- PAGE TITLE
================================================== -->
<?php if(isset ($blog_details_banner_image['url']) && !empty ($blog_details_banner_image['url']) ){?>
<section class="page-title-section bg-img cover-background theme-overlay-dark-blue left-overlay-dark" data-overlay-dark="7" data-background="<?php printf ( esc_url($blog_details_banner_image['url'])); ?>">
<?php }else{?>
<section class="page-title-section theme-overlay-dark-blue" data-overlay-dark="9">
<?php }
?>
    <div class="container">
        <h1><?php the_title();?></h1>
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

<!-- BLOG DETAILS
================================================== -->
<section class="page-section">
    <div class="container">
        <div <?php renuma_primary_class( $pos_sidebar ); ?>>

            <!--  start blog left-->
            <?php if ( ( 'left' == $pos_sidebar || 'right' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) ) ){?>
            <div class="col-lg-8 mb-5 mb-lg-0">
            <?php }else{ ?>
            <div class="col-lg-12">
                <?php } ?>

                  <article class="card border-0 primary-shadow mb-2-9">
                      <!--  start post-->
                      <div class="card-image position-relative">
                          <?php if ( has_post_thumbnail() ) { ?>
                              <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="rounded-top wow fadeIn card-img-top" data-wow-delay="100ms" alt="<?php echo esc_attr__('Image', 'renuma');?>">
                            <?php } ?>
                        </div>
                          <div class="card-body p-1-9 p-sm-2-0 position-relative">
                              <ul class="entry-meta">
                                    <li class="d-inline-block text-capitalize me-3"><i class="ti-user text-primary pe-2"></i><?php the_author_posts_link(); ?></li>
                                    <li class="d-inline-block me-3"><i class="ti-comments text-primary pe-2"></i><?php comments_number( esc_html__('0 Comments' , 'renuma') , esc_html__('1 Comment' , 'renuma' ), esc_html__('% Comments' , 'renuma')); ?></li>
                                    <li class="d-inline-block text-capitalize"><i class="ti-calendar text-primary pe-2"></i><?php the_time(get_option( 'date_format' ));?></li>
                                </ul>
                                <div class="page-content">
                                    <?php the_content(); ?>
                                    <?php wp_link_pages( array(
                                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'renuma' ),
                                    'after'       => '</div>',
                                    'link_before' => '<span class="page-number">',
                                    'link_after'  => '</span>',
                                    ) ); ?>
                                </div>
                          </div>

                          <?php if(isset($post_social_share_on) && ($post_social_share_on) != ''){?><div class="border-top border-color-light-black p-2-0 p-xl-2-4 g-0 d-md-flex align-items-center entry-footer float-start w-100 social-icon-style2"><?php if($post_tags_on){ renuma_entry_tagged_in(); } ?><?php if($post_social_share_on){ renuma_socials_share_default(); } ?></div><?php }else{?><div class="border-top border-color-light-black p-2-0 p-xl-2-4 g-0 d-md-flex align-items-center entry-footer float-start w-100 social-icon-style2"><?php renuma_entry_tagged_in(); ?></div><?php } ?>

                      </article>
                      <!--  start post-->

                    <!-- Navigation -->
                    <?php get_template_part('page-templates/post-navigation'); ?>
                    
                    <?php comments_template(); ?>
                  
            </div>
            <!--  end blog left-->
            
           <?php if ( 'left' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) || 'right' == $pos_sidebar && is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div class="col-lg-4">
                    <div <?php renuma_secondary_class( $pos_sidebar ); ?>>
                        <?php get_sidebar();?>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>


<?php endwhile; ?>
<?php
    get_footer();
?>