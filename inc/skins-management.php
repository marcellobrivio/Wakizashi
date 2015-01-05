<!-- SKINS MANAGEMENT -->
<?php if (get_option("wakizashi_color_scheme") == "Dark") : ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark.css" title="dark-skin" media="screen" />
	<?php if (get_option("wakizashi_selectable_skin") == "1") : ?>
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" title="bright-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark-gray.css" title="dark-gray-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-bright-gray.css" title="bright-gray-skin" media="screen" />
	<?php endif; ?>
<?php elseif (get_option("wakizashi_color_scheme") == "Dark Gray") : ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark-gray.css" title="dark-gray-skin" media="screen" />
	<?php if (get_option("wakizashi_selectable_skin") == "1") : ?>
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" title="bright-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark.css" title="dark-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-bright-gray.css" title="bright-gray-skin" media="screen" />
	<?php endif; ?>
<?php elseif (get_option("wakizashi_color_scheme") == "Bright Gray") : ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-bright-gray.css" title="bright-gray-skin" media="screen" />
	<?php if (get_option("wakizashi_selectable_skin") == "1") : ?>
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" title="bright-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark-gray.css" title="dark-gray-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark.css" title="dark-skin" media="screen" />
	<?php endif; ?>
<?php else : ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" title="bright-skin" media="screen" />
	<?php if (get_option("wakizashi_selectable_skin") == "1") : ?>
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark.css" title="dark-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-dark-gray.css" title="dark-gray-skin" media="screen" />
		<link rel="alternate stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/skins/style-bright-gray.css" title="bright-gray-skin" media="screen" />
	<?php endif; ?>
<?php endif; ?>