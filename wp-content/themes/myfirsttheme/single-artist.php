<?php get_header(); ?>

<h1>single-artist.php file</h1>

<?php
  while (have_posts()){
   the_post();
   get_template_part('partials/artist/show', get_post_format()) ;
  }
?>

  
<?php get_footer(); ?>
