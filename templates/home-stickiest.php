<?php  
  $page = get_query_var('paged'); 
  $page = $page ? $page : 1;
  if( $page == 1 ) :

    $sticky = get_option( 'sticky_posts' );
    $sticky_query = new WP_Query( array(
      'post__in' => $sticky
    ) );
    if( $sticky_query ->have_posts() ) :
      while ( $sticky_query->have_posts() ) : $sticky_query->the_post();
        get_template_part('templates/content', get_post_format());
        if ( $wp_query->max_num_pages == 1): ?>
          <div id="infscr-loading" class="finished"><span><?php _e('The end','dw-timeline') ?></span></div>
        <?php endif;
      endwhile;
    endif;
  endif;
  wp_reset_query();
?>