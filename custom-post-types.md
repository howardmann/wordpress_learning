# WORDPRESS TIPS

## Custom Post Types
Wordpress comes with two default post types: 
- Posts (which are default blogs); and 
- Pages (which are standalone pages which can be added)

However, more often than not you will want to create your own custom post type and templates e.g. events, news & announcements, topics, learning guides etc.

Key steps to creating a custom post type
1. [Register a new post type](#1.-register-new-post)
2. [Create sample custom post data](#2.-create-sample-data)
3. [Create two new files: one for index (archive-custom.php) and one for show (single-custom.php)](#3.-create-templates)
4. [Display custom post data using custom WP query](#4.-custom-query)
5. [Refresh permalinks](#5.-refresh-permalinks)
6. [Create custom fields](#6.-advanced-custom-fields)

In our examples we will be creating an `event` custom post type.
## 1. Register New Post
Create a new folder in the wp-content root directory named `mu-plugins`(this naming is important) and a file named `event-post-type.php`(naming not important). This folder stands for Must Use Plugins and operates just like the functions.php file. Functions that should work independent of a specific theme should be put in this folder, otherwise if a new theme is chosen it will not run this function.

Create a custom function `event_post_type` which calls the WP helper function `register_post_type('custom_post_name', $args)`. The major impact of the args are to:
- Changes the labelling of the custom post type in our dashboard view
- Enables us to create an index file for our custom post (we set that as `has_archive => true` and access that via the file `archive-event.php`. Note: logically this should be `index-event.php` but WP doesn't do it this way)
- Change our url slug for SEO purposes

We then call our function after WP has initialized: `add_action('init', event_post_type()) `.

```php
// wp-content/mu-plugins/event-post-type.php
<?php 
  // Custom post type, we move this out of the functions.php file in the theme so it is used across all themes
  function event_post_type() {
    register_post_type('event', array(
      'public' => true,
      // This sets the labelling on the admin dashboard
      'labels' => array(
        // Check the codex for more options: https://codex.wordpress.org/Function_Reference/register_post_type
        'name' => 'Events',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'all_items' => 'All Events'
      ),
      'menu_icon' => 'dashicons-calendar'
      // by setting has_archive to true we can use the file archive-event.php as our proxy index file for our event custom post type
      // We use rewrite to change the slug of our event custom post type for SEO purposes
      // THis changes the slug for both the archive indexa and the single child event posts
      'has_archive' => true,
      "rewrite" => array("slug" => "new-events"),
      // Dashicons list can be found here: https://developer.wordpress.org/resource/dashicons/#controls-volumeon
    ));
  };

  add_action('init', 'event_post_type');
?>
```

## 2. Create Sample Data
Go into the WP dashboard and you should now see your custom post type. Create a set of sample events.

## 3. Create Templates
To create our index page for our custom event post type we will create a new file in our theme named `archive-event.php`. The naming of this is important. This template will be displayed when a user visits our custom post type page `domain.com/new-events`. In step 1 re-wrote our slug for SEO purposes. If we didn't rewrite it then it would default to our custom post type name which was registered as event i.e. `domain.com/event`.

To create our template page for our single event page we create a new file named `single-event.php`. Again the naming is important.

## 4. Custom Query
In our `archive-event.php` file which will be called via the route `domain.com/new-events` we will write the code for our index page for our custom post.

We will use the WP custom query helper to call our DB for our sample data. In this example we use a basic WP_Query to fetch the top 10 results for the post_type `event`. We then loop through the results, calling the helper function `have_posts()` from our queried results and render the permalink and title.

```php
// wp-content/themes/myfirsttheme/archive.event.php
<?php get_header(); ?>

<?php 
  // custom query to fetch our custom events post
  $homepageEvents = new WP_Query(array(
    'posts_per_page' => 10,
    'post_type' => 'event'
  ));

  // You must go into Settings -> Save Changes to rebuild the permalink settings for the new custom post type
  while($homepageEvents->have_posts()) {
    $homepageEvents->the_post(); ?>
    <p>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
      
    </p>
  
  <?php
  }
?>

<?php get_footer(); ?>

```

In our `single-event.php` file we still have to call the while loop to fetch the single post.

```php

<?php get_header(); ?>
<!-- This file is called from a single custom event post -->

<h1>single-event.php file</h1>

<?php
  while (have_posts()){
   the_post();
  ?>

  <h1>Event show</h1>
  <h2>
    the_title: <?php the_title(); ?>
  </h2>
  <p>
    the_content: <?php the_content(); ?>
  </p>
  <p>
    event_date: <?php the_field('event_date'); ?>
  </p>

  <?php
  }
?>

  
<?php get_footer(); ?>

```

## 5. Refresh Permalinks
We need to go into WP dashboard settings and rebuild the permalinks to ensure the changes are displayed correctly. Go into Settings -> Permalinks -> Save Changes.

## 6. Advanced Custom Fields
We will almost always want the ability to add our own custom fields beyond the default content and title for our posts.

Install the plugin "Advanced Custom Fields". Go to Plugins -> Add New -> Search "Advanced Custom Fields" -> Install & Activate.

Go into Custom Fields in the dashboard. Click Add New -> Enter Name -> And follow instructions.

The Label is what will be displayed on the dashboard (e.g. `Event Date`) and the name is what we call in the code to display (e.g. `event_date`).

The most important field is the Location, remember to set this to the relevant post type. In our example it is Post Type is equal to Events.

Once added you can now go and edit the sample event data and you will see the new custom field. Update the data.

To display the field you will go back into your `archive-event.php` or `single-event.php` file and call the following helper functions:

```php
// To display a custom value from the current post
<p> the_field('event_date') </p>

// To check if a current value exists
<p>
<?php 
    if(get_field('event_date')){
      return the_field('event_date');
    } else {
      echo 'not set yet';
    }
  ?>
</p>
```
[Refer to ACF documentation for further information](https://www.advancedcustomfields.com/resources/the_field/)