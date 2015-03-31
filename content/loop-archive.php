<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- BEGIN .post class -->
<div <?php post_class('archive-holder shadow radius-full'); ?> id="post-<?php the_ID(); ?>">

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
		
		<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<?php if (get_theme_mod('display_author_blog', '1') == '1') { ?>
			<div class="post-author">
				<p><?php _e("by", 'swelllite'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
			</div>
		<?php } ?>
		
		<?php the_excerpt(); ?>
		
		<?php $tag_list = get_the_tag_list( __( ", ", 'swelllite' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>
		
			<!-- BEGIN .post-meta -->
			<div class="post-meta radius-full">
			
				<p><i class="fa fa-bars"></i> <?php _e("Category:", 'swelllite'); ?> <?php the_category(', '); ?>   <?php if ( ! empty( $tag_list ) ) { ?><i class="fa fa-tags"></i> <?php _e("Tags:", 'swelllite'); ?> <?php the_tags(''); ?><?php } ?></p>
			
			<!-- END .post-meta -->
			</div>
		
		<?php } ?>
	
	<!-- END .article -->
	</div>

<!-- END .post class -->
</div>

<?php endwhile; ?>

<!-- BEGIN .pagination -->
<div class="pagination">
	<?php echo swelllite_get_pagination_links(); ?>
<!-- END .pagination -->
</div>

<?php else: ?>

<p><?php _e("Sorry, no posts matched your criteria.", 'swelllite'); ?></p>

<?php endif; ?>