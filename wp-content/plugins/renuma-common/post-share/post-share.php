<?php 
// Socials Share for Post
function renuma_socials_share_default() { ?>
    <div class="blog-share-icon wow fadeIn" data-wow-delay="400ms">
        <label class="h6 me-1 mb-0"><?php echo esc_html__('Share:', 'renuma'); ?></label>
        <ul class="share-post m-0 p-0 d-inline-block">
            <li><a title="<?php echo esc_attr__('Facebook', 'renuma'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a></li>
            <li><a title="<?php echo esc_attr__('Twitter', 'renuma'); ?>" target="_blank" href="http://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fa-brands fa-x-twitter"></i></a></li>
            <li><a title="<?php echo esc_attr__('Pinterest', 'renuma'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url(the_post_thumbnail_url( 'full' )); ?>&media=&description=<?php the_title(); ?>"><i class="fab fa-pinterest-p"></i></a></li>
            <li><a title="<?php echo esc_attr__('LinkedIn', 'renuma'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="fab fa-linkedin-in"></i></a></li>
        </ul>    
    </div>    
<?php
}