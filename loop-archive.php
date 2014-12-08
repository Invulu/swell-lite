<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>

<!-- BEGIN .post class -->
<div <?php post_class('archive-holder shadow radius-full'); ?> id="post-<?php the_ID(); ?>">

	<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
		<div class="feature-vid radius-top"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
	<?php } else { ?>
		<?php if ( has_post_thumbnail() ) { ?>
			<a class="feature-img radius-top" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'swelltheme' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'swell-featured-large' ); ?></a>
		<?php } ?>
	<?php } ?>

	<!-- BEGIN .article -->
	<div class="article">
	
		<?php if (get_theme_mod('display_date_blog') == '1') { ?>
			<div class="post-date">
				<p><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'swelltheme'), __("1 Comment", 'swelltheme'), '% Comments'); ?></a></p>
				<p><i class="fa fa-clock-o"></i> <?php _e("Posted on", 'swelltheme'); ?> <?php the_time(__("F j, Y", 'swelltheme')); ?></p>
			</div>
		<?php } ?>
		
		<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<?php if (get_theme_mod('display_author_blog') == '1') { ?>
			<div class="post-author">
				<p><?php _e("by", 'swelltheme'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
			</div>
		<?php } ?>
		
		<?php the_excerpt(); ?>
		
		<?php $tag_list = get_the_tag_list( __( ", ", 'swelltheme' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>
		
			<!-- BEGIN .post-meta -->
			<div class="post-meta radius-full">
			
				<p><i class="fa fa-bars"></i> <?php _e("Category:", 'swelltheme'); ?> <?php the_category(', '); ?>   <?php if ( ! empty( $tag_list ) ) { ?><i class="fa fa-tags"></i> <?php _e("Tags:", 'swelltheme'); ?> <?php the_tags(''); ?><?php } ?></p>
			
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
	<?php echo swell_get_pagination_links(); ?>
<!-- END .pagination -->
</div>

<?php else: ?>

<p><?php _e("Sorry, no posts matched your criteria.", 'swelltheme'); ?></p>

<?php endif; ?>