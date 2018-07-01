<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<!-- <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/slick/slick.css"/>
  <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

	<!-- <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/css/header.css"> -->


</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-header-main">
				<div class="header-banner">
					<img class="motorbike-banner-image" src ="<?php bloginfo('template_directory');?>/images/header-image-no-badge.jpg" alt="triumph motorcycle">
					<img class="motorbike-badge" src ="<?php bloginfo('template_directory');?>/images/triumph-owners-badge.png" alt="triumph motorcycle South Essex Triumph Logo">

				</div><!-- .site-branding -->

				<?php if ( has_nav_menu('logged_out_nav') ||  has_nav_menu('logged_in_nav') ) : ?>
			
				 <button id="menu-toggle" class="menu-toggle"><span></span></button> 
				
					<div id="site-header-menu" class="site-header-menu">
						
							<nav id="site-navigation" class="main-navigation" role="navigation">
								<?php					
                  wp_nav_menu( array( 'menu' => 'logged-out' ) );
                  wp_nav_menu(array( 'menu' => 'logged-out', 'menu_class' => 'mobile-nav') );
								?>
							</nav><!-- .main-navigation -->
					

						
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->

			<?php if ( get_header_image() ) : ?>
				<?php
					/**
					 * Filter the default twentysixteen custom header sizes attribute.
					 *
					 * @since Twenty Sixteen 1.0
					 *
					 * @param string $custom_header_sizes sizes attribute
					 * for Custom Header. Default '(max-width: 709px) 85vw,
					 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
					 */
					$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
				?>
				<div class="header-image">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div>
			<?php endif; // End header image check. ?>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
