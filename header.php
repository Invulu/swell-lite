<?php
/**
 * The Header for our theme.
 * Displays all of the <head> section and everything up till <div id="wrap">
 *
 * @package Swell Lite
 * @since Swell Lite 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<!-- BEGIN #wrapper -->
<div id="wrapper">

<!-- BEGIN .container -->
<div class="container">

<?php if ( has_nav_menu( 'fixed-menu' ) ) { ?>

<!-- BEGIN #navigation -->
<nav id="navigation" class="navigation-main fixed-nav clearfix" role="navigation">

	<button class="menu-toggle"><i class="fa fa-bars"></i></button>

	<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'fixed-menu',
				'title_li'        => '',
				'depth'           => 4,
				'container_class' => '',
				'menu_class'      => 'menu',
			)
		);
	?>

<!-- END #navigation -->
</nav>

<?php } ?>

<!-- BEGIN #header -->
<div id="header">

	<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>

		<div id="custom-header" style="background-image: url(<?php header_image(); ?>);">

			<?php get_template_part( 'content/logo', 'title' ); ?>

			<img class="hide-img" src="<?php header_image(); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" alt="<?php echo esc_attr( get_bloginfo() ); ?>" />

		</div>

	<?php } else { ?>

		<div id="custom-header" class="non-active">

			<?php get_template_part( 'content/logo', 'title' ); ?>

		</div>

	<?php } ?>

<!-- END #header -->
</div>

<?php if ( has_nav_menu( 'main-menu' ) ) { ?>

<!-- BEGIN #navigation -->
<nav id="navigation" class="navigation-main clearfix" role="navigation">

	<?php if ( ! has_nav_menu( 'fixed-menu' ) ) { ?>
		<button class="menu-toggle"><i class="fa fa-bars"></i></button>
	<?php } ?>

	<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'main-menu',
				'title_li'        => '',
				'depth'           => 4,
				'container_class' => '',
				'menu_class'      => 'menu',
			)
		);
	?>

<!-- END #navigation -->
</nav>

<?php } ?>
