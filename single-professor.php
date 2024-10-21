<?php
get_header(); ?>

<?php while (have_posts()) {
the_post();
pageBanner([
    'title' => '',
    'sub_title' => 'this is static sub title',
    'img' => get_theme_file_uri('/images/library-hero.jpg')
]);
?>


<div class="container container--narrow page-section">

    <div class="generic-content">

        <?php if (get_the_post_thumbnail(0)){ ?>

      <div class="row group">
          <div  class="one-third">
              <a href=""><?php the_post_thumbnail(); ?></a>
          </div>

          <div class="two-thirds">

              <?php the_content(); ?>
          </div>
      </div>
        <?php
        }else{
            the_content();
        }

        ?>
    </div>



    <?php } ?>
</div>


<?php
$related_program = get_field('related_program');
if ($related_program) {

    echo '  <div class="container container--narrow page-section"> <ul class="min-list link-list"><hr> <h2> Related Program(s) For '.get_the_title(0).' </h2>';
    foreach ($related_program as $program) { ?>


        <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>


    <?php }
    echo ' </ul> </div>';
} ?>

<?php

?>






<?php get_footer(); ?>
