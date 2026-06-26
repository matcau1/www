<?php
/*
 * Template Name: Navigation Template
 * Description: A Page Template with a Page Builder design.
 */
?>

<?php

$prevPost = get_adjacent_post(false, '', false);
$nextPost  = get_adjacent_post(false, '', true);

$kses_allowed_html = [
    'a' => [
        'href' => true, 'title' => true,
        'class' => true, 'style' => true,
        'rel' => true, 'target' => true
    ],
    'br' => ['class' => true, 'style' => true],
    'b' => ['class' => true, 'style' => true],
    'em' => ['class' => true, 'style' => true],
    'strong' => ['class' => true, 'style' => true],
];

if ($nextPost || $prevPost) :

    echo '<div class="page-navigation mb-6 wow fadeIn mt-2-9" data-wow-delay="200ms">';

    if (is_a($prevPost, 'WP_Post')) :
        $image_prev_url = wp_get_attachment_image_url(get_post_thumbnail_id($prevPost->ID), 'thumbnail');

        $class_image_prev = $image_prev_url ? ' image_exist' : ' no_image';
        $img_prev_html = "<span class='image-prev" . esc_attr($class_image_prev)."'>";
            if ($image_prev_url) {
                $img_prev_html .= "<img src='". esc_url($image_prev_url) ."' alt='". esc_attr($prevPost->post_title) ."'/>";
            } else {
                $img_prev_html .= '<span class="no_image_post"></span>';
            }
        $img_prev_html .= '</span>';

        echo '<div class="prev-page">',
            '<div class="page-info">',
            '<a href="', esc_url(get_permalink($prevPost->ID)), '" title="', esc_attr($prevPost->post_title), '">',
                $img_prev_html,
                '<div class="prev-link-page-info">',
                '<h4 class="prev-title">',
                    wp_kses($prevPost->post_title, $kses_allowed_html),
                '</h4>',
                '<span class="date-details">',
                    '<span class="create-date">',
                    esc_html(get_the_time(get_option('date_format'), $prevPost->ID)),
                    '</span>',
                '</span>',
                '</div>', // prev-link-info_wrapper
            '</a>',
            '</div>', // info_wrapper
        '</div>';
    endif;

    if (is_a($nextPost, 'WP_Post') ) :
        $image_next_url = wp_get_attachment_image_url(get_post_thumbnail_id($nextPost->ID), 'thumbnail');
        $class_image_next = $image_next_url ? ' image_exist' : ' no_image';

        $img_next_html = '<span class="image-next' . esc_attr($class_image_next) . '">';
            if ($image_next_url) {
                $img_next_html .= "<img src='" . esc_url($image_next_url) . "' alt='". esc_attr($nextPost->post_title) ."'/>";
            } else {
                $img_next_html .= '<span class="no_image_post"></span>';
            }
        $img_next_html .= '</span>';
        echo '<div class="next-page">',
            '<div class="page-info">',
            '<a href="', esc_url(get_permalink($nextPost->ID)), '" title="', esc_attr($nextPost->post_title), '">',
                '<div class="next-link-page-info">',
                '<h4 class="next-title">',
                    wp_kses($nextPost->post_title, $kses_allowed_html),
                '</h4>',
                '<span class="date-details">',
                    '<span class="create-date">',
                    esc_html(get_the_time(get_option('date_format'), $nextPost->ID)),
                    '</span>',
                '</span>',
                '</div>', // next-link-info_wrapper
                $img_next_html,
            '</a>',
            '</div>', // info_wrapper
        '</div>';
    endif;

    echo '</div>'; // renuma-post-navigation

endif;