<?php
/**
 * The default template for displaying header
 *
 * @package eVision themes
 * @subpackage Bizlight
 * @since Bizlight 1.0.0
 */

/**
 * bizlight_action_before_head hook
 * @since Bizlight 1.0.0
 *
 * @hooked bizlight_set_global -  0
 * @hooked bizlight_doctype -  10
 */
do_action( 'bizlight_action_before_head' );?>
<head>

	<?php
	/**
	 * bizlight_action_before_wp_head hook
	 * @since Bizlight 1.0.0
	 *
	 * @hooked bizlight_before_wp_head -  10
	 */
	do_action( 'bizlight_action_before_wp_head' );

	wp_head();

	/**
	 * bizlight_action_after_wp_head hook
	 * @since Bizlight 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'bizlight_action_after_wp_head' );
	?>

</head>

<body <?php body_class(); ?>>

<?php
/**
 * bizlight_action_before hook
 * @since Bizlight 1.0.0
 *
 * @hooked bizlight_page_start - 15
 */
do_action( 'bizlight_action_before' );

/**
 * bizlight_action_before_header hook
 * @since Bizlight 1.0.0
 *
 * @hooked bizlight_skip_to_content - 10
 */
do_action( 'bizlight_action_before_header' );


/**
 * bizlight_action_header hook
 * @since Bizlight 1.0.0
 *
 * @hooked bizlight_after_header - 10
 */
do_action( 'bizlight_action_header' );

/**
 * bizlight_action_before_content hook
 * @since Bizlight 1.0.0
 *
 * @hooked null
 */
do_action( 'bizlight_action_before_content' );

/**
 * bizlight_action_on_header hook
 * @since Bizlight 1.0.0
 *
 * @hooked null
 */
do_action( 'bizlight_action_on_header' );

/**
 * bizlight_action_after_header hook
 * @since Bizlight 1.0.0
 *
 * @hooked null
 */
do_action( 'bizlight_action_after_header' );

?>