<?php
/**
 * Title: Helpers
 * Description: These are global helper functions for the theme.
 */

if (!function_exists('dd')) {
    /**
     * Dump and die.
     *
     * @param array|string $input
     * @return string
     */
    function dd($input = '') {
        echo '<pre id="dd-0" style="position:fixed; bottom:0; top:0; left:0; right:0; z-index:99999; border-radius:0; padding:20px; background-color:#fff; margin:0;">';
        highlight_string("<?php\n " . var_export($input, TRUE) . "?>");
        echo '</pre>';
        echo '<script>document.getElementsByTagName("code")[0].getElementsByTagName("span")[1].remove() ;document.getElementsByTagName("code")[0].getElementsByTagName("span")[document.getElementsByTagName("code")[0].getElementsByTagName("span").length - 1].remove(); document.body.appendChild(document.getElementById("dd-0")); </script>';
        die();
    }
}

if (!function_exists('slugify')) {
    /**
     * Convert a string to a slug.
     *
     * @param  string $string
     * @return string
     */
    function slugify($string)
    {
        if (is_string($string)) {
            $string = strtolower(str_replace(' ', '-', $string));
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
            return $string;
        } else {
            return FALSE;
        }
    }
}

/**
 * Setup post ID (needed primarily for post list pages).
 *
 * @param  string $section
 * @return int
 */
function wl_get_post_id($section = '')
{
    global $post;
    $post_id = NULL;

    if (is_object($post)) {
        $post_id = $post->ID;
    }

    if (is_front_page()) { // Default homepage or static homepage
        $post_id = get_option('page_on_front');
    } elseif (is_blog()) { // Blog pages
        $post_id = get_option('page_for_posts');
    } elseif (is_search() or is_404()) { // Search or 404 page
        $post_id = NULL;
    }

    if ($section != 'head') {
        if (is_singular('post')) {
            $post_id = get_option('page_for_posts');
        }
    }

    return $post_id;
}

/**
 * Helper to check if we are on one of the blog related pages.
 *
 * @return boolean
 */
if (!function_exists('is_blog')) {
    function is_blog() {
        return (
            is_home() or
            is_category() or
            is_tag() or
            is_author() or
            is_date() or
            is_year() or
            is_month() or
            is_day() or
            is_time() or
            is_single()
        );
    }
}

if (!function_exists('wl_partial')) {
    /**
     * Load a partial into a template while supplying data.
     *
     * @param  string $slug    The slug name for the generic template.
     * @param  array  $params  An associated array of data that will be extracted into the templates scope.
     * @param  bool   $output  Whether to output component or return as string.
     * @return string
     */
    function wl_partial($path, array $settings = [], $output = TRUE) {
        if (!$output) {
            ob_start();
        }

        // Allow dot-notated paths
        $path = explode('.', $path);
        $path = implode('/', $path);

        // TODO: move to plugin and replace "get_template_directory()" with "plugin_dir_path(__FILE__)"
        if (!$template_file = get_template_directory() . '/partials/' . $path . '.php') {
          trigger_error(sprintf(__('Error locating %s for inclusion', 'wlion'), $template_file), E_USER_ERROR);
        }

        //extract($settings, EXTR_SKIP);
        $props = $settings;

        require($template_file);

        if (!$output) {
            return ob_get_clean();
        }
    }
}

/**
 * Get the page header based on the current template.
 *
 * @return void
*/
function wl_get_page_header() {
    global $template;

    $template_name = basename($template, '.php');
    // TODO: Keeping this in case we have issues/conflicts using `basename` in the future
    // $template_name = str_replace(get_theme_file_path() . '/', '', $template_name);
    // $template_name = str_replace(get_template_directory() . '/', '', $template_name);

    $template_to_page_header_map = [
        'front-page' => 'home',
    ];

    $page_header = $template_to_page_header_map[$template_name] ?? 'default';

    if ($page_header) {
        return wl_partial('page-headers.page-header-' . $page_header);
    }
}
