<?php get_header(); ?>

	<div class="page-wrap">
		<div class="main">
			<div class="top-bar">
				<div class="wrapper">
					<?php
						global $post;
						$terms = get_the_terms($post->id, 'Snippet Type');
						$term_name = $terms[0]->name;
					?>

					<h1 class="page-title"><?php echo $term_name; ?> Snippets</h1>
					<a href="/snippets" class="btn">Back To Snippets</a>
				</div>
			</div>

			<div class="wrapper">
				<?php $the_query = new WP_Query(array('posts_per_page' => -1, 'post_type'=> 'snippets')); ?>
				<?php if ($the_query->have_posts()) : ?>
				<div class="posts" id="container">
					<?php $i=0; while (have_posts()) : the_post(); ?>

						<?php $terms = get_the_terms($post->ID, 'Snippet Type'); ?>

						<?php foreach($terms as $term): ?>
						<?php endforeach; ?>

						<div class="post mix <?php echo $term->slug; ?>">
							<a href="<?php the_permalink(); ?>">
								<article>
									<div class="post-text-wrapper">
										<h2 class="post-title match-height"><?php the_title(); ?></h2>
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
