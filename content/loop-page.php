<?php
/**
 * This template displays the page loop.
 *
 * @package Swell Lite
 * @since Swell Lite 1.0
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- BEGIN .page-holder -->
<div class="page-holder shadow radius-full">

	<?php if ( has_post_thumbnail() && ! has_nav_menu( 'main-menu' ) ) { ?>

	<!-- BEGIN .entry -->
	<div class="entry">

		<h1 class="headline"><?php the_title(); ?></h1>

	<!-- END .entry -->
	</div>

	<div class="feature-img">
		<?php the_post_thumbnail( 'swell-featured-large' ); ?>
	</div>

	<?php } ?>

	<!-- BEGIN .article -->
	<div class="article">

		<?php if ( ! has_post_thumbnail() ) { ?>
			<h1 class="headline"><?php the_title(); ?></h1>
		<?php } ?>

		<?php the_content( esc_html__( 'Read More', 'swell-lite' ) ); ?>

		<?php wp_link_pages(array(
			'before' => '<p class="page-links"><span class="link-label">' . esc_html__( 'Pages:', 'swell-lite' ) . '</span>',
			'after' => '</p>',
			'link_before' => '<span>',
			'link_after' => '</span>',
			'next_or_number' => 'next_and_number',
			'nextpagelink' => esc_html__( 'Next', 'swell-lite' ),
			'previouspagelink' => esc_html__( 'Previous', 'swell-lite' ),
			'pagelink' => '%',
			'echo' => 1,
			)
		); ?>

		<?php edit_post_link( esc_html__( '(Edit)', 'swell-lite' ), '', '' ); ?>

	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>

<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

<div class="clear"></div>

<?php endwhile; else : ?>

<!-- BEGIN .page-holder -->
<div class="page-holder shadow radius-full">

	<!-- BEGIN .article -->
	<div class="article">

		<div class="error-404">
			<h1 class="headline"><?php esc_html_e( 'Page Not Found', 'swell-lite' ); ?></h1>
			<p><?php esc_html_e( "We're sorry, but the page could not be found.", 'swell-lite' ); ?></p>
		</div>

	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>

<?php endif; ?>
