<?php 
namespace WLElementor\Helper;

// BDT Position
function element_pack_position() {
    $position_options = [
        ''              => esc_html__('Default', 'wl-elementor'),
        'top-left'      => esc_html__('Top Left', 'wl-elementor') ,
        'top-center'    => esc_html__('Top Center', 'wl-elementor') ,
        'top-right'     => esc_html__('Top Right', 'wl-elementor') ,
        'center'        => esc_html__('Center', 'wl-elementor') ,
        'center-left'   => esc_html__('Center Left', 'wl-elementor') ,
        'center-right'  => esc_html__('Center Right', 'wl-elementor') ,
        'bottom-left'   => esc_html__('Bottom Left', 'wl-elementor') ,
        'bottom-center' => esc_html__('Bottom Center', 'wl-elementor') ,
        'bottom-right'  => esc_html__('Bottom Right', 'wl-elementor') ,
    ];

    return $position_options;
}