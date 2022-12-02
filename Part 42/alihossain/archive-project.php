<?php
/*
* The template for displaying Projects Pages
*/ 
get_header(); ?>

  <section id="body_area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <div id="archive_title">
              <h1 class="title">All Projects</h1>
            </div>

        </div>
        <?php get_template_part('template_part/project-child'); ?>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>