<?php 
	$style_selector = dw_timeline_get_theme_option('style_selector');
  if ( $style_selector ==  'flat' ) {
    ?>
		<img src="<?php echo get_template_directory_uri() ?>/assets/img/404-flat.png" alt="">
    <?php
  } else if ( $style_selector ==  'retro' ) {
    ?>
		<img src="<?php echo get_template_directory_uri() ?>/assets/img/404-retro.png" alt="">
    <?php
  } else {
    ?>
		<img src="<?php echo get_template_directory_uri() ?>/assets/img/404.png" alt="">
    <?php
  }
?>
<?php 
	printf(__('You have found a missing time plot. %1$s Back in %2$s Home %3$s','dw-timeline'), 
		'<br>',
		'<a href="'.home_url().'">',
		'</a>'
) ?>