<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bizlight
 */

get_header(); ?>

<div class="wrapper page-inner-title">
	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1 class="page-title"><?php single_post_title(); ?></h1>
		</header>
	<?php endif; ?>
</div>
<div class="evision-wrapper">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					$bizlight_disable_recent_posts_meta = get_post_meta( get_the_ID(), 'bizlight-disable-in-recent-posts', true );
					if( 1 != $bizlight_disable_recent_posts_meta ){
						/*
	                 * Include the Post-Format-specific template for the content.
	                 * If you want to override this in a child theme, then include a file
	                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
	                 */
						get_template_part( 'template-parts/content', get_post_format() );
					}

					?>

				<?php endwhile; ?>

				<?php
				/**
				 * bizlight_action_posts_navigation hook
				 *
				 * @hooked: bizlight_posts_navigation - 10
				 *
				 * @since  Bizlight 1.0.0
				 */
				do_action( 'bizlight_action_posts_navigation' );?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php get_sidebar(); ?>
	</div><!-- #content -->
</div>
<?php get_footer(); ?>
