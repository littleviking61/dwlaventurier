<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>
  <?php do_action('get_header'); ?>
  <?php get_template_part('templates/sidebar'); ?>
  <div class="wrap">
    <?php get_template_part('templates/header'); ?>
    <div class="container" role="document">
      <div class="content row">
        <main class="main <?php echo dw_timeline_main_class(); ?>" role="main">
          <?php include dw_timeline_template_path(); ?>
        </main>
      </div>
    </div>
    <?php $adjacent_post = dw_timeline_get_theme_option('adjacent_post');
    if ($adjacent_post != 'disable') : ?>
        <footer class="adjacent">
          <?php dw_timeline_adjacent_post(); ?>
        </footer>
    <?php endif; ?>
  </div>
  <?php get_template_part('templates/footer'); ?>
</body>
</html>
