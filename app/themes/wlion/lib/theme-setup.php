<?php
/**
 * Title: Theme Setup
 * Description: Miscellaneous theme setup actions, filters and functions.
 * Documentation:
 * -- http://codex.wordpress.org/Function_Reference/add_action
 * -- https://codex.wordpress.org/Function_Reference/remove_action
 * -- http://codex.wordpress.org/Function_Reference/add_filter
 * -- https://codex.wordpress.org/Function_Reference/remove_filter
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @uses add_theme_support()
 * @uses register_nav_menus()
 * @uses add_editor_style()
 *
 * @return void
 */
function wl_after_setup_theme() {
    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menu locations to be managed by site admin
    register_nav_menus(array(
        'nav-primary'   => __('Primary Navigation'),
        'nav-secondary' => __('Secondary Navigation'),
        'nav-footer'    => __('Footer Navigation'),
        'nav-mobile'    => __('Mobile Navigation')
    ));

    // Add our custom MCE editor styles
    add_editor_style(webpack('admin-editor.css', TRUE));
}
add_action('after_setup_theme', 'wl_after_setup_theme', 10);

// Add image sizes
if (function_exists('add_image_size')) {
    add_image_size('logo-primary',      999999, 40,  FALSE); // Primary logo
    add_image_size('hero-home',         1500,   650, TRUE ); // Home page hero
    add_image_size('hero-page',         1500,   450, TRUE ); // Sub page hero
    add_image_size('post-thumb',        800,    300, TRUE ); // Blog page post thumbs
    add_image_size('post-thumb-detail', 800,    450, TRUE ); // Detail page post thumbs
    add_image_size('open-graph',        1200,   630, TRUE ); // Open Graph
    add_image_size('twitter-card',      420,    225, TRUE ); // Twitter Card
}

/**
 * Make image sizes selectable in site admin.
 *
 * @param array $sizes
 * @return void
 */
function wl_image_size_names_choose($sizes) {
    return array_merge($sizes, array(
        'hero-home'         => __('Hero Home'),
        'hero-page'         => __('Hero Page'),
        'post-thumb'        => __('Post Thumbnail'),
        'post-thumb-detail' => __('Post Thumbnail Detail'),
        'open-graph'        => __('Open Graph'),
        'twitter-card'      => __('Twitter Card')
    ));
}
add_filter('image_size_names_choose', 'wl_image_size_names_choose', 10);

// Disable emoji scripts and styles
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Enable shortcodes in widgets
add_filter('widget_text', 'do_shortcode');

/**
 * Change the default excerpt ending.
 *
 * @param  string $more
 * @return string
 */
function wl_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'wl_excerpt_more');

/**
 * Remove height and width attributes from images added through WordPress content editor.
 *
 * @param  string $html
 * @return string
 */
function wl_remove_img_width_attribute($html)
{
   $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
   return $html;
}
add_filter('post_thumbnail_html', 'wl_remove_img_width_attribute', 10);
add_filter('image_send_to_editor', 'wl_remove_img_width_attribute', 10);

/**
 * Ensure that wordpress doesn't output installed version for security purposes.
 *
 * @return string
 */
function wl_remove_version()
{
    return '';
}
add_filter('the_generator', 'wl_remove_version');

/**
 * Add responsive container to embeds
 *
 * @param  string $html
 * @return string
 */
function wl_responsive_embed($html)
{
    return '<div class="u--embed-responsive">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'wl_responsive_embed', 10);
add_filter('video_embed_html', 'wl_responsive_embed'); // Jetpack

/**
 * Add classes to tables in the content.
 *
 * @param  string $content
 * @return string
 */
function wl_tinymce_table_add_classes($content)
{
    return str_replace('<table>', '<table class="table table--striped">', $content);
}
add_filter('the_content', 'wl_tinymce_table_add_classes');
