<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Funny_Business
 * @since 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/reset.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/style.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/head.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/centerHome.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/about.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/blog.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/contact.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/faq.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/clownSearch.css" media="all" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/_css/foot.css" media="all" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="headBG">
	
	<section id="logo">
		<img src="<?php echo get_template_directory_uri(); ?>/_img/FBLogo94x150.png" width="94" height="150" alt="logo" id="logoImg" />
			<h1>Funny Business</h1>
	</section>
		
	<article id="social">
		<div id="fb">&nbsp;</div>
		<div id="tw">&nbsp;</div>
		<div id="rss">&nbsp;</div>
		
	</article>
		
	<nav>
		<ul>
			<li><a href="http://gallaty.com/fb">Home</a></li>
			<li><a href="http://gallaty.com/fb/wp-login.php">Sign-in</a></li>
			<li><a href="<?php bp_core_get_userlink($user_id); ?>">My Account</a></li>
			<li><a href="http://gallaty.com/fb/clown-search">Clown Search</a></li>
			<li><a href="http://gallaty.com/fb/about">About</a></li>
			<li><a href="http://gallaty.com/fb/blog">Blog</a></li>
			<li><a href="http://gallaty.com/fb/f-a-q">FAQ</a></li>
			<li><a href="http://gallaty.com/fb/contact">Contact</a></li>
		</ul>
	</nav>
<div class="hr"></div>	
</header>