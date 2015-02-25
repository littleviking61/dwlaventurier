<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'dw- timeline'), 'after' => '</p></nav>')); ?>
      <br>
      <?php get_template_part('templates/map'); ?>
    </div>
    <footer>
      <?php
        $tags_list = get_the_tag_list( '', '' );
        if ( $tags_list ) :
      ?>
        <div class="entry-tags">
          <span class="tags-links">
          <?php printf( __( '%1$s', 'dw-timeline' ), $tags_list ); ?>
        </span>
        </div>
      <?php endif; ?>

      <?php 
        $desc = get_the_author_meta('description');
        if ( $desc != ''): 
      ?>

      <div class="author-info">
        <div class="author-avatar">
          <?php echo get_avatar( get_the_author_meta( 'user_email' ), 100 ); ?>
        </div>
        <h4 class="author-name"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
          <?php echo get_the_author(); ?></a>
        </h4>
        <div class="author-description"><?php echo $desc; ?></div>
      </div>
      <?php endif ?>
    </footer>

    <div class="quote-box">
      <!-- <button id="btn-comment-quote" class="btn-post-comment"></button> -->
      <button id="btn-tweet-quote" class="btn-tweet"></button>
    </div>
    <div class="quick-comment-box form-group">
      <?php 
        global $current_user;
        get_currentuserinfo();
        echo get_avatar( $current_user->ID, 16); 
        echo '<strong class="quick-comment-user-name">'.$current_user->display_name.'</strong>';
      ?>
      <textarea class="form-control" name="quick-comment-content" id="quick-comment-content" rows="1" placeholder="<?php _e('Leave a note','dw-timeline') ?>"></textarea>
      <input type="button" class="btn btn-link" value="<?php _e('Save','dw-timeline') ?>">
      <input type="button" class="btn btn-link" value="<?php _e('Cancel', 'dw-timeline'); ?>">
    </div>
  </article>
  <?php comments_template('/templates/comments.php'); ?>
<?php endwhile; ?>