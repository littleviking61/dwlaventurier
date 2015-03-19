<!DOCTYPE html>
<html class="no-js <?php dw_timeline_html_class() ?>" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">

	<meta http-equiv="content-language" content="FR-fr" />
	<meta name="author" content="Baptiste Régné" />
	<meta name="contact" content="baptiste.regne@gmail.com" />
	<meta name="copyright" content="Copyright (c)2006-<?= date('Y') ?> Laventurierviking. All Rights Reserved." />
	<meta name="description" content="Blog sur les aventures d'un viking autour du monde !" />
	<meta name="keywords" content="stories, travel, motorbike, life, adventure, viking, video, photo, voyage, moto, van, vie, aventures, blog" />

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">	
  <link href="https://fontastic.s3.amazonaws.com/PBrgFVcvvh7STe9yVCeFQ3/icons.css" rel="stylesheet">
 	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
	<?php if (!current_user_can('administrator')): ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-29283658-1', 'auto');
      ga('send', 'pageview');
  	</script>
  <?php else: ?>
  	<script>
	  	function ga(method, mode, page, action, element, cible){
	  		console.log(method, mode, page, action, element, cible);
	  	}
		</script>
  <?php endif ?>
  <?php wp_head(); ?>
</head>
