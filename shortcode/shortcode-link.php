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

		$data = json_decode(Humbug\get_contents($url));

		// Path
		$_atts['path'] = preg_replace("/\.?(\d+)/", "[$1]",$_atts['path']);
		$_atts['path'] = preg_replace("/(\d+)\./", "[$1].",$_atts['path']);
		// $path = $_atts['path'];
		$path = $_atts['path'];
		$result = $propertyAccessor->getValue($data, $path); // 'Wouter'

		// Return the data
		return $result;
	}
} // End if().
