<?php
/**
 * Template part for displaying the copyright footer
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MedZone_Lite
 */

if ( get_theme_mod( 'medzone_lite_enable_copyright', true ) || has_nav_menu( 'copyright' ) ) : ?>
	<div id="footer-bottom" class="contrast">
		<!-- /// FOOTER-BOTTOM  ////////////////////////////////////////////////////////////////////////////////////////////// -->
		<div class="container">
			<div class="row">
				<?php if ( get_theme_mod( 'medzone_lite_enable_copyright', true ) ) : ?>
					<div id="footer-bottom-widget-area-1" class="col-sm-12">
						<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>HACK4</b>CORONA
    </div>
    <strong>Copyright © 2020 <a href="https://www.ziedmaaloul.site/" target="_blank">Zied Maaloul &amp; Heni Zribi </a>.</strong> Tous les droits&nbsp;réservé.
  </footer>
					</div><!-- end .col -->
				<?php endif; ?>

				
			</div><!-- end .row -->
		</div><!-- end .container -->
		<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	</div><!-- end #footer-bottom -->
<?php endif; ?>
