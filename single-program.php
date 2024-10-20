<?php
get_header(); ?>

<?php while (have_posts()) {
    the_post();
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image"
             style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title() ?></h1>
            <div class="page-banner__intro">
                <p>this is content post</p>
            </div>
        </div>
    </div>

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

    </div>


<?php }
wp_reset_postdata();

?>


<?php $nowDate = date('Ymd');


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

    echo '<div class="container container--narrow page-section">  <h2>Related Events</h2>';

    while ($relatedEvents->have_posts()) {
        $relatedEvents->the_post(); ?>

        <hr>
        <div class="event-summary">

            <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">


                <span class="event-summary__month"><?php $newDate = new DateTime(get_field('event_date'));
                    echo $newDate->format('M');
                    ?>
                </span>

                <span class="event-summary__day">
                        <?php echo $newDate->format('d'); ?>
                 </span>
            </a>
            <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a
                            href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                <p><?php echo wp_trim_words(get_the_excerpt(), 18) ?> <a
                            href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
            </div>
        </div>
    <?php }
    echo '</div>';
} ?>




<?php get_footer(); ?>
