<?php
/**
 * Enqueue scripts and stylesheets
 */
function dw_timeline_scripts() {
  $style_selector = dw_timeline_get_theme_option('style_selector');
  $template_directory_uri = get_template_directory_uri();
  // if ( $style_selector ==  'flat' ) {
  //   wp_enqueue_style('dw_timeline_flat', $template_directory_uri . '/assets/css/dw-timeline-pro-flat.min.css', false, '6c39f42987ae297a5a21e2bb35bf3402');
  // } else {
  //   wp_enqueue_style('dw_timeline_main', $template_directory_uri . '/assets/css/dw-timeline-pro.min.css', false, '6c39f42987ae297a5a21e2bb35bf3402');
  // }
  wp_enqueue_style('dw_timeline_flat', $template_directory_uri . '/assets/css/dwlaventurier.min.css', false, '6c39f42987ae297a5a21e2bb35bf3402');

  wp_enqueue_style( 'dw_timeline_style', get_stylesheet_uri(), false, 'c1a58eb4baaf24c3771085df3d54ff8d' );

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, null, false);
    add_filter('script_loader_src', 'dw_timeline_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('modernizr', $template_directory_uri . '/assets/js/vendor/modernizr.min.js', false, null, false);
  wp_register_script('infinitescroll', $template_directory_uri . '/assets/js/vendor/jquery.infinitescroll.min.js', false, '', true);
  wp_register_script('bootstrap', $template_directory_uri . '/assets/js/vendor/bootstrap.min.js', false, '', true);
  wp_register_script('prettify', $template_directory_uri . '/assets/js/vendor/prettify.js', false, '', false);
  wp_register_script('nivo_lightbox', $template_directory_uri . '/assets/js/vendor/nivo-lightbox.min.js', false, '', false);
  wp_register_script('imagesLoaded', $template_directory_uri . '/assets/js/vendor/imagesloaded.pkgd.min.js', false, '', false);
  wp_register_script('velocity', $template_directory_uri . '/assets/js/vendor/velocity.min.js', false, '', false);
  wp_register_script('velocity-ui', $template_directory_uri . '/assets/js/vendor/velocity.ui.min.js', false, '', false);
  wp_register_script('dw_timeline_single_scripts', $template_directory_uri . '/assets/js/single-scripts.min.js', array( 'jquery' ), '', true);
  wp_register_script('dw_timeline_scripts', $template_directory_uri . '/assets/js/scripts.js', array( 'jquery' ), '', true);
  if (is_user_logged_in() && is_home()) wp_register_script('dw_timeline_post_form', $template_directory_uri . '/assets/js/post-form.min.js' , array('jquery','dw_timeline_scripts'), '', true );

  $style_selector = dw_timeline_get_theme_option('style_selector');
  $loading_timline = $template_directory_uri . '/assets/img/loading-default.gif';
  if ( $style_selector == 'flat' ) {
    $loading_timline = $template_directory_uri . '/assets/img/loading-flat.gif'; 
  }

  $more_button = dw_timeline_get_theme_option('show_more_button');

  $gallery_lightbox = dw_timeline_get_theme_option('gallery_lightbox');

  wp_localize_script( 'dw_timeline_scripts', 'dwtl', array(
    'ajax_url'               => admin_url( 'admin-ajax.php' ),
    'template_directory_uri' => $template_directory_uri,
    'gallery_lightbox' => $gallery_lightbox
  ));
  wp_localize_script( 'dw_timeline_scripts', 'infinitescroll', array(
    'page' => __('page','dw-timeline'),
    'more' => __('more','dw-timeline'),
    'loading_timline' => $loading_timline,
    'the_end' => __('the end','dw-timeline'),
    'show_more_button' => $more_button
  ));

  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'jquery-ui-core' );
  wp_enqueue_script( 'jquery-ui-tooltip' );
  wp_enqueue_script('bootstrap');
  wp_enqueue_script('infinitescroll');
  wp_enqueue_script('prettify');
  wp_enqueue_script('nivo_lightbox');
  wp_enqueue_script('imagesLoaded');
  wp_enqueue_script('velocity');
  wp_enqueue_script('velocity-ui');
  wp_enqueue_script('dw_timeline_scripts','','jquery');
  if( is_single() ) {
    wp_enqueue_script('dw_timeline_single_scripts');
  }
  if( !is_single() && !is_page() && is_user_logged_in() ) {
    wp_enqueue_script('dw_timeline_post_form');
  }


  if (function_exists('dwpb')) {
    wp_enqueue_style( 'dw_promobar_style', $template_directory_uri .'/assets/plugin/dw-promobar/style.css',true);
    wp_enqueue_script('dw_promobar_script', $template_directory_uri . '/assets/plugin//dw-promobar/script.js', array('jquery','dwpb_script'),'',true);
  }
}
add_action('wp_enqueue_scripts', 'dw_timeline_scripts', 100);

// http://wordpress.stackexchange.com/a/12450
function dw_timeline_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;

  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/assets/js/vendor/jquery-1.10.2.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }

  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }

  return $src;
}
add_action('wp_head', 'dw_timeline_jquery_local_fallback');

/**
 * Enqueue admin scripts
 */
function dw_timeline_admin_scripts() {
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script('dw_timeline_admin_scripts', get_template_directory_uri() . '/assets/js/admin-scripts.min.js', array( 'wp-color-picker' ), '', true);
}
add_action( 'admin_enqueue_scripts', 'dw_timeline_admin_scripts' );

/**
 * Enqueue customize scripts
 */ 
function dw_timeline_customize_controls_scripts() {
  wp_enqueue_script( 'dw_timeline_customize_controls_scripts', get_template_directory_uri() . '/assets/js/customize.min.js' , array(), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'dw_timeline_customize_controls_scripts' );

/**
 * Facebook API Integrate
 */
function dw_timeline_facebook_api(){
  ?>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=312068372256054";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <?php
}
add_action('wp_footer','dw_timeline_facebook_api');