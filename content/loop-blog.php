<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
	
	<!-- BEGIN .post class -->
	<div <?php post_class('blog-holder shadow radius-full'); ?> id="post-<?php the_ID(); ?>">

		<?php if ( has_post_thumbnail() ) { ?>
			<a class="feature-img radius-top" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'swelllite' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'swell-featured-large' ); ?></a>
		<?php } ?>
		
		<!-- BEGIN .article -->
		<div class="article">
		
			<?php if (get_theme_mod('display_date_blog', '1') == '1') { ?>
			<div class="post-date">
				<p><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'swelllite'), __("1 Comment", 'swelllite'), '% Comments'); ?></a></p>
				<p><i class="fa fa-clock-o"></i> <?php _e("Posted on", 'swelllite'); ?> <?php the_time(__("F j, Y", 'swelllite')); ?></p>
			</div>
			<?php } ?>
		
			<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
			
			<?php if (get_theme_mod('display_author_blog', '1') == '1') { ?>
				<div class="post-author">
					<p><?php _e("by", 'swelllite'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
				</div>
			<?php } ?>
			
			<span class="divider-small"></span>
		
			<?php the_content(__("Read More", 'swelllite')); ?>
			
		<!-- END .article -->
		</div>
	
	<!-- END .post class -->
	</div>

<?php endwhile; ?>

	<?php if ( $wp_query->max_num_pages > 1 ) { ?>
		<!-- BEGIN .pagination -->
		<div class="pagination">
			<?php echo swelllite_get_pagination_links(); ?>
		<!-- END .pagination -->
		</div>
	<?php } ?>

<?php else : ?>

	<div class="error-404">
		<h1 class="headline"><?php _e("No Posts Found", 'swelllite'); ?></h1>
		<p><?php _e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'swelllite'); ?></p>
	</div>

<?php endif; ?>