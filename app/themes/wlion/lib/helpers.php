<?php
/**
 * Title: Helpers
 * Description: These are global helper functions for the theme.
 */

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
