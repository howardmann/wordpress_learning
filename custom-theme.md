# Custom Theme

A theme is where you include all your stylesheets, script files, templates and functions. Here is an example boilerplate for creating your own theme. Once your theme has been created you will need to go into the WP dashboard, select Appearance and activate your custom theme.
```bash
myfirsttheme
  L index.php // root template page that will be rendered (naming important)
  L single.php // template for a single post (naming important)
  L header.php // header template and will include our outer html (naming important)
  L footer.php // footer template that includes boilerplate (naming important)
  L partials // includes reusable partial templates, naming not important
    L navigation.php
  L functions.php // loads our css and js as well as all global reusable functions
  L style.css // main css file
  L assets // js folder
    L js
      L main.js
```

Our index.php file
```php
// myfirsttheme/index.php
<?php get_header(); ?>
<!-- This file is called from the root -->
<h1>index.php file</h1>

<?php get_footer(); ?>
```

Our header.php file which gets called with WP helper function `get_header();`. 
```php
// myfirsttheme/header.php
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>My First Theme</title>
  
  <!-- Renders the WP admin dashboard navbar -->
  <?php wp_head(); ?>

</head>
<body>
<?php get_template_part('partials/navigation') ?>
```

Our footer.php file which gets called with WP helper function `get_footer();`. Important to include the `wp_footer();` boilerplate function for the WP navbar strip in the header to work
```php
// myfirsttheme/footer.php
<footer>
  Footer here
</footer>
<?php wp_footer(); ?>
</body>
</html>
```

We use the functions.php file to load our stylesheets and script assets.
```php
// myfirsttheme/functions.php
<?php
	// Theme stylesheet.
	wp_enqueue_style( 'style-howie', get_stylesheet_uri() );
  // JS
  wp_enqueue_script( 'script-howie', get_theme_file_uri( '/assets/js/main.js' ));  
?>
```