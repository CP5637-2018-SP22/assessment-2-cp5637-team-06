<?php
/**
 * The template for displaying all single posts
 * Template Name: Fullwidth Template
 * Template Post Type: post
 *
 * @link 
 *
 * @package BrightSmile
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                    <?php if( is_active_sidebar( 'single-after-content-widget-area' ) ) : ?>
				<aside class="single-after-content-widget-area">
					<?php dynamic_sidebar( 'single-after-content-widget-area' ); ?>
				</aside>
			<?php endif; ?>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			U3A_DEMO_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
           </div-->
        <?php 
get_footer();



