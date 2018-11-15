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
require_once dirname( __FILE__ ) . '/inc/shortcode.php';
require_once dirname( __FILE__ ) . '/inc/options.php';

/**
 * Enqueue the highlight stylesheet if the lipsum shortcode is being used and highlighting is turned on.
 */
function wpdocs_shortcode_scripts() {
    global $post;
    $plugin_url = plugin_dir_url( __FILE__ );
    $options = get_option('lipsumator_options');
    if ( isset($options['highlight']) && has_shortcode( $post->post_content, 'lipsum') ) {
        wp_enqueue_style( 'lipsumator', $plugin_url . 'css/highlight.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpdocs_shortcode_scripts');

// Add settings link to plugin page
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'add_action_links' );

function add_action_links ( $links ) {
 $mylinks = array(
 '<a href="' . admin_url( 'tools.php?page=lipsumator' ) . '">Settings</a>',
 );
return array_merge( $links, $mylinks );
}

/**
 * Load settings page Styling
 */
function load_lipsumator_wp_admin_style($hook) {
    // Load only on ?page=mypluginname
    if($hook != 'tools_page_lipsumator') {
            return;
    }
    wp_enqueue_style( 'lipsumator_settings_page_css', plugin_dir_url( __FILE__ ) . 'css/settings-page.css' );
}
add_action( 'admin_enqueue_scripts', 'load_lipsumator_wp_admin_style' );