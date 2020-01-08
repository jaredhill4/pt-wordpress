<?php
/**
 * Title: Widgets Areas
 * Description: Create administrable widget areas.
 * Documentation: http://codex.wordpress.org/Function_Reference/register_sidebar
 */

// Register Right Sidebar widget area for blog.
register_sidebar(array(
	'name'          => __('Blog - Sidebar'),
	'id'            => 'sidebar-blog',
	'description'   => __('Widgets in this area will be shown on blog pages on the right-hand side.'),
	'before_widget' => '<aside id="%1$s" class="sidebar-section widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<header class="sidebar-header"><h4 class="rm-m-top">',
	'after_title'   => '</h4></header>'
));

// Register Left Sidebar widget area for pages.
register_sidebar(array(
	'name'          => __('Page - Sidebar'),
	'id'            => 'sidebar-page',
	'description'   => __('Widgets in this area will be shown in the sidebar on regular pages.'),
	'before_widget' => '<aside id="%1$s" class="sidebar-section widget %2$s">',
	'after_widget'  => '</aside>',
	'before_title'  => '<header class="sidebar-header"><h4 class="rm-m-top">',
	'after_title'   => '</h4></header>'
));

// Register Footer Column 1 widget area.
register_sidebar(array(
    'name'          => __('Footer Column 1'),
    'id'            => 'footer-column-1',
    'description'   => __('Widgets in this area will be shown in the footer in the first column.'),
    'before_widget' => '<div id="%1$s" class="footer-widget-area widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));

// Register Footer Column 2 widget area.
register_sidebar(array(
    'name'          => __('Footer Column 2'),
    'id'            => 'footer-column-2',
    'description'   => __('Widgets in this area will be shown in the footer in the second column.'),
    'before_widget' => '<div id="%1$s" class="footer-widget-area widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));

// Register Footer Column 3 widget area.
register_sidebar(array(
    'name'          => __('Footer Column 3'),
    'id'            => 'footer-column-3',
    'description'   => __('Widgets in this area will be shown in the footer in the third column.'),
    'before_widget' => '<div id="%1$s" class="footer-widget-area widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));

// Register Footer Column 4 widget area.
register_sidebar(array(
    'name'          => __('Footer Column 4'),
    'id'            => 'footer-column-4',
    'description'   => __('Widgets in this area will be shown in the footer in the fourth column.'),
    'before_widget' => '<div id="%1$s" class="footer-widget-area widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
));
