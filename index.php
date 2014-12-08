<?php
/**
*
* This template is used to display a blog. The content is displayed in post formats.
*
* @package Swell
* @since Swell 1.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content">
		
		<?php if ( is_active_sidebar( 'blog-sidebar' ) && is_active_sidebar( 'left-sidebar' ) ) { ?>
		
			<!-- BEGIN .three columns -->
			<div class="three columns">
			
				<?php get_sidebar('left'); ?>
				
			<!-- END .three columns -->
			</div>
			
			<!-- BEGIN .nine columns -->
			<div class="nine columns">
	
				<!-- BEGIN .postarea middle -->
				<div id="infinite-container" class="postarea middle">
				
					<?php get_template_part( 'loop', 'blog' ); ?>
			
				<!-- END .postarea middle -->
				</div>
			
			<!-- END .nine columns -->
			</div>
			
			<!-- BEGIN .four columns -->
			<div class="four columns">
			
				<?php get_sidebar('blog'); ?>
				
			<!-- END .four columns -->
			</div>
	
		<?php } elseif ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
			
			<!-- BEGIN .eleven columns -->
			<div class="columns eleven">
	
				<!-- BEGIN .postarea -->
				<div id="infinite-container" class="postarea">
				
					<?php get_template_part( 'loop', 'blog' ); ?>
			
				<!-- END .postarea -->
				</div>
			
			<!-- END .eleven columns -->
			</div>
			
			<!-- BEGIN .five columns -->
			<div class="columns five">
			
				<?php get_sidebar('blog'); ?>
				
			<!-- END .five columns -->
			</div>
		
		<?php } elseif ( is_active_sidebar( 'left-sidebar' ) ) { ?>
		
			<!-- BEGIN .four columns -->
			<div class="four columns">
			
				<?php get_sidebar('left'); ?>
				
			<!-- END .four columns -->
			</div>
			
			<!-- BEGIN .twelve columns -->
			<div class="twelve columns">
	
				<!-- BEGIN .postarea right -->
				<div id="infinite-container" class="postarea right">
				
					<?php get_template_part( 'loop', 'blog' ); ?>
			
				<!-- END .postarea right -->
				</div>
			
			<!-- END .twelve columns -->
			</div>
		
		<?php } else { ?>
	
			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
	
				<!-- BEGIN .postarea full -->
				<div id="infinite-container" class="postarea full">
		
					<?php get_template_part( 'loop', 'blog' ); ?>
				
				<!-- END .postarea full -->
				</div>
			
			<!-- END .sixteen columns -->
			</div>
	
		<?php } ?>
	
		<!-- END .content -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>