<h2 class="headline archive-headline"><?php the_archive_title() ?></h2>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- BEGIN .post class -->
<div <?php post_class('archive-holder shadow radius-full'); ?> id="post-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<a class="feature-img radius-top" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'swell-lite' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'swell-featured-large' ); ?></a>
	<?php } ?>

	<!-- BEGIN .article -->
	<div class="article">
	
		<?php if ( '1' == get_theme_mod('display_date_blog', '1') ) { ?>
			<div class="post-date">
				<p><i class="fa fa-comment"></i> <a href="<?php the_permalink(); ?>#comments"><?php comments_number( esc_html__("Leave a Comment", 'swell-lite'), esc_html__("1 Comment", 'swell-lite'), '% Comments'); ?></a></p>
				<p><i class="fa fa-clock-o"></i> 
					<?php if ( get_the_modified_time() != get_the_time() ) { ?> 
						<?php esc_html_e("Updated on", 'swell-lite'); ?> <?php the_modified_date( esc_html__("F j, Y", 'swell-lite') ); ?> 
					<?php } else { ?>
						<?php esc_html_e("Posted on", 'swell-lite'); ?> <?php the_time( esc_html__("F j, Y", 'swell-lite') ); ?>
					<?php } ?>
				</p>
			</div>
		<?php } ?>
		
		<h2 class="headline small"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		
		<?php if ( '1' == get_theme_mod('display_author_blog', '1') ) { ?>
			<div class="post-author">
				<p><?php esc_html_e("by", 'swell-lite'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
			</div>
		<?php } ?>
		
		<?php the_excerpt(); ?>
		
		<?php $tag_list = get_the_tag_list( esc_html__( ", ", 'swell-lite' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>
		
			<!-- BEGIN .post-meta -->
			<div class="post-meta radius-full">
			
				<p><i class="fa fa-bars"></i> <?php esc_html_e("Category:", 'swell-lite'); ?> <?php the_category(', '); ?>   <?php if ( ! empty( $tag_list ) ) { ?><i class="fa fa-tags"></i> <?php esc_html_e("Tags:", 'swell-lite'); ?> <?php the_tags(''); ?><?php } ?></p>
			
			<!-- END .post-meta -->
			</div>
		
		<?php } ?>
	
	<!-- END .article -->
	</div>

<!-- END .post class -->
</div>

<?php endwhile; ?>

<?php the_posts_pagination( array(
	'prev_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Previous Page', 'swell-lite' ) . ' </span>&laquo;',
	'next_text' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Next Page', 'swell-lite' ) . ' </span>&raquo;',
) ); ?>

<?php else: ?>

<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'swell-lite'); ?></p>

<?php endif; ?>