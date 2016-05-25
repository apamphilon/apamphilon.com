<?php

/* Template Name: Homepage */

get_header(); ?>

	<div class="home-cta">
		<div class="overlay-bg"></div>
		<div class="table-outer" data-0="top:0%;" data-800="top:-60%;">
			<div class="table">
				<div class="table-cell">
					<div class="wrapper">
						<ul class="slider">
							<li>
								<div class="text-wrapper">
									<h1 class="wow fadeIn" data-wow-delay="0.4s" data-wow-duration="2s">Front End WordPress Developer from Manchester UK</h1>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<a class="scroll-down fa fa-arrow-circle-down wow bounce" data-wow-delay="1.3s" data-wow-iteration="2" href="#about"></a>
	</div>

	<div class="page-wrap">
		<div class="my-story" id="about-anchor">
			<div class="wrapper">
				<h2 class="section-title wow fadeInLeft" data-wow-offset="100" data-wow-duration="1s">My Story So Far...</h2>
				<div class="wow fadeInRight" data-wow-delay="0.5s" data-wow-duration="1s">
					<?php the_content(); ?>
					<div class="expand">
						<ul>
					  		<li><p><span class="tooltip-right" data-tooltip="Peppermint Tea (Earl Grey Tea Close Second)">Favourite Hot Beverage</span></p></li>
					  		<li><p><span class="tooltip-right" data-tooltip="Liverpool FC">Football club</span></p></li>
					  		<li><p><span class="tooltip-right" data-tooltip="45">Average weekly hours spent coding</span></p></li>
						</ul>
					</div>
					<a href="#" class="btn wow bounceIn" data-wow-delay="0.5s" data-wow-duration="1s">Learn More</a>
				</div>
			</div>
		</div>

		<div class="about-cta">
			<div class="overlay-bg"></div>
			<div class="wrapper">
				<h2 class="section-title wow bounceInLeft" data-wow-offset="100" data-wow-duration="1s">Man Behind The code</h2>
				<p class="wow bounceInRight" data-wow-offset="100" data-wow-duration="1s">In my spare time, I am a keen <a href="http://www.apamphilon.com/photography" target="_blank"><i class="fa fa-camera-retro"></i></a> and like to create <a href="http://www.soundcloud.com/apamphilon" target="_blank"><i class="fa fa-music"></i></a> I am a keen road cyclist and love to get out on the <a href="http://www.strava.com/athletes/775826" target="_blank"><i class="fa fa-bicycle"></i></a> as much as possible.</p>
			</div>
		</div>

		<div class="my-services" id="my-services-anchor">
			<h2 class="section-title wow fadeIn" data-wow-offset="100" data-wow-duration="1s">My Services</h2>
			<div class="wrapper">
				<?php $the_query = new WP_Query(array('posts_per_page' => -1, 'post_type' => 'service')); ?>
				<?php if ($the_query->have_posts()): ?>
					<ul class="posts">
						<?php while($the_query->have_posts()) : $the_query->the_post(); ?>
							<li class="post wow fadeInUp" data-wow-offset="150" data-wow-duration="1s">
								<article>
									<figure class="mh">
										<a href="<?php the_permalink(); ?>">
										<?php if(has_post_thumbnail()): ?>
											<?php the_post_thumbnail('news-featured-thumb'); ?>
										<?php else: ?>
											<img src="http://placehold.it/550x400" alt="">
										<?php endif; ?>
										</a>
									</figure>
									<div class="post-text-wrapper">
										<a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
										<a href="<?php the_permalink(); ?>" class="btn">Learn More</a>
									</div>
								</article>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; wp_reset_query();?>
			</div>
		</div>

		<div class="latest-posts">
			<div class="wrapper">
				<h2 class="section-title wow fadeIn" data-wow-offset="100" data-wow-duration="1s">Latest Posts</h2>
				<?php $the_query = new WP_Query(array('posts_per_page' => 3, 'cat'=> 7)); ?>
				<?php if ($the_query->have_posts()): ?>
					<ul class="posts">
						<?php $i=0; while ( $the_query->have_posts()) : $the_query->the_post(); ?>
							<li class="post wow fadeIn" data-wow-duration="1s" data-wow-delay="<?php echo $i; ?>s">
								<a href="<?php the_permalink(); ?>">
									<article>
										<div class="overlay">
											<div class="table">
												<div class="table-cell">
													<div class="post-text-wrapper">
														<h2 class="post-title"><?php the_title(); ?></h2>
														<?php
															//get category name
															$cat = get_the_category();
															$catName = $cat[0]->cat_name;
															$catSlug = $cat[0]->slug;
														?>
														<span class="post-date">Posted on <?php the_time('F dS Y'); ?></span>
													</div>
													<span class="btn">Read More</span>
												</div>
											</div>
										</div>
										<figure>
											<?php if( has_post_thumbnail() ): ?>
												<?php $bi = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
											<?php else: ?>
												<?php $bi = 'http://placehold.it/300x300'; ?>
											<?php endif; ?>
											<span class="bi" style="background-image: url('<?php echo $bi; ?>');"></span>
										</figure>
									</article>
								</a>
							</li>
						<?php $i+=0.5; endwhile; ?>
					</ul>
				<?php endif; wp_reset_query();?>

				<div class="btn-wrapper">
					<a href="/blog" class="btn wow bounceIn" data-wow-duration="1s">See More</a>
				</div>
			</div>
		</div>

		<div class="instagram-feed">
			<div class="wrapper wow fadeIn" data-wow-offset="150" data-wow-duration="1s">
				<h2 class="section-title wow fadeIn" data-wow-offset="100" data-wow-duration="1s">Instagram</h2>
				<?php echo do_shortcode('[instagram-feed]'); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
