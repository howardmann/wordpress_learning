<?php get_header(); ?>

<h1>archive-event.php file</h1>


<?php 
  // custom query to fetch our custom events post
  $homepageEvents = new WP_Query(array(
    'posts_per_page' => 10,
    'post_type' => 'event'
  ));

  // You must go into Settings -> Save Changes to rebuild the permalink settings for the new custom post type
  while($homepageEvents->have_posts()) {
    $homepageEvents->the_post(); ?>
    <p>
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
      
    </p>
  
  <?php
  }
?>

<?php get_footer(); ?>