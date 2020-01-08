<?php
/**
 * Ajax Search Autosuggest
 * Handle ajax post request for search autosuggest.
 *
 * @return json object
 */
function post_ajax_search_autosuggest($search = NULL, $limit = 5)
{
    // Config
    $search       = $_POST['search'];
    $limit        = $_POST['limit'];
    $hits         = [];
    $success      = FALSE;
    $did_you_mean = NULL;

    $args = [
        's'              => $search,
        'posts_per_page' => $limit
    ];

    $query = new WP_Query($args);

    relevanssi_do_query($query);

    if ($query->post_count > 0) {
        foreach ($query->posts as $post) {
            setup_postdata($post);

            $post->permalink              = get_permalink($post->ID);
            $post->post_highlighted_title = relevanssi_highlight_terms($post->post_highlighted_title, $search);
            $post->post_excerpt           = relevanssi_do_excerpt($post, $search);
        }

        $success = TRUE;
        $hits = $query->posts;
    } else {
        $success      = FALSE;
        $did_you_mean = relevanssi_didyoumean($search);
    }

    if ($success) {
        // Return success response
        $response = [
            'message'    => 'Success!',
            'hits'       => $hits,
            'query_term' => $search,
            'view_more'  => ($query->found_posts > $limit) ? TRUE : FALSE
        ];
        wp_send_json_success($response);
    } else {
        // Return error response
        $response = [
            'message'      => 'Error!',
            'hits'         => $hits,
            'query_term'   => $search,
            'did_you_mean' => $did_you_mean
        ];
        wp_send_json_error($response);
    }
}
add_action('wp_ajax_nopriv_post_ajax_search_autosuggest', 'post_ajax_search_autosuggest');
add_action('wp_ajax_post_ajax_search_autosuggest', 'post_ajax_search_autosuggest');
