<?php
/*
 * Template Name: Home 04
 * Description: A Page Template with a Page Builder design.
 */
get_header(4); ?>
<?php if (have_posts()){ ?>
	
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	
	<?php }else {
		echo esc_html__( 'Page Canvas For Page Builder', 'renuma' );
	}?>
<?php get_footer(4); ?>