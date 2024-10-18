<?php
get_header(); ?>

    <div class="page-banner">
        <div class="page-banner__bg-image"
             style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg') ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">All Events</h1>`
            <div class="page-banner__intro">
                <p>See Our Event in this Page </p>
            </div>
        </div>
    </div>
    <div class="container container--narrow page-section">

        <?php

        $nowDate = date('Ymd');
        $archivePageEvents = new WP_Query
        ([
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'order_by' => 'meta_value_num',
            'type' => 'numeric',
            'meta_query' => [
                [
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $nowDate
                ]
            ],

        ]);

        while ($archivePageEvents->have_posts()) {
            $archivePageEvents->the_post(); ?>
            <div class="event-summary">
                <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                    <span class="event-summary__month"><?php $date_event = new DateTime(get_field('event_date'));
                        echo $date_event->format('M');
                        ?></span>
                    <span class="event-summary__day"><?php echo $date_event->format('d'); ?></span>
                </a>
                <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a
                                href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
                    <p><?php echo wp_trim_words(get_the_content(), 18); ?> <a
                                href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
            </div>

        <?php }
        echo paginate_links();
        ?>

    </div>


<?php
get_footer();
?>