<?php
/**
 * Template Name: Redirect
 */
if (get_field('redirect_to')) {
    wp_redirect(get_field('redirect_to'), 301);
} else {
    wp_redirect(home_url('404'), 301);
}
exit;
