<?php
/*
Template Name: Contacts
*/
?>

<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<?php if (get_option("wakizashi_google_map") != "") : ?>
			<?php
			// Clean user entered map URL to be used as embed
			$toBeDeleted = array("https://maps.google.it/maps?", "http://maps.google.it/maps?");
			$mapQ = str_replace($toBeDeleted, "", get_option("wakizashi_google_map"));
			?>
			<iframe id="map" width="958" height="378" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?f=q&amp;source=s_q&amp;hl=it&amp;geocode=&amp;q=<?php echo $mapQ; ?>&amp;output=embed"></iframe>	
		<?php endif; ?>
		
		
		<div id="post-<?php the_ID(); ?>" class="page-content">
			
			<h3><?php the_title(); ?></h3>
			
			<div id="page-text" class="no-columns">
				<?php the_content(); ?>
			</div>
			
		</div>
		
	<?php endwhile; ?>
	
	<?php else: ?>
		
	<div class="error">
		<h2>Sorry, nothing to display.</h2>
	</div>
			
			
	<?php endif; ?>
	
	<?php include_once "inc/recent-works.php"; ?>
	

<?php get_footer(); ?>