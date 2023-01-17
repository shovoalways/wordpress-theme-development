<?php
function ali_add_theme_page(){
  // add_menu_page( 
  //   'Theme Option for Admin', // $page_title:string, 
  //   'Theme Option', // $menu_title:string, 
  //   'manage_options', // $capability:string, 
  //   'ali_theme_option', // $menu_slug:string, 
  //   'ali_theme_create_page', // $callback:callable, 
  //   'dashicons-visibility', // $icon_url:string, 
  //   101,// $position:integer|float|null 
  // );
  add_menu_page('Theme Option for Admin', 'Theme Option', 'manage_options', 'ali_theme_option', 'ali_theme_create_page', get_template_directory_uri(). '/img/mini-logo.png', 101);
}
add_action( 'admin_menu', 'ali_add_theme_page');

function ali_theme_create_page(){
  // Generating Theme option
  echo "<h1>Theme Option</h1>";
  bloginfo( 'name' );
}