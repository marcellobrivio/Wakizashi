<?php
$related_posts = new WP_Query( 
	array(
		'post__not_in' => array($post->ID), 			// Exclude current post
		'posts_per_page' => 3,							// Number of posts to show
		'caller_get_posts' => 1							// Ignore sticky posts
	)
);
?>
<?php if( $related_posts->have_posts() ) : ?>

	<section>
		
		<header>
			<h3 id="related-works">Some recent works...</h3>
		</header>
		<?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
		
			<?php 
			// Recover the category
			$category = get_the_category();
			?>
			
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
		
		<?php endwhile; ?>
		
	</section>
	
<?php else : ?>
	<div id="line-eraser"></div>
<?php endif; ?>
<?php wp_reset_query(); ?>

<div class="clear"></div>