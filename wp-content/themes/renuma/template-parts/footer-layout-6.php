<?php 
    $footer_layout_home6 = renuma_get_opt('footer_layout_home6');    
?>

<?php

    if ( ! empty( $footer_layout_home6 ) )  { ?>   

        <footer>
           <?php $_post = get_post($footer_layout_home6);
                if (!is_wp_error($_post) && $_post->ID == $footer_layout_home6){
                $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $footer_layout_home6 );
                echo html_entity_decode(esc_attr($content));
                }
            ?>
        </footer>

    <?php } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } 

?>