<?php

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
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');

