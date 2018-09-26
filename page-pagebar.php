<?php
/**
 * Template Name: Page With Pagebar Template */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
                        <?php if( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<aside class="sidebar-2">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</aside>
			<?php endif; ?>
                    
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			//U3A_DEMO_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			//if ( comments_open() || get_comments_number() ) :
			//	comments_template();
			//endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

 <?php
get_footer();