<?php
 
/* Removes the "shop" title on the main shop page */
function renuma_hide_page_title()
{
    return false;
}
add_filter('woocommerce_show_page_title', 'renuma_hide_page_title');

/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'renuma_custom_sale_text', 10, 3);
function renuma_custom_sale_text($text, $post, $_product)
{
	$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);

	$product_sale = '';
	if(!empty($sale_price)) {
		$product_sale = intval( ( (intval($regular_price) - intval($sale_price)) / intval($regular_price) ) * 100);
		return '<span class="onsale">' .$product_sale. '%</span>';
	}
}

/* Show product per page */
function renuma_loop_shop_per_page(){
	$product_per_page = renuma_get_opt( 'product_per_page', '12' );

	if(isset($_REQUEST['loop_shop_per_page']) && !empty($_REQUEST['loop_shop_per_page'])) {
		return $_REQUEST['loop_shop_per_page'];
	} else {
		return $product_per_page;
	}
}
add_filter( 'loop_shop_per_page', 'renuma_loop_shop_per_page' );

/* Implementation of the WooCommerce Mini Cart Count. */
add_filter( 'woocommerce_add_to_cart_fragments', 'refresh_cart_count', 50, 1 );
function refresh_cart_count( $fragments ){
    ob_start();
    ?>
    <span class="counter" id="cart-count"><?php
    $cart_count = WC()->cart->get_cart_contents_count();
    echo sprintf ( _n( '%d', '%d', $cart_count, 'renuma' ), $cart_count );
    ?></span>
    <?php
     $fragments['#cart-count'] = ob_get_clean();

    return $fragments;
}

/**
 * Modify image width theme support.
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    $size['width'] = 250;
    $size['height'] = 285;
    $size['crop'] = 1;
    return $size;
});

