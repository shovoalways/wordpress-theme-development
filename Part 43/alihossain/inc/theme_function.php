<?php

function ali_customizar_register($wp_customize){

  //Header Area Function
  $wp_customize->add_section('ali_header_area', array(
    'title' =>__('Header Area', 'alihossain'),
    'description' => 'If you interested to update your header area, you can do it here.'
  ));

  $wp_customize->add_setting('ali_logo', array(
    'default' => get_template_directory_uri() . '/img/logo.png',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'ali_logo', array(
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo you can do it.',
    'setting' => 'ali_logo',
    'section' => 'ali_header_area',
  ) ));

  // Menu Position Option
  $wp_customize->add_section('ali_menu_option', array(
    'title' => __('Menu Position Option', 'alihossain'),
    'description' => 'If you interested to change your menu position you can do it.',
  ));

  $wp_customize->add_setting('ali_menu_position', array(
    'default' => 'right_menu',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize-> add_control('ali_menu_position', array(
    'label' => 'Menu Position',
    'description' => 'Select your menu position',
    'setting' => 'ali_menu_position',
    'section' => 'ali_menu_option',
    'type' => 'radio',
    'choices' => array(
      'left_menu' => 'Left Menu',
      'right_menu' => 'Right Menu',
      'center_menu' => 'Center Menu',
    ),
  ));


  // Footer Option
  $wp_customize->add_section('ali_footer_option', array(
    'title' => __('Footer Option', 'alihossain'),
    'description' => 'If you interested to change or update your footer settings you can do it.'
  ));

  $wp_customize->add_setting('ali_copyright_section', array(
    'default' => 'Copyright 2021 | Procoder BD',
    'sanitize_callback' => 'sanitize_text_field',
  ));


  $wp_customize-> add_control('ali_copyright_section', array(
    'label' => 'Copyright Text',
    'description' => 'If need you can update your copyright text from here',
    'setting' => 'ali_copyright_section',
    'section' => 'ali_footer_option',
  ));

  // Theme Color
  $wp_customize-> add_section('ali_colors', array(
    'title' => __('Theme Color', 'alihossain'),
    'description' => 'If need you can change your theme color.',
  ));

  $wp_customize ->add_setting('ali_bg_color', array(
    'default' => '#ffffff',
  ));
  $wp_customize->add_control( new WP_Customize_color_control($wp_customize, 'ali_bg_color', array(
    'label' => 'Background Color',
    'section' => 'ali_colors',
    'settings' => 'ali_bg_color',
  )));
  $wp_customize ->add_setting('ali_primary_color', array(
    'default' => '#ea1a70',
  ));
  $wp_customize->add_control( new WP_Customize_color_control($wp_customize, 'ali_primary_color', array(
    'label' => 'Primary Color',
    'section' => 'ali_colors',
    'settings' => 'ali_primary_color',
  )));

  // Theme custom login page
  $wp_customize-> add_section('custom_login', array(
    'title' => __('Custom Login', 'alihossain'),
    'description' => 'If need you can change your theme custom login info.',
  ));

  $wp_customize->add_setting('custom_login_logo', array(
    'default' => get_template_directory_uri() . '/img/logo-sm.png',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'custom_login_logo', array(
    'label' => 'Logo Upload',
    'description' => 'If you interested to change or update your logo you can do it.',
    'setting' => 'custom_login_logo',
    'section' => 'custom_login',
  ) ));

  $wp_customize->add_setting('custom_login_bg', array(
    'default' => get_template_directory_uri() . '/img/login.jpg',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize-> add_control(new WP_Customize_Image_Control($wp_customize, 'custom_login_bg', array(
    'label' => 'Background Upload',
    'description' => 'If you interested to change or update your background image you can do it.',
    'setting' => 'custom_login_bg',
    'section' => 'custom_login',
  ) ));
  $wp_customize ->add_setting('custom_primary_color', array(
    'default' => '#ea1a70',
  ));
  $wp_customize->add_control( new WP_Customize_color_control($wp_customize, 'custom_primary_color', array(
    'label' => 'Primary Color',
    'section' => 'custom_login',
    'settings' => 'custom_primary_color',
  )));
}

add_action('customize_register', 'ali_customizar_register');


// Theme Primary Color
function ali_theme_color_cus(){
  ?>
  <style>
    body{background: <?php print get_theme_mod("ali_bg_color"); ?>}
    :root{ --pink:<?php print get_theme_mod("ali_primary_color"); ?>}
  </style>
  <?php 
}
add_action('wp_head', 'ali_theme_color_cus');



// Theme Custom Login page Style
function custom_color_login(){
  ?>
  <style>
    #login h1 a, .login h1 a{
      background-image: url(<?php print get_theme_mod("custom_login_logo"); ?>) !important;
    }

    body.login {
      background: url(<?php print get_theme_mod("custom_login_bg"); ?>) !important;
    }

    #login form p.submit input {
      background: <?php print get_theme_mod("custom_primary_color"); ?>  !important;
    }  
    .login #login_error,
    .login .message,
    .login .success {
      border-left: 4px solid <?php print get_theme_mod("custom_primary_color"); ?>  !important;
    }
    input#user_login,
    input#user_pass {
      border-left: 4px solid <?php print get_theme_mod("custom_primary_color"); ?>  !important;
    }  
  </style>
  <?php 
}
add_action('login_enqueue_scripts', 'custom_color_login');

