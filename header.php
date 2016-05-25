<!doctype html>
<html class="no-js" lang="">
  <head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<meta name="format-detection" content="telephone=no">

		<!-- modernizr -->
		<script src="<?php bloginfo('template_directory'); ?>/_js/vendor/modernizr.min.js"></script>

		<!-- favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/_favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/_favicons/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/_favicons/android-chrome-192x192.png" sizes="192x192">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/_favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php bloginfo('template_directory'); ?>/_favicons/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="<?php bloginfo('template_directory'); ?>/_favicons/manifest.json">
		<link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/_favicons/safari-pinned-tab.svg" color="#5bbad5">
		<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_favicons/favicon.ico">
		<meta name="msapplication-TileColor" content="#ffc40d">
		<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/_favicons/mstile-144x144.png">
		<meta name="msapplication-config" content="<?php bloginfo('template_directory'); ?>/_favicons/browserconfig.xml">
		<meta name="theme-color" content="#ffffff">

		<!-- selectivizr -->
		<!--[if (gte IE 6)&(lte IE 8)]>
			  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/_js/vendor/selectivizr-min.js"></script>
		<![endif]-->

		<?php wp_head(); ?>

		<!-- google analytics -->
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-44383960-1', 'auto');
		ga('send', 'pageview');
		</script>

		<script>
		$(window).load(function(){
			$('#preloader').fadeOut('slow');
		});
		</script>
	</head>

	<body <?php body_class('markup'); ?>>
    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <div id="preloader"></div>

		<header class="masthead clearfix fixed">
			<div class="wrapper">
				<h1><a href="<?php echo get_site_url(); ?>">apamphilon</a></h1>

				<nav class="mastnav main-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => false) ); ?>
					<ul>
						<li class="twitter"><a href="http://www.twitter.com/apamphilon" target="_blank"><span class="border"><span class="fa fa-twitter"></span></span></a></li>
						<li><span class="fa fa-search"></span></li>
					</ul>
				</nav>
			</div>

			<div class="header-search">
				<?php get_search_form(); ?>
			</div>
		</header>

		<div class="side-menu"></div>
    <div class="nav-toggle"><span></span></div>
