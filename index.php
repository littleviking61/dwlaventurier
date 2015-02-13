<div class="timeline two-col" data-perpage="<?= get_option('posts_per_page') ?>">
  <div data-page="1" class="timeline-pale dwtl full remove-time-anchor"><span><?php //_e('Page','dw-timeline') ?><?= date('Y') ?></span></div>
  
  <?php $the_query = new WP_Query(['date_query' => ['year' => date('Y') ] ]);
  if ( $the_query->have_posts() ): ?>
    
    <?php 
      $post_form = dw_timeline_get_theme_option('dw_timeline_post_form');
      if( $page == 1 && is_user_logged_in() && current_user_can( 'publish_posts' ) && $post_form != 'no' ) : 
    ?>
      <?php get_template_part( 'templates/post-form' ); ?>
    <?php endif; // Front-end post form for admin user ?>
    
    
    <?php // get_template_part( 'templates/home', 'stickiest' ); //Sticky posts ?>

    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

      <?php get_template_part('templates/content', get_post_format()); ?>
      <?php if ( $wp_query->max_num_pages == 1): ?>
        <div id="infscr-loading" class="finished"><span><?php _e('The end','dw-timeline') ?></span></div>
      <?php else : ?>
        <div id="infscr-loading"><div class="show-more"><?php _e('more','dw-timeline') ?></div></div>
      <?php endif ?>
    <?php endwhile; ?>

    <?php if ($wp_query->max_num_pages > 1) : ?>
      <nav class="post-nav">
        <ul class="pager">
          <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'dw-timeline')); ?></li>
          <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'dw-timeline')); ?></li>
        </ul>
      </nav>
    <?php endif; ?>
  <?php else: ?>
    <?php get_template_part('templates/content', 'none'); ?>
  <?php endif ?>
</div