<?php
/**
 * Theme customizer with real-time update
 *
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @package Swell Lite
 * @since Swell Lite 1.0
 */

/**
 * Setup the customizer.
 *
 * @param array $wp_customize Customizer settings.
 * @return array
 */
function swell_lite_theme_customizer( $wp_customize ) {

	// Category Dropdown Control.
	class Swell_Lite_Category_Dropdown_Control extends WP_Customize_Control {

		public $type = 'dropdown-categories';

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'swell-lite' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
				)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf( '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			);
		}
	}

	/**
	 * Sanitize Categories.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_categories( $input ) {
		$categories = get_terms( 'category', array( 'fields' => 'ids', 'get' => 'all' ) );

		if ( in_array( $input, $categories, true ) ) {
			return $input;
		} else {
			return '';
		}
	}

	/**
	 * Sanitize Pages.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_pages( $input ) {
		$pages = get_all_page_ids();

	    if ( in_array( $input, $pages, true ) ) {
	        return $input;
	    } else {
	    	return '';
	    }
	}

	/**
	 * Sanitize Slideshow Transition Interval.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_transition_interval( $input ) {
	    $valid = array(
	        '2000' 		=> esc_html__( '2 Seconds', 'swell-lite' ),
	        '4000' 		=> esc_html__( '4 Seconds', 'swell-lite' ),
	        '6000' 		=> esc_html__( '6 Seconds', 'swell-lite' ),
	        '8000' 		=> esc_html__( '8 Seconds', 'swell-lite' ),
	        '10000' 	=> esc_html__( '10 Seconds', 'swell-lite' ),
	        '12000' 	=> esc_html__( '12 Seconds', 'swell-lite' ),
	        '20000' 	=> esc_html__( '20 Seconds', 'swell-lite' ),
	        '30000' 	=> esc_html__( '30 Seconds', 'swell-lite' ),
	        '60000' 	=> esc_html__( '1 Minute', 'swell-lite' ),
	        '999999999'	=> esc_html__( 'Hold Frame', 'swell-lite' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	/**
	 * Sanitize Slideshow Transition Style.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_transition_style( $input ) {
	    $valid = array(
	        'fade' 		=> esc_html__( 'Fade', 'swell-lite' ),
	        'slide' 	=> esc_html__( 'Slide', 'swell-lite' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	/**
	 * Sanitize Columns.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_columns( $input ) {
	    $valid = array(
	        'one' 		=> esc_html__( 'One Column', 'swell-lite' ),
	        'two' 		=> esc_html__( 'Two Columns', 'swell-lite' ),
	        'three' 	=> esc_html__( 'Three Columns', 'swell-lite' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	/**
	 * Sanitize Alignment.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_align( $input ) {
	    $valid = array(
	        'left' 		=> esc_html__( 'Left Align', 'swell-lite' ),
	        'center' 		=> esc_html__( 'Center Align', 'swell-lite' ),
	        'right' 	=> esc_html__( 'Right Align', 'swell-lite' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	/**
	 * Sanitize Colors.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_title_color( $input ) {
	    $valid = array(
	        'black' 	=> esc_html__( 'Black', 'swell-lite' ),
	        'white' 	=> esc_html__( 'White', 'swell-lite' ),
	    );

	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}

	/**
	 * Sanitize Checkboxes.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_checkbox( $input ) {
		if ( 1 == $input ) {
			return 1;
		} else {
			return '';
		}
	}

	/**
	 * Sanitize Text Input.
	 *
	 * @param array $input Sanitizes user input.
	 * @return array
	 */
	function swell_lite_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}

	// Set site name and description text to be previewed in real-time.
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	// Set site title color to be previewed in real-time.
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*
	-------------------------------------------------------------------------------------------------------
		Site Title Section
	-------------------------------------------------------------------------------------------------------
	*/

	$wp_customize->add_section( 'title_tagline' , array(
		'title'       => esc_html__( 'Site Title, Tagline & Logo', 'swell-lite' ),
		'priority'    => 1,
	) );

		// Logo uploader.
		$wp_customize->add_setting( 'swell_lite_logo', array(
			'default' 	=> get_template_directory_uri() . '/images/logo.png',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'swell_lite_logo', array(
			'label' 	=> esc_html__( 'Logo', 'swell-lite' ),
			'section' 	=> 'title_tagline',
			'settings'	=> 'swell_lite_logo',
			'priority'	=> 1,
		) ) );

		// Site Title Align.
		$wp_customize->add_setting( 'title_align', array(
		    'default' => 'center',
		    'sanitize_callback' => 'swell_lite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_align', array(
		    'type' => 'radio',
		    'label' => esc_html__( 'Title & Logo Alignment', 'swell-lite' ),
		    'section' => 'title_tagline',
		    'choices' => array(
		        'left' 		=> esc_html__( 'Left Align', 'swell-lite' ),
		        'center' 	=> esc_html__( 'Center Align', 'swell-lite' ),
		        'right' 	=> esc_html__( 'Right Align', 'swell-lite' ),
		    ),
		    'priority' => 60,
		) ) );

		/*
		-------------------------------------------------------------------------------------------------------
			Theme Options Panel
		-------------------------------------------------------------------------------------------------------
		*/

		$wp_customize->add_section( 'swell_lite_theme_options' , array(
			'title'       => esc_attr__( 'Theme Options', 'swell-lite' ),
			'priority'    => 1,
		) );

		/*
		-------------------------------------------------------------------------------------------------------
			Layout Options
		-------------------------------------------------------------------------------------------------------
		*/

		// Display Blog Date.
		$wp_customize->add_setting( 'display_date_blog', array(
			'default'	=> '1',
			'sanitize_callback' => 'swell_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_date_blog', array(
			'label'		=> esc_html__( 'Show Post Date & Comment Link?', 'swell-lite' ),
			'section'	=> 'swell_lite_theme_options',
			'settings'	=> 'display_date_blog',
			'type'		=> 'checkbox',
			'priority' => 20,
		) ) );

		// Display Blog Author.
		$wp_customize->add_setting( 'display_author_blog', array(
			'default'	=> '1',
			'sanitize_callback' => 'swell_lite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_author_blog', array(
			'label'		=> esc_html__( 'Show Post Author Link?', 'swell-lite' ),
			'section'	=> 'swell_lite_theme_options',
			'settings'	=> 'display_author_blog',
			'type'		=> 'checkbox',
			'priority' => 40,
		) ) );

}
add_action( 'customize_register', 'swell_lite_theme_customizer' );

/**
 * Binds JavaScript handlers to make Customizer preview reload changes
 * asynchronously.
 */
function swell_lite_customize_preview_js() {
	wp_enqueue_script( 'swell-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'swell_lite_customize_preview_js' );
