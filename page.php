<?php get_header();

while (have_posts()) {
    the_post();

    pageBanner([
        'title' => '',
        'sub_title' => 'this is static sub title',
        'img' => get_theme_file_uri('/images/library-hero.jpg')
    ]);

    ?>



    <?php
    $theParent = wp_get_post_parent_id(get_the_ID());

    $theChild = get_pages([
        'child_of' => get_the_ID()
    ])
    ?>

    <div class="container container--narrow page-section">
        <?php if ($theParent or $theChild) { ?>
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i
                            class="fa fa-home" aria-hidden="true"></i> Back
                    to <?php echo get_the_title($theParent) ?></a> <span
                        class="metabox__main"> <?php the_title() ?></span>
            </p>

        </div>



            <div class="page-links">
                <h2 class="page-links__title"><a
                            href="<?php echo get_the_permalink($theParent) ?>"><?php echo get_the_title($theParent) ?></a>
                </h2>
                <ul class="min-list">
                    <?php
                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        $findChildrenOf = get_the_ID();
                    }
                    wp_list_pages([
                        'title_li' => NULL,
                        'child_of' => $findChildrenOf
                    ]);

                    ?>
                </ul>
            </div>
        <?php } ?>

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>
