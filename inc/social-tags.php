<!-- SOCIAL TAGS -->
<meta content="<?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?>" property="og:title"/>
<meta content="<?php if ( is_single() ) { single_post_title('', true); } else { bloginfo('description'); } ?>" property="og:description"/>
<?php if (is_single() && has_post_thumbnail()) : ?>
	<?php $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large'); ?>
	<meta content="<?php echo $thumbnail_url[0]; ?>" property="og:image" />
<?php else : ?>
	<?php if (get_option("wakizashi_default_image") != FALSE) : ?>
		<meta content="<?php echo get_option("wakizashi_default_image"); ?>" property="og:image" />
	<?php endif; ?>
<?php endif; ?>	
<meta content="website" property="og:type"/>
<meta content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>" property="og:url"/>