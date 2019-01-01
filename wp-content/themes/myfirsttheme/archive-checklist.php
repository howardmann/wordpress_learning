<?php get_header(); ?>

<h1>archive-checklist.php file</h1>

<div class="row">
  <?php 
    // custom query to fetch our custom checklists post
    $checklists = new WP_Query(array(
      'posts_per_page' => 10,
      'post_type' => 'checklist'
    ));

    while($checklists->have_posts()) {
      $checklists->the_post(); 
      get_template_part('partials/checklist/index', get_post_format()) ;
    }
  ?>
</div>


<?php get_footer(); ?>