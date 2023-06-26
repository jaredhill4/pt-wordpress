<?php
/**
 * Title: Vendor - Advanced Custom Fields
 * Description: Override or add functionality to the Advanced Custom Fields plugin.
 * Documentation: https://www.advancedcustomfields.com/resources/.
 */

/**
 * Update ACF Google Maps API key.
 *
 * @return void
 */
function wl_acf_init() {
    if (get_field('google_maps_api_key', 'option')) {
        acf_update_setting('google_api_key', get_field('google_maps_api_key', 'option'));
    }
}
add_action('acf/init', 'wl_acf_init');

// Add ACF theme options page.
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);
}

/**
 * Disable ACF menu in the admin if not on `dev`.
 *
 * @return bool
 */
function wl_acf_settings_show_admin() {
    return WP_ENV === 'development';
}
add_filter('acf/settings/show_admin', 'wl_acf_settings_show_admin');
