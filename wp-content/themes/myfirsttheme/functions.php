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

  // Separate your functions into modular functions for control
  require_once( __DIR__ . '/includes/render-checklists.php');

?>