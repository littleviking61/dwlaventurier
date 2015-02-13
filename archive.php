<div class="timeline two-col">
  <div data-page="<?= get_the_date('Y') ?>" class="timeline-pale dwtl full remove-time-anchor"><span><?= get_the_date('Y') ?></span></div>
  <?php if ( have_posts() ): ?>

    <?php 
      $post_form = dw_timeline_get_theme_option('dw_timeline_post_form');
      if( $page == 1 && is_user_logged_in() && current_user_can( 'publish_posts' ) && $post_form != 'no' ) : 
    ?>
      <?php get_template_part( 'templates/post-form' ); ?>
    <?php endif; // Front-end post form for admin user ?>
    
    <div class="post"><?= $pages = $wp_query->max_num_pages; ?></div>
    <?php // get_template_part( 'templates/home', 'stickiest' ); //Sticky posts ?>

    <?php while ( have_posts()) :  the_post(); ?>

      <?php get_template_part('templates/content', get_post_format()); ?>
      <?php if ( $wp_query->max_num_pages == 1): ?>
        <div id="infscr-loading" class="finished"><span><?php _e('The end','dw-timeline') ?></span></div>
      <?php else : ?>
        <div id="infscr-loading"><div class="show-more"><?php _e('more','dw-timeline') ?></div></div>
      <?php endif ?>
    <?php endwhile; ?>

  <?php else: ?>
    <?php get_template_part('templates/content', 'none'); ?>
  <?php endif ?>
</div