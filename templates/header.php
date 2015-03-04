<?php 
  $class = 'no-cover';
  $header_display = dw_timeline_get_theme_option('header_display');

  // if ( $header_display != 'no-cover' && ( is_archive() || is_search() )) {
  //   $class = 'cover';
  // }

  $feature_image = 'no';
  if( ! is_home() ) {
    $feature_image = get_post_meta( get_the_ID(), 'dw-feature-image', true );
  }
  
  if ( is_single() && $feature_image != 'no' ) {
    $adjacent_post = get_adjacent_post();
    $adjacent_post_id = '';
    $adjacent_post_thumb = '';
    
    if ($adjacent_post) {
      $adjacent_post_id = get_adjacent_post()->ID;
      $adjacent_post_thumb =  wp_get_attachment_url(get_post_thumbnail_id($adjacent_post_id) );
    }

    $post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    $post_background = get_post_meta( get_the_ID(), 'dw-background-color', true );
    $adjacent_post_background = get_post_meta( $adjacent_post_id, 'dw-background-color', true );
    $post_background_size = get_post_meta( get_the_ID(), 'dw-feature-image-size', true );
    $post_background_position = get_post_meta( get_the_ID(), 'dw-feature-image-position', true );
    $adjacent_post_background_size = get_post_meta( $adjacent_post_id, 'dw-feature-image-size', true );
    $adjacent_post_background_position = get_post_meta( $adjacent_post_id, 'dw-feature-image-position', true );

    if ( ! empty($post_thumbnail_url) ) {
      $class = 'cover';
      ?>
      <style>
        .single .banner.cover {
          background-image: url( <?php echo $post_thumbnail_url; ?> ) !important;
        }

        .single .banner.cover:before {
          opacity: .5;
        }

        <?php if ($post_background) { ?>
          .single .banner.cover:before {
            background: <?php echo $post_background; ?> !important;
          }
        <?php } ?>

        <?php if ($post_background_size) { ?>
          .single .banner.cover {
            background-size: <?php echo $post_background_size; ?> !important;
          }
        <?php } ?>

        <?php if ($post_background_position) { ?>
          .single .banner.cover {
            background-position: <?php echo $post_background_position; ?> !important;
          }
        <?php } ?>
      </style>
      <?php
    }

    if ( ! empty($adjacent_post_thumb) ) {
      ?>
      <style>        
      <?php if ($adjacent_post_background) { ?>
        .adjacent-post:before {
          background: <?php echo $adjacent_post_background; ?>;
        }
      <?php } ?>

      <?php if ($adjacent_post_background_size) { ?>
        .adjacent-post {
          background-size: <?php echo $adjacent_post_background_size; ?> !important;
        }
      <?php } ?>

      <?php if ($adjacent_post_background_position) { ?>
        .adjacent-post {
          background-position: <?php echo $adjacent_post_background_position; ?> !important;
        }
      <?php } ?>
      </style>
      <?php
    }
  }
?>

<?php 
  if ( is_page() && has_post_thumbnail() ) {
    $class = 'cover';
    $background_color = get_post_meta( get_the_ID(), 'dw-background-color', true );
    $post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
    $post_background_size = get_post_meta( get_the_ID(), 'dw-feature-image-size', true );
    $post_background_position = get_post_meta( get_the_ID(), 'dw-feature-image-position', true );
    ?>
    <style>
      .page .banner.cover {
        background-image: url( <?php echo $post_thumbnail_url; ?> ) !important;
      }

      .page .banner.cover:before {
        opacity: .5;
      }

      <?php if ($post_background_size) { ?>
        .page .banner.cover {
          background-size: <?php echo $post_background_size; ?> !important;
        }
      <?php } ?>

      <?php if ($post_background_position) { ?>
        .page .banner.cover {
          background-position: <?php echo $post_background_position; ?> !important;
        }
      <?php } ?>

      <?php if ($background_color) { ?>
        .page .banner.cover:before {
          background: <?php echo $background_color; ?> !important;
        }
      <?php } ?>
    </style>
    <?php
  } 
?>

<header class="banner <?php echo $class ?>" role="banner">
  <?php if ( is_home() ): ?>
    <div class="viking">
      <img src="<?php bloginfo('template_url') ?>/assets/img/viking-yak.svg">
    </div>
  <?php endif ?>
  <div class="header-inner">
      <?php if( $header_display != 'no-cover' && (is_front_page() || is_archive() || is_search() || is_home()) ) : ?>
        <hgroup>
          <div class="container">

            <?php if ( is_author() ): ?>
              <h2 class="author-desc">
              <?php 
                $author = get_queried_object(); 
                the_author_meta( 'description',$author->ID );
              ?>
              </h2>
            <?php endif ?>
            
            <?php if ( is_front_page() ): ?>
              <h2 class="page-description"><?php bloginfo('description'); ?></h2>
            <?php endif ?>

            <h1 class="page-title">
              <?php echo dw_timeline_title(); ?>
            </h1>

            <?php if ( is_front_page() ): ?>
              <?php if ( dw_timeline_get_theme_option('get_start') != '' ): ?>
                <?php if ( dw_timeline_get_theme_option('get_start_link') == '' ): ?>
                  <button id="get-started" class="btn btn-default btn-coner"><?php echo dw_timeline_get_theme_option('get_start') ?></button>
                <?php else : ?>
                  <a class="btn btn-default btn-coner custom-link" href=" <?php echo dw_timeline_get_theme_option('get_start_link') ?> "><?php echo dw_timeline_get_theme_option('get_start') ?></a>
                <?php endif ?>
              <?php endif ?>
            <?php endif ?>
          </div>
        </hgroup>
      <?php elseif( is_search() ) : ?>
        <div class="container">
          <h1 class="page-title">
            <?php echo dw_timeline_title(); ?>
          </h1>
        </div>
      <?php endif; ?>
  </div>
  
</header>
