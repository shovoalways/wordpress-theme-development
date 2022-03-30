<?php
// Wordpress Shordcode
function basic_shortcoder(){
  return "Ali is a web developer";
}
add_shortcode( 'ali', 'basic_shortcoder');

// Button Shortcode
function button_shortcode( $atts, $content = null ){
  $values = shortcode_atts( array (
    'url' => '#',
  ), $atts );
  return '<a class="button" href="'.esc_attr($values['url']) .'">' . $content . '</a>';
}
add_shortcode( 'button', 'button_shortcode');

// Shortcode & Custom Post
function service_shotcode( $atts ) {
  ob_start();
  $query = new WP_Query( array(
    'post_type' => 'service',
    'posts_per_page' => 3,
    'order' => 'ASC',
    'orderby' => 'title',
  ));
  if ( $query -> have_posts()) { ?>

  <section id="service_area">
    <div class="container">
      <div class="row">
        <?php while ( $query -> have_posts () ) : $query->the_post(); ?>
        <div class="col-md-4">
          <div class="child_service">
          <h2><?php the_title(); ?></h2>
          <?php echo the_post_thumbnail('service') ?>
          <?php the_excerpt(  ); ?>
          </div>
        </div>

        <?php  endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  
    <?php $myvariable = ob_get_clean();
    return $myvariable;
  }
}
add_shortcode( 'service', 'service_shotcode');