<div class="timeline two-col" data-perpage="<?= get_option('posts_per_page') ?>">

  <div class="timeline-scrubber">
    <ul>
      <?php
        $cat = get_the_category();
        $cat = is_home() ? [] : [ 'cat' => $cat[0]->cat_ID];

        $archiveArg = array_merge([ 'type' => 'yearly', 'show_post_count' => true, 'echo' => false ], $cat);

        $years = wp_get_archives( $archiveArg );

        $years = preg_replace( '~(&nbsp;)\((\d++)\)~', '<span class="count hide">$2</span>', $years );
        echo $years;
      ?>
    </ul>
  </div>

  <?php
    $args = is_home() ? ['date_query' => ['year' => date('Y') ] ] : [];
    $the_query = array_merge($wp_query->query_vars,  $args);

    $the_query = new WP_Query($the_query);
  
  if ( $the_query->have_posts() ): ?>
    
    <?php  
      $page = get_query_var('paged'); 
      $page = $page ? $page : 1;
      $post_form = dw_timeline_get_theme_option('dw_timeline_post_form');
      if( $page == 1 && is_user_logged_in() && current_user_can( 'publish_posts' ) && $post_form != 'no' && is_home() ) : 
          get_template_part( 'templates/post-form' );
      endif; // Front-end post form for admin user ?>
    
    
    <?php $year = null;// get_template_part( 'templates/home', 'stickiest' ); //Sticky posts ?>

    <?php while ($the_query->have_posts()) : $the_query->the_post(); 
      if(is_null($year)) :
        $year = get_the_date( 'Y' );  ?>
        <div data-page="1" class="timeline-pale dwtl full remove-time-anchor"><span><?php //_e('Page','dw-timeline') ?><?= $year ?></span></div>
      <?php endif;
      if($year !== get_the_date( 'Y' )) break; ?>
    

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