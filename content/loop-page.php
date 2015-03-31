<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- BEGIN .page-holder -->
<div class="page-holder shadow radius-full">

	<!-- BEGIN .article -->
	<div class="article">
		
		<?php if ( ! has_post_thumbnail() ) { ?>
			<h1 class="headline"><?php the_title(); ?></h1>
		<?php } ?>
	
		<?php the_content(__("Read More", 'swelllite')); ?>
		
		<?php wp_link_pages(array(
			'before' => '<p class="page-links"><span class="link-label">' . __('Pages:', 'swelllite') . '</span>',
			'after' => '</p>',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'next_or_number' => 'next_and_number',
			'nextpagelink' => __('Next', 'swelllite'),
			'previouspagelink' => __('Previous', 'swelllite'),
			'pagelink' => '%',
			'echo' => 1 )
		); ?>
		
		<?php edit_post_link(__("(Edit)", 'swelllite'), '', ''); ?>
	
	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>

<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

<div class="clear"></div>

<?php endwhile; else: ?>

<!-- BEGIN .page-holder -->
<div class="page-holder shadow radius-full">

	<!-- BEGIN .article -->
	<div class="article">

		<div class="error-404">
			<h1 class="headline"><?php _e("Page Not Found", 'swelllite'); ?></h1>
			<p><?php _e("We're sorry, but the page could not be found.", 'swelllite'); ?></p>
		</div>

	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>

<?php endif; ?>