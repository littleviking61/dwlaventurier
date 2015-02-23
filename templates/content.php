<?php 
  $content = get_the_content( __('Lire la suite &rarr;', 'dw-timeline') );
  
  $type = get_post_format();
  // switch ($type) {
  //   case 'gallery':
  //     $icon = "camera";
  //     break;
  //   case 'video':
  //     $icon = "facetime-video";
  //     break;
  //   default:
  //     $icon = null;
  //     break;
  // };
?>

<article <?php post_class(); ?>>
  <div class="entry-inner">
    <div class="entry-thumbnail">
      <?php if ( has_shortcode( $content, 'gallery' ) ) :
        $pattern = get_shortcode_regex();
        preg_match('/'.$pattern.'/s', $post->post_content, $matches);
        if (is_array($matches) && $matches[2] == 'gallery') {
          echo do_shortcode( $matches[0] );
        };
      elseif(get_field('video')) :
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
      <?php if (!is_null($icon)) : ?>
        <i class="glyphicon glyphicon-<?= $icon ?>"></i>
      <?php endif ?>
    </header>
    <div class="entry-content">
      <?= strip_shortcodes($content, 'gallery'); ?>
    </div>
    <hr>
    <footer class="entry-infos">
      <?php get_template_part('templates/entry-meta'); ?>
    </footer>
  </div>
</article>