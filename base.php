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
  <?php if (!current_user_can('administrator')): ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29283658-1', 'auto');
      ga('send', 'pageview');

    </script>
  <?php endif ?>
</body>
</html>
