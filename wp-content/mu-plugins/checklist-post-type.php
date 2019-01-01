<?php 
  // Custom post type, we move this out of the functions.php file in the theme so it is used across all themes
  function checklist_post_type() {
    register_post_type('checklist', array(
      'public' => true,
      'has_archive' => true,
      "rewrite" => array("slug" => "checklists"),
      'labels' => array(
        // Check the codex for more options: https://codex.wordpress.org/Function_Reference/register_post_type
        'name' => 'Checklists',
        'add_new_item' => 'Add New Checklist',
        'edit_item' => 'Edit Checklist',
        'all_items' => 'All Checklists'
      ),
      'menu_icon' => 'dashicons-welcome-write-blog'
      // Dashicons list can be found here: https://developer.wordpress.org/resource/dashicons/#controls-volumeon
    ));
  };
  add_theme_support('post-thumbnails');
  add_post_type_support( 'checklist', 'thumbnail' );      
  add_action('init', 'checklist_post_type');

?>