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
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>"<i
                    class="fa fa-home" aria-hidden="true"></i> All Programs </a> <span
                    class="metabox__main"><?php the_title(); ?></span>
        </p>
    </div>


    <div class="generic-content">
        <?php the_content(); ?>
    </div>
    <?php }
    wp_reset_postdata();
    ?>

    <?php

    $professor = new WP_Query([
        'post_type' => 'professor',
        'order_by' => 'title',
        'meta_query' =>
            [
                [
                    'key' => 'related_program',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"',
                ],
            ]
    ]);


    if ($professor->have_posts()) {
        echo '<hr class="section-break">  <ul class="professor-cards">';
        echo ' <h1>Related Professor</h1>';
        while ($professor->have_posts()) {
            $professor->the_post(); ?>


            <li class="professor-card__list-item">
                <a class="professor-card" href="<?php the_permalink(); ?>">
                    <img class="professor-card__image" src="<?php the_post_thumbnail_url(); ?>" alt="">
                    <span class="professor-card__name"><?php the_title(); ?></span>
                </a>
            </li>
            <?php

        }
        echo '</ul>';
    }
    wp_reset_postdata();


    $nowDate = date('Ymd');


    $relatedEvents = new WP_Query(

        [
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'order_by' => 'meta_value_num',
            'meta_query' =>
                [
                    [
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $nowDate,
                        'type' => 'numeric'
                    ],
                    [
                        'key' => 'related_program',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    ]
                ]
        ]);

    if ($relatedEvents->have_posts()) {
        echo '<hr class="section-break">';
        echo '<h1>Related Events ' . get_the_title() . '</h1>';

        while ($relatedEvents->have_posts()) {
            $relatedEvents->the_post();
            get_template_part('template-parts/content', get_post_type());
        }


    } ?>


</div>
<?php get_footer(); ?>
