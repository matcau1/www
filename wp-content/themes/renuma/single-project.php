<?php

    get_header(); 

?>
<?php 
    while (have_posts()): the_post();
?>


<!-- PORTFOLIO DETAILS
================================================== -->
<?php the_content(); ?>

<section class="page-section post-nav pt-0">
    <div class="container">
                
        <?php get_template_part('page-templates/post-navigation'); ?>
        
        <?php endwhile; ?>

    </div>
</section>


<?php
    get_footer();
?>