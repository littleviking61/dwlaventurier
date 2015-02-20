<article <?php post_class(); ?>>
  <div class="entry-inner">
    <?php if(has_post_thumbnail()) : ?>
      <div class="entry-thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium', ['class'=> 'lazy']); ?></a>
      </div>
    <?php endif; ?>
    <header>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content( __('Lire la suite &rarr;', 'dw-timeline') ); ?>
    </div>
  </div>
</article>