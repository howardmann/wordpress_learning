<?php get_header(); ?>

<!-- This file is called from the root -->

<h1>page.php file</h1>

<?php
  while (have_posts()){
    the_post();
    get_template_part('partials/page/content', get_post_format());
  }
?>

<?php get_footer(); ?>