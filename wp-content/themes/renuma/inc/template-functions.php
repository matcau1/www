<?php
/**
 * Helper functions for the theme
 *
 * @package renuma
 */

//Function tag widgets
function renuma_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'renuma_tag_cloud_widget' );

//Character length
function renuma_excerpt() {
    
  $blog_excerpt = renuma_get_opt('blog_excerpt');

  if(isset($blog_excerpt) && !empty($blog_excerpt)){?>
    <?php 
        $limit = ($blog_excerpt);
    ?>
    <?php }else{?>
    <?php $limit = 40; }

  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

//Character length
function renuma_excerpt2() {

  $limit = 12;
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

// Search Form
function renuma_search_form( $form ) {
    $form = '
    <form  method="get" action="' . esc_url(home_url('/')) . '"> 
        <div class="input-group">
            <input type="text"  placeholder="'.esc_attr__('Search', 'renuma').'" value="' . get_search_query() . '" name="s" > 
        <div class="input-group-append mt-1">
            <button type="submit" class="butn border-0"><span class="icon fa fa-search"></span></button>
        </div>
        </div>
    </form>    
  	';
    return $form;
}
add_filter( 'get_search_form', 'renuma_search_form' );

// Custom Widget Categories
function renuma_cat_count_span($output, $args) {
    if ($args['show_count'] = 1) {
        $pattern     = '#<li([^>]*)><a([^>]*)>(.*?)<\/a>\s*\(([0-9]*)\)\s*#i';  // removed ( and )
        $replacement = '<li$1><a$2><span class="cat-name">$3</span> <span class="float-end cat-count">($4)</span></a>';
        return preg_replace($pattern, $replacement, $output);
    }
    return $output;
}

add_filter('wp_list_categories', 'renuma_cat_count_span', 10, 2);

// Custom Widget Archive
function renuma_archive_count_span($link_html, $url, $text, $format, $before, $after, $selected) {
    if ($format == 'html') {
        $pattern     = '#<li><a([^>]*)>(.*?)<\/a>&nbsp;\s*\(([0-9]*)\)\s*#i';  // removed ( and )
        $replacement = '<li><a$1><span class="archive-name">$2</span> <span class="float-end archive-count">($3)</span></a>';
        return preg_replace($pattern, $replacement, $link_html);
    }
    return $link_html;
}

add_filter('get_archives_link', 'renuma_archive_count_span', 10, 7);

// Post Tag List
if ( ! function_exists( 'renuma_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function renuma_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '<label class="h6 me-3 mb-0">'.esc_attr__('Tags:', 'renuma'). '</label>', ' ' );
        if ( $tags_list )
        {
            echo '<div class="tags flex-grow-1 mb-4 mb-md-0 pe-md-3">';
            printf('%2$s', '', $tags_list);
            echo '</div>';
        }
    }
endif;

/**
 * Header layout
 **/
function renuma_header_layout()
{
    $header_layout = renuma_get_opt( 'header_layout', '1' );
    get_template_part( 'template-parts/header-layout', $header_layout );
}

/**
 * Header layout
 **/
function renuma_header_layout_home2()
{
    $header_layout_home2 = renuma_get_opt( 'header_layout_home2', '2' );
    get_template_part( 'template-parts/header-layout', $header_layout_home2 );
}

/**
 * Header layout
 **/
function renuma_header_layout_home3()
{
    $header_layout_home3 = renuma_get_opt( 'header_layout_home3', '3' );
    get_template_part( 'template-parts/header-layout', $header_layout_home3 );
}

/**
 * Header layout
 **/
function renuma_header_layout_home4()
{
    $header_layout_home4 = renuma_get_opt( 'header_layout_home4', '4' );
    get_template_part( 'template-parts/header-layout', $header_layout_home4 );
}

/**
 * Header layout
 **/
function renuma_header_layout_home5()
{
    $header_layout_home5 = renuma_get_opt( 'header_layout_home5', '5' );
    get_template_part( 'template-parts/header-layout', $header_layout_home5 );
}

/**
 * Header layout
 **/
function renuma_header_layout_home6()
{
    $header_layout_home6 = renuma_get_opt( 'header_layout_home6', '6' );
    get_template_part( 'template-parts/header-layout', $header_layout_home6 );
}

/**
 * Get Post List 
*/
if(!function_exists('renuma_list_post')){
    function renuma_list_post($post_type = 'footer', $default = false){
        $post_list = array();
        $posts = get_posts(array('post_type' => $post_type,'posts_per_page' => '-1'));
        foreach($posts as $post){
            $post_list[$post->ID] = $post->post_title;
        }
        return $post_list;
    }
}

/**
 * Footer layout
 **/
function renuma_footer_layout()
{
    if( class_exists('ReduxFramework'))  {
        $footer_layout = renuma_get_opt( 'footer_layout', '' );
        get_template_part( 'template-parts/footer-layout', $footer_layout );
    } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    }    
}

/**
 * Footer layout01
 **/
function renuma_footer_layout_home1()
{
    if( class_exists('ReduxFramework'))  {
        $footer_layout = renuma_get_opt( 'footer_layout', '1' );
        get_template_part( 'template-parts/footer-layout', $footer_layout );
    } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } 
}

/**
 * Footer layout02
 **/
function renuma_footer_layout_home2()
{
    if( class_exists('ReduxFramework'))  {
        $footer_layout = renuma_get_opt( 'footer_layout', '2' );
        get_template_part( 'template-parts/footer-layout', $footer_layout );
    } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } 
}

/**
 * Footer layout03
 **/
function renuma_footer_layout_home3()
{
    if( class_exists('ReduxFramework'))  {
        $footer_layout = renuma_get_opt( 'footer_layout', '3' );
        get_template_part( 'template-parts/footer-layout', $footer_layout );
    } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } 
}

/**
 * Footer layout04
 **/
function renuma_footer_layout_home4()
{
    if( class_exists('ReduxFramework'))  {
        $footer_layout = renuma_get_opt( 'footer_layout', '4' );
        get_template_part( 'template-parts/footer-layout', $footer_layout );
    } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } 
}

/**
 * Footer layout05
 **/
function renuma_footer_layout_home5()
{
    if( class_exists('ReduxFramework'))  {
        $footer_layout = renuma_get_opt( 'footer_layout', '5' );
        get_template_part( 'template-parts/footer-layout', $footer_layout );
    } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } 
}

/**
 * Footer layout06
 **/
function renuma_footer_layout_home6()
{
    if( class_exists('ReduxFramework'))  {
        $footer_layout = renuma_get_opt( 'footer_layout', '6' );
        get_template_part( 'template-parts/footer-layout', $footer_layout );
    } else {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } 
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function renuma_body_classes( $classes )
{   

    if (renuma_get_opt( 'sticky_off', false )) {
        $classes[] = 'fixed-header';
    }


    return $classes;
}
add_filter( 'body_class', 'renuma_body_classes' );

/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function renuma_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'renuma_pingback_header' );

/**
 * Single post sidebar position options.
 */
function renuma_primary_class( $pos_sidebar, $extra_class = '' )
{
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $pos_sidebar )
        {
            case 'left':
                $class[] = 'row flex-row-reverse';
                break;

            case 'right':
                $class[] = 'row';
                break;

            default:
                $class[] = 'row justify-content-center';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_html($class) . '"';
        }
    } else {
        echo ' class="row"'; 
    }
}

/**
 * Single post sidebar widgets class.
 */
function renuma_secondary_class( $pos_sidebar, $extra_class = '' )
{

    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $class = array(trim($extra_class));
        switch ($pos_sidebar) {
            case 'left':
                $class[] = 'blog sidebar pe-xl-4';
                break;

            case 'right':
                $class[] = 'blog sidebar ps-xl-4';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_html($class) . '"';
        }
    }
}

// Comment Form
function renuma_theme_comment( $comment, $args, $depth ) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
            <div class="comment-inner">
                <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, 65); ?>
                <div class="comment-box">
                    <h6 class="comment-title">
                        <?php printf( '%s', get_comment_author_link() ); ?>
                    </h6>
                    <div class="comment-info"><?php comment_text(); ?></div>
                    <?php comment_reply_link( array_merge( $args, array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    ) ) ); ?>
                </div>
            </div>
        <?php if ( 'div' != $args['style'] ) : ?>
        </div>
    <?php endif;
}

// Get theme option based on its id.
function renuma_get_opt( $opt_id, $default = false ) {
    $opt_name = renuma_get_opt_name();
    if ( empty( $opt_name ) ) {
        return $default;
    }

    global ${$opt_name};
    if ( ! isset( ${$opt_name} ) || ! isset( ${$opt_name}[ $opt_id ] ) ) {
        $options = get_option( $opt_name );
    } else {
        $options = ${$opt_name};
    }
    if ( ! isset( $options ) || ! isset( $options[ $opt_id ] ) || $options[ $opt_id ] === '' ) {
        return $default;
    }
    if ( is_array( $options[ $opt_id ] ) && is_array( $default ) ) {
        foreach ( $options[ $opt_id ] as $key => $value ) {
            if ( isset( $default[ $key ] ) && $value === '' ) {
                $options[ $opt_id ][ $key ] = $default[ $key ];
            }
        }
    }

    return $options[ $opt_id ];
}

// Get opt_name for Redux Framework options instance args and for getting option value.
function renuma_get_opt_name_default(){
    return apply_filters( 'renuma_opt_name', 'renuma_theme_options' );
}

function renuma_get_opt_name() {
    $opt_name = renuma_get_opt_name_default();
    return $opt_name;
}

// Check if provided color string is valid color. Only supports 'transparent', HEX, RGB, RGBA.
function renuma_is_valid_color( $color ) {
    $color = preg_replace( "/\s+/m", '', $color );

    if ( $color === 'transparent' ) {
        return true;
    }

    if ( '' == $color ) {
        return false;
    }

    // Hex format
    if ( preg_match( "/(?:^#[a-fA-F0-9]{6}$)|(?:^#[a-fA-F0-9]{3}$)/", $color ) ) {
        return true;
    }

    // rgb or rgba format
    if ( preg_match( "/(?:^rgba\(\d+\,\d+\,\d+\,(?:\d*(?:\.\d+)?)\)$)|(?:^rgb\(\d+\,\d+\,\d+\)$)/", $color ) ) {
        preg_match_all( "/\d+\.*\d*/", $color, $matches );
        if ( empty( $matches ) || empty( $matches[0] ) ) {
            return false;
        }

        $red   = empty( $matches[0][0] ) ? $matches[0][0] : 0;
        $green = empty( $matches[0][1] ) ? $matches[0][1] : 0;
        $blue  = empty( $matches[0][2] ) ? $matches[0][2] : 0;
        $alpha = empty( $matches[0][3] ) ? $matches[0][3] : 1;

        if ( $red < 0 || $red > 255 || $green < 0 || $green > 255 || $blue < 0 || $blue > 255 || $alpha < 0 || $alpha > 1.0 ) {
            return false;
        }
    } else {
        return false;
    }

    return true;
}

// Minify css
function renuma_css_minifier( $css ) {
    // Normalize whitespace
    $css = preg_replace( '/\s+/', ' ', $css );
    // Remove spaces before and after comment
    $css = preg_replace( '/(\s+)(\/\*(.*?)\*\/)(\s+)/', '$2', $css );
    // Remove comment blocks, everything between /* and */, unless
    // preserved with /*! ... */ or /** ... */
    $css = preg_replace( '~/\*(?![\!|\*])(.*?)\*/~', '', $css );
    // Remove ; before }
    $css = preg_replace( '/;(?=\s*})/', '', $css );
    // Remove space after , : ; { } */ >
    $css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );
    // Remove space before , ; { } ( ) >
    $css = preg_replace( '/ (,|;|\{|}|\(|\)|>)/', '$1', $css );
    // Strips leading 0 on decimal values (converts 0.5px into .5px)
    $css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );
    // Strips units if value is 0 (converts 0px to 0)
    $css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );
    // Converts all zeros value into short-hand
    $css = preg_replace( '/0 0 0 0/', '0', $css );
    // Shortern 6-character hex color codes to 3-character where possible
    $css = preg_replace( '/#([a-f0-9])\\1([a-f0-9])\\2([a-f0-9])\\3/i', '#\1\2\3', $css );

    return trim( $css );
}
