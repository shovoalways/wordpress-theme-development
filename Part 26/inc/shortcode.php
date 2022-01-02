<?php
// Wordpress Shordcode
function basic_shortcoder(){
  return "Ali is a web developer";
}
add_shortcode( 'ali', 'basic_shortcoder');


function button_shortcode( $atts, $content = null ){
  $values = shortcode_atts( array (
    'url' => '#',
  ), $atts );
  return '<a class="button" href="'.esc_attr($values['url']) .'">' . $content . '</a>';
}
add_shortcode( 'button', 'button_shortcode');