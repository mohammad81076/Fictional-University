<?php
get_header();
pageBanner([
    'title' =>'All Events',
    'sub_title' => 'this page show all events',
    'img' => get_theme_file_uri('/images/library-hero.jpg')
]);
?>


    <div class="container container--narrow page-section">

        <?php

        while (have_posts()) {
           the_post();

            get_template_part('template-parts/content',get_post_type());
        }
        echo paginate_links();
        ?>
        <hr class="section-break">
        <span>if you want see past event<a href="<?php echo site_url('/past-event'); ?>"> click here</a></span>
    </div>


<?php
get_footer();
?>