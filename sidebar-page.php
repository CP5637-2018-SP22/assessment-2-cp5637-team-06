<?php
/**
 * The page sidebar containing the main widget area.
 *
 * @link 
 *
 * @package U3A_DEMO
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside id="page-secondary" class="widget-area page-sidebar" role="complementary">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside><!-- #secondary-->
