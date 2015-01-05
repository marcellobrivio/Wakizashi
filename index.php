<?php get_header(); ?>
	
	<?php
	// No pagination
	query_posts( array ('posts_per_page' => -1 ) );
	?>
	
	<?php $item_number = 1; // Set counter ?>	
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<?php 
		// Recover the category
		$category = get_the_category();
		?>

		<?php if ($item_number == 1) : ?>
		<a class="list-item size-XL" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('size-XL'); ?>
			<div class="overlay">
				<div class="overlay-inner">
					<h3><?php the_title(); ?></h3>
					
					<?php if ($category != '') : ?>
						<p><?php echo $category[0]->cat_name; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</a>
		<?php elseif ($item_number == 2) : ?>
		<a class="list-item size-L" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('size-L'); ?>
			<div class="overlay">
				<div class="overlay-inner">
					<h3><?php the_title(); ?></h3>
					
					<?php if ($category != '') : ?>
						<p><?php echo $category[0]->cat_name; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</a>
		<?php else : ?>
		<a class="list-item size-M" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail('size-M'); ?>
			<div class="overlay">
				<div class="overlay-inner">
					<h3><?php the_title(); ?></h3>
					
					<?php if ($category != '') : ?>
						<p><?php echo $category[0]->cat_name; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</a>
		<?php endif; ?>
		<?php $item_number = $item_number + 1; // Increase Item Counter ?>	
	<?php endwhile; ?>
	
	<div class="clear"></div>
	
	<?php else: ?>
		<div class="error">
			<h2>Sorry, nothing to display.</h2>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>