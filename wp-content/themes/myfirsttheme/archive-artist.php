<?php get_header(); ?>

<h1>archive-artist.php file</h1>


<?php 
  // custom query to fetch our custom events post
  $artists = new WP_Query(array(
    'posts_per_page' => 10,
    'post_type' => 'artist'
  ));

  while($artists->have_posts()) {
    $artists->the_post(); ?>
    <p>
      <a href="<?php the_permalink(); ?>">
        <?php echo upperCase(get_the_title()); ?>
      </a>
    </p>
  
  <?php
  }
?>

<?php get_footer(); ?>