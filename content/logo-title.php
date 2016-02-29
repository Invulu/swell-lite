<?php if ( get_theme_mod( 'swell_lite_logo', get_template_directory_uri() . '/images/logo.png' ) ) { ?>

	<h1 id="logo" class="vertical-center <?php if ( 'center' == get_theme_mod('title_align', 'center') ) { ?>text-center<?php } if ( 'right' == get_theme_mod('title_align') ) { ?>text-right<?php } ?>">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( get_theme_mod( 'swell_lite_logo', get_template_directory_uri() . '/images/logo.png' ) ); ?>" alt="" />
			<span class="logo-text"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></span>
		</a>
	</h1>
	
<?php } else { ?>

	<div id="masthead" class="vertical-center <?php if ( 'center' == get_theme_mod('title_align', 'center') ) { ?>text-center<?php } if ( 'right' == get_theme_mod('title_align') ) { ?>text-right<?php } ?>">
	
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
		</h1>
		
		<h2 class="site-description">
			<?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?>
		</h2>
		
	</div>
	
<?php } ?>