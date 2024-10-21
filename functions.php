<?php

function pageBanner($args){
    if (!$args['title']){
        $args['title' ]= get_the_title();
    }
    if (!$args['sub_title']){
        $args['sub_title']= get_field('page_banner_sub_title');
    }
    if (!$args['img']){
        $args['img']=get_field('page_banner_background_image')['sizes']['PageBanner'];
    }
    ?>

    <div class="page-banner">
        <div class="page-banner__bg-image"
             style="background-image: url(<?php echo $args['img'] ?>)"></div>
        <div class="page-banner__content container t-center c-white">
            <h1 class="headline headline--large"><?php echo $args['title'] ?></h1>
            <p><?php echo $args['sub_title'] ?></p>
            <a href="<?php echo get_post_type_archive_link('program') ?>" class="btn btn--large btn--blue">Find Your
                Major</a>
        </div>
    </div>
<?php }
function enqueue_func()
{
    wp_enqueue_script('index_js', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('style_bootstrap', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('index_css', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('style_index_css', get_theme_file_uri('/build/style-index.css'));

}

add_action('wp_enqueue_scripts', 'enqueue_func');

function university_features()
{
    add_theme_support('title-tag',);
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('PageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');

function pre_get_post_func($query)
{
    if (!is_admin() and is_post_type_archive('event')) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('meta_query', [
            [
                'key' => 'event_date',
                'compare' => '>=',
                'value' => date('Ymd'),
                'type' => 'numeric'
            ]
        ]);

    }

    if (!is_admin() and is_post_type_archive('program') and is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }
}

add_action('pre_get_posts', 'pre_get_post_func');

