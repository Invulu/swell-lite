<?php
/**
 * This file includes the theme functions.
 *
 * @package Swell Lite
 * @since Swell Lite 1.0
 */

/*
-------------------------------------------------------------------------------------------------------
	Theme Setup
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'swell_lite_setup' ) ) :

	/** Function swell_lite_setup */
	function swell_lite_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'swell-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enable selective refresh for Widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for site title tag.
		add_theme_support( 'title-tag' );

		/*
		* Enable support for wide alignment class for Gutenberg blocks.
		*/
		add_theme_support( 'align-wide' );

		/*
		* Enable support for HTML5 output.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_image_size( 'swell-featured-large', 1800, 1200, true ); // Large Featured Image.
		add_image_size( 'swell-featured-medium', 1200, 800, true ); // Medium Featured Image.
		add_image_size( 'swell-featured-small', 640, 640, true ); // Small Featured Image.

		// Create Menus.
		register_nav_menus( array(
			'fixed-menu'  => esc_html__( 'Fixed Menu', 'swell-lite' ),
			'main-menu'   => esc_html__( 'Main Menu', 'swell-lite' ),
			'social-menu' => esc_html__( 'Social Menu', 'swell-lite' ),
		));

		// Custom Header.
		register_default_headers( array(
			'default' => array(
				'url'           => get_template_directory_uri() . '/images/default-header.jpg',
				'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
				'description'   => esc_html__( 'Default Custom Header', 'swell-lite' ),
			),
		));
		$defaults = array(
			'width'              => 1800,
			'height'             => 520,
			'flex-height'        => true,
			'flex-width'         => true,
			'default-text-color' => 'ffffff',
			'default-image'      => get_template_directory_uri() . '/images/default-header.jpg',
			'header-text'        => false,
			'uploads'            => true,
		);
		add_theme_support( 'custom-header', $defaults );

		// Custom Background.
		$defaults = array(
			'default-color' => 'eeeeee',
		);
		add_theme_support( 'custom-background', $defaults );

	}
endif; // End function swell_lite_setup.
add_action( 'after_setup_theme', 'swell_lite_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Support and Upgrade Link
-------------------------------------------------------------------------------------------------------
*/

function swell_lite_support_link() {
	global $submenu;
	$menu_link = esc_url( 'https://organicthemes.com/support/' );
	$submenu['themes.php'][] = array( __( 'Theme Support', 'swell-lite' ), 'manage_options', $menu_link, '', 1 );
}
add_action( 'admin_menu', 'swell_lite_support_link' );

function swell_lite_upgrade_link() {
	global $submenu;
	$upgrade_link = esc_url( 'https://organicthemes.com/theme/swell-theme/?utm_source=lite_upgrade' );
	$submenu['themes.php'][] = array( __( 'Theme Upgrade', 'swell-lite' ), 'manage_options', $upgrade_link );
}
add_action( 'admin_menu', 'swell_lite_upgrade_link' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function swell_lite_admin_notice_follow */
function swell_lite_admin_notice_follow() {
	if ( ! PAnD::is_admin_notice_active( 'notice-swell-lite-30' ) ) {
		return;
	}
	?>

	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=246727095428680";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<script>window.twttr = (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0],
		t = window.twttr || {};
		if (d.getElementById(id)) return t;
		js = d.createElement(s);
		js.id = id;
		js.src = "https://platform.twitter.com/widgets.js";
		fjs.parentNode.insertBefore(js, fjs);

		t._e = [];
		t.ready = function(f) {
			t._e.push(f);
		};

		return t;
	}(document, "script", "twitter-wjs"));</script>

	<div data-dismissible="notice-swell-lite-30" class="notice updated is-dismissible">

		<p><?php printf( __( 'Thanks for choosing the Swell Lite theme! Enter your email for important updates and information regarding <a href="%1$s" target="_blank">Organic Themes</a>.', 'swell-lite' ), 'https://organicthemes.com' ); ?></p>

		<div class="follows" style="overflow: hidden; margin-bottom: 12px;">

			<div id="mc_embed_signup" class="clear" style="float: left;">
				<form action="//organicthemes.us1.list-manage.com/subscribe/post?u=7cf6b005868eab70f031dc806&amp;id=c3cce2fac0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<div class="mc-field-group" style="float: left;">
							<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
						</div>
						<div style="float: left; margin-left: 6px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7cf6b005868eab70f031dc806_c3cce2fac0" tabindex="-1" value=""></div>
					</div>
				</form>
			</div>

			<div class="social-links" style="float: left; margin-left: 24px; margin-top: 4px;">
				<div class="fb-like" style="float: left;" data-href="https://www.facebook.com/OrganicThemes/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="false"></div>
				<div class="twitter-follow" style="float: left; margin-left: 6px;"><a class="twitter-follow-button" href="https://twitter.com/OrganicThemes" data-show-count="false">Follow @OrganicThemes</a></div>
			</div>

		</div>

	</div>

	<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>

	<?php
}

/** Function swell_lite_admin_notice_review */
function swell_lite_admin_notice_review() {
	if ( ! PAnD::is_admin_notice_active( 'notice-swell-lite-review-30' ) ) {
		return;
	}
	?>

	<div data-dismissible="notice-swell-lite-review-30" class="notice updated is-dismissible">

		<p><?php printf( wp_kses_post( '🍍 Aloha! Mahalo for using the <a href="%1$s" target="_blank">Swell Lite</a> theme. As a <b>BIG</b> favor, could you please take a moment to <a href="%2$s" target="_blank">leave a positive review</a> for this theme. Just consider it your good deed for the day ;) Additionally, you may consider upgrading to the <a href="%3$s" target="_blank">Premium Swell Theme</a> for more options, page templates, and support.', 'swell-lite' ), 'https://organicthemes.com/theme/swell-lite/', 'https://wordpress.org/support/theme/swell-lite/reviews/#new-post', 'https://organicthemes.com/theme/swell-theme/?utm_source=lite_upgrade' ); ?></p>
		<p><b><?php esc_html_e( '&mdash; David Morgan', 'swell-lite' ); ?></b><br/>
		<b><?php printf( wp_kses_post( 'Co-founder of <a href="%1$s" target="_blank">Organic Themes</a>', 'swell-lite' ), 'https://organicthemes.com/' ); ?></b></p>

	</div>

	<?php
}

add_action( 'admin_init', array( 'PAnD', 'init' ) );
add_action( 'admin_notices', 'swell_lite_admin_notice_follow', 10 );
add_action( 'admin_notices', 'swell_lite_admin_notice_review', 10 );

require( get_template_directory() . '/includes/persist-admin-notices-dismissal/persist-admin-notices-dismissal.php' );

/*
-------------------------------------------------------------------------------------------------------
	Category ID to Name
-------------------------------------------------------------------------------------------------------
*/

/**
 * Changes category IDs to names
 *
 * @param array $id IDs for categories.
 * @return array
 */
function swell_lite_cat_id_to_name( $id ) {
	$cat = get_category( $id );
	if ( is_wp_error( $cat ) ) {
		return false; }
	return $cat->cat_name;
}

/*
-------------------------------------------------------------------------------------------------------
	Register Scripts
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'swell_lite_enqueue_scripts' ) ) {

	/** Function swell_lite_enqueue_scripts */
	function swell_lite_enqueue_scripts() {

		// Enqueue Styles.
		wp_enqueue_style( 'swell-lite-style', get_stylesheet_uri() );
		wp_enqueue_style( 'swell-lite-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'swell-lite-style' ), '1.0' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array( 'swell-lite-style' ), '1.0' );

		// Enqueue Scripts.
		wp_enqueue_script( 'swell-lite-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '20130729' );
		wp_enqueue_script( 'swell-lite-hover', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '20130729' );
		wp_enqueue_script( 'swell-lite-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'swell-lite-hover' ), '20130729' );
		wp_enqueue_script( 'swell-lite-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'swell-lite-superfish', 'swell-lite-fitvids' ), '20130729', true );
		wp_enqueue_script( 'swell-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130729', true );

		// Load single scripts only on single pages.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'swell_lite_enqueue_scripts' );

if ( ! function_exists( 'swell_lite_enqueue_admin_scripts' ) ) {

	/** Function swell_lite_enqueue_admin_scripts */
	function swell_lite_enqueue_admin_scripts( $hook ) {
		if ( 'themes.php' !== $hook ) {
			return;
		}
		wp_enqueue_script( 'swell-custom-admin', get_template_directory_uri() . '/js/jquery.custom.admin.js', array( 'jquery' ), '1.0', true );
	}
}
add_action( 'admin_enqueue_scripts', 'swell_lite_enqueue_admin_scripts' );

/*
-------------------------------------------------------------------------------------------------------
	Gutenberg Editor Styles
-------------------------------------------------------------------------------------------------------
*/

/**
 * Enqueue WordPress theme styles within Gutenberg.
 */
function swell_lite_gutenberg_styles() {
	// Load the theme styles within Gutenberg.
		wp_enqueue_style(
			'swell-lite-gutenberg',
			get_theme_file_uri( '/css/gutenberg.css' ),
			false,
			'1.0',
			'all'
		);
		wp_enqueue_style(
			'font-awesome',
			get_template_directory_uri() . '/css/font-awesome.css',
			array( 'swell-lite-gutenberg' ),
			'1.0'
		);
}
add_action( 'enqueue_block_editor_assets', 'swell_lite_gutenberg_styles', 10 );

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

/** Function swell_lite_widgets_init */
function swell_lite_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__( 'Default Sidebar', 'swell-lite' ),
		'id'            => 'default-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="title">',
		'after_title'   => '</h6>',
	));
	register_sidebar(array(
		'name'          => esc_html__( 'Blog Sidebar', 'swell-lite' ),
		'id'            => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6 class="title">',
		'after_title'   => '</h6>',
	));
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widgets', 'swell-lite' ),
		'id'            => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h6 class="title">',
		'after_title'   => '</h6>',
	));
}
add_action( 'widgets_init', 'swell_lite_widgets_init' );

/*
-------------------------------------------------------------------------------------------------------
	Add Stylesheet To Visual Editor
-------------------------------------------------------------------------------------------------------
*/

add_action( 'widgets_init', 'swell_lite_add_editor_styles' );
/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function swell_lite_add_editor_styles() {
	add_editor_style( 'css/style-editor.css' );
}

/*
------------------------------------------------------------------------------------------------------
	Content Width
------------------------------------------------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) { $content_width = 760; }

/** Function swell_lite_content_width */
function swell_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'swell_lite_content_width', 760 );
}
add_action( 'after_setup_theme', 'swell_lite_content_width', 0 );

/*
-------------------------------------------------------------------------------------------------------
	Comments Function
-------------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'swell_lite_comment' ) ) :

	/**
	 * Setup our comments for the theme.
	 *
	 * @param array $comment IDs for categories.
	 * @param array $args Comment arguments.
	 * @param array $depth Level of replies.
	 */
	function swell_lite_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
		?>

		<li class="post pingback">
			<p><?php esc_html_e( 'Pingback:', 'swell-lite' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'swell-lite' ), '<span class="edit-link">', '</span>' ); ?></p>
		</li>

		<?php
			break;
			default :
		?>

		<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">

			<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">

				<footer class="comment-meta">
					<div class="comment-author vcard">
						<?php
							$avatar_size = 72;
						if ( '0' != $comment->comment_parent ) {
							$avatar_size = 48; }

							echo get_avatar( $comment, $avatar_size );

							/* translators: 1: comment author, 2: date and time */
							printf( __( '%1$s <br/> %2$s <br/>', 'swell-lite' ),
								sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
								sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
									esc_url( get_comment_link( $comment->comment_ID ) ),
									get_comment_time( 'c' ),
									/* translators: 1: date, 2: time */
									sprintf( __( '%1$s', 'swell-lite' ), get_comment_date(), get_comment_time() )
								)
							);
							?>
						</div><!-- END .comment-author .vcard -->
					</footer>

					<div class="comment-content">
						<?php if ( '0' == $comment->comment_approved ) : ?>
						<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'swell-lite' ); ?></em>
						<br />
					<?php endif; ?>
						<?php comment_text(); ?>
						<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'swell-lite' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div><!-- .reply -->
						<?php edit_comment_link( esc_html__( 'Edit', 'swell-lite' ), '<span class="edit-link">', '</span>' ); ?>
					</div>

				</article><!-- #comment-## -->

		</li>

		<?php
		break;
		endswitch;
	}
endif; // Ends check for swell_lite_comment().

/*
-------------------------------------------------------------------------------------------------------
	Custom Excerpt
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds a custom excerpt length.
 *
 * @param array $length Excerpt word count.
 * @return array
 */
function swell_lite_excerpt_length( $length ) {
	return 38;
}
add_filter( 'excerpt_length', 'swell_lite_excerpt_length', 999 );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Swell Lite 1.0
 * @param string $link Exacerpt permalink to post.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function swell_lite_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<div class="more-link-wrapper"><a href="%1$s" class="more-link">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'swell-lite' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'swell_lite_excerpt_more' );

/**
 * Creates a custom 'Read More' link by prepending and appending columns on either
 * side of the anchor to create a divider between the next post.
 *
 * @param string $link The anchor for rendering the more tag.
 * @param string $text The text for the more tag.
 */
function swell_lite_add_more_link_class( $link, $text ) {
	$html = '<div class="more-link-wrapper">';
		$html .= $link;
	$html .= '</div>';
	return $html;
} // End swell_lite_add_more_link_class.
add_action( 'the_content_more_link', 'swell_lite_add_more_link_class', 10, 2 );

/*
-------------------------------------------------------------------------------------------------------
	Custom Page Links
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom page links to pages.
 *
 * @param array $args for page links.
 * @return array
 */
function swell_lite_wp_link_pages_args_prevnext_add( $args ) {
	global $page, $numpages, $more, $pagenow;

	if ( ! $args['next_or_number'] == 'next_and_number' ) {
		return $args; }

	$args['next_or_number'] = 'number'; // Keep numbering for the main part.
	if ( ! $more ) {
		return $args; }

	if ( $page -1 ) { // There is a previous page.
		$args['before'] .= _wp_link_page( $page -1 )
			. $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'; }

	if ( $page < $numpages ) { // There is a next page.
		$args['after'] = _wp_link_page( $page + 1 )
			. $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
			. $args['after']; }

	return $args;
}

add_filter( 'wp_link_pages_args', 'swell_lite_wp_link_pages_args_prevnext_add' );

/*
-------------------------------------------------------------------------------------------------------
	Body Class
-------------------------------------------------------------------------------------------------------
*/

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function swell_lite_body_class( $classes ) {
	if ( is_singular() ) {
		$classes[] = 'swell-singular'; }

	if ( has_nav_menu( 'fixed-menu' ) ) {
		$classes[] = 'swell-fixed-menu'; }

	if ( is_singular() && is_active_sidebar( 'default-sidebar' ) || is_home() && is_active_sidebar( 'blog-sidebar' ) ) {
		$classes[] = 'swell-sidebar-active';
	} else {
		$classes[] = 'swell-sidebar-inactive';
	}

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'swell-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ), true ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'swell-relative-text';
	}

	return $classes;
}
add_action( 'body_class', 'swell_lite_body_class' );

/*
-------------------------------------------------------------------------------------------------------
	Includes
-------------------------------------------------------------------------------------------------------
*/

require_once( get_template_directory() . '/includes/customizer.php' );
require_once( get_template_directory() . '/includes/typefaces.php' );
require_once( get_template_directory() . '/includes/plugin-activation.php' );
require_once( get_template_directory() . '/includes/plugin-activation-class.php' );

/*
-------------------------------------------------------------------------------------------------------
	Load Jetpack File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}
