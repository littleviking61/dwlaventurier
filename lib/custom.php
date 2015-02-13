<?php
/**
 *  Add grid value in post class
 */

// Add Metabox
if ( ! function_exists('dw_timeline_meta_box')) {
  function dw_timeline_meta_box() {
    add_meta_box(
        'dw_timeline_post_setting',
        __( 'Post Settings', 'dw-timeline' ),
        'dw_timeline_post_setting_callback',
        'post',
        'side',
        'high'
    );

    add_meta_box(
        'dw_timeline_page_setting',
        __( 'Page Settings', 'dw-timeline' ),
        'dw_timeline_page_setting_callback',
        'page',
        'side',
        'high'
    );
  }
  add_action( 'add_meta_boxes', 'dw_timeline_meta_box' );
}

if ( ! function_exists('dw_timeline_post_setting_callback')) {
  function dw_timeline_post_setting_callback( $post ) {
    wp_nonce_field( 'dw_timeline_post_setting_callback', 'dw_timeline_post_setting_callback_nonce' );

    $grid_value = get_post_meta( $post->ID, 'dw-grid', true );
    $feature_image = get_post_meta( $post->ID, 'dw-feature-image', true );
    $feature_image_size = get_post_meta( $post->ID, 'dw-feature-image-size', true );
    $feature_image_position = get_post_meta( $post->ID, 'dw-feature-image-position', true );
    $background_color = get_post_meta( $post->ID, 'dw-background-color', true );
    ?>
      
    <table width="100%">
      <tr><td colspan="2" style="text-align: right">
      <a style="text-decoration: none" target="_blank" title="<?php _e('Helps','dw-timline') ?>" href="http://www.designwall.com/guide/dw-timeline-pro/#post_settings"><div data-code="f223" class="dashicons dashicons-editor-help"></div></a> 
      </td></tr>
      
      <tr><td colspan="2"><strong><?php _e('Select Grid','dw-timeline') ?></strong></td></tr>
      <tr>
        <td width="50%">
          <label>
          <input type="radio" name="dw_timeline_post_grid_setting" value="normal" checked="checked">
          <span><?php _e('Normal','dw-timeline') ?></span>
          </label>
        </td>

        <td width="50%">
          <label>
          <input type="radio" name="dw_timeline_post_grid_setting" value="full" <?php if ($grid_value == 'full') echo 'checked="checked"'  ?> >
          <span><?php _e('Full','dw-timeline') ?></span>
          </label>
        </td>
      </tr>

      <tr><td height="10"></td></tr>
      <tr><td colspan="2"><strong><?php _e('Enable featured image ?','dw-timeline') ?></strong></td></tr>
      <tr>
        <td width="50%">
          <label>
          <input type="radio" name="dw_timeline_feature_image" value="yes" checked="checked">
          <span><?php _e('Yes','dw-timeline') ?></span>
          </label>
        </td>

        <td width="50%">
          <label>
          <input type="radio" name="dw_timeline_feature_image" value="no" <?php if ($feature_image == 'no') echo 'checked="checked"'  ?> >
          <span><?php _e('No','dw-timeline') ?></span>
          </label>
        </td>
      </tr>
      
      <tr><td height="10"></td></tr>
      <tr><td colspan="2"><strong><?php _e('Featured image size','dw-timeline') ?></strong></td></tr>
      <tr>
        <td colspan="2"><input name="dw_timeline_feature_image_size" type="text" value="<?php echo $feature_image_size ?>" /></td>
      </tr>

      <tr><td height="10"></td></tr>
      <tr><td colspan="2"><strong><?php _e('Featured image position','dw-timeline') ?></strong></td></tr>
      <tr>
        <td colspan="2"><input name="dw_timeline_feature_image_position" type="text" value="<?php echo $feature_image_position ?>" /></td>
      </tr>

      <tr><td height="10"></td></tr>
      <tr><td colspan="2"><strong><?php _e('Background color of featured mask','dw-timeline') ?></strong></td></tr>
      <tr>
        <td colspan="2"><input name="dw_timeline_post_background_color" type="text" value="<?php echo $background_color; ?>" class="post-background-color" /></td>
      </tr>
    </table>

    <?php
  }
}

if ( ! function_exists('dw_timeline_page_setting_callback')) {
  function dw_timeline_page_setting_callback( $post ) {
    wp_nonce_field( 'dw_timeline_post_setting_callback', 'dw_timeline_post_setting_callback_nonce' );

    $background_color = get_post_meta( $post->ID, 'dw-background-color', true );
    $feature_image_size = get_post_meta( $post->ID, 'dw-feature-image-size', true );
    $feature_image_position = get_post_meta( $post->ID, 'dw-feature-image-position', true );
    ?>
    
    <table width="100%">
      <tr><td colspan="2" style="text-align: right">
      <a style="text-decoration: none" target="_blank" title="<?php _e('Helps','dw-timline') ?>" href="http://www.designwall.com/guide/dw-timeline-pro/#page_settings"><div data-code="f223" class="dashicons dashicons-editor-help"></div></a> 
      </td></tr>
      
      <tr><td colspan="2"><strong><?php _e('Featured image size','dw-timeline') ?></strong></td></tr>
      <tr>
        <td colspan="2"><input name="dw_timeline_feature_image_size" type="text" value="<?php echo $feature_image_size ?>" /></td>
      </tr>

      <tr><td height="10"></td></tr>
      <tr><td colspan="2"><strong><?php _e('Featured image position','dw-timeline') ?></strong></td></tr>
      <tr>
        <td colspan="2"><input name="dw_timeline_feature_image_position" type="text" value="<?php echo $feature_image_position ?>" /></td>
      </tr>

      <tr><td height="10"></td></tr>
      <tr><td colspan="2"><strong><?php _e('Background color of featured mask','dw-timeline') ?></strong></td></tr>
      <tr>
        <td colspan="2"><input name="dw_timeline_post_background_color" type="text" value="<?php echo $background_color; ?>" class="post-background-color" /></td>
      </tr>
    </table>

    <?php
  }
}

if ( ! function_exists('dw_timeline_post_setting_save_postdata')) {
  function dw_timeline_post_setting_save_postdata( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['dw_timeline_post_setting_callback_nonce'] ) )
    return $post_id;

    $nonce = $_POST['dw_timeline_post_setting_callback_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'dw_timeline_post_setting_callback' ) )
    return $post_id;

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
    return $post_id;

    // Check the user's permissions.
    if ( 'page' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
      return $post_id;
    }

    /* OK, its safe for us to save the data now. */
    $dw_timeline_post_grid_setting_data = $_POST['dw_timeline_post_grid_setting'];
    if ($dw_timeline_post_grid_setting_data) {
      update_post_meta( $post_id, 'dw-grid', $dw_timeline_post_grid_setting_data );
    }

    $dw_timeline_feature_image_data = $_POST['dw_timeline_feature_image'];
    if ($dw_timeline_feature_image_data) {
      update_post_meta( $post_id, 'dw-feature-image', $dw_timeline_feature_image_data );
    }

    $dw_timeline_post_background_color_data = $_POST['dw_timeline_post_background_color'];
    if ( $dw_timeline_post_background_color_data ) {
      update_post_meta( $post_id, 'dw-background-color', $dw_timeline_post_background_color_data );  
    }

    $dw_timeline_feature_image_size_data = $_POST['dw_timeline_feature_image_size'];
    if ( $dw_timeline_feature_image_size_data ) {
      update_post_meta( $post_id, 'dw-feature-image-size', $dw_timeline_feature_image_size_data );  
    }

    $dw_timeline_feature_image_position_data = $_POST['dw_timeline_feature_image_position'];
    if ( $dw_timeline_feature_image_position_data ) {
      update_post_meta( $post_id, 'dw-feature-image-position', $dw_timeline_feature_image_position_data );  
    }
  }
  add_action( 'save_post', 'dw_timeline_post_setting_save_postdata' );
}

if ( ! function_exists('dw_timeline_grid_class')) {
  // Add grid value in post class
  function dw_timeline_grid_class($classes) {
    global $post;
    $grid_value = get_post_meta( $post->ID, 'dw-grid', true );
    if ( empty($grid_value) ) {
      $grid_value = 'normal';
    }
    $classes[] = 'dwtl ' . $grid_value;
    return $classes;
  }
  add_filter('post_class', 'dw_timeline_grid_class');
}

/**
 *  Add grid value in post class
 */
if( ! function_exists('dw_timeline_file_get_content') ) {
  function dw_timeline_file_get_content( $url ){
    $content = wp_remote_get( $url );
    return wp_remote_retrieve_body( $content );
  }
}

/**
 *  Back to top
 */
if ( ! function_exists('dw_timeline_back_top')) {
  function dw_timeline_back_top() {
    if ( ! is_404() ) {
      echo '<a id="back-to-top" class="scrollup" href="#""><i class="fa fa-chevron-up"></i></a>';
    }
  }
  add_action('wp_footer', 'dw_timeline_back_top');
}

/**
 *  Adjacent post
 */
if ( !function_exists('dw_timeline_adjacent_post')) {
  function dw_timeline_adjacent_post(){
    if ( is_single() ) {
      $adjacent_post_exclude = '';
      if (dw_timeline_get_theme_option('adjacent_post_exclude')) {
        $adjacent_post_exclude = implode(',', dw_timeline_get_theme_option('adjacent_post_exclude'));
      }
      $adjacent_post = get_adjacent_post(false,$adjacent_post_exclude);
      if ($adjacent_post) {
        $adjacent_post_id = $adjacent_post->ID;
        $the_query = new WP_Query( 'p='.$adjacent_post_id );
        // The Loop
        if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
            $the_query->the_post();
            $adjacent_post_thumb =  wp_get_attachment_url(get_post_thumbnail_id() );
            $class = 'no-thumbnail';
            if ( !empty($adjacent_post_thumb)) {
              $class = 'has-thumbnail';
            }
            ?>
            <div class="adjacent-post <?php echo $class; ?> " style="background-image: url(<?php echo $adjacent_post_thumb?>)">
              <a class="adjacent-post-link" href="<?php echo get_permalink(); ?>"></a>
              <div class="container">
                <div class="row">
                  <div class="adjacent-post-header col-md-8 col-md-offset-2">
                    <span class="read-next"><?php _e('read next','dw-timeline') ?></span>
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    <?php get_template_part('templates/entry-meta'); ?>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        }
        wp_reset_postdata();
      } else {

      }
    }
  }
}

/** 
 *  Estimate Reading Time
 */
if( !function_exists('dw_timeline_eta') ) {
  function dw_timeline_eta(){
    global $post;
    $words_per_minute = 270;
    $words_per_second = $words_per_minute / 60;
    $post_content = $post->post_content;
    $word_count = str_word_count(strip_tags($post_content));
    
    $total_reading_time = $word_count / $words_per_second;
    
    $reading_time_minutes = round( $total_reading_time / 60 );

    $reading_time_seconds =  round( $total_reading_time - $reading_time_minutes * 60 );

    if( $reading_time_minutes <= 0 ) {
      $reading_time_minutes  = 1;
    }
    return sprintf('%d %s %s', 
      $reading_time_minutes,
      __('min','dw-timeline'),
      __('read','dw-timeline')
    );
  }
}

/** 
 *  Body Class
 */
add_filter('body_class','dw_timeline_select_style');
function dw_timeline_select_style($classes) {
  $style_selector = dw_timeline_get_theme_option('style_selector');
  if ( $style_selector ==  'flat' ) {
    $classes[] = 'style-flat';
  } else if ( $style_selector ==  'retro' ) {
    $classes[] = 'style-retro';
  } else {
    $classes[] = 'style-default';
  }

  return $classes;
}

/** 
 *  HTML Class
 */
function dw_timeline_html_class() {
  $classes = array();
  if ( is_404() ) {
    $classes[] = 'error404-html';
  } else if ( is_single() ) {
    $classes[] = 'single-html';
  }
  foreach ($classes as $key => $class) {
    echo $class;
  }
}

/** 
 *  Ignore Sticky post
 */
function dw_timeline_prepare_posts($query){
  if ( $query->is_home() && $query->is_main_query() ) {
    $query->set( 'ignore_sticky_posts', true );
    $sticky = get_option( 'sticky_posts' );
    $query->set( 'post__not_in', $sticky );
  }
}
add_action( 'pre_get_posts', 'dw_timeline_prepare_posts' );

/** 
 *  TGM plugin activation
 */
require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';
function alx_plugins() {
  $plugins = array(
    array(
      'name'        => 'Share Buttons by AddThis',
      'slug'        => 'addthis',
      'required'      => false,
      'force_activation'  => false,
      'force_deactivation'=> false,
    ),
  );  
  tgmpa( $plugins );
}
add_action( 'tgmpa_register', 'alx_plugins' );
