<?php
/**
 * Link shortcode
 *
 * Write [sjsons] in your post editor to render this shortcode.
 *
 * @since    1.0.0
 */

use Symfony\Component\PropertyAccess\PropertyAccess;

if ( ! function_exists( 'sjsons_shortcode' ) ) {
	// Add the action.
	add_action( 'plugins_loaded', function() {
		// Add the shortcode.
		add_shortcode( 'sjsons', 'sjsons_shortcode' );
	});
	
	/**
	 * Shortcode Function
	 *
	 * @param  Attributes $atts url|path URL PATH.
	 * @return string
	 * @since  1.0.0
	 */
	function sjsons_shortcode( $atts ) {
		$propertyAccessor = PropertyAccess::createPropertyAccessor();
		
		// Save $atts
		$_atts = shortcode_atts( array(
			'url'  => '',
			'path'  => '',
		), $atts );

		// URL
		$url = $_atts['url'];

		Humbug\set_headers([
			'API-Key: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJfaWQiOjEsInN0YXR1cyI6ImFjdGl2ZSIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTYwNTE1MzMwNX0.l0hQvP5g06_lyQROaTUldpf8VrArYZuN-Vp-M4T3Pgk'
		]);

		$data = json_decode(Humbug\get_contents($url));

		// Path
		$_atts['path'] = preg_replace("/\.?(\d+)/", "[$1]",$_atts['path']);
		$_atts['path'] = preg_replace("/(\d+)\./", "[$1].",$_atts['path']);
		// $path = $_atts['path'];
		$path = $_atts['path'];

		try {
			$result = $propertyAccessor->getValue($data, $path);
		} catch (Exception $e) {
			$result = 'Invalid JSON data, double-check your URL, path, and that you are linking to valid JSON';
		}

		// Return the data
		return $result;
	}
} // End if().
