<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fp5
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="x-con" />
<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body id="page" <?php body_class(); ?>>
	<div class="off-canvas-wrap" data-offcanvas>
	  <div class="inner-wrap">
	  		<header id="header"  role="banner">
				<!-- <a class="skip-link screen-reader-text show-for-small" href="#content"><?php // _e( 'Skip to content', 'fp5' ); ?></a> -->	
				<!-- plann : topbar offcanvas and drop down menu style options will be added in backend of theme -->
				<?php get_template_part('inc/theme','topbar'); ?>
				<?php //get_template_part('inc/theme','tabbar'); ?>
			</header>
				<?php //get_template_part('inc/tabbar','nav'); ?>
			
		<div id="content" class="site-content">