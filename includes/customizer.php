<?php
/**
* Theme customizer with real-time update
*
* Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
*
* @package Swell Lite
* @since Swell Lite 1.0
*/
function swelllite_theme_customizer( $wp_customize ) {

	// Category Dropdown Control
	class SwellLite_Category_Dropdown_Control extends WP_Customize_Control {
	public $type = 'dropdown-categories';

	public function render_content() {
		$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => __( '&mdash; Select &mdash;', 'swelllite' ),
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
	
	function swelllite_sanitize_categories( $input ) {
		$categories = get_terms( 'category', array('fields' => 'ids', 'get' => 'all') );
		
	   if ( in_array( $input, $categories ) ) {
	       return $input;
	   } else {
	   	return '';
	   }
	}
	
	function swelllite_sanitize_pages( $input ) {
		$pages = get_all_page_ids();
	 
	    if ( in_array( $input, $pages ) ) {
	        return $input;
	    } else {
	    	return '';
	    }
	}
	
	function swelllite_sanitize_transition_interval( $input ) {
	    $valid = array(
	        '2000' 		=> __( '2 Seconds', 'swelllite' ),
	        '4000' 		=> __( '4 Seconds', 'swelllite' ),
	        '6000' 		=> __( '6 Seconds', 'swelllite' ),
	        '8000' 		=> __( '8 Seconds', 'swelllite' ),
	        '10000' 	=> __( '10 Seconds', 'swelllite' ),
	        '12000' 	=> __( '12 Seconds', 'swelllite' ),
	        '20000' 	=> __( '20 Seconds', 'swelllite' ),
	        '30000' 	=> __( '30 Seconds', 'swelllite' ),
	        '60000' 	=> __( '1 Minute', 'swelllite' ),
	        '999999999'	=> __( 'Hold Frame', 'swelllite' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function swelllite_sanitize_transition_style( $input ) {
	    $valid = array(
	        'fade' 		=> __( 'Fade', 'swelllite' ),
	        'slide' 	=> __( 'Slide', 'swelllite' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function swelllite_sanitize_columns( $input ) {
	    $valid = array(
	        'one' 		=> __( 'One Column', 'swelllite' ),
	        'two' 		=> __( 'Two Columns', 'swelllite' ),
	        'three' 	=> __( 'Three Columns', 'swelllite' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function swelllite_sanitize_align( $input ) {
	    $valid = array(
	        'left' 		=> __( 'Left Align', 'swelllite' ),
	        'center' 		=> __( 'Center Align', 'swelllite' ),
	        'right' 	=> __( 'Right Align', 'swelllite' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function swelllite_sanitize_title_color( $input ) {
	    $valid = array(
	        'black' 	=> __( 'Black', 'swelllite' ),
	        'white' 	=> __( 'White', 'swelllite' ),
	    );
	 
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
	
	function swelllite_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}
	
	function swelllite_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}

	// Set site name and description text to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';

	// Set site title color to be previewed in real-time
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		
	//-------------------------------------------------------------------------------------------------------------------//
	// Site Title Section
	//-------------------------------------------------------------------------------------------------------------------//	
		
	$wp_customize->add_section( 'title_tagline' , array(
		'title'       => __( 'Site Title, Tagline & Logo', 'swelllite' ),
		'priority'    => 1,
	) );
	
		// Logo uploader
		$wp_customize->add_setting( 'swelllite_logo', array(
			'default' 	=> get_template_directory_uri() . '/images/logo.png',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'swelllite_logo', array(
			'label' 	=> __( 'Logo', 'swelllite' ),
			'section' 	=> 'title_tagline',
			'settings'	=> 'swelllite_logo',
			'priority'	=> 1,
		) ) );
		
		// Site Title Align
		$wp_customize->add_setting( 'title_align', array(
		    'default' => 'center',
		    'sanitize_callback' => 'swelllite_sanitize_align',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_align', array(
		    'type' => 'radio',
		    'label' => __( 'Title & Logo Alignment', 'swelllite' ),
		    'section' => 'title_tagline',
		    'choices' => array(
		        'left' 		=> __( 'Left Align', 'swelllite' ),
		        'center' 	=> __( 'Center Align', 'swelllite' ),
		        'right' 	=> __( 'Right Align', 'swelllite' ),
		    ),
		    'priority' => 60,
		) ) );
		
	//-------------------------------------------------------------------------------------------------------------------//
	// Layout
	//-------------------------------------------------------------------------------------------------------------------//
	
	$wp_customize->add_section( 'swelllite_layout_section' , array(
		'title'       => __( 'Layout', 'swelllite' ),
		'priority'    => 104,
	) );
		
		// Display Blog Author
		$wp_customize->add_setting( 'display_author_blog', array(
			'default'	=> true,
			'sanitize_callback' => 'swelllite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_author_blog', array(
			'label'		=> __( 'Show Blog Author Link?', 'swelllite' ),
			'section'	=> 'swelllite_layout_section',
			'settings'	=> 'display_author_blog',
			'type'		=> 'checkbox',
			'priority' => 60,
		) ) );
		
		// Display Blog Date
		$wp_customize->add_setting( 'display_date_blog', array(
			'default'	=> true,
			'sanitize_callback' => 'swelllite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_date_blog', array(
			'label'		=> __( 'Show Blog Date & Comment Link?', 'swelllite' ),
			'section'	=> 'swelllite_layout_section',
			'settings'	=> 'display_date_blog',
			'type'		=> 'checkbox',
			'priority' => 60,
		) ) );
		
		// Display Post Featured Image or Video
		$wp_customize->add_setting( 'display_feature_post', array(
			'default'	=> true,
			'sanitize_callback' => 'swelllite_sanitize_checkbox',
		) );
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_feature_post', array(
			'label'		=> __( 'Show Post Featured Images?', 'swelllite' ),
			'section'	=> 'swelllite_layout_section',
			'settings'	=> 'display_feature_post',
			'type'		=> 'checkbox',
			'priority' => 80,
		) ) );
	
}
add_action('customize_register', 'swelllite_theme_customizer');

/**
* Binds JavaScript handlers to make Customizer preview reload changes
* asynchronously.
*/
function swelllite_customize_preview_js() {
	wp_enqueue_script( 'swell-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ) );
}
add_action( 'customize_preview_init', 'swelllite_customize_preview_js' );