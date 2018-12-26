<?php
	// Theme stylesheet.
	wp_enqueue_style( 'style-howie', get_stylesheet_uri() );
  // JS
  wp_enqueue_script( 'script-howie', get_theme_file_uri( '/assets/js/main.js' ));  
  
  // Helper function to be used inside templates
  function upperCase($args){
    return strtoupper($args);
  };

  // Shortcode API function accessible via text within posts
  // accesssed via the shortcode handler e.g. [greeting]
  function sayHello(){
    return 'howdy';
  };

  add_shortcode('greeting', 'sayHello');

  // We can also pass params to our shortcode using the attributes argument $atts
  // We could access this via [greetingName name='Howie']
  // 

  function sayHelloName( $atts ) {
    $name = $atts['name'] ?: 'World'; // ?: operator defaults to 'World' if undefined
    return "Hello $name";
  };

  add_shortcode('greetingName', 'sayHelloName');



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