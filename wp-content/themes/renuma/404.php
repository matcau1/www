<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

    $error_four_image = renuma_get_opt('error_four_image');
    $error_four_title = renuma_get_opt('error_four_title');
    $error_four_subtitle = renuma_get_opt('error_four_subtitle');
    $error_four_desc = renuma_get_opt('error_four_desc');
    $error_four_button = renuma_get_opt('error_four_button');
    
    get_header('404'); 

?>
<!-- 404 PAGE
================================================== -->
<?php if(isset ($error_four_image['url']) && !empty ($error_four_image['url']) ){?>
<section class="full-screen p-0 bg-img cover-background" data-overlay-dark="4" data-background="<?php printf ( esc_url($error_four_image['url'])); ?>">
<?php }else{?>
<section class="p-0 theme-overlay-dark-blue" data-overlay-dark="8">
<?php }
?>
    <div class="container-fluid d-flex flex-column position-relative z-index-9">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-xl-7">
                <div class="text-center error-wrapper my-1-6">
                    <div class="number-wrap">
                        <h1>
                            <?php if(isset($error_four_title) && !empty($error_four_title)){?>
                                <?php echo esc_attr($error_four_title); ?>
                            <?php }else{?>
                                <?php echo esc_html__( '404', 'renuma' );
                            }
                            ?>
                        </h1>
                    </div>
                    <h2 class="h1 mb-4 text-white">
                        <?php if(isset($error_four_subtitle) && !empty($error_four_subtitle)){?>
                            <?php echo esc_attr($error_four_subtitle); ?>
                        <?php }else{?>
                            <?php echo esc_html__( 'Opps! Page Not Found', 'renuma' );
                        }
                        ?>
                    </h2>
                    <p class="lead mb-1-6 text-white opacity8 w-sm-75 w-lg-70 w-xl-80 w-xxl-70 mx-auto">
                        <?php if(isset($error_four_desc) && !empty($error_four_desc)){?>
                            <?php echo esc_attr($error_four_desc); ?>
                        <?php }else{?>
                            <?php echo esc_html__( 'We can’t find the page your are looking for. You can check out our help center or head back to homepage.', 'renuma' );
                        }
                        ?>
                    </p>
                    <div class="text-center">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-style4 primary"><?php if(isset($error_four_button) && !empty($error_four_button)){?><?php echo esc_attr($error_four_button); ?><?php }else{?><?php echo esc_html__( 'Back to Home', 'renuma' );}?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
  get_footer('404');
?> 