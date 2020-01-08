<!doctype html>
<html lang="en">
<head>
    <?php
        // Set up the post id for all pages
        $post_id = wl_get_post_id('head');
    ?>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= (get_the_meta_title($post_id)) ? get_the_meta_title($post_id) . ' | ' : '' ?><?php the_field('company_name', 'option'); ?><?= (get_field('tagline', 'option')) ? ' | ' . get_field('tagline', 'option') : '' ?></title>
    <meta name="description" content="<?= get_the_meta_description($post_id); ?>" />
    <meta name="keywords" content="<?= get_the_meta_keywords($post_id); ?>" />
    <meta name="theme-color" content="<?php the_field('theme_color', 'option'); ?>" />
    <meta name="author" content="<?php the_field('company_name', 'option'); ?>">
    <link rel="author" href="http://wlion.com">

    <!-- Icons -->
    <link rel="shortcut icon" href="<?= get_theme_file_uri('images/favicon_32x32.png'); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= get_theme_file_uri('images/app_icon_57x57.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= get_theme_file_uri('images/app_icon_72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= get_theme_file_uri('images/app_icon_114x114.png'); ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= get_theme_file_uri('images/app_icon_144x144.png'); ?>">

    <!-- Social Data: Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= get_the_twitter_title($post_id); ?>">
    <meta name="twitter:description" content="<?= get_the_twitter_description($post_id); ?>">
    <meta name="twitter:url" content="<?= get_permalink($post_id); ?>">
    <meta name="twitter:image" content="<?= get_the_twitter_image($post_id); ?>">

    <!-- Social Data: Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:title" content="<?= get_the_og_title($post_id); ?>">
    <meta property="og:description" content="<?= get_the_og_description($post_id); ?>">
    <meta property="og:url" content="<?= get_permalink($post_id); ?>">
    <meta property="og:image" content="<?= get_the_og_image($post_id); ?>">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <a id="top"></a>
    <header class="site-header u--hidden-print">
        <div class="site-header__top">
            <div class="container">
                <div class="site-header__content">
                    <div class="site-header__tagline">
                        <?php the_field('tagline', 'option'); ?>
                    </div>
                    <nav class="secondary-nav">
                        <?php nav_secondary(); ?>
                        <ul class="social-links">
                            <li class="facebook"><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="youtube"><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li class="pinterest"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="site-header__bottom">
            <div class="container">
                <div class="site-header__content">
                    <a href="/" class="site-header__logo" title="Go to Home Page">
                        <?php if (get_field('logo_primary', 'option')): ?>
                            <?php $logo_primary = get_field('logo_primary', 'option'); ?>
                            <img src="<?= $logo_primary['sizes']['logo-primary']; ?>" alt="<?php the_field('company_short_name', 'option'); ?>" />
                        <?php elseif (get_field('company_short_name', 'option')) : ?>
                            <?php the_field('company_short_name', 'option'); ?>
                        <?php else: ?>
                            <?php the_field('company__name', 'option'); ?>
                        <?php endif; ?>
                    </a>

                    <nav class="primary-nav">
                        <?php nav_primary(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <header class="mobile-header u--hidden-print">
        <a class="mobile-header__logo" href="/"><?php bloginfo('name'); ?></a>
        <a href="#" class="hamburger" data-toggle="nav-mobile">
            <span class="hamburger__label">MENU</span>
            <span class="hamburger__icon"></span>
        </a>
    </header>

    <nav class="mobile-nav">
        <?php nav_mobile(); ?>
    </nav>

    <?php if (is_front_page()): ?>
        <?php get_template_part('partials/page-header', 'home'); ?>
    <?php else: ?>
        <?php get_template_part('partials/page-header'); ?>
    <?php endif; ?>

    <main class="page-content">
