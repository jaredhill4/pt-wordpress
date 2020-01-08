<?php
/**
 * Title: Assets
 * Description: Enqueque the custom theme assets.
 * Documentation:
 * -- https://codex.wordpress.org/Plugin_API/Action_Reference/wp_enqueue_scripts
 * -- https://codex.wordpress.org/Plugin_API/Action_Reference/admin_enqueue_scripts
 * -- https://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
 */

/**
 * Enqueque front-end assets.
 *
 * @return void
 */
function enqueue_theme_assets()
{
    // TODO: Determine if we need to remove this, as some plugins
    // inject jQuery-dependent JavaScript higher in the page.
    // Move default jQuery script to footer
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), FALSE, NULL, TRUE);
    wp_enqueue_script('jquery');

    // Enqueue fonts
    wp_enqueue_style('wlion-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i', false);

    // TODO: Determine if this is the culprit for FOUC issues in our theme
    // Force all scripts in footer
    // remove_action('wp_head', 'wp_print_scripts');
    // remove_action('wp_head', 'wp_print_head_scripts', 9);
    // remove_action('wp_head', 'wp_enqueue_scripts', 1);

    // Common assets
    wl_enqueue_asset('commons.js');
    wl_enqueue_asset('global.js');
    wl_enqueue_asset('global.css');

    // Contact page assets
    if (is_page_template('templates/page-contact.php')) {
        wl_enqueue_asset('contact.js');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets', 10);

/**
 * Enqueue custom stylesheet for admin panel.
 *
 * @return void
 */
function wl_enqueue_admin_assets()
{
    wl_enqueue_asset('admin.css');
}
add_action('admin_enqueue_scripts', 'wl_enqueue_admin_assets', 10);
add_action('login_enqueue_scripts', 'wl_enqueue_admin_assets', 10);

if (!function_exists('webpack')) {
    /**
     * Get the path to a versioned webpack asset.
     *
     * @param  string  $file
     * @return string
     */
    function webpack($file, $editor = FALSE)
    {
        static $manifest = NULL;

        if (is_null($manifest)) {
            $manifest = json_decode(@file_get_contents(get_theme_root() . '/wlion/build/manifest.json'), TRUE);
        }

        $path = NULL;

        if (isset($manifest[$file])) {
            $path = empty($editor) ? content_url('/themes/wlion' . $manifest[$file]) : $manifest[$file];
        }

        return $path;
    }
}

/**
 * Enqueue a given asset.
 *
 * @param  string  $file
 * @return voide
 */
function wl_enqueue_asset($file = NULL, $deps = [])
{
    if (!is_null($file)) {
        $prefix   = 'wlion-';
        $fileinfo = pathinfo($file);
        $ext      = $fileinfo['extension'];
        $name     = $fileinfo['filename'];
        $path     = webpack($file);

        if (!$path) {
            return FALSE;
        }

        if (!is_null($path)) {
            switch($ext) {
                case 'js':
                    wp_enqueue_script($prefix . $name, $path, array_merge(['jquery'], $deps), FALSE, TRUE);
                    break;
                case 'css':
                    wp_enqueue_style($prefix . $name, $path, [], FALSE, 'all');
                    break;
                default:
                    break;
            }
        }
    }
}
