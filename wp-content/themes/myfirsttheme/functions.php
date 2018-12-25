<?php
	// Theme stylesheet.
	wp_enqueue_style( 'style-howie', get_stylesheet_uri() );
  // JS
  wp_enqueue_script( 'script-howie', get_theme_file_uri( '/assets/js/main.js' ));  
  
  // We move this code to a new folder ./mu-plugins/event-post-type.php
  // We do this to protect the content type when the theme is changed
  // Create custom post type
  // function event_post_type() {
  //   register_post_type('event', array(
  //     'public' => true,
  //     'labels' => array(
  //       'name' => 'Events'
  //     ),
  //     'menu_icon' => 'dashicons-calendar'
  //     // Dashicons list can be found here: https://developer.wordpress.org/resource/dashicons/#controls-volumeon
  //   ));
  // };
  // add_action('init', 'event_post_type')
?>