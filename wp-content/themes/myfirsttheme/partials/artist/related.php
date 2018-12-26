  <h2>
    the_title: <?php echo get_the_title($artist); ?>
  </h2>
  <p>
    the_content: <?php echo get_post_field('post_content', $artist); ?>
  </p>
  <p>
    permalink: <a href="<?php echo get_the_permalink($artist); ?>">link</a>
  </p>

  