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

<h2>Related Artists</h2>
<?php 
  $relatedArtists = get_field('related_artists');
  if ($relatedArtists) {
    foreach($relatedArtists as $artist) {
      // Sets the variable $artist which can be accessible later in the template 
      set_query_var( 'artist', $artist );
      get_template_part('partials/artist/related', get_post_format());
    };
  }
?>
