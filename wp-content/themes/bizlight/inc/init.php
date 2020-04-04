<?php
/**
 * evision themes init file
 *
 * @package eVision themes
 * @subpackage Bizlight
 * @since Bizlight 1.0.0
 */

/**
 * Customizer additions.
 */
$bizlight_customizer_file_path = bizlight_file_directory('inc/customizer/customizer.php');
require $bizlight_customizer_file_path;

/**
 * Include Functions
 */

$bizlight_words_count_file_path = bizlight_file_directory('inc/function/words-count.php');
require $bizlight_words_count_file_path;
/**
 * Include Hooks
 */
$bizlight_hooks_excerpt_path = bizlight_file_directory('inc/hooks/excerpt.php');
require $bizlight_hooks_excerpt_path;

$bizlight_hooks_init_path = bizlight_file_directory('inc/hooks/init.php');
require $bizlight_hooks_init_path;

$bizlight_hooks_wp_head_file_path = bizlight_file_directory('inc/hooks/wp-head.php');
require $bizlight_hooks_wp_head_file_path;

$bizlight_hooks_header_file_path = bizlight_file_directory('inc/hooks/header.php');
require $bizlight_hooks_header_file_path;

$bizlight_hooks_footer_file_path = bizlight_file_directory('inc/hooks/footer.php');
require $bizlight_hooks_footer_file_path;

$bizlight_hooks_posts_navigation_file_path = bizlight_file_directory('inc/hooks/posts-navigation.php');
require $bizlight_hooks_posts_navigation_file_path;

$bizlight_hooks_front_page_file_path = bizlight_file_directory('inc/hooks/featured-slider/featured-main-hook.php');
require $bizlight_hooks_front_page_file_path;

$bizlight_hooks_homepage_service_file_path = bizlight_file_directory('inc/hooks/homepage-service.php');
require $bizlight_hooks_homepage_service_file_path;

$bizlight_hooks_homepage_about_file_path = bizlight_file_directory('inc/hooks/homepage-about.php');
require $bizlight_hooks_homepage_about_file_path;

$bizlight_hooks_homepage_featured_file_path = bizlight_file_directory('inc/hooks/homepage-featured.php');
require $bizlight_hooks_homepage_featured_file_path;

$bizlight_hooks_homepage_brand_file_path = bizlight_file_directory('inc/hooks/homepage-brand.php');
require $bizlight_hooks_homepage_brand_file_path;


$bizlight_hooks_homepage_blog_file_path = bizlight_file_directory('inc/hooks/homepage-blog.php');
require $bizlight_hooks_homepage_blog_file_path;

$bizlight_hooks_homepage_testimonial_file_path = bizlight_file_directory('inc/hooks/homepage-testimonial.php');
require $bizlight_hooks_homepage_testimonial_file_path;

$bizlight_hooks_front_page_file_path = bizlight_file_directory('inc/hooks/front-page.php');
require $bizlight_hooks_front_page_file_path;

/**
 * Include sidebar widgets
 */
$bizlight_sidebar_widget_init_path = bizlight_file_directory('inc/sidebar-widget-init.php');
require $bizlight_sidebar_widget_init_path;