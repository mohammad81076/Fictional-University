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
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('post')?>"><i
                        class="fa fa-home" aria-hidden="true"></i> Blog Home </a> <span
                    class="metabox__main"> posted by <?php the_author_posts_link(); ?></span>
        </p>
    </div>


<div class="generic-content">
    <?php the_content(); ?>
</div>


    <?php } ?>

</div>

<?php get_footer(); ?>
