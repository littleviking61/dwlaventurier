<?php
include_once ABSPATH . 'wp-includes/class-wp-customize-control.php';

class DW_Timeline_Textarea_Custom_Control extends WP_Customize_Control {

  public $type = 'textarea';
  public $statuses;
  public function __construct( $manager, $id, $args = array() ) {

  $this->statuses = array( '' => __( 'Default', 'dw-timeline' ) );
    parent::__construct( $manager, $id, $args );
  }

  public function render_content() {
    ?>
    <label> 
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
      <textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
        <?php echo esc_textarea( $this->value() ); ?>
      </textarea>
    </label>
    <?php
  }
}

class Color_Picker_Custom_control extends WP_Customize_Control {

  public function render_content() {

    if ( empty( $this->choices ) ) return;
    $name = '_customize-radio-' . $this->id; ?>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <table style="margin-top: 10px; text-align: center; width: 100%;">
      <tr>
        <?php foreach ( $this->choices as $value => $label ) {
                $checked = '';
                if($value == 0) $checked = 'checked'; ?>
                <td>
                  <label>
                    <div style="width: 30px; height: 30px; margin: 0 auto; background: <?php echo esc_attr( $label )?> "></div><br />
                    <?php if($value == 0) $label = '' ?>
                    <input type="radio" value="<?php echo esc_attr( $label ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); echo $checked ?> />
                  </label>
                </td>
          <?php } ?>
      </tr>
    </table><?php

  }
}

class Next_Post_Cats_Custom_control extends WP_Customize_Control {

  public function render_content() {

    if ( empty( $this->choices ) ) return;
    $name = '_customize-select-' . $this->id; ?>
    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
     <select style="height: auto" <?php $this->link() ?> multiple>
        <option value=""></option>
        <?php foreach ( $this->choices as $value => $label ) {
          ?>
          <option value="<?php echo esc_attr( $value ); ?>" <?php $this->value() ?>><?php echo esc_attr( $label ); ?></option>
        <?php } ?>
    </select><?php
  }
}


function dw_timeline_customize_register( $wp_customize ) {
  // GET STATR BUTTON
  // -------------------------------------------

  // Site title background
  $wp_customize->add_setting('dw_timeline_theme_options[site_title_backgournd]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'site_title_backgournd', array(
    'label' => __('Background', 'dw-timeline'),
    'section' => 'title_tagline',
    'settings' => 'dw_timeline_theme_options[site_title_backgournd]',
  )));

  $wp_customize->add_setting('dw_timeline_theme_options[get_start]', array(
    'default' => 'Get Started Now',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'get_start', array(
    'label' => __('Button Text', 'dw-timeline'),
    'section' => 'title_tagline',
    'settings' => 'dw_timeline_theme_options[get_start]',
  )));

  $wp_customize->add_setting('dw_timeline_theme_options[get_start_link]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'get_start_link', array(
    'label' => __('Button link', 'dw-timeline'),
    'section' => 'title_tagline',
    'settings' => 'dw_timeline_theme_options[get_start_link]',
  )));

  // FAVICON
  // -------------------------------------------
  $wp_customize->add_setting('dw_timeline_theme_options[favicon]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'favicon', array(
    'label' => __('Favicon', 'dw-timeline'),
    'section' => 'title_tagline',
    'settings' => 'dw_timeline_theme_options[favicon]',
  )));

  // Show more button
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_show_more', array(
    'title'    => __('Show More Button', 'dw-timeline'),
    'priority' => 20, 
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[show_more_button]', array(
    'default'        => 'no',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'show_more_button', array(
    'settings' => 'dw_timeline_theme_options[show_more_button]',
    'label'   => __('Use show more button ?', 'dw-timeline'),
    'section' => 'dw_timeline_show_more',
    'type'    => 'select',
    'choices'    => array(
      'no' => __('No', 'dw-timeline'),
      'yes' => __('Yes', 'dw-timeline') 
    ),
  ));

  // STYLE SELECTOR
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_style_selector', array(
    'title'    => __('Style', 'dw-timeline'),
    'priority' => 30,
    'description' => '<a style="float: right;" target="_blank" title="Helps" href="http://www.designwall.com/guide/dw-timeline-pro/#style_settings">
        <span data-code="f223" class="dashicons dashicons-editor-help"></span>
      </a> ',
  ));

  //  PRIMARY COLOR
  $wp_customize->add_setting('dw_timeline_theme_options[custom-color]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
    'label'        => __( 'Primary color', 'dw-timeline' ),
    'section'    => 'dw_timeline_style_selector',
    'settings'   => 'dw_timeline_theme_options[custom-color]',
  )));

  $wp_customize->add_setting('dw_timeline_theme_options[style_selector]', array(
    'default'        => 'default',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
    'priority' => 1
  ));
  $wp_customize->add_control( 'style_selector', array(
    'settings' => 'dw_timeline_theme_options[style_selector]',
    'label'   => __('Style selector', 'dw-timeline'),
    'section' => 'dw_timeline_style_selector',
    'type'    => 'select',
    'choices'    => array(
      'default' => __('Default', 'dw-timeline'),
      'flat' => __('Flat', 'dw-timeline')
    ),
  ));

  // NEXT POST
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_adjacent_post', array(
    'title'    => __('Next Post', 'dw-timeline'),
    'priority' => 100,
    'description' => '<a style="float: right;" target="_blank" title="Helps" href="http://www.designwall.com/guide/dw-timeline-pro/#next_post_settings">
        <span data-code="f223" class="dashicons dashicons-editor-help"></span>
      </a> ',
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[adjacent_post]', array(
    'default'        => 'enable',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'adjacent_post', array(
    'settings' => 'dw_timeline_theme_options[adjacent_post]',
    'label'   => __('Disable next post featured ?', 'dw-timeline'),
    'section' => 'dw_timeline_adjacent_post',
    'type'    => 'select',
    'choices'    => array(
      'enable' => __('No', 'dw-timeline'),
      'disable' => __('Yes', 'dw-timeline')
    ),
  ));

  $categories = get_categories();
  $categories_arr = array();
  foreach ($categories as $key => $category) {
    $categories_arr[$category->term_id] = $category->name;
  }
  $wp_customize->add_setting('dw_timeline_theme_options[adjacent_post_exclude]', array(
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( new Next_Post_Cats_Custom_control( $wp_customize, 'adjacent_post_exclude', array(
    'settings' => 'dw_timeline_theme_options[adjacent_post_exclude]',
    'label'   => __('Excluded categories:', 'dw-timeline'),
    'section' => 'dw_timeline_adjacent_post',
    'choices' => $categories_arr
  )));

  // GALLERY
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_gallery', array(
    'title'    => __('Gallery', 'dw-timeline'),
    'priority' => 100, 
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[gallery_lightbox]', array(
    'default'        => 'enable',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'gallery_lightbox', array(
    'settings' => 'dw_timeline_theme_options[gallery_lightbox]',
    'label'   => __('Disable gallery lightbox ?', 'dw-timeline'),
    'section' => 'dw_timeline_gallery',
    'type'    => 'select',
    'choices'    => array(
      'enable' => __('No', 'dw-timeline'),
      'disable' => __('Yes', 'dw-timeline')
    ),
  ));

  // CUSTOM CODE
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_custom_code', array(
    'title'    => __('Custom Code', 'dw-timeline'),
    'priority' => 200,
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[header_code]', array(
      'default' => '',
      'capability' => 'edit_theme_options',
      'type' => 'option',
  ));
  $wp_customize->add_control( new DW_Timeline_Textarea_Custom_Control($wp_customize, 'header_code', array(
    'label'    => __('Header Code (Meta tags, CSS, etc ...)', 'dw-timeline'),
    'section'  => 'dw_timeline_custom_code',
    'settings' => 'dw_timeline_theme_options[header_code]',
  )));

  $wp_customize->add_setting('dw_timeline_theme_options[footer_code]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new DW_Timeline_Textarea_Custom_Control($wp_customize, 'footer_code', array(
    'label'    => __('Footer Code (Analytics, etc ...)', 'dw-timeline'),
    'section'  => 'dw_timeline_custom_code',
    'settings' => 'dw_timeline_theme_options[footer_code]'
  )));

  //
  // DEFAULT
  // ------------------------------------------------------------------

  // COVER IMAGE
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_cover', array(
    'title'    => __('Cover', 'dw-timeline'),
    'priority' => 40,
  ));

  // Header background image
  $wp_customize->add_setting('dw_timeline_theme_options[header_background_image]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'header_background_image', array(
    'label' => __('Header Image', 'dw-timeline'),
    'section' => 'dw_timeline_cover',
    'settings' => 'dw_timeline_theme_options[header_background_image]',
  )));

  $wp_customize->add_setting('dw_timeline_theme_options[header_background_position]', array(
    'default' => 'center',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( 'header_background_position', array(
    'label' => __('Image Position', 'dw-timeline'),
    'section' => 'dw_timeline_cover',
    'settings' => 'dw_timeline_theme_options[header_background_position]',
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[header_background_size]', array(
    'default' => 'Cover',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( 'header_background_size', array(
    'label' => __('Image Size', 'dw-timeline'),
    'section' => 'dw_timeline_cover',
    'settings' => 'dw_timeline_theme_options[header_background_size]',
  ));

  // CUSTOM HEADER MASK
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_header_mask', array(
    'title'    => __('Header Mask', 'dw-timeline'),
    'priority' => 50,
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[header_mask_display]', array(
    'default'        => 'show',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'header_mask_display', array(
    'settings' => 'dw_timeline_theme_options[header_mask_display]',
    'label'   => __('Header Mask Display', 'dw-timeline'),
    'section' => 'dw_timeline_header_mask',
    'type'    => 'select',
    'choices'    => array(
      'show' => __('Show', 'dw-timeline'),
      'hide' => __('Hide', 'dw-timeline'),
    ),
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[header_mask_orientation]', array(
    'default'        => '135deg',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'header_mask_orientation', array(
    'settings' => 'dw_timeline_theme_options[header_mask_orientation]',
    'label'   => __('Header Mask orientation', 'dw-timeline'),
    'section' => 'dw_timeline_header_mask',
    'type'    => 'select',
    'choices'    => array(
      '90deg' => __('horizontal', 'dw-timeline') . ' &#8594;',
      '180deg' => __('vertical', 'dw-timeline') . ' &#8595;',
      '135deg' => __('diagonal', 'dw-timeline') . ' &#8600;',
      '45deg' => __('diagonal', 'dw-timeline') . ' &#8599;',
    ),
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[header_mask_start]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_mask_start', array(
    'label'   => __('Header Mask Color Start', 'dw-timeline'),
    'section' => 'dw_timeline_header_mask',
    'settings' => 'dw_timeline_theme_options[header_mask_start]',
  )));

  $wp_customize->add_setting('dw_timeline_theme_options[header_mask_end]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_mask_end', array(
    'label'   => __('Header Mask Color End', 'dw-timeline'),
    'section' => 'dw_timeline_header_mask',
    'settings' => 'dw_timeline_theme_options[header_mask_end]',
  )));

  //
  // FLAT
  // ------------------------------------------------------------------

  // CUSTOM HEADER
  // -------------------------------------------
  $wp_customize->add_setting('dw_timeline_theme_options[flat_header_mask]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'flat_header_mask', array(
    'label'   => __('Header background', 'dw-timeline'),
    'section' => 'dw_timeline_style_selector',
    'settings' => 'dw_timeline_theme_options[flat_header_mask]',
  )));

  // MAIN BACKGROUND
  // -------------------------------------------
  $wp_customize->add_setting('dw_timeline_theme_options[flat_timline_background]', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'type' => 'option',
  ));
  $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'flat_timline_background', array(
    'label'   => __('Main background', 'dw-timeline'),
    'section' => 'dw_timeline_style_selector',
    'settings' => 'dw_timeline_theme_options[flat_timline_background]',
  )));

  // FONT SELECTOR
  // -------------------------------------------
  $fonts = dw_timeline_get_gfonts();
  $newarray = array();
  $newarray[] = '';
  foreach ($fonts as $index => $font) {
    foreach ($font->files as $key => $value) {
      $newarray[$font->family . ':dw:' . $value . ':dw:' . $key ] = $font->family . ' - ' . $key;
    }
  }

  $wp_customize->add_setting('dw_timeline_theme_options[heading_font]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'heading_font', array(
    'settings' => 'dw_timeline_theme_options[heading_font]',
    'label'   => __('Headding font', 'dw-timeline'),
    'section' => 'dw_timeline_style_selector',
    'type'    => 'select',
    'choices'    => $newarray
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[body_font]', array(
    'default'        => '',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'body_font', array(
    'settings' => 'dw_timeline_theme_options[body_font]',
    'label'   => __('Content font', 'dw-timeline'),
    'section' => 'dw_timeline_style_selector',
    'type'    => 'select',
    'choices'    => $newarray
  ));

  // MAIN NAV
  // -------------------------------------------

  $wp_customize->add_setting('dw_timeline_theme_options[main_nav]', array(
    'default'        => '0',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'main_nav', array(
    'settings' => 'dw_timeline_theme_options[main_nav]',
    'label'   => __('Enable Primary Navigation ?', 'dw-timeline'),
    'section' => 'nav',
    'type'    => 'select',
    'choices'    => array(
      '1' => __('Yes', 'dw-timeline'),
      '0' => __('No', 'dw-timeline'),
    ),
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[main_nav_icon]', array(
    'default'        => 'yes',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'main_nav_icon', array(
    'settings' => 'dw_timeline_theme_options[main_nav_icon]',
    'label'   => __('Use Menu icon ?', 'dw-timeline'),
    'section' => 'nav',
    'type'    => 'select',
    'choices' => array(
      'yes' => __('Yes', 'dw-timeline'),
      'no' => __('No', 'dw-timeline'),
    ),
  ));

  // Post Form
  // -------------------------------------------
  $wp_customize->add_section('dw_timeline_post_form', array(
    'title'    => __('Post form', 'dw-timeline'),
    'priority' => 100,
  ));

  $wp_customize->add_setting('dw_timeline_theme_options[dw_timeline_post_form]', array(
    'default'        => 'yes',
    'capability'     => 'edit_theme_options',
    'type'           => 'option',
  ));
  $wp_customize->add_control( 'dw_timeline_post_form', array(
    'settings' => 'dw_timeline_theme_options[dw_timeline_post_form]',
    'label'   => __('Enable post form ?', 'dw-timeline'),
    'section' => 'dw_timeline_post_form',
    'type'    => 'select',
    'choices' => array(
      'yes' => __('Yes', 'dw-timeline'),
      'no' => __('No', 'dw-timeline'),
    ),
  ));

}
add_action( 'customize_register', 'dw_timeline_customize_register' );

/**
 *  Get google fonts
 */

if( ! function_exists('dw_timeline_get_gfonts') ) {
  function dw_timeline_get_gfonts(){
   $fontsSeraliazed = wp_remote_fopen( get_template_directory_uri() . '/lib/font/gfonts_v2.txt' );
    if (!empty($fontsSeraliazed)) {
      $fontArray = unserialize( $fontsSeraliazed );
      return $fontArray->items;
    } else {
      return array();
    }
  }
}

/**
 * Get Theme options
 */
if( ! function_exists('dw_timeline_get_theme_option') ) {
  function dw_timeline_get_theme_option( $option_name, $default = false ) {
    $options = get_option( 'dw_timeline_theme_options' );
    if( isset($options[$option_name]) && ! empty( $options[$option_name] ) ) {
      return $options[$option_name];
    }
    return $default; 
  }
}

/**
 * Header code
 */
if( ! function_exists('header_code') ) {
  function header_code(){
    $header_code = dw_timeline_get_theme_option('header_code');
    if ($header_code) {
      echo $header_code;
    }
  }
  add_action( 'wp_head', 'header_code' );
}

/**
 * Footer code
 */
if( ! function_exists('footer_code') ) {
  function footer_code(){
    $footer_code = dw_timeline_get_theme_option('footer_code');
    if ($footer_code) {
      echo $footer_code;
    }
  }
  add_action( 'wp_footer', 'footer_code' );
}

/**
 * Favicon
 */
if( ! function_exists('dw_timeline_favicon') ) {
  function dw_timeline_favicon(){
    $favicon = dw_timeline_get_theme_option('favicon');
    if ($favicon) {
      echo '<link rel="shortcut icon" href="'.$favicon.'">';
    }
  }
  add_action( 'wp_head', 'dw_timeline_favicon' );
}

/**
 * Style selector
 */
$style_selector = dw_timeline_get_theme_option('style_selector');
if ( current_user_can( 'edit_theme_options' ) || (!current_user_can( 'edit_theme_options' ) && $style_selector == 'default') ) {
  if( ! function_exists('dw_timeline_style_default') ) {
    function dw_timeline_style_default() {
      $header_image = dw_timeline_get_theme_option('header_background_image');
      $header_image_position = dw_timeline_get_theme_option('header_background_position');
      $header_image_size = dw_timeline_get_theme_option('header_background_size');

      $header_mask_start = dw_timeline_get_theme_option('header_mask_start');
      $header_mask_end = dw_timeline_get_theme_option('header_mask_end');
      $site_title_backgournd = dw_timeline_get_theme_option('site_title_backgournd');

      $header_mask_display = dw_timeline_get_theme_option('header_mask_display');
      $header_mask_orientation = dw_timeline_get_theme_option('header_mask_orientation');

        ?>
        <style>
        <?php if($header_mask_display == 'hide') { ?>
        .style-default .banner.cover:before {
          display: none;
        }
        <?php } ?>

        <?php if ( $header_image ) { ?>

        .style-default .banner.cover {
          background-image: url(<?php echo $header_image ?>);
        }
        <?php } ?>

        <?php if ( $header_image_position ) { ?>
        .style-default .banner.cover {
          background-position: <?php echo $header_image_position ?>;
        }
        <?php } ?>

        <?php if ( $header_image_size ) { ?>
        .style-default .banner.cover {
          background-size: <?php echo $header_image_size ?>;
        }
        <?php } ?>

        <?php if ( ! $header_image ) { ?>
        .style-default .banner.cover {
          background-image: none;
        }

        .style-default .banner.cover:before {
          opacity: 1;
        }
        <?php } ?>

        <?php if ( $header_mask_start || $header_mask_end ) { ?>
        .style-default .banner.cover:before {
          background: <?php echo $header_mask_start; ?>
          background-image: -webkit-linear-gradient(<?php echo $header_mask_orientation ?>, <?php echo $header_mask_start ?>, <?php echo $header_mask_end ?>);
          background-image: linear-gradient(<?php echo $header_mask_orientation ?>, <?php echo $header_mask_start ?>, <?php echo $header_mask_end ?>);
        }
        <?php } ?>

        <?php if ( $site_title_backgournd ) { ?>
        .style-default .banner hgroup:after {
          background-color: <?php echo $site_title_backgournd; ?>;
        }
        .style-default .banner #get-started,
        .style-default .banner .custom-link {
          color: <?php echo $site_title_backgournd; ?>; 
        }
        <?php } ?>

        <?php if ( ! $site_title_backgournd ) { ?>
        .style-default .banner hgroup:after {
          background-color: transparent;
        }
        <?php } ?>
        </style>    
        <?php
    }
    add_action( 'wp_head', 'dw_timeline_style_default' );
  }
} 

if (current_user_can( 'edit_theme_options' ) || (!current_user_can( 'edit_theme_options' ) && $style_selector == 'flat')) {
  if( ! function_exists('dw_timeline_style_flat') ) {
    function dw_timeline_style_flat() {
      $timeline_color = dw_timeline_get_theme_option('custom-color');
      $header_mask = dw_timeline_get_theme_option('flat_header_mask');
      $site_title_backgournd = dw_timeline_get_theme_option('site_title_backgournd');
      $timline_backgournd = dw_timeline_get_theme_option('flat_timline_background');
      ?>
      <style>
      <?php if ( $timeline_color ) { ?>
      .style-flat .hentry .entry-format {
        color: <?php echo $timeline_color;  ?>;
      }

      .style-flat .timeline-scrubber .active a, 
      .style-flat .timeline-scrubber a:hover {
        color: <?php echo $timeline_color;  ?>; 
      }

      @media (min-width: 1366px){
        .style-flat .timeline-scrubber .active a:before,
        .style-flat .timeline-scrubber a:hover:before {
          background: <?php echo $timeline_color;  ?>; 
        }
      }
      <?php } ?>

      <?php if ( $header_mask ) { ?>
        .style-flat .banner.cover:before {
          background: <?php echo $header_mask; ?>;
        }
      <?php } ?>
      
      <?php if ( $site_title_backgournd ) { ?>
        @media (min-width: 767px) {
          .style-flat .banner hgroup:after {
            background: <?php echo $site_title_backgournd; ?>;
          }
        }
      <?php } ?>

      <?php if ( $timline_backgournd ) { ?>
        .style-flat .wrap,
        .style-flat .timeline-pale span,
        .style-flat #infscr-loading {
          background: <?php echo $timline_backgournd; ?>;
        }

        @media (min-width: 992px) {
          .style-flat .timeline .dwtl:before {
            border-color: <?php echo $timline_backgournd; ?>;
          }
        }
      <?php } ?>

      </style>    
      <?php
    }
    add_action( 'wp_head', 'dw_timeline_style_flat' );
  }
}

/**
 * Color Selector
 */
function dw_timeline_typo_color() {
  $timeline_color = dw_timeline_get_theme_option('custom-color');

  if($timeline_color) { ?>
    <style type="text/css" id="timeline_color" media="screen">
      a:hover,
      .hentry .entry-meta a:hover,
      .dwtl-post-form .post-formats .active,
      .dwtl-post-form .post-formats button:hover,
      .single .no-cover + .container .entry-meta a:hover,
      #comments .comment time a:hover,
      .timeline-scrubber .active a {
        color: <?php echo $timeline_color; ?>;
      }

      @media(min-width: 1025px) {
        .no-cover.nav-main a:hover, 
        .no-cover.nav-main a:active, 
        .no-cover.nav-main .active > a,
        .no-cover.nav-main .navbar-nav>li:hover>.sub-nav-open,
        .nav-main .navbar-nav ul a:hover,
        .nav-main .navbar-nav ul .active > a,
        .nav-main .navbar-nav ul li:hover > .fa,
        .nav-main .navbar-nav ul li.active > .fa {
          color: <?php echo $timeline_color; ?>;
        }

        .no-cover.nav-main .navbar-nav > .active {
          border-bottom-color: <?php echo $timeline_color; ?>;
        }
      }

      .highlight,
      blockquote {
        background: <?php echo $timeline_color; ?>;
      }

      .timeline-scrubber .active a,
      .timeline-scrubber a:hover {
        border-left-color: <?php echo $timeline_color; ?>;
      }
    </style>
    <?php
  }
}
add_filter('wp_head','dw_timeline_typo_color');

/**
 * Font Selector
 */
if( ! function_exists('dw_timeline_typo_font') ) {
  function dw_timeline_typo_font(){
    if (dw_timeline_get_theme_option('heading_font') && dw_timeline_get_theme_option('heading_font') != '') {      
      $heading_font = explode(':dw:', dw_timeline_get_theme_option('heading_font') );
      ?>
        <style type="text/css" id="heading_font" media="screen">
          @font-face {
            font-family: "<?php echo $heading_font[0] ?>";
            src: url('<?php echo $heading_font[1] ?>');
          } 
          h1,h2,h3,h4,h5,h6, blockquote {
            font-family: "<?php echo $heading_font[0] ?>" !important;
            <?php if ( intval($heading_font[2]) ) : ?>
            font-weight: <?php echo intval($heading_font[2]) ?> !important;
            <?php else : ?>
            font-weight: inherit !important;
            <?php endif; ?>
          }
        </style>
      <?php
    }
    if (dw_timeline_get_theme_option( 'body_font') && dw_timeline_get_theme_option( 'body_font') != '') {
      $body_font = explode( ':dw:', dw_timeline_get_theme_option( 'body_font' ));
      ?>
        <style type="text/css" id="body_font" media="screen">
          @font-face {
            font-family: "<?php echo $body_font[0] ?>";
            src: url('<?php echo $body_font[1] ?>');
          } 
          body, .entry-content, blockquote cite{
            font-family: "<?php echo $body_font[0] ?>" !important;
            <?php if ( intval($body_font[2]) ) : ?>
            font-weight: <?php echo intval($body_font[2]) ?> !important;
            <?php else : ?>
            font-weight: inherit !important;
            <?php endif; ?>
          }
        </style>
      <?php
    }
  }
  add_filter('wp_head','dw_timeline_typo_font');
}