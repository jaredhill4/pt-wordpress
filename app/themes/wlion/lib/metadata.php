<?php
/**
 * Title: Meta Data
 * Description: Functions to set and return the admin generated meta and social data.
 * Documentation: http://codex.wordpress.org/Function_Reference/get_post_meta
 */

/**
 * Set and return the meta_description of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_meta_title($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        if (get_field('meta_title', $post_id)) {
            $output = get_field('meta_title', $post_id);

        // If meta_title is not set, use the page title instead.
        } else {
            $output = get_the_title($post_id);
        }
    } elseif (is_404()) {
        $output = 'Page Not Found';
    } elseif (is_search()) {
        $output = 'Search';
    }

    return $output;
}

/**
 * Set and return the meta_description of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_meta_description($post_id)
{
    $output = '';

    //var_dump($post_id);

    if (!empty($post_id)) {
        // Check if meta_description is set.
        if (get_field('meta_description', $post_id)) {
            $output = get_field('meta_description', $post_id);

        // If meta_description is not set, use the excerpt instead.
        } elseif (has_excerpt($post_id)) {
            $output = get_the_excerpt($post_id);
        }
    }

    return $output;
}

/**
 * Set and return the meta_keywords of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_meta_keywords($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        // Check if meta_keywords are set.
        if (get_field('meta_keywords', $post_id)) {
            $output = get_field('meta_keywords', $post_id);

        // If meta_keywords are not set, use the site name and page title instead.
        } else {
            $output  = strtolower(get_bloginfo('name')) . ', ';
            $output .= strtolower(get_the_title($post_id));
        }
    }

    return $output;
}

/**
 * Set and return the meta og_title of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_og_title($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        // Check if og_title is set.
        if (get_field('og_title', $post_id)) {
            $output = get_field('og_title', $post_id);

        // If og_title is not set, check if meta_title is set.
        } elseif (get_field('meta_title', $post_id))  {
            $output = get_field('meta_title', $post_id);

        // If og_title is not set, use the page title instead.
        } else {
            $output = get_the_title($post_id);
        }
    }

    return $output;
}

/**
 * Set and return the meta og_description of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_og_description($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        // Check if og_description is set.
        if (get_field('og_description', $post_id)) {
            $output = get_field('og_description', $post_id);

        // If og_description is not set, check if meta_description is set.
        } elseif (get_field('meta_description', $post_id))  {
            $output = get_field('meta_description', $post_id);

        // If neither og_description nor meta_description is set, use the excerpt.
        } elseif (has_excerpt($post_id)) {
            $output = get_the_excerpt($post_id);
        }
    }

    return $output;
}

/**
 * Set and return the meta og_image of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_og_image($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        // Check if og_image is set.
        if (get_field('og_image', $post_id)) {
            $output = get_field('og_image', $post_id);

        // If og_image is not set, check if post_thumbnail is set.
        } elseif (get_the_post_thumbnail($post_id) != '') {
            $output = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'open-graph');
            $output = $output['0'];

        // If neither og_image nor post_thumbnail is set, use '/images/app_icon_144x144.png'.
        } else {
            $output = get_theme_file_uri('images/app_icon_144x144.png');
        }
    }

    return $output;
}

/**
 * Set and return the twitter_title of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_twitter_title($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        // Check if twitter_title is set.
        if (get_field('twitter_title', $post_id)) {
            $output = get_field('twitter_title', $post_id);

        // If twitter_title is not set, check if meta_title is set.
        } elseif (get_field('meta_title', $post_id))  {
            $output = get_field('meta_title', $post_id);

        // If twitter_title is not set, use the page title instead.
        } else {
            $output = get_the_title($post_id);
        }
    }

    return $output;
}

/**
 * Set and return the twitter_description of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_twitter_description($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        // Check if twitter_description is set.
        if (get_field('twitter_description', $post_id)) {
            $output = get_field('twitter_description', $post_id);

        // If twitter_description is not set, check if meta_description is set.
        } elseif (get_field('meta_description', $post_id)) {
            $output = get_field('meta_description', $post_id);

        // If neither twitter_description nor meta_description is set, use the excerpt.
        } elseif (has_excerpt($post_id)) {
            $output = get_the_excerpt($post_id);
        }
    }

    return $output;
}

/**
 * Set and return the twitter_image of a specific page based on the post id.
 *
 * @param  int $post_id
 * @return string
 */
function get_the_twitter_image($post_id)
{
    $output = '';

    if (!empty($post_id)) {
        // Check if twitter_image is set.
        if (get_field('twitter_image', $post_id)) {
            $output = get_field('twitter_image', $post_id);

        // If twitter_image is not set, check if post_thumbnail is set.
        } elseif (get_the_post_thumbnail($post_id) != '') {
            $output = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'twitter-card');
            $output = $output['0'];

        // If neither twitter_image nor post_thumbnail is set, use '/images/app_icon_144x144.png'.
        } else {
            $output = get_theme_file_uri('images/app_icon_144x144.png');
        }
    }

    return $output;
}
