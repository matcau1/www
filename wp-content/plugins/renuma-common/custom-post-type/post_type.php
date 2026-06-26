<?php

// register post type Service

add_action( 'init', 'register_renuma_Service' );

function register_renuma_Service() {

    

    $labels = array( 

        'name' => __( 'Service', 'renuma' ),

        'singular_name' => __( 'Service', 'renuma' ),

        'add_new' => __( 'Add New Service', 'renuma' ),

        'add_new_item' => __( 'Add New Service', 'renuma' ),

        'edit_item' => __( 'Edit Service', 'renuma' ),

        'new_item' => __( 'New Service', 'renuma' ),

        'view_item' => __( 'View Service', 'renuma' ),

        'search_items' => __( 'Search Service', 'renuma' ),

        'not_found' => __( 'No Service found', 'renuma' ),

        'not_found_in_trash' => __( 'No Service found in Trash', 'renuma' ),

        'parent_item_colon' => __( 'Parent Service:', 'renuma' ),

        'menu_name' => __( 'Service', 'renuma' ),

    );



    $args = array( 

        'labels' => $labels,

        'hierarchical' => true,

        'description' => 'List Service',

        'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),

        'taxonomies' => array( 'Service', 'type' ),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'menu_position' => 5,

        'menu_icon' => 'dashicons-layout', 

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,

        'exclude_from_search' => false,

        'has_archive' => true,

        'query_var' => true,

        'can_export' => true,

        'rewrite' => true,

        'capability_type' => 'post'

    );



    register_post_type( 'Service', $args );

}

add_action( 'init', 'create_Type_hierarchical_taxonomy', 0 );



//create a custom taxonomy name it Skillss for your posts



function create_Type_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical like Skills

//first do the translations part for GUI



  $labels = array(

    'name' => __( 'Type', 'renuma' ),

    'singular_name' => __( 'Type', 'renuma' ),

    'search_items' =>  __( 'Search Type','renuma' ),

    'all_items' => __( 'All Type','renuma' ),

    'parent_item' => __( 'Parent Type','renuma' ),

    'parent_item_colon' => __( 'Parent Type:','renuma' ),

    'edit_item' => __( 'Edit Type','renuma' ), 

    'update_item' => __( 'Update Type','renuma' ),

    'add_new_item' => __( 'Add New Type','renuma' ),

    'new_item_name' => __( 'New Type Name','renuma' ),

    'menu_name' => __( 'Type','renuma' ),

  );     



// Now register the taxonomy



  register_taxonomy('type',array('Service'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'type' ),

  ));



}


// register post type2 Project

add_action( 'init', 'register_renuma_Project' );

function register_renuma_Project() {

    

    $labels = array( 

        'name' => __( 'Project', 'renuma' ),

        'singular_name' => __( 'Project', 'renuma' ),

        'add_new' => __( 'Add New Project', 'renuma' ),

        'add_new_item' => __( 'Add New Project', 'renuma' ),

        'edit_item' => __( 'Edit Project', 'renuma' ),

        'new_item' => __( 'New Project', 'renuma' ),

        'view_item' => __( 'View Project', 'renuma' ),

        'search_items' => __( 'Search Project', 'renuma' ),

        'not_found' => __( 'No Project found', 'renuma' ),

        'not_found_in_trash' => __( 'No Project found in Trash', 'renuma' ),

        'parent_item_colon' => __( 'Parent Project:', 'renuma' ),

        'menu_name' => __( 'Project', 'renuma' ),

    );



    $args = array( 

        'labels' => $labels,

        'hierarchical' => true,

        'description' => 'List Project',

        'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),

        'taxonomies' => array( 'Project', 'type2' ),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'menu_position' => 5,

        'menu_icon' => 'dashicons-flag', 

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,

        'exclude_from_search' => false,

        'has_archive' => true,

        'query_var' => true,

        'can_export' => true,

        'rewrite' => true,

        'capability_type' => 'post'

    );



    register_post_type( 'Project', $args );

}

add_action( 'init', 'create_type2_hierarchical_taxonomy', 0 );


//create a custom taxonomy name it Skillss for your posts



function create_type2_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical like Skills

//first do the translations part for GUI



  $labels = array(

    'name' => __( 'Type', 'renuma' ),

    'singular_name' => __( 'Type', 'renuma' ),

    'search_items' =>  __( 'Search Type','renuma' ),

    'all_items' => __( 'All Type','renuma' ),

    'parent_item' => __( 'Parent Type','renuma' ),

    'parent_item_colon' => __( 'Parent Type:','renuma' ),

    'edit_item' => __( 'Edit Type','renuma' ), 

    'update_item' => __( 'Update Type','renuma' ),

    'add_new_item' => __( 'Add New Type','renuma' ),

    'new_item_name' => __( 'New Type Name','renuma' ),

    'menu_name' => __( 'Type','renuma' ),

  );     



// Now register the taxonomy

  register_taxonomy('type2',array('Project'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'type2' ),

  ));



}

// register post type Team

add_action( 'init', 'register_renuma_Team' );

function register_renuma_Team() {

    

    $labels = array( 

        'name' => __( 'Team', 'renuma' ),

        'singular_name' => __( 'Team', 'renuma' ),

        'add_new' => __( 'Add New Team', 'renuma' ),

        'add_new_item' => __( 'Add New Team', 'renuma' ),

        'edit_item' => __( 'Edit Team', 'renuma' ),

        'new_item' => __( 'New Team', 'renuma' ),

        'view_item' => __( 'View Team', 'renuma' ),

        'search_items' => __( 'Search Team', 'renuma' ),

        'not_found' => __( 'No Team found', 'renuma' ),

        'not_found_in_trash' => __( 'No Team found in Trash', 'renuma' ),

        'parent_item_colon' => __( 'Parent Team:', 'renuma' ),

        'menu_name' => __( 'Team', 'renuma' ),

    );



    $args = array( 

        'labels' => $labels,

        'hierarchical' => true,

        'description' => 'List Team',

        'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'menu_position' => 5,

        'menu_icon' => 'dashicons-groups', 

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,

        'exclude_from_search' => false,

        'has_archive' => true,

        'query_var' => true,

        'can_export' => true,

        'rewrite' => true,

        'capability_type' => 'post'

    );



    register_post_type( 'Team', $args );

}

add_action( 'init', 'create_Type3_hierarchical_taxonomy', 0 );



//create a custom taxonomy name it Skillss for your posts



function create_Type3_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical like Skills

//first do the translations part for GUI



  $labels = array(

    'name' => __( 'Type', 'renuma' ),

    'singular_name' => __( 'Type', 'renuma' ),

    'search_items' =>  __( 'Search Type','renuma' ),

    'all_items' => __( 'All Type','renuma' ),

    'parent_item' => __( 'Parent Type','renuma' ),

    'parent_item_colon' => __( 'Parent Type:','renuma' ),

    'edit_item' => __( 'Edit Type','renuma' ), 

    'update_item' => __( 'Update Type','renuma' ),

    'add_new_item' => __( 'Add New Type','renuma' ),

    'new_item_name' => __( 'New Type Name','renuma' ),

    'menu_name' => __( 'Type','renuma' ),

  );     



// Now register the taxonomy



  register_taxonomy('type3',array('Team'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'type3' ),

  ));

}






// register post type Footer

add_action( 'init', 'register_renuma_Footer' );

function register_renuma_Footer() {

  
    $labels = array( 

        'name' => __( 'Footer', 'renuma' ),

        'singular_name' => __( 'Footer', 'renuma' ),

        'add_new' => __( 'Add New Footer', 'renuma' ),

        'add_new_item' => __( 'Add New Footer', 'renuma' ),

        'edit_item' => __( 'Edit Footer', 'renuma' ),

        'new_item' => __( 'New Footer', 'renuma' ),

        'view_item' => __( 'View Footer', 'renuma' ),

        'search_items' => __( 'Search Footer', 'renuma' ),

        'not_found' => __( 'No Footer found', 'renuma' ),

        'not_found_in_trash' => __( 'No Footer found in Trash', 'renuma' ),

        'parent_item_colon' => __( 'Parent Footer:', 'renuma' ),

        'menu_name' => __( 'Footers', 'renuma' ),

    );



    $args = array( 

        'labels' => $labels,

        'hierarchical' => true,

        'description' => 'List Footer',

        'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),

        'public' => true,

        'show_ui' => true,

        'show_in_menu' => true,

        'menu_position' => 5,

        'menu_icon' => 'dashicons-menu', 

        'show_in_nav_menus' => true,

        'publicly_queryable' => true,

        'exclude_from_search' => false,

        'has_archive' => true,

        'query_var' => true,

        'can_export' => true,

        'rewrite' => true,

        'capability_type' => 'post'

    );



    register_post_type( 'Footer', $args );

}

add_action( 'init', 'create_Type4_hierarchical_taxonomy', 0 );



//create a custom taxonomy name it Skillss for your posts



function create_Type4_hierarchical_taxonomy() {



// Add new taxonomy, make it hierarchical like Skills

//first do the translations part for GUI



  $labels = array(

    'name' => __( 'Type', 'renuma' ),

    'singular_name' => __( 'Type', 'renuma' ),

    'search_items' =>  __( 'Search Type','renuma' ),

    'all_items' => __( 'All Type','renuma' ),

    'parent_item' => __( 'Parent Type','renuma' ),

    'parent_item_colon' => __( 'Parent Type:','renuma' ),

    'edit_item' => __( 'Edit Type','renuma' ), 

    'update_item' => __( 'Update Type','renuma' ),

    'add_new_item' => __( 'Add New Type','renuma' ),

    'new_item_name' => __( 'New Type Name','renuma' ),

    'menu_name' => __( 'Type','renuma' ),

  );     


// Now register the taxonomy

  register_taxonomy('type4',array('Footer'), array(

    'hierarchical' => true,

    'labels' => $labels,

    'show_ui' => true,

    'show_admin_column' => true,

    'query_var' => true,

    'rewrite' => array( 'slug' => 'type4' ),

  ));

}



?>