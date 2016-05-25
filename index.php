<?php get_header(); ?>

	<div class="page-wrap">
		<div class="blog-categories">
			<div class="wrapper">
				<span class="filter-text">Filter:</span>

				<span class="filter" data-filter="all">All</span>

				<?php $categories = get_categories(); ?>

				<?php foreach($categories as $category): ?>
					<span class="filter" data-filter=".<?php echo $category->category_nicename ?>"><?php echo $category->name; ?></span>
				<?php endforeach; ?>

				<div class="pager-list">
					<!-- Pagination buttons will be generated here -->
				</div>
			</div>
		</div>

		<div class="main">
			<div class="blog-main">
				<div class="wrapper">
					<?php query_posts('posts_per_page=-1'); ?>
					<?php if (have_posts()): ?>
					<div class="posts" id="container">
						<?php
              $i=0; while (have_posts()) : the_post();
							$cat = get_the_category();
							$cat_name = $cat[0]->category_nicename;
						?>

						<div class="post mix <?php echo $cat_name; ?>">
							<a href="<?php the_permalink(); ?>">
								<article class="match-height">
									<?php if($cat_name == 'study-update'): ?>
										<figure>
											<?php if(has_post_thumbnail()): ?>
												<?php the_post_thumbnail('news-featured-thumb-square'); ?>
											<?php else: ?>
												<img src="<?php bloginfo('template_directory'); ?>/_img/study-update.jpg" alt="">
											<?php endif; ?>
										</figure>
									<?php else: ?>
										<figure>
											<?php if(has_post_thumbnail()): ?>
												<?php the_post_thumbnail('news-featured-thumb'); ?>
											<?php else: ?>
												<img src="http://placehold.it/550x400" alt="">
											<?php endif; ?>
										</figure>
									<?php endif; ?>

									<div class="post-text-wrapper">
										<span class="post-date"><?php the_time('F dS Y'); ?></span>

										<h2 class="post-title"><?php the_title(); ?></h2>

										<?php
											// get category name
											$cat = get_the_category();
											$catName = $cat[0]->cat_name;
											$catSlug = $cat[0]->slug;
										?>

										<span class="post-excerpt"><?php echo get_the_excerpt(); ?></span>
									</div>
								</article>
							</a>
						</div>
						<?php $i+=0.3; endwhile; ?>
  				</div>
  				<?php else : ?>
					<span><?php _e('Sorry, no posts matched your criteria.'); ?></span>
					<?php endif; wp_reset_query();?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
