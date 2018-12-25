<?php get_header(); ?>
<!-- This file is called from a single custom event post -->

<h1>single-event.php file</h1>

<?php
  while (have_posts()){
   the_post();
  ?>

  <h1>Event show</h1>
  <h2>
    the_title: <?php the_title(); ?>
  </h2>
  <p>
    the_content: <?php the_content(); ?>
  </p>
  <p>
    event_date: <?php the_field('event_date'); ?>
  </p>

  <?php
  }
?>

  
<?php get_footer(); ?>
