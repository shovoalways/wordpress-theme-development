<?php
/*
* The template for displaying post
*/ 
get_header(); ?>

  <section id="body_area">
    <div class="container">
      <div class="row">
        <div class="col-md-9 post_page">
            <?php get_template_part('template_part/post_setup', get_post_format() ); ?>

            <div id="comments_area">
              <?php if(comments_open() ) : ?>
                <?php comments_template(); ?>
              <?php endif; ?> 
            </div>
        </div>
        <div class="col-md-3">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>
  </section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 style="color:red">Template: single.php</h3>
        </div>
      </div>
    </div>   
  <?php get_footer(); ?>