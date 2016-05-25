<?php get_header(); ?>

	<div class="page-wrap">
		<div class="main">
			<div class="top-bar">
				<div class="wrapper">
					<?php
						global $post;
						$terms = get_the_terms($post->id, 'category');
						$term_name = $terms[0]->name;
					?>

					<h1 class="page-title"><?php echo $term_name; ?> Posts</h1>
					<a href="/blog" class="btn">Back To Blog</a>
				</div>
			</div>

			<div class="wrapper">
				<?php if (have_posts()): ?>
				<div class="posts" id="container">
					<?php while (have_posts()) : the_post(); ?>
					<div class="post">
						<a href="<?php the_permalink(); ?>">
							<article class="match-height">
								<figure>
									<?php if(has_post_thumbnail()): ?>
										<?php the_post_thumbnail('news-featured-thumb-square'); ?>
									<?php else: ?>
										<img src="http://placehold.it/275x206" alt="">
									<?php endif; ?>
								</figure>

								<div class="post-text-wrapper">
									<span class="post-date"><?php the_time('F dS Y'); ?></span>
									<h2 class="post-title"><?php the_title(); ?></h2>
									<span class="post-excerpt"><?php echo get_the_excerpt(); ?></span>
								</div>
							</article>
						</a>
					</div>
					<?php endwhile; ?>
				</div>
					<div class="pagination"><?php echo paginate_links(); ?></div>
  			<?php else : ?>
  				<span><?php _e('Sorry, no posts matched your criteria.'); ?></span>
				<?php endif; wp_reset_query();?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
