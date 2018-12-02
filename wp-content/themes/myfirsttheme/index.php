<?php get_header(); ?>
<!-- This file is called from the root -->
<h1>index.php file</h1>

<?php
  get_template_part('partials/post/index', get_posts());
  // /* This is the WP built-in while loop, it checks DB for posts and then calls the_post() to iterate */
  // while (have_posts()){
  //  the_post();
  //   /* WP function to call a template per file location. Call get_post_format to pass data to the template */
  //  get_template_part('partials/post', get_post_format()) ;
  // }
?>

<?php get_footer(); ?>