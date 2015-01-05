<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('description'); } ?>">
	<meta name="viewport" content="width=1024">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	
	<!-- CSS -->
	<link href='http://fonts.googleapis.com/css?family=Leckerli+One|Open+Sans|Open+Sans+Condensed:300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
	<?php include 'inc/skins-management.php'; // Includes the main CSS management ?>
	<!--[if lte IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css">
	<![endif]--> 
	
	<!-- JS -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<?php if (get_option("wakizashi_selectable_skin") == "1") : ?>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.styleswitch.js"></script>
	<?php endif; ?>	
	
	<?php include 'inc/social-tags.php'; // Includes the main CSS management ?>
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?> <?php echo "id=\"$bodyID\"" ?>>

	<div id="container">
	
		<div id="header">
			<a id="logo" href="<?php bloginfo('url'); ?>">
				<h1><?php bloginfo('name'); ?></h1>
				<h2><?php bloginfo('description'); ?></h2>
			</a>
			
			<div id="menu">
				<?php wp_nav_menu( array('menu' => 'Main Menu', 'container' => false, 'menu_id' => 'main-menu', 'depth' => 1)); ?>
			</div>
			
			<div class="clear"></div>
		</div>