# Custom Templates

Are reusable templates that you can access in the admin panel of a specific post type. They operate the same as regular templates but you need to define them in the comments section in the file above and specify which post types they apply to.

The comment section is important here. Once saved you will be able to select the template when adding or editing an event or page post type. It will appear as Post Attributes under the Publish Box allowing you to select from Default Template or the newly named template `Event Custom Template`.

```php
// themes/myfirsttheme/custom_template_event.php

<?php
 /* 
 Template Name: Event Custom Template
 Template Post Type: event, page
 */
get_header();
?>
  <h2>This is a custom event template</h2>
  <p>
  <?php 
    while (have_posts()) {
      the_post();  
  ?>

  <p><?php the_title(); ?></p>
  <p><?php the_content(); ?></p>

  <?php 
  }  
  ?>

  
<?php
get_footer();
?>
```