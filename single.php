<?php get_header(); ?>
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			
			<!-- Video Player -->
			<?php
			// You can set from theme options if video autoplay is set to 1 or 0
			if (get_option("wakizashi_autoplay") == "No") : $autoplay_value = 0;
			else : $autoplay_value = 0;
			endif;
			?>
			<?php if ( get_post_meta($post->ID, "vimeo-id", true) != "" ) : ?>
				<iframe id="vimeo-embed" src="http://player.vimeo.com/video/<?php echo get_post_meta($post->ID, "vimeo-id", true); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff&amp;autoplay=<?php echo $autoplay_value; ?>" width="958" height="539" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
			<?php else : ?>
				<div id="missing-video">
					<p>Missing videoclip.<br />Please enter Vimeo ID.</p>
				</div>
			<?php endif; ?>
			
			
			
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			
			<!-- Sharing -->
			<div id="sharing">
			
				<div class="twitter-share">
					<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo wp_get_shortlink(); ?>" data-text='<?php the_title(); ?>' data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				</div>
								
				<div class="google-share">
					<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
					<g:plusone size="tall"></g:plusone>
				</div>
				
				<div class="facebook-share">
					<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;send=false&amp;layout=box_count&amp;width=65&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90&width=73" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:65px;" allowTransparency="true"></iframe>
				</div>
				
			</div>
			
			<p id="category"><?php the_category(', '); ?></p>		

			<div class="clear"></div>			
			
			<!-- Text Body -->
			<div id="content">
				<?php the_content(); ?>
			</div>
			
			
			<div class="clear"></div>
			
						
			<!-- Related Works -->
			<?php
			$related_posts = new WP_Query( 
				array(
					'category__in' => $single_category->term_id, 	// Post in same subcategory
					'post__not_in' => array($post->ID), 			// Exclude current post
					'posts_per_page' => 3,							// Number of posts to show
					'caller_get_posts' => 1							// Ignore sticky posts
				)
			);
			?>
			<?php if( $related_posts->have_posts() ) : ?>
				<h3 id="related-works">Related works...</h3>
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
			<?php else : ?>
				<div id="line-eraser"></div>
			<?php endif; ?>
			<?php wp_reset_query(); ?>

			<div class="clear"></div>
	
			
		</div>
		
	<?php endwhile; ?>
	
	<?php else: ?>
		<div class="error">
			<h2>Sorry, nothing to display.</h2>
		</div>
	<?php endif; ?>
	
<?php get_footer(); ?>