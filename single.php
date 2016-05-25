<?php get_header(); ?>

	<div class="page-wrap">
		<div class="main">
			<div class="wrapper">
				<div class="col-left">
					<h1 class="page-title"><?php the_title(); ?></h1>

					<?php
						//get category name
						$cat = get_the_category();
						$catName = $cat[0]->cat_name;
						$catSlug = $cat[0]->slug;
					?>

					<?php if(is_singular('post')): ?>
					<span class="post-date">Posted on <?php the_time('F dS Y'); ?> in <?php echo $catName; ?></span>

					<div class="share-this">
						<ul>
							<li>
								<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
									<span class="fa fa-facebook"></span>
								</a>
							</li>
							<li>
								<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;hashtags=apamphilon.com" target="_blank">
									<span class="fa fa-twitter"></span>
							    </a>
							</li>
							<li>
								<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank">
									<span class="fa fa-google-plus"></span>
							    </a>
							</li>
							<li>
								<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" target="_blank">
									<span class="fa fa-linkedin"></span>
							    </a>
							</li>
							<li>
								<a href="mailto:?Subject=Check%20out%20this%20article%20on%20apamphilon.com%20&amp;Body=<?php the_permalink(); ?>">
									<span class="fa fa-envelope"></span>
							    </a>
							</li>
							<li>
								<a href="javascript:;" onclick="window.print()">
									<span class="fa fa-print"></span>
							    </a>
							</li>
						</ul>
						<a href="/blog" class="btn">Back to blog</a>
					</div>
					<?php endif; ?>

					<hr class="title-divider">

					<div class="wysiwyg">
						<?php the_content(); ?>

						<hr>

						<div class="post-comments">
							<h3 class="section-title">Comments:</h3>
							<?php comments_template(); ?>
						</div>
					</div>
				</div>

				<aside class="col-right">
					<div class="latest-posts-aside">
						<div class="feature-box">
							<?php if ( is_singular( 'snippets' ) ) : ?>
								<h3>Latest Snippets</h3>
								<?php $the_query = new WP_Query( array('posts_per_page' => 3, 'post_type' => 'snippets')); ?>
							<?php else: ?>
								<h3>Latest Posts</h3>
								<?php $the_query = new WP_Query( 'posts_per_page=3'); ?>
							<?php endif; ?>

							<?php if ($the_query->have_posts()) : ?>
					    <ul>
			        <?php while ( $the_query->have_posts()) : $the_query->the_post(); ?>
		            <li>
		              <a href="<?php the_permalink(); ?>">
		                <span class="title"><?php the_title(); ?></span>
		              </a>
		            </li>
			        <?php endwhile; ?>
					    </ul>
							<?php endif; wp_reset_query(); ?>
						</div>

						<?php if ( is_singular( 'snippets' ) ) : ?>
						<div class="feature-box">
							<h3>Snippet Categories</h3>
							<?php
							//list terms in a given taxonomy using wp_list_categories  (also useful as a widget)
							$orderby = 'name';
							$show_count = 0; // 1 for yes, 0 for no
							$pad_counts = 0; // 1 for yes, 0 for no
							$hierarchical = 1; // 1 for yes, 0 for no
							$taxonomy = 'Snippet Type';
							$title = '';

							$args = array(
							  'orderby' => $orderby,
							  'show_count' => $show_count,
							  'pad_counts' => $pad_counts,
							  'hierarchical' => $hierarchical,
							  'taxonomy' => $taxonomy,
							  'title_li' => $title
							);
							?>
							<ul>
							<?php
							wp_list_categories($args);
							?>
							</ul>
						</div>
						<?php endif; ?>

						<?php if ( is_singular( 'post' ) ) : ?>
						<div class="feature-box">
							<h3>Blog Categories</h3>
							<?php
							//list terms in a given taxonomy using wp_list_categories  (also useful as a widget)
							$orderby = 'name';
							$show_count = 0; // 1 for yes, 0 for no
							$pad_counts = 0; // 1 for yes, 0 for no
							$hierarchical = 1; // 1 for yes, 0 for no
							$taxonomy = 'category';
							$title = '';

							$args = array(
							  'orderby' => $orderby,
							  'show_count' => $show_count,
							  'pad_counts' => $pad_counts,
							  'hierarchical' => $hierarchical,
							  'taxonomy' => $taxonomy,
							  'title_li' => $title
							);
							?>
							<ul>
							<?php
							wp_list_categories($args);
							?>
							</ul>
						</div>
						<?php endif; ?>
					</div>
				</aside>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
