<h1>Posts Index</h1>
<?php
  while(have_posts()){
    the_post();
    get_template_part('partials/post/content', get_post_format());
  }
?>