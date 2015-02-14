<div class="timeline two-col">
  <div class="timeline-scrubber">
    <ul>
      <?php
         $years = wp_get_archives( [ 'type' => 'yearly', 'show_post_count' => true, 'echo' => false ] );
         $years = preg_replace( '~(&nbsp;)\((\d++)\)~', '<span class="count hide">$2</span>', $years );
         echo $years;
      ?>
    </ul>
  </div>

  <?php
 $queried_object = get_queried_object();
 var_dump( $queried_object );
 ?>
 
  <?php if ( have_posts() ): ?>
    
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