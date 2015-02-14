<?php
require_once locate_template('/lib/utils.php');           				// Utility functions
require_once locate_template('/lib/init.php');            				// Initial theme setup and constants
require_once locate_template('/lib/wrapper.php');         				// Theme wrapper class
require_once locate_template('/lib/config.php');          				// Configuration
require_once locate_template('/lib/titles.php');          				// Page titles
require_once locate_template('/lib/cleanup.php');         				// Cleanup
require_once locate_template('/lib/nav.php');             				// Custom nav modifications
require_once locate_template('/lib/gallery.php');         				// Custom [gallery] modifications
require_once locate_template('/lib/comments.php');        				// Custom comments modifications
require_once locate_template('/lib/relative-urls.php');   				// Root relative URLs
require_once locate_template('/lib/widgets.php');         				// Sidebars and widgets
require_once locate_template('/lib/scripts.php');         				// Scripts and stylesheets
require_once locate_template('/lib/social-share-count.php');      		// Custom functions
require_once locate_template('/lib/customizer.php');      				// Customizer functions
require_once locate_template('/lib/custom.php');          				// Custom functions
require_once locate_template('/lib/ajaxs.php');       					// Ajaxs functions
// require_once locate_template('/dw-importer/dw-importer.php');      		// Import sample data

function extend_date_archives_add_rewrite_rules($wp_rewrite) {
    $rules = array();
    $structures = array(
        $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_date_permastruct(),
        $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_month_permastruct(),
        $wp_rewrite->get_category_permastruct() . $wp_rewrite->get_year_permastruct(),
    );
    foreach( $structures as $s ){
        $rules += $wp_rewrite->generate_rewrite_rules($s);
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'extend_date_archives_add_rewrite_rules');