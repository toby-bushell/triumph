<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>	</div>
</div>
		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav class="main-navigation" role="navigation" aria-label="<?php _e( 'Footer Primary Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>

		<div class="site-inner footer-content footer-content_section--left">
			<p class="footer-content__section">South Essex Triumph Owners MCC Website</p>
			<div class="footer-content__section footer-content_section--social">Follow us on <a href="https://www.facebook.com/groups/603108046486930/"><img src="<?php bloginfo('template_directory');?>/images/facebook.png"/></a></div>
			<p class="footer-content__section made-by-boris">Made by <a href="http://www.borisdigital.co.uk" target="_blank">Boris Digital</a></p>
		</div>
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
