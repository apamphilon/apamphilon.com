<?php require_once('includes/tweet-php-master/TweetPHP.php');

$TweetPHP = new TweetPHP(array(
	'consumer_key'              => '67IaptSdaPDhOhtntX4E8NXLG',
	'consumer_secret'           => '1E89lJ9QikuSknZDyaGAGXHpRuj8z3zyJcuke4E6CVORv3a5sN',
	'access_token'              => '102715779-T9JyiIOA3nrQ2AiU29ZM4jT50Arxsbzi0aK3SOAe',
	'access_token_secret'       => 'IwWKeEHQeMhVHQpGzYZtbJu2bRZH5BnuziMfZvavhAk6u',
	'twitter_screen_name'       => 'apamphilon',
	'enable_cache'          => true,
	'cache_dir'             => dirname(__FILE__) . '/cache/', // Where on the server to save cached tweets
	'cachetime'             => 60 * 60, // Seconds to cache feed (1 hour).
	'tweets_to_retrieve'    => 3, // Specifies the number of tweets to try and fetch, up to a maximum of 200
	'tweets_to_display'     => 3, // Number of tweets to display
	'ignore_replies'        => true, // Ignore @replies
	'ignore_retweets'       => true, // Ignore retweets
	'twitter_style_dates'   => false, // Use twitter style dates e.g. 2 hours ago
	'twitter_date_text'     => array('seconds', 'minutes', 'about', 'hour', 'ago'),
	'date_format'           => '%I:%M %p %b %e%O', // The defult date format e.g. 12:08 PM Jun 12th. See: http://php.net/manual/en/function.strftime.php
	'date_lang'             => null, // Language for date e.g. 'fr_FR'. See: http://php.net/manual/en/function.setlocale.php
	'twitter_template'      => '<div id="twitter">{tweets}</div>',
	'tweet_template'        => '<article>{tweet}<span class="meta"><a href="{link}">{date}</a></span></article>',
	'error_template'        => '<span class="status">Our twitter feed is unavailable right now.</span> <span class="meta"><a href="{link}">Follow us on Twitter</a></span>',
	'debug'                 => false
));

?>

<?php echo $TweetPHP->get_tweet_list(); ?>
