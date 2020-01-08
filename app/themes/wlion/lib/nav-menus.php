<?php
/**
 * Title: Navigation
 * Description: Setup the various navigation menus to be used by the theme.
 * Documentation:
 * -- http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */

/**
 * Define args for and return primary menu.
 *
 * @return void
 */
function nav_primary()
{
	wp_nav_menu(array(
		'container'       => '',                      // remove nav container
		'container_class' => '',                      // class of container
		'menu'            => '',                      // menu name
		'menu_id'         => '',                      // menu id
		'menu_class'      => '',                      // adding custom nav class
		'theme_location'  => 'nav-primary',           // where it's located in the theme
		'before'          => '',                      // before each link <a>
		'after'           => '',                      // after each link </a>
		'link_before'     => '',                      // before each link text
		'link_after'      => '<i class="caret"></i>', // after each link text
		'depth'           => 3                        // depth of nested menu items
	));
}

/**
 * Define args for and return secondary menu.
 *
 * @return void
 */
function nav_secondary()
{
	wp_nav_menu(array(
		'container'       => '',                      // remove nav container
		'container_class' => '',                      // class of container
		'menu'            => '',                      // menu name
		'menu_id'         => '',                      // menu id
		'menu_class'      => '',                      // adding custom nav class
		'theme_location'  => 'nav-secondary',         // where it's located in the theme
		'before'          => '',                      // before each link <a>
		'after'           => '',                      // after each link </a>
		'link_before'     => '',                      // before each link text
		'link_after'      => '<i class="caret"></i>', // after each link text
		'depth'           => 2                        // depth of nested menu items
	));
}

/**
 * Define args for and return mobile menu.
 *
 * @return void
 */
function nav_mobile()
{
	wp_nav_menu(array(
		'container'       => '',                                 // remove nav container
		'container_class' => '',                                 // class of container
		'menu'            => '',                                 // menu name
		'menu_id'         => '',                                 // menu id
		'menu_class'      => '',                                 // adding custom nav class
		'theme_location'  => 'nav-mobile',                       // where it's located in the theme
		'before'          => '',                                 // before each link <a>
		'after'           => '<i class="caret caret--down"></i>', // after each link </a>
		'link_before'     => '',                                 // before each link text
		'link_after'      => '',                                 // after each link text
		'depth'           => 3                                   // depth of nested menu items
	));
}

/**
 * Define args for and return footer menu.
 *
 * @return void
 */
function nav_footer()
{
	wp_nav_menu(array(
		'container'       => '',            // remove nav container
		'container_class' => '',            // class of container
		'menu'            => '',            // menu name
		'menu_id'         => '',            // menu id
		'menu_class'      => '',            // adding custom nav class
		'theme_location'  => 'nav-footer',  // where it's located in the theme
		'before'          => '',            // before each link <a>
		'after'           => '',            // after each link </a>
		'link_before'     => '',            // before each link text
		'link_after'      => '',            // after each link text
		'depth'           => -1             // depth of nested menu items
	));
}
