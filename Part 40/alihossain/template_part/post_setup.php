          <?php if (have_posts()) :
              while (have_posts()) : the_post(); ?>

              <div class="blog_area" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                  <div class="post_thumb">
                    <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('post-thumbnails'); ?></a>
                  </div>
                  <div class="post_details">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_content(); ?>
                  </div>
              </div>
          <?php endwhile;
            else :
              _e('No post found', 'alihossain');
            endif; ?>