  <h1>Artist show</h1>
  <h2>
    the_title: <?php the_title(); ?>
  </h2>
  <p>
    the_content: <?php the_content(); ?>
  </p>

  <h2>Related Events:</h2>
  <?php 

    $relatedEvents = get_posts(array(
      'post_type' => 'event',
      'meta_query' => array(
        array(
          'key' => 'related_artists',
          'value' => '"' . get_the_ID() . '"',
          'compare' => 'LIKE'
        )
      )
    ));

    
    foreach($relatedEvents as $event) {
      set_query_var( 'event', $event );
      get_template_part('partials/event/related', get_post_format());
    }

?>

