<?php
/**
 * toreplace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package toreplace
 */

if ( !defined('THEME_URL') ) {
    define ( 'THEME_URL', get_template_directory_uri() );
}

include_once 'lib/functions-breadcrumb.php';
include_once 'lib/functions-enqueue.php';
include_once 'lib/functions-helpers.php';
include_once 'lib/functions-loadmore.php';
include_once 'lib/functions-menu.php';
include_once 'lib/functions-post-types.php';
include_once 'lib/functions-settings.php';
include_once 'lib/functions-shortcodes.php';
include_once 'lib/functions-sidebar.php';

/*
 * Remove removes extra scripts
 */
add_action('after_setup_theme', 'toreplace_setup');
function toreplace_setup () {
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
}

/*
 * Images setup
 */
add_action( 'after_setup_theme', 'toreplace_after_setup' );
function toreplace_after_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array( 'gallery', 'video' ));
    add_image_size('thumbnail-270-175', 270, 175, true);
}
