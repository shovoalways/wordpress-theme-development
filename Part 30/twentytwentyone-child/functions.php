<?php
function ali_child_theme(){
  wp_enqueue_style('ali-child-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'ali_child_theme', PHP_INT_MAX);


function custom_slider(){
  register_post_type ('slider',
    array(
      'labels' => array(
        'name' => ('Slider'),
        'singular_name' => ('Slider'),
        'add_new' => ('Add New Slider'),
        'add_new_item' => ('Add New Slider'),
        'edit_item' => ('Edit Slider'),
        'new_item' => ('New Slider'),
        'view_item' => ('View Slider'),
        'not_found' => ('Sorry, we cound\'n find the Slider you are looking for.'),
      ),
      'menu_icon' => 'dashicons-format-gallery',
      'public' => true,
      'publicly_queryable' => true,
      'exclude_from_search' => true,
      'menu_position' => 5, 
      'has_archive' => true,
      'hierarchial' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'rewrite' => array('slag' => 'slider'),
      'supports' => array('title', 'thumbnail', 'editor', 'excerpt'),
      )
    );
    add_theme_support('post-thumbnails');
}

add_action('init', 'custom_slider');