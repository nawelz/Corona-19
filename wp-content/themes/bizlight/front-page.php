<?php

/**
 * The front-page template file.
 *
 * @package eVision themes
 * @subpackage Bizlight
 * @since Bizlight 1.0.0
 */

get_header();
/**
 * bizlight_action_front_page hook
 * @since bizlight 1.0.0
 *
 * @hooked bizlight_action_front_page -  10
 * @sub_hooked bizlight_action_front_page -  10
 */
do_action( 'bizlight_action_front_page' );

get_footer();

