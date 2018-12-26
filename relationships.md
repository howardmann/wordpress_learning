# Relationships

## Objective
We will create a new custom post type named `artist` which we will associate with our previously created custom post type `event`. We will associate the event with one or more artists using the ACF plugin. Then we will display the associated artists for a given event and similarly display the associated events of a given artist.

Key Steps:
1. [Register a new `artist` custom post type](#1.-create-artist)
2. [Create a new custom field associated with `events`](#2.-create-relationship)
3. [Display `related arists` relationship from `events`](#3.-display-relationship)
4. [Display reverse query relationship `events` from `artists`](#4-display-reverse-relationship)

## 1. Create Artist
Register a new post type in the must use plugins folder and create sample artist data.
```php
// wp-content/mu-plugins/artist-post-type.php

<?php 
  function artist_post_type() {
    register_post_type('artist', array(
      'public' => true,
      'has_archive' => true,
      "rewrite" => array("slug" => "artists"),
      'labels' => array(
        'name' => 'Artist',
        'add_new_item' => 'Add New Artist',
        'edit_item' => 'Edit Artist',
        'all_items' => 'All Artists'
      ),
      'menu_icon' => 'dashicons-star-filled'
    ));
  };
  add_action('init', 'artist_post_type');

?>
```

## 2. Create Relationship
Go into custom fields (from the ACF plugin) and create a new field group. Name it `Related Artist` and select field type as `Relationship`. Under filter by post type make sure to select the relationship instead of all. Here we select `Artist`. Then under Location category only show if post type is equal to `Events`. Then publish.

You will now be able to go and edit your events and select the associated relationship with a given artist.

## 3. Display Relationship
We will display the related artists for each given event in the template partial event/show.
Wordpress has a helper function `set_query_var('string', $var)` which lets you pass variables to template partials.
```php
// themes/myfirsttheme/partials/event/show.php

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
```
Render the HTML via a template partial.
```php
// themes/myfirsttheme/partials/artist/related.php
<h2>
  the_title: <?php echo get_the_title($artist); ?>
</h2>
<p>
  the_content: <?php echo get_post_field('post_content', $artist); ?>
</p>
<p>
  permalink: <a href="<?php echo get_the_permalink($artist); ?>">link</a>
</p>  
```

## 4. Display Reverse Relationship
It is a bit more challenging to display a reverse relationship. First we create a single file to display the artists.

```php
// themes/myfirsttheme/single-artist.php

<?php get_header(); ?>

<h1>single-artist.php file</h1>

<?php
  while (have_posts()){
   the_post();
   get_template_part('partials/artist/show', get_post_format()) ;
  }
?>

  
<?php get_footer(); ?>

// themes/myfirsttheme/partials/artist/show.php
<h1>Artist show</h1>
<h2>
  the_title: <?php the_title(); ?>
</h2>
<p>
  the_content: <?php the_content(); ?>
</p>
```

Then we create a custom query in the artist partial to query all event posts where the post_type is equal to event and we use a meta_query to filter for only those events where the `related_artists` custom field has a value with the ID the same as that of our artist. 

```php
// themes/myfirsttheme/partials/artist/show.php

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
        'key' => 'related_artists', // name of custom field
        'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
        'compare' => 'LIKE'
      )
    )
  ));

  
  foreach($relatedEvents as $event) {
    set_query_var( 'event', $event );
    get_template_part('partials/event/related', get_post_format());
  }
?>
```