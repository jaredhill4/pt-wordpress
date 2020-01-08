<?php
/**
 * Title: Vendor - Contact Form 7
 * Description: Override or add functionality to the Contact Form 7 plugin.
 * Documentation: https://contactform7.com/docs/
 */

/**
 * Enable custom shortcodes in form editor.
 *
 * @param  array $form
 * @return array
 */
function wl_wpcf7_form_elements($form)
{
    $form = do_shortcode($form);
    return $form;
}
add_filter('wpcf7_form_elements', 'wl_wpcf7_form_elements');

/**
 * Prevent loading the plugin CSS
 *
 * @return boolean
 */
function wl_wpcf7_load_css() {
    return FALSE;
}
add_filter('wpcf7_load_css', 'wl_wpcf7_load_css', 10);
