<?php
/*
* This template for displaying the header
*/
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>" class="no-js">
<head>
  <meta charset="<?php bloginfo('charset') ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo get_template_directory_uri(); ?>/test.css">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="header_area" class="<?php echo get_theme_mod('ali_menu_position'); ?>">
    <div id="notice">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>Some notifications</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_mod('ali_logo'); ?>" alt=""></a>
        </div>
        <div class="col-md-9">
          <?php wp_nav_menu( array('theme_location' => 'main_menu', 'menu_id' => 'nav') ); ?>
        </div>
      </div>
    </div>
  </header>