<?php get_header(); ?>
<!-- This file is called from a single post -->

<h1>single.php file</h1>

<?php
  while (have_posts()){
   the_post();
    /* We call single post to load if there exists only a single post */
   get_template_part('partials/post/show', get_post_format()) ;
  }
?>

  
<?php get_footer(); ?>
