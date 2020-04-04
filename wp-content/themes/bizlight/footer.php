<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package eVision themes
 * @subpackage Bizlight
 * @since Bizlight 1.0.0
 */

/**
 * bizlight_action_after_content hook
 * @since Bizlight 1.0.0
 *
 * @hooked null
 */
do_action( 'bizlight_action_after_content' );

/**
 * bizlight_action_before_footer hook
 * @since Bizlight 1.0.0
 *
 * @hooked null
 */
do_action( 'bizlight_action_before_footer' );

/**
 * bizlight_action_footer hook
 * @since Bizlight 1.0.0
 *
 * @hooked bizlight_footer - 10
 */
do_action( 'bizlight_action_footer' );

/**
 * bizlight_action_after_footer hook
 * @since Bizlight 1.0.0
 *
 * @hooked null
 */
do_action( 'bizlight_action_after_footer' );

/**
 * bizlight_action_after hook
 * @since Bizlight 1.0.0
 *
 * @hooked bizlight_page_end - 10
 */
do_action( 'bizlight_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>