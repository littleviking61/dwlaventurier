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

function my_gallery_shortcode($output, $attr) {
    global $post;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $selector = "gallery-{$instance}";

    $size_class = sanitize_html_class( $size );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id}'>";
    $output = '';
    $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

    $i = 0;
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, false, false);
        // Here we add the image title
        $output .= "$link";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= wptexturize($attachment->post_excerpt);
        }
    }

    $output .= "
        </div>\n";

    return $output;
}
add_filter('post_gallery', 'my_gallery_shortcode', 10, 2);
