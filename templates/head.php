<!DOCTYPE html>
<html class="no-js <?php dw_timeline_html_class() ?>" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">	
  <link href="https://fontastic.s3.amazonaws.com/PBrgFVcvvh7STe9yVCeFQ3/icons.css" rel="stylesheet">
 	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
<?php wp_head(); ?>
</head>
