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
require_once locate_template('/lib/ajaxs.php');                         // Ajaxs functions
require_once locate_template('/lib/post-like.php');       					// Ajaxs functions
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
        // $link = wp_get_attachment_link($id, $size, false, false);
        // Here we add the image title

        $urlFull = wp_get_attachment_image_src($id, 'full');
        $urlLarge = is_single() ? wp_get_attachment_image_src($id, 'large') : wp_get_attachment_image_src($id, 'medium');

        $link = "<a href='{$urlLarge[0]}' data-full='{$urlFull[0]}'>";
        $link .= wp_get_attachment_image($id);
        $link .= '</a>';

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

function bimLes_comment() {
    global $post, $id, $comments;
    $post_id = (int) $_GET['postId'] ?: (int) $_POST['postId'];
    $post = get_post($post_id);
    $ajax_class = 'mp-popup';
    $comments_args = array(
        'post_id' => $post_id,
        // 'number' => $get,//Número Máximo de Comentarios a Cargar
        // 'order' => $orderComments,//Orden de los Comentarios
        // 'offset' => $offset,//Desplazamiento desde el último comentario
        'status' => 'approve'
    );
    
    $comments = get_comments($comments_args);
    // wp_list_comments(array('walker' => new DW_Timeline_Walker_Comment), $comments);
    $template = locate_template( 'templates/comments.php' );
    if(file_exists($template)) {
        include($template);
    }
    
    die();
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_get_comment', 'bimLes_comment' );
add_action( 'wp_ajax_get_comment', 'bimLes_comment' );

/* ajax call funtion */
function bimLa_gallery($id) {
    $gallery = $_GET['gallery'] ?: $_POST['gallery'];
    $index = (int) $_GET['index'] ?: (int) $_POST['index'];

    $template = locate_template( 'ajax-gallery.php' );
    if(file_exists($template)) {
        include($template);
    }

    // get_template_part( 'single', 'gallery' );
    die();  
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_get_gallery', 'bimLa_gallery' );
add_action( 'wp_ajax_get_gallery', 'bimLa_gallery' );

function bimLa_position($id) {

    $template = locate_template( 'ajax-trace.php' );
    if(file_exists($template)) {
        include($template);
    }

    // get_template_part( 'single', 'gallery' );
    die();  
}
// creating Ajax call for WordPress
add_action( 'wp_ajax_nopriv_get_position', 'bimLa_position' );
add_action( 'wp_ajax_get_position', 'bimLa_position' );


// bookmark
function bookmarks_shortcode( $atts = array() ) {
    $defaults = array(
        'title_li'         => false,
        'title_before'     => '<hr><h2>',
        'title_after'      => '</h2>',
        'category'         => ' ',
        'category_before'  => false,
        'category_after'   => false,
        'categorize'       => true,
        'show_description' => true,
        'between'          => '<br />',
        'show_images'      => false,
        'show_rating'      => false,
        'echo'             => false,
    );

    $args = wp_parse_args( $atts, $defaults );
    return wp_list_bookmarks( $args );
}
add_shortcode( 'links', 'bookmarks_shortcode' );

// bookmark
function bigmap_shortcode( $atts = array() ) {
    $allMarker = true;
    $template = locate_template( 'templates/map.php' );
    if(file_exists($template)) {
        ob_start();
        include($template);
        $content = ob_get_contents();
        ob_end_clean();
    }
    return $content;
}
add_shortcode( 'maps', 'bigmap_shortcode' );

// bookmark
function bigtrace_shortcode( $atts = array() ) {
    $allMarker = true;
    $template = locate_template( 'templates/trace.php' );
    if(file_exists($template)) {
        ob_start();
        include($template);
        $content = ob_get_contents();
        ob_end_clean();
    }
    return $content;
}
add_shortcode( 'trace', 'bigtrace_shortcode' );


add_filter('wp_ulike_format_number','wp_ulike_new_format_number',10,3);
function wp_ulike_new_format_number($value, $num, $plus){
    if ($num >= 1000 && get_option('wp_ulike_format_number') == '1'):
    $value = round($num/1000, 2) . 'K';
    else:
    $value = $num;
    endif;
    return $value;
}  