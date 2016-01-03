<?php 
	$class = 'no-cover';
  $header_display = dw_timeline_get_theme_option('header_display');
  if ( $header_display != 'no-cover' && (is_front_page() || is_archive() || is_search() || is_home()) ) {
    $class = 'cover';
  }

  $feature_image = get_post_meta( $post->ID, 'dw-feature-image', true );
  if ( ( is_single() || is_page() ) && $feature_image != 'no' ) {
    $post_thumbnail_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );

    if ( ! empty($post_thumbnail_url) ) {
      $class = 'cover';
    }
  }

  $menu_icon = dw_timeline_get_theme_option('main_nav_icon');
?>

<?php if ( ! is_404()): ?>
	<div class="navbar-toggle">
		<button class="sidebar-toggle active">
			<?php if ( $menu_icon == 'no'): ?>
		  	<?php _e('Sidebar','dw-timeline') ?>
			<?php else : ?>
				<span class="icon-bar first"></span>
			  <span class="icon-bar second"></span>
			  <span class="icon-bar third"></span>
		  <?php endif ?>
		</button>
		<a href="<?= get_home_url() ?>" title="Retourner sur la home" class="nav-bar-home">
			<i class="glyphicon glyphicon-home"></i>
		</a>
		<a href="<?= get_permalink(3118) ?>" title="Sur les traces d'un viking" class="nav-bar-map">
			<i class="fa fa-motorcycle"></i>
		</a>
	</div>

  <aside class="sidebar sidebar-primary" role="complementary">
    <div class="inner">
      <?php dynamic_sidebar('sidebar-primary'); ?>
    </div>
  </aside>

  <?php $main_nav = dw_timeline_get_theme_option('main_nav'); ?>
	<?php if ($main_nav): ?>
		<button class="navbar-toggle nav-main-toggle active">
		  <?php if ( $menu_icon == 'no'): ?>
	  	<?php _e('Menu','dw-timeline') ?>
		<?php else : ?>
			<span class="icon-bar first"></span>
		  <span class="icon-bar second"></span>
		  <span class="icon-bar third"></span>
	  <?php endif ?>
		</button>

		<nav class="nav-main <?php echo $class ?>" role="navigation" style="position: absolute; display: none;">
		  <div class="container">
		  <?php
		    if (has_nav_menu('primary_navigation')) :
		      wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
		    endif;
		  ?>
		  </div>
		</nav>
	<?php endif ?>
<?php endif ?>