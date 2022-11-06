<?php

// Theme Title
add_theme_support('title-tag');

// Theme Check Support 
add_theme_support( 'automatic-feed-links' );
add_theme_support( "wp-block-styles" );
add_theme_support( "responsive-embeds" );
add_theme_support( 'html5', array(
    // Any or all of these.
    'comment-list', 
    'comment-form',
    'search-form',
    'gallery',
    'caption',
) );
add_theme_support( "custom-logo");
add_theme_support( "custom-header");
add_theme_support( "custom-background");
add_theme_support( "align-wide" );
add_editor_style();
the_tags();
// Dummy Register Block Style. 
// Learn More => https://wpblockz.com/tutorial/register-block-styles-in-wordpress/
add_action('init', function() {
	register_block_style('core/cover', [
		'name' => 'my-cover',
		'label' => __('My custom cover', 'alihossain'),
	]);
});
// Dummy Register Block Pattern
// Learn More => https://developer.wordpress.org/reference/functions/register_block_pattern/. 
register_block_pattern(
    'alihossain/my-awesome-pattern',
    array(
        'title'       => __( 'Two buttons', 'alihossain' ),
        'description' => _x( 'Two horizontal buttons, the left button is filled in, and the right button is outlined.', 'Block pattern description', 'alihossain' ),
        'content'     => "<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"backgroundColor\":\"very-dark-gray\",\"borderRadius\":0} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background has-very-dark-gray-background-color no-border-radius\">" . esc_html__( 'Button One', 'alihossain' ) . "</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"very-dark-gray\",\"borderRadius\":0,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color has-very-dark-gray-color no-border-radius\">" . esc_html__( 'Button Two', 'alihossain' ) . "</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->",
    )
);

/**
 * Add .js script if "Enable threaded comments" is activated in Admin
 * Codex: {@link https://developer.wordpress.org/reference/functions/wp_enqueue_script/}
 */
function wpse218049_enqueue_comments_reply() {

    if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
    }
}
add_action(  'wp_enqueue_scripts', 'wpse218049_enqueue_comments_reply' );

// Thumbnil Image Area
add_theme_support( 'post-thumbnails', array('page', 'post', 'service',) );
add_image_size('slider', 1920, 600, true);
add_image_size('service', 390, 250, true);
add_image_size('post-thumbnails', 970, 350, true);

function my_theme_setup(){
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'my_theme_setup');

// Except to 40 Word

function ali_excerpt_more($more){
  global $post;
  return '<br> <br> <a class="redmore" href="'.get_permalink( $post->ID) . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'ali_excerpt_more');

function ali_excerpt_lenght($length){
  return 40;
}
add_filter('excerpt_length', 'ali_excerpt_lenght', 999);


// Pagenav Function
function ali_pagenav(){
  global $wp_query, $wp_rewrite;
  $pages ='';
  $max = $wp_query->max_num_pages;
  if(!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
  $total = 1;
  $args['prev_text'] = 'Prev';
  $args['next_text'] = 'Next';
  if ($max > 1) echo '</pre>
    <div class="wp_pagenav">';
      if ($total == 1 && $max > 1) $pages = '<p class="pages"> Page ' .$current . '<span>of</span>' . $max . '</p>';
      echo $pages . paginate_links($args);
      if ($max > 1 ) echo '</div><pre>';
}
