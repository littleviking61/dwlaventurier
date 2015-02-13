<div class="timeline two-col">
  <div data-page="1" class="timeline-pale dwtl full remove-time-anchor"><span><?php _e('Page 1','dw-timeline') ?></span></div>
  <?php if ( have_posts() ): ?>
    <?php  
      $page = get_query_var('paged'); 
      $page = $page ? $page : 1;
      $pages = $wp_query->max_num_pages;
      if( $pages > 1 ) {
        $i = 1;
        echo '<div class="timeline-scrubber">';
        echo '<ul>';
        for ( $i=1 ; $i <= $pages; $i++) { 
          if ($i % 10 == 0) {
            echo '</ul><li ';
          } else {
            echo '<li ';
          }

          if( $i == 1 ) {
            echo ' class="active show" ';
          }

          echo ' data-page="'.$i.'"><a href="#" >'.__('Page','dw-timeline').' '.$i.'</a>';

          if ($i % 10 == 0) {
            echo '</li><ul> ';
          } elseif ($i == 1) {
            echo '</li><ul>';
          } else {
            echo '</li>';
          }          
        }
        echo '</ul>';
        echo '</div>';
      }
    ?>
    
    <?php 
      $post_form = dw_timeline_get_theme_option('dw_timeline_post_form');
      if( $page == 1 && is_user_logged_in() && current_user_can( 'publish_posts' ) && $post_form != 'no' ) : 
    ?>
      <?php get_template_part( 'templates/post-form' ); ?>
    <?php endif; // Front-end post form for admin user ?>
    
    
    <?php // get_template_part( 'templates/home', 'stickiest' ); //Sticky posts ?>

    <?php while (have_posts()) : the_post(); ?>
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