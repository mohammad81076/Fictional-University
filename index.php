<?php
get_header();
pageBanner([
    'title' => 'Welcome Our Blog',
    'sub_title' => 'this is static sub title',
    'img' => get_theme_file_uri('/images/library-hero.jpg')
]);
?>


    <div class="container container--narrow page-section">
        <?php while (have_posts()) {
            the_post(); ?>
            <div class="post-item">
                <h2 class="headline headline--medium headline--post-title"><a
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="metabox">
                    <p>posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.Y'); ?>
                        in <?php echo get_the_category_list(', ') ?></p>
                </div>

                <div class="generic-content">
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">continue reading</a></p>
                </div>
            </div>

        <?php }
        echo paginate_links();
        ?>

    </div>


<?php
get_footer();
?>