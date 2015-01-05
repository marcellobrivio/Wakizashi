<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<?php the_post_thumbnail('size-XL'); ?>
		
		<div id="post-<?php the_ID(); ?>" class="page-content">
			
			<h3><?php the_title(); ?></h3>
			
			<div id="page-text">
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