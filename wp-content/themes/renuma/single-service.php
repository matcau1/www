<?php
   get_header(); 
?>
<?php 
    while (have_posts()): the_post();
?>

<!-- SERVICE DETAILS
================================================== -->
<?php the_content(); ?>
 

<?php endwhile; ?>

<?php
    get_footer();
?>