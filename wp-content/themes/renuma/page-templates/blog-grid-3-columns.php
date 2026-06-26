<?php
/*
 * Template Name: Blog Standard
 * Description: A Page Template with a Page Builder design.
 */

$blog_default_banner_image = renuma_get_opt('blog_default_banner_image');
$home_text = renuma_get_opt('home_text');
$grid_number = renuma_get_opt('grid_number');

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
        <h1><?php the_title();?></h1>
        <ul>
            <li><a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if(isset($home_text) && !empty($home_text)){?>
                <?php echo wp_specialchars_decode(esc_attr($home_text)); ?>
                <?php }else{?>
                    <?php echo esc_html__( 'Home', 'renuma' );
                }
                ?></a>
            </li>
            <li><?php the_title(); ?></li>
        </ul>
    </div>
    
</section>

<!-- BLOG GRID
================================================== -->
<section class="page-section">
    <div class="container">

        <div class="row g-xl-5 mt-n2-2">

            <?php  $args = array(    
                'paged' => $paged,
                'post_type' => 'post',
                'posts_per_page' => $grid_number,
            );

            $i =0;
            $wp_query = new WP_Query($args);
            
            while (have_posts()): the_post();
            $i=$i+100; ?>
                                    
            <div class="col-md-6 col-lg-4 mt-2-2 wow fadeIn" data-wow-delay="<?php echo html_entity_decode ( esc_html($i) ); ?>ms">
                <article class="card card-style4 border-0 h-100">

                    <?php if (get_the_post_thumbnail_url() !='')  { ?>
                        <div class="blog-img position-relative overflow-hidden">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                            <span class="category"><?php echo get_the_tag_list(); ?></span>
                        </div>
                    <?php } ?>

                    <div class="card-body p-2-0 p-xl-2-4">
                        <span class="text-secondary mb-2 d-block font-weight-700"><?php the_time(get_option( 'date_format' ));?></span>
                        <h3 class="h4 mb-4"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                        <a href="<?php the_permalink();?>" class="text-secondary text-primary-hover fw-bold display-28">Read More &#10230;</a>
                    </div>
                    <div class="card-footer bg-white px-2-0 px-xl-2-4 py-3 border-color-light-gray">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-capitalize font-weight-700"><i class="ti-user pe-2"></i><a href="#!" title="Posts by admin" rel="author"><?php the_author_posts_link(); ?></a></div>
                            <span><i class="ti-comment-alt me-2"></i><?php comments_number( esc_html__('0' , 'renuma') , esc_html__('1' , 'renuma' ), esc_html__('%' , 'renuma')); ?></span>
                        </div>
                    </div>
                </article>
            </div>

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
    </div>
</section>

<?php
    get_footer();
?>