<?php
/**
* The footer for our theme.
* This template is used to generate the footer for the theme.
*
* @package Swell Lite
* @since Swell Lite 1.0
*
*/
?>

<!-- END .container -->
</div>

<!-- BEGIN .footer -->
<div class="footer">

	<?php if ( is_active_sidebar('footer') ) { ?>
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content">
	
			<!-- BEGIN .footer-widgets -->
			<div class="footer-widgets">
		
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
				<?php endif; ?>
			
			<!-- END .footer-widgets -->
			</div>
		
		<!-- END .content -->
		</div>
	
	<!-- END .row -->
	</div>
	
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">
		
		<!-- BEGIN .footer-information -->
		<div class="footer-information">
		
			<!-- BEGIN .content -->
			<div class="content">
		
				<div class="align-left">
				
					<p><?php _e("Copyright", 'swelllite'); ?> &copy; <?php echo date(__("Y", 'swelllite')); ?> &middot; <?php _e("All Rights Reserved", 'swelllite'); ?> &middot; <?php bloginfo('name'); ?></p>
					
					<p><?php _e("Swell Lite", 'swelllite'); ?> <?php _e("from", 'swelllite'); ?> <a href="http://organicthemes.com" target="_blank"><?php _e("Organic Themes", 'swelllite'); ?></a> &middot; <a href="<?php bloginfo('rss2_url'); ?>"><?php _e("RSS Feed", 'swelllite'); ?></a> &middot; <?php wp_loginout(); ?></p>
					
				</div>
				
				<div class="align-right">
					
					<?php if ( has_nav_menu( 'social-menu' ) ) { ?>
						
						<?php wp_nav_menu( array(
							'theme_location' => 'social-menu',
							'title_li' => '',
							'depth' => 1,
							'container_class' => 'social-menu',
							'menu_class'      => 'social-icons',
							'link_before'     => '<span>',
							'link_after'      => '</span>',
							)
						); ?>
						
					<?php } ?>
					
				</div>
		
			<!-- END .content -->
			</div>
		
		<!-- END .footer-information -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .footer -->
</div>

<!-- END #wrapper -->
</div>

<?php wp_footer(); ?>

</body>
</html>