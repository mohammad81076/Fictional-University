<?php
get_header();
pageBanner([
    'title' => 'All Programs',
    'sub_title' => 'this is programs list',
    'img' => get_theme_file_uri('/images/library-hero.jpg')
]);
?>


    <div class="container container--narrow page-section">
<ul class="link-list min-list">
        <?php

        while (have_posts()) {
            the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

        <?php }
        echo paginate_links();
        ?>
</ul>
    </div>


<?php
get_footer();
?>