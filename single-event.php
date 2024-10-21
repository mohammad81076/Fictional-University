<?php
get_header(); ?>

<?php while (have_posts()) {
the_post();
pageBanner([
    'title' => '',
    'sub_title' => '',
    'img' => get_theme_file_uri('/images/library-hero.jpg')
]);
?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event') ?>"<i
                    class="fa fa-home" aria-hidden="true"></i> Events Home </a> <span
                    class="metabox__main"><?php the_title(); ?></span>
        </p>
    </div>


    <div class="generic-content">
        <?php the_content(); ?>
    </div>


    <?php } ?>
</div>


<?php
$related_program = get_field('related_program');
if ($related_program) {

    echo '  <div class="container container--narrow page-section"> <ul class="min-list link-list"><hr> <h2>Related Program(s)</h2>';
    foreach ($related_program as $program) { ?>


        <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>


    <?php }
    echo ' </ul> </div>';
} ?>






<?php get_footer(); ?>
