<?php get_header(); ?>
<!-- This file is called from a single custom event post -->

<h1>single-event.php file</h1>

<?php
  while (have_posts()){
   the_post();
   get_template_part('partials/event/show', get_post_format()) ;
  }
?>

  
<?php get_footer(); ?>
