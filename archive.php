<?php get_header(); ?>
	
	<?php
	// Keeps original query, but no pagination
	global $query_string;
	query_posts( $query_string . '&posts_per_page=-1' );
	?>
	
	<?php $item_number = 1; // Set counter ?>	
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<section>
			
			<?php 
			// Recover the category
			$category = get_the_category();
			?>

			<article>
				<a class="list-item size-M" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php the_post_thumbnail('size-M'); ?>
					<div class="overlay">
						<div class="overlay-inner">
							<header>
								<h3><?php the_title(); ?></h3>
							</header>
							
							<?php if ($category != '') : ?>
								<p><?php echo $category[0]->cat_name; ?></p>
							<?php endif; ?>
						</div>
					</div>
				</a>
			</article>
			<?php $item_number = $item_number + 1; // Increase Item Counter ?>
		
		</section>
		
	<?php endwhile; ?>
	
	<div class="clear"></div>
	
	<?php else: ?>
		<div class="error">
			<h2>Sorry, nothing to display.</h2>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>