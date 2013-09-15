<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
	global $inove_nosidebar;
	$options = get_option('inove_options');
	if($options['feed'] && $options['feed_url']) {
		if (substr(strtoupper($options['feed_url']), 0, 7) == 'HTTP://') {
			$feed = $options['feed_url'];
		} else {
			$feed = 'http://' . $options['feed_url'];
		}
	} else {
		$feed = get_feed_link('rss2');
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all posts', 'inove'); ?>" href="<?php echo $feed; ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php _e('RSS 2.0 - all comments', 'inove'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php if (strtoupper(get_locale()) == 'ZH_CN' || strtoupper(get_locale()) == 'ZH_TW') : ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/chinese.css" type="text/css" media="screen" />
	<?php elseif (strtoupper(get_locale()) == 'HE_IL' || strtoupper(get_locale()) == 'FA_IR' || strtoupper(get_locale()) == 'UG_CN' || strtoupper(get_locale()) == 'CKB') : ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/rtl.css" type="text/css" media="screen" />
	<?php endif; if ($options['sidebar_position'] == 'left') : ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/sidebar_left.css" type="text/css" media="screen" />
	<?php endif; ?>
	<!--[if IE]>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie.css" type="text/css" media="screen" />
	<![endif]-->

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/base.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>

	<?php wp_head(); ?>
</head>

<?php flush(); ?>

<body <?php body_class(); ?>>
<!-- wrap START -->
<div id="wrap">

<!-- container START -->
<div id="container" <?php if($options['nosidebar'] || $inove_nosidebar){echo 'class="one-column"';} ?> >

<!-- header START -->
<div id="header" class="clearfix">
	<?php if( $options['banner_content'] && (
		($options['banner_registered'] && $user_ID) || 
		($options['banner_commentator'] && !$user_ID && isset($_COOKIE['comment_author_'.COOKIEHASH])) || 
		($options['banner_visitor'] && !$user_ID && !isset($_COOKIE['comment_author_'.COOKIEHASH]))
	) ) : ?>
		<div class="banner">
			<?php echo($options['banner_content']); ?>
		</div>
	<?php endif; ?>

	<div id="caption">
		<h1 id="title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div id="tagline"><?php bloginfo('description'); ?></div>
	</div>
</div>
<!-- header END -->

<!-- navigation START -->
<div id="navigation" class="clearfix">
	<?php
		if (is_home()) {
			$home_menu = 'current_page_item';
		} else {
			$home_menu = 'page_item';
		}
		inove_nav_menus(array('home_class' => $home_menu));
	?>

	<?php get_search_form(); ?>
</div>
<!-- navigation END -->

<!-- content START -->
<div id="content" class="clearfix">

	<!-- main START -->
	<div id="main">
