<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link 
 *
 * @package U3A_DEMO
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
        
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="">
        
       <!-- Bootsrtap CDN 
        
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/2.0/css/font-awesome.css" rel="stylesheet">

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    
    <header id="masthead" class="site-header">
            
                <!--div class="sub-header" role="banner"-->
		<nav id="wp-megamenu-top-header-menu" class="wp-megamenu-wrap wpmm-sticky wpmm-mobile-menu " role="wpmm">
		<div class="wpmm-nav-wrap wpmm-main-wrap-">
                    <!--a href="javascript:;" >
                       <button class="wpmm_mobile_menu_btn" aria-controls="primary-menu" aria-expanded="false"> 
                    </button></a><!--?php esc_html_e(' Menu ', 'U3A_DEMO' ); ?>
                        <!--php wp_na_menu( array('theme_location' => 'menu-1',
				z'menu_id' => 'primary-menu', ) );
			?--><?php wp_megamenu(array('theme_location' => 'menu-1','menu_id' => 'primary-menu',)); ?>
                        </div>
                    
		</nav> <!-- #site-navigation -->
                
                <!--/div><!--site header including menu-->
                
	</header><!-- #masthead -->
	<!--a class="skip-link screen-reader-text" href="#content"><!--?php esc_html_e( 'Skip to content', 'U3A_DEMO' ); ?></a-->
        <?php if ( get_header_image() /*&& is_front_page() */) : ?>
    <figure class="header-image">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
        </a>
    </figure><!-- .header-image -->
    <?php endif; // End header image check. ?>
   
		<!--div class="site-branding col-md-4">
                    
                        
			<!--?php
			the_custom_logo();?>
                   <div class="site-branding__text">
                        <!--?php 
			if ( is_front_page() && is_home() ) : ?>
				?>
				<h1 class="site-title"><a href="<!--?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><!--?php bloginfo( 'name' ); ?></a></h1>
				<!--?php
			else :
				?>
				<p class="site-title"><a href="<!--?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><!--?php bloginfo( 'name' ); ?></a></p>
				<!--?php
			endif;
			$U3A_DEMO_description = get_bloginfo( 'description', 'display' );
			if ( $U3A_DEMO_description || is_customize_preview() ) :
				?>
				<p class="site-description"><!--?php echo $U3A_DEMO_description; /* WPCS: xss ok. */ ?></p>
			<!--?php endif; ?>
                                
                    </div><!--site-branding__text-->
		<!--/div><!-- .site-branding -->
              
           
        <!--/div-->
           
        

	<div id="content" class="site-content">
