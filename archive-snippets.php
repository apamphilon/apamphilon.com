<?php get_header(); ?>

	<div class="page-wrap">
		<div class="blog-categories">
			<div class="wrapper">
				<span>Filter:</span>

				<span class="filter" data-filter="all">All</span>

				<?php $terms = get_terms('Snippet Type'); ?>

				<?php foreach($terms as $term): ?>
					<span class="filter" data-filter=".<?php echo $term->slug ?>"><?php echo $term->name; ?></span>
				<?php endforeach; ?>

				<div class="pager-list">
					<!-- Pagination buttons will be generated here -->
				</div>
			</div>
		</div>

		<div class="main">
			<div class="wrapper">
				<?php $the_query = new WP_Query(array('posts_per_page' => -1, 'post_type'=> 'snippets', 'orderby' =>'rand')); ?>
				<?php if ($the_query->have_posts()) : ?>
				<div class="posts snippets" id="container">
					<?php $i=0; while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<?php $terms = get_the_terms($post->ID, 'Snippet Type'); ?>

					<?php foreach($terms as $term): endforeach; ?>

					<div class="post mix <?php echo $term->slug; ?>">
						<a href="<?php the_permalink(); ?>">

							<?php if ($term->slug == "javascript-jquery") {
								$c = 'js';
							} else if ($term->slug == "wordpress") {
								$c = 'wp';
							} else if ($term->slug == "css") {
								$c = 'css';
							} else if ($term->slug == "misc") {
								$c = 'misc';
							} ?>

							<span class="cat-icon <?php echo $c; ?>"><?php echo $term->name; ?> Snippet</span>
							<article>
								<div class="post-text-wrapper match-height">
									<h2 class="post-title"><?php the_title(); ?></h2>
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

<?php get_footer(); ?>
