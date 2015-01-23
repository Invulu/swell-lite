<?php
/**
* Google Fonts Implementation
*
* @package Swell Lite
* @since Swell Lite 1.0
*
*/

/**
* Register Google Font URLs
*
* @since Swell Lite 1.0
*/

function swelllite_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    
    $raleway = _x( 'on', 'Raleway font: on or off', 'swelllite' );
    $roboto = _x( 'on', 'Roboto font: on or off', 'swelllite' );
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'swelllite' );
    $montserrat = _x( 'on', 'Montserrat font: on or off', 'swelllite' );
    $droid_serif = _x( 'on', 'Droid Serif font: on or off', 'swelllite' );
 
    if ( 'off' !== $raleway || 'off' !== $open_sans || 'off' !== $montserrat || 'off' !== $droid_serif ) {
        $font_families = array();
 		
        if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:400,200,300,800,700,500,600,900,100';
        }
        
        if ( 'off' !== $roboto ) {
            $font_families[] = 'Roboto:400,100italic,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:400,300,600,700,800,800italic,700italic,600italic,400italic,300italic';
        }
        
        if ( 'off' !== $montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }
        
        if ( 'off' !== $droid_serif ) {
            $font_families[] = 'Droid Serif:400,400italic,700,700italic';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
* Enqueue Google Fonts on Front End
*
* @since Swell Lite 1.0
*/

function swelllite_scripts_styles() {
    wp_enqueue_style( 'swell-fonts', swelllite_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'swelllite_scripts_styles' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since Swell Lite 1.0
*/
function swelllite_custom_header_fonts() {
    wp_enqueue_style( 'swell-fonts', swelllite_fonts_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'swelllite_scripts_styles' );

/**
* Add Google Scripts for use with the editor
*
* @since Swell Lite 1.0
*/
function swelllite_editor_styles() {
    add_editor_style( array( 'css/style-editor.css', swelllite_fonts_url() ) );
}
add_action( 'after_setup_theme', 'swelllite_editor_styles' );