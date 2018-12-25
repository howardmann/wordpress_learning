<h2>
  the_title: <?php the_title(); ?>
</h2>
<p>
  the_content: <?php the_content(); ?>
</p>
<p>
  the_permalink: <a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a>
</p>
<p>
  spirit_animal: <?php 
    if(get_field('spirit_animal')){
      return the_field('spirit_animal');
    } else {
      echo 'not chosen yet';
    }
  ?>
</p>