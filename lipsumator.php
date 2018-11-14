<?php
/*
Plugin Name:  Lipsumator
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Lorem ipsum shortcode
Version:      0.0.1
Author:       WordPress.org
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  lipsumator
Domain Path:  /languages
*/

require_once dirname( __FILE__ ) . '/inc/LoremIpsum.php';


// Add Shortcode
function lipsumator_func( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'type' => 's',
			'count' => '1',
            'tag' => 'p',
		),
		$atts
    );

    $lipsum = new joshtronic\LoremIpsum();

    switch ($atts['type']) {
        case 'p':
            $output = $lipsum->paragraphs($atts['count'], $atts['tag']);
            break;
        case 's':
            $output = $lipsum->sentences($atts['count'], $atts['tag']);
            break;
        case 'w':
            $output = $lipsum->words($atts['count']);
            $output = '<' . $atts['tag'] . '>' . $output . '</' . $atts['tag'] . '>';
            break;
        default:
            $output = sprintf('<pre>Error! "' . $atts['type'] . '" ' . __('is not a valid type. Use "p","s" or "w".', 'lipsumator') . '</pre>');
            break;
    }

    $output = ucfirst($output);

    return wpautop($output);
    
    

}
add_shortcode( 'lipsum', 'lipsumator_func' );


