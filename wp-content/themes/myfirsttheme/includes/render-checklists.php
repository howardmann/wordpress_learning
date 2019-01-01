<?php 

  function renderChecklists() {
    $checklists = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'checklist'
    ));

    while($checklists->have_posts()) {
      $checklists->the_post(); 
      get_template_part('partials/checklist/index', get_post_format()) ;
    }
  }

  add_shortcode('renderChecklists', 'renderChecklists');

?>