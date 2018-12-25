<?php 
  // Custom post type, we move this out of the functions.php file in the theme so it is used across all themes
  function event_post_type() {
    register_post_type('event', array(
      'public' => true,
      // by setting has_archive to true we can use the file archive-event.php as our proxy index file for our event custom post type
      // We use rewrite to change the slug of our event custom post type for SEO purposes
      // THis changes the slug for both the archive indexa and the single child event posts
      'has_archive' => true,
      "rewrite" => array("slug" => "new-events"),
      // This sets the labelling on the admin dashboard
      'labels' => array(
        // Check the codex for more options: https://codex.wordpress.org/Function_Reference/register_post_type
        'name' => 'Events',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'all_items' => 'All Events'
      ),
      'menu_icon' => 'dashicons-calendar'
      // Dashicons list can be found here: https://developer.wordpress.org/resource/dashicons/#controls-volumeon
    ));
  };
  add_action('init', 'event_post_type');

?>