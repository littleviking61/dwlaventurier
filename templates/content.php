<?php 
  $content = get_the_content( __('Lire la suite &rarr;', 'dw-timeline') );
  $type = get_post_format();
?>

<article <?php post_class(); ?>>
  <div class="entry-inner">
    <div class="entry-thumbnail">
      <?php if ( has_shortcode( $content, 'gallery' ) && $type == "gallery" ) :
        $pattern = get_shortcode_regex();
        preg_match('/'.$pattern.'/s', $post->post_content, $matches);
        if (is_array($matches) && $matches[2] == 'gallery') {
          echo do_shortcode( $matches[0] );
        };
      elseif(get_field('video') && $type == "video") :
        echo get_field('video');
      elseif(has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class'=> 'lazy']); ?></a>
        <div class="overlay">    
          <span class="entry-date"><a href="<?php the_permalink(); ?>"><time class="published" datetime="<?= get_the_time('c'); ?>"><?= get_the_date('F Y'); ?></time></a></span>
        </div>
      <?php endif; ?>
    </div>
    <header>
      <h2 class="entry-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <span class="entry-comments"><a class="simple-ajax-popup" href="/wp-admin/admin-ajax.php?postId=<?= get_the_id() ?>&action=get_comment"><i class="fa fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?></a></span>

      <?php if (!is_null($icon)) : ?>
        <i class="glyphicon glyphicon-<?= $icon ?>"></i>
      <?php endif ?>
    </header>
    <div class="entry-content">
      <?php if ( has_shortcode( $content, 'gallery' ) ) :
        $pattern = get_shortcode_regex();
        preg_match('/'.$pattern.'/s', $post->post_content, $matches);
      endif; 
      $content = strip_shortcodes($content, 'gallery'); 
      echo do_shortcode($content);
      if (is_array($matches) && $matches[2] == 'gallery' && $type == 'image') : ?>
        <a href="#view-gallery" class="gallery-link" data-<?= substr($matches[3],1) ?>>Voir la gallerie →</a>
      <?php endif; ?>
    </div>
    <hr>
    <?php get_template_part('templates/entry-meta'); ?>
  </div>
</article>