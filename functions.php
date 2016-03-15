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

	/** Function givingpress_lite_setup */
	function swell_lite_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'swell-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Enable support for site title tag.
		add_theme_support( 'title-tag' );

		add_image_size( 'swell-featured-large', 1800, 1200, true ); // Large Featured Image.
		add_image_size( 'swell-featured-medium', 1200, 800, true ); // Medium Featured Image.
		add_image_size( 'swell-featured-small', 640, 640, true ); // Small Featured Image.

		// Create Menus.
		register_nav_menus( array(
			'fixed-menu' => esc_html__( 'Fixed Menu', 'swell-lite' ),
			'main-menu' => esc_html__( 'Main Menu', 'swell-lite' ),
			'social-menu' => esc_html__( 'Social Menu', 'swell-lite' ),
		));

		// Custom Header.
		register_default_headers( array(
			'default' => array(
			'url'   => get_template_directory_uri() . '/images/default-header.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/default-header.jpg',
			'description'   => esc_html__( 'Default Custom Header', 'swell-lite' ),
			),
		));
		$defaults = array(
		'width'                 => 1800,
		'height'                => 480,
		'flex-height'           => true,
		'flex-width'            => true,
		'default-text-color'    => 'ffffff',
		'default-image' 		=> get_template_directory_uri() . '/images/default-header.jpg',
		'header-text'           => false,
		'uploads'               => true,
		);
		add_theme_support( 'custom-header', $defaults );

		// Custom Background.
		$defaults = array(
		'default-color'          => 'eeeeee',
		);
		add_theme_support( 'custom-background', $defaults );
	}
endif; // End function swell_lite_setup.
add_action( 'after_setup_theme', 'swell_lite_setup' );

/*
-------------------------------------------------------------------------------------------------------
	Admin Notice
-------------------------------------------------------------------------------------------------------
*/

/** Function swell_lite_admin_notice */
function swell_lite_admin_notice() {
	echo '<div class="updated"><p>';
	printf( __( 'Still using the <strong>Lite</strong> version!? <a href="%1$s" target="_blank">Upgrade to the premium Swell Theme</a> for more options, page templates, shortcodes, support and additional features.', 'swell-lite' ), 'http://organicthemes.com/theme/swell-theme/' );
	echo '</p></div>';
}
add_action( 'admin_notices', 'swell_lite_admin_notice' );

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

/*
-------------------------------------------------------------------------------------------------------
	Register Sidebars
-------------------------------------------------------------------------------------------------------
*/

/** Function swell_lite_widgets_init */
function swell_lite_widgets_init() {
	register_sidebar(array(
		'name' => esc_html__( 'Default Sidebar', 'swell-lite' ),
		'id' => 'default-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', 'swell-lite' ),
		'id' => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>',
	));
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widgets', 'swell-lite' ),
		'id' => 'footer',
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget' => '</div></div>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>',
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
								sprintf( esc_html__( '%1$s', 'swell-lite' ), get_comment_date(), get_comment_time() )
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
 * Return custom read more link text for the excerpt.
 *
 * @param array $more is the excerpt more link.
 * @return array
 */
function swell_lite_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">'. esc_html__( 'Read More', 'swell-lite' ) .'</a>';
}
add_filter( 'excerpt_more', 'swell_lite_excerpt_more' );

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

	if ( is_active_sidebar( 'right-sidebar' ) ) {
		$classes[] = 'swell-right-sidebar'; }

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

/*
-------------------------------------------------------------------------------------------------------
	Load Jetpack File
-------------------------------------------------------------------------------------------------------
*/

if ( class_exists( 'Jetpack' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}
