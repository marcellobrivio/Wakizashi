		<footer>
			<div id="footer">
				<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> &middot; <?php echo get_option("wakizashi_footer_info"); ?> &middot; Powered by <a href="http://www.marcellobrivio.com/wakizashi" title="Wakizashi WordPress Theme" target="_blank">Wakizashi</a>, a simple <a href="http://www.wordpress.org/" title="WordPress">WordPress</a> theme for filmmakers created by <a href="http://www.marcellobrivio.com/" title="Marcello Brivio - WordPress Evangelist" target="_blank">Marcello Brivio</a></p>
			</div>
		</footer>
	
	</div>
	<!-- /Container -->
	
	<?php if (get_option("wakizashi_selectable_skin") == "1") : ?>
		<div id="skinControl">
			<ul>
				<li><a title="Activate Bright Skin" href="?style=bright-skin" rel="bright-skin" class="styleswitch"><img src="<?php echo get_template_directory_uri(); ?>/img/bright-palette.png" alt="Bright Skin" /></a></li>
				<li><a title="Activate Bright Gray Skin" href="?style=bright-gray-skin" rel="bright-gray-skin" class="styleswitch"><img src="<?php echo get_template_directory_uri(); ?>/img/bright-gray-palette.png" alt="Bright Gray Skin" /></a></li>
				<li><a title="Activate Dark Gray Skin" href="?style=dark-gray-skin" rel="dark-gray-skin" class="styleswitch"><img src="<?php echo get_template_directory_uri(); ?>/img/dark-gray-palette.png" alt="Dark Gray Skin" /></a></li>
				<li><a title="Activate Dark Skin" href="?style=dark-skin" rel="dark-skin" class="styleswitch"><img src="<?php echo get_template_directory_uri(); ?>/img/dark-palette.png" alt="Dark Skin" /></a></li>
			</ul>
		</div>
	<?php endif; ?>
	
	<?php echo get_option("wakizashi_google_analytics"); ?>
	
	<?php wp_footer(); ?>

</body>
</html>