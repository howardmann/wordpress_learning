<?php 
  function artist_post_type() {
    register_post_type('artist', array(
      'public' => true,
      'has_archive' => true,
      "rewrite" => array("slug" => "artists"),
      'labels' => array(
        'name' => 'Artist',
        'add_new_item' => 'Add New Artist',
        'edit_item' => 'Edit Artist',
        'all_items' => 'All Artists'
      ),
      'menu_icon' => 'dashicons-star-filled'
    ));
  };
  add_action('init', 'artist_post_type');

?>