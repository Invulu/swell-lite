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
		
				<?php dynamic_sidebar( 'footer' ); ?>
			
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
				
					<p><?php esc_html_e("Copyright", 'swell-lite'); ?> &copy; <?php echo date( esc_html__("Y", 'swell-lite') ); ?> &middot; <?php esc_html_e("All Rights Reserved", 'swell-lite'); ?> &middot; <?php bloginfo('name'); ?></p>
					
					<p><?php esc_html_e("Swell Lite", 'swell-lite'); ?> <?php esc_html_e("from", 'swell-lite'); ?> <a href="http://organicthemes.com" target="_blank"><?php esc_html_e("Organic Themes", 'swell-lite'); ?></a> &middot; <a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e("RSS Feed", 'swell-lite'); ?></a> &middot; <?php wp_loginout(); ?></p>
					
				</div>
				
				<?php if ( has_nav_menu( 'social-menu' ) ) { ?>
				
				<div class="align-right">

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
					
				</div>
				
				<?php } ?>
		
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