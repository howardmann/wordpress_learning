<div class="col-4 phone-col-12 phone-center p-15">

<div class="col-12 p-50 bg-img-cover bg-img-center m-5" style="height: 150px; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
</div>
           
<h2>
  <a href="<?php the_permalink();?>">
    <?php the_title(); ?>
  </a>

</h2>
<p>
  <?php the_field('index_summary');  ?>
</p>
</div>
