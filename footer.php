		<div class="contact-footer" id="contact">
			<div class="overlay-bg"></div>
			<div class="contact-close"></div>
			<div class="wrapper">
				<h3 class="section-title">Drop me a line</h3>
				<p>Have a question, or want to work with me on a project? Feel free to get in Touch using the contact form below. I will try to respond to any enquires as fast possible.</p>
				<?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true tabindex=49]'); ?>
				<ul class="social-links">
					<li class="twitter"><a href="http://www.twitter.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-twitter"></span></span></a></li>
					<li class="linked-in"><a href="http://uk.linkedin.com/pub/alex-pamphilon/75/129/381" target="_blank"><span class="border"><span class="fa fa-linkedin"></span></span></a></li>
					<li class="git-hub"><a href="http://www.github.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-github"></span></span></a></li>
					<li class="codepen"><a href="http://www.codepen.io/apamphilon" target="_blank"><span class="border"><span class="fa fa-codepen"></span></span></a></li>
					<li class="flickr"><a href="http://www.flickr.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-flickr"></span></span></a></li>
					<li class="soundcloud"><a href="http://www.soundcloud.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-soundcloud"></span></span></a></li>
				</ul>
			</div>
		</div>
		
		<footer class="footer-one clearfix">
			<div class="footer-twitter">
				<div class="wrapper">
					<?php require_once('includes/tweet-php-master/TweetPHP.php');

					$TweetPHP = new TweetPHP(array(
						'consumer_key'              => '67IaptSdaPDhOhtntX4E8NXLG',
						'consumer_secret'           => '1E89lJ9QikuSknZDyaGAGXHpRuj8z3zyJcuke4E6CVORv3a5sN',
						'access_token'              => '102715779-T9JyiIOA3nrQ2AiU29ZM4jT50Arxsbzi0aK3SOAe',
						'access_token_secret'       => 'IwWKeEHQeMhVHQpGzYZtbJu2bRZH5BnuziMfZvavhAk6u',
						'twitter_screen_name'       => 'apamphilon',
						'enable_cache'          => false,
						'cache_dir'             => dirname(__FILE__) . '/cache/', // Where on the server to save cached tweets
						'cachetime'             => 60 * 60, // Seconds to cache feed (1 hour).
						'tweets_to_retrieve'    => 30, // Specifies the number of tweets to try and fetch, up to a maximum of 200
						'tweets_to_display'     => 3, // Number of tweets to display
						'ignore_replies'        => true, // Ignore @replies
						'ignore_retweets'       => false, // Ignore retweets
						'twitter_style_dates'   => true, // Use twitter style dates e.g. 2 hours ago
						'twitter_date_text'     => array('seconds', 'minutes', 'about', 'hour', 'ago'),
						'date_format'           => '%I:%M %p %b %e%O', // The defult date format e.g. 12:08 PM Jun 12th. See: http://php.net/manual/en/function.strftime.php
						'date_lang'             => null, // Language for date e.g. 'fr_FR'. See: http://php.net/manual/en/function.setlocale.php
						'twitter_template'      => '<div id="tweets">{tweets}</div>',
						'tweet_template'        => '<div class="tweet"><div class="table"><div class="table-cell">{tweet}<span class="meta"><a href="{link}">{date}</a></span></div></div>								<div class="intents">
														<a class="intent" href="https://twitter.com/intent/tweet?in_reply_to={tweet_id}">Reply</a>
														<a class="intent" href="https://twitter.com/intent/retweet?tweet_id={tweet_id}">Retweet</a>
														<a class="intent" href="https://twitter.com/intent/like?tweet_id={tweet_id}">Like</a>
													</div>
													</div>',
						'error_template'        => '<span class="status">Our twitter feed is unavailable right now.</span> <span class="meta"><a href="{link}">Follow us on Twitter</a></span>',
						'debug'                 => false
					));

					?>

					<?php echo $TweetPHP->get_tweet_list(); ?>

					<!--twitter intent -->
					<script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

					<div class="btn-wrapper">
						<a href="http://www.twitter.com/intent/tweet?screen_name=apamphilon" target="_blank" class="tweet-me"><span class="border"><span class="fa fa-twitter"></span></span>Send me a tweet</a>
					</div>
				</div>
			</div>

			<div class="footer-social">
				<div class="wrapper">
					<?php /*><h3 class="title">
						<span class="typed-footer"></span>
					</h3>*/ ?>
					<ul class="social-links">
						<li class="twitter wow fadeIn" data-wow-delay="0" data-wow-duration="0.5s"><a href="http://www.twitter.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-twitter"></span></span></a></li>
						<li class="linked-in wow fadeIn" data-wow-delay="0.1s" data-wow-duration="0.5s"><a href="http://uk.linkedin.com/pub/alex-pamphilon/75/129/381" target="_blank"><span class="border"><span class="fa fa-linkedin"></span></span></a></li>
						<li class="git-hub wow fadeIn" data-wow-delay="0.2s" data-wow-duration="0.5s"><a href="http://www.github.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-github"></span></span></a></li>
						<li class="codepen wow fadeIn" data-wow-delay="0.3s" data-wow-duration="0.5s"><a href="http://www.codepen.io/apamphilon" target="_blank"><span class="border"><span class="fa fa-codepen"></span></span></a></li>
						<li class="flickr wow fadeIn" data-wow-delay="0.4s" data-wow-duration="0.5s"><a href="http://www.flickr.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-flickr"></span></span></a></li>
						<li class="soundcloud wow fadeIn" data-wow-delay="0.5s" data-wow-duration="0.5s"><a href="http://www.soundcloud.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-soundcloud"></span></span></a></li>
					</ul>
				</div>
			</div>
		</footer>

		<footer class="footer-two clearfix">
			<div class="wrapper">
				<nav class="mastnav">
					<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => false) ); ?>	
				</nav>
				<span class="copywrite">site design and build &copy; <?php echo date('Y'); ?><a href="http://www.apamphilon.com">apamphilon.com</a></span>
			</div>
		</footer>

		<?php wp_footer(); ?>
		
		<!-- jQuery fallback -->
		<script>
		if (typeof jQuery == 'undefined') {
		    document.write(unescape("%3Cscript src='<?php bloginfo('template_directory'); ?>/_js/vendor/jquery-1.11.1.min.js' type='text/javascript'%3E%3C/script%3E"));
		}
		</script>

		<script src="<?php bloginfo('template_directory'); ?>/_js/main.min.js"></script>

	</body>
</html>

