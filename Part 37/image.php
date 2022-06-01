<?php
/*
* The template for displaying image
*/ 
get_header(); ?>

  <section id="body_area">
    <div class="container">
      <div class="row">
        <div class="col-md-12 post_page">
            <?php get_template_part('template_part/post_setup'); ?>
            <!-- <?php var_export($post); ?> -->
            <!-- <img src="<?php echo $post->guid; ?>" alt="<?php the_title(); ?>"> -->
            <img src="<?php echo esc_url( $post->guid ); ?>" alt="<?php esc_attr( get_the_title() ); ?>">
            <!-- https://developer.wordpress.org/reference/functions/get_allowed_mime_types/ -->
        </div>
      </div>
    </div>
  </section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 style="color:red">Template: image.php</h3>
        </div>
      </div>
    </div>   
  <?php get_footer(); ?>