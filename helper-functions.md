# Helper Functions

## Basic functions
Create helper functions inside the `functions.php` file which will enable you to access these helper functions across all php files (primarily templates).

```php
// functions.php

<?php
  // Helper function to be used inside templates
  // Note this only returns the value, therefore we must echo
  function getUpperCase($args){
    return strtoupper($args);
  };
?>
```

We then can access this in other files
```php
// themes/myfirsttheme/front-page.php

<?php get_header(); ?>

<h1>front-page.php file</h1>

<p>This is the static <?php echo getUpperCase('home page') ?></p>
<p><a href="/blog">View all posts</a></p>
<p><a href="/new-events">View all events</a></p>


<?php get_footer(); ?>
```

## Loading stylesheet and scripts
All WP sites will use the functions.php file to load our scripts and stylesheets; this is boilerplate:
```php
// functions.php
<?php
	// Theme stylesheet.
	wp_enqueue_style( 'style-howie', get_stylesheet_uri() );
  // JS
  wp_enqueue_script( 'script-howie', get_theme_file_uri( '/assets/js/main.js' ));    
?>
```

## Shortcode functions
The ShortCode API allows us to create functions which can be accessible within the text of posts. This is handy because it means we can access complicated and dynamic data without the need to deploy changes to code or templates.

We use the WP helper function `add_shortcode('function-name-in-post-text', 'function-name)`.

We can also create ShortCode helper functions that can take params. To do that we must use the attributes arg `$atts` and access properties this way. e.g. this can be accessed via post text the following way: `[greetingName name="Howie"]`.

```php
<?php
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
?>
```