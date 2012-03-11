<?php
/*
Plugin Name: WP-PHPList
Plugin URI: http://www.funkypenguin.info/wp-phplist
Description: WP-PHPList is a plugin which integrates the PHPlist public pages into Wordpress 1.5+
Author: David Young
Author URI: http://www.funkypenguin.info
Version: 2.10.9
*/ 

load_plugin_textdomain('wpcf'); // NLS



function wp_phplist_add_options_page()
	{
		add_options_page('PHPList Integration', 'PHPList', 9, 'wp-phplist/wp-phplist-options.php');
	}
	

function wp_phplist_rewrite($wp_rewrite) {
	  $wp_phplist_slug = get_option('wp_phplist_slug');
	  $wp_rewrite->non_wp_rules = array($wp_phplist_slug => 'wp-content/plugins/wp-phplist/wp-phplist-page.php' );
	}

/* Action calls for all functions */


// Hook in.
add_filter('generate_rewrite_rules', 'wp_phplist_rewrite');
add_action('admin_head', 'wp_phplist_add_options_page');

?>
