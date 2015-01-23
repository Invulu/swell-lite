<?php
/**
* The search form template for our theme.
*
* @package Swell Lite
* @since Swell Lite 1.0
*
*/
?>

<form method="get" id="searchform" class="clearfix" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="assistive-text"><?php _e( 'Search', 'swelllite' ); ?></label>
	<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'swelllite' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'swelllite' ); ?>" />
</form>