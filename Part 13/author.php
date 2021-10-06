<?php
/*
* The main template file
*/ 
get_header(); ?>

<h1>this is author tamplate</h1>
  <section id="body_area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>