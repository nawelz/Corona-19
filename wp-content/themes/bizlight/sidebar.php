<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bizlight
 */
$bizlight_default_layout = bizlight_default_layout();
if( !empty( $bizlight_default_layout ) ){
	if( 'no-sidebar' == $bizlight_default_layout ){
		return;
	}

}
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
