<?php get_header(); ?>

	<div class="page-wrap">
		<div class="main">
			<div class="top-bar">
				<div class="wrapper">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'domain' ), '<span>' . '"' . get_search_query() . '"' . '</span>' ); ?></h1>

					<?php
						$mySearch = new WP_Query("s=$s & showposts=-1");
						$num = $mySearch->post_count;
					?>

					<span class="num">Results found: <?php echo $num; ?></span>
				</div>
			</div>

			<div class="blog-main">
				<div class="wrapper">
					<?php if (have_posts()): ?>
					<div class="posts show-all" id="container">
						<?php $i=0; while (have_posts()) : the_post(); ?>

							<?php
								$cat = get_the_category();
								$cat_name = $cat[0]->category_nicename;
							?>

							<div class="post mix <?php echo $cat_name; ?>">
								<a href="<?php the_permalink(); ?>">
									<article class="match-height">
										<span class="result-type"><?php echo $post->post_type; ?></span>

										<div class="post-text-wrapper">
											<h2 class="post-title"><?php the_title(); ?></h2>

											<?php
												//get category name
												$cat = get_the_category();
												$catName = $cat[0]->cat_name;
												$catSlug = $cat[0]->slug;
											?>

											<span class="post-excerpt"><?php echo substr(get_the_excerpt(), 0, 100); ?></span>
										</div>
									</article>
								</a>
							</div>
						<?php $i+=0.3; endwhile; ?>
					</div>
  				<?php else : ?>
  					<span class="nothing-found">Sorry, no results were found. Please search again or use the main navigation to find what you are looking for. </span>
  				<?php endif; wp_reset_query();?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
