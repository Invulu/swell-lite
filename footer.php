<?php
/**
* The footer for our theme.
* This template is used to generate the footer for the theme.
*
* @package Swell
* @since Swell 1.0
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
				
					<p><?php _e("Copyright", 'swelltheme'); ?> &copy; <?php echo date(__("Y", 'swelltheme')); ?> &middot; <?php _e("All Rights Reserved", 'swelltheme'); ?> &middot; <?php bloginfo('name'); ?></p>
					
					<p><a href="http://swelltheme.com" target="_blank"><?php _e("Free Swell Theme", 'swelltheme'); ?></a> <?php _e("by", 'swelltheme'); ?> <a href="http://dav.idmorgan.com" target="_blank"><?php _e("David Morgan", 'swelltheme'); ?></a> &middot; <a href="<?php bloginfo('rss2_url'); ?>"><?php _e("RSS Feed", 'swelltheme'); ?></a> &middot; <?php wp_loginout(); ?></p>
					
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