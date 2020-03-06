<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Samson last">
    <title>
        <?php wp_title(''); ?>
        <?php if ( !(is_404()) && (is_single()) or (is_page()) or (is_archive()) ) { ?> -
        <?php } ?>
        <?php bloginfo('name'); ?>
    </title>
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/blog-home.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css?v=1" type="text/css" media="screen, projection">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
            <?php bloginfo('name'); ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
          </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php  /* menu */
                wp_nav_menu( array(
                        'menu'              => 'top',
                        'theme_location'    => 'top',
                        'depth'             => 5,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse ',
                        'menu_class'        => 'nav navbar-nav  ',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                );
                ?>
            </ul>
        </div>
    </div>
</nav>