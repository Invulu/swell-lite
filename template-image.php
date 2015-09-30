<?php
/**
Template Name: Background Image
*
* This template is used to display pages with content on top of a background image.
*
* @package Swell Lite
* @since Swell Lite 1.0
*
*/
get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'swell-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class('image-page'); ?> id="page-<?php the_ID(); ?>" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } else { ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default-background.jpg);" <?php } ?>>
	
	<!-- BEGIN .row -->
	<div class="row">
		
		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">
	
			<!-- BEGIN .postarea full -->
			<div class="postarea full">
	
				<?php get_template_part( 'content/loop', 'page' ); ?>
	
			<!-- END .postarea full -->
			</div>
		
		<!-- END .sixteen columns -->
		</div>
	
	<!-- END .row -->
	</div>
	
	<span class="img-shade"></span>

<!-- END .post class -->
</div>

<?php get_footer(); ?>