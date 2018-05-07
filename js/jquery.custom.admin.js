( function( $ ) {

	'use strict';

	function modifyAdmin() {

		$( '.theme-browser .theme.active .theme-screenshot' ).after( '<div class="notice notice-warning notice-alt"><p><i class="fa fa-arrow-circle-up" style="color:#f56e28;font-size:18px;margin-right:4px;position:relative;top:2px;"></i> Upgrade available. <a href="https://organicthemes.com/theme/swell-theme/" target="_blank">Upgrade now</a></p></div>' );

		$( '.theme-browser .theme.active' ).click(function() {
			setTimeout( function() {
				$( '.theme-overlay.active .theme-author' ).after( '<div class="notice notice-warning notice-alt notice-large"><h3 class="notice-title">Upgrade Available</h3><p><b>Upgrade to the premium version for additional theme options, colors, page templates, demo content, and customer support. <a href="https://organicthemes.com/theme/swell-theme/" target="_blank">View details</a> or <a href="https://organicthemes.com/theme/swell-theme/checkout?edd_action=add_to_cart&download_id=168400" target="_blank">upgrade now.</a></b></p></div>' );
			}, 200);
		});

	}

	$( document )
	.ready( modifyAdmin );

})( jQuery );
