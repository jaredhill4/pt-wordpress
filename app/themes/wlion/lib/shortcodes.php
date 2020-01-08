<?php
/**
 * Title: Shortcodes
 * Description: Create wlion theme shortcodes.
 * Documentation: http://codex.wordpress.org/Shortcode_API
 */

// Remove unwanted <br /> and <p> tags from shortcodes
// to prevent unwanted breaks/clearing in nested shortcodes.
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop', 12);
remove_filter('acf_the_content', 'wpautop');
add_filter('acf_the_content', 'wpautop', 12);

/**
 * Enable [icon] shortcode.
 * Allow site admin to add icons from from Font Awesome.
 * Visit http://fortawesome.github.io/Font-Awesome/ for more info.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_icon($atts, $content = NULL)
{
    $a = shortcode_atts(array(
        'class' => '' // Accepted values: see http://fortawesome.github.io/Font-Awesome/
    ), $atts);

    return '<i class="fa ' . esc_attr($a['class']) . '"></i>';
}
add_shortcode('icon', 'shortcode_icon');

/**
 * Enable [tooltip] shortcode.
 * Allow site admin to add tooltips to strings of content on posts and pages.
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_tooltip($atts, $content = NULL)
{
    $a = shortcode_atts(array(
        'text'     => '',      // Accepted values: an alphanumeric string
        'width'    => '210',   // Accepted values: numerals only
        'corners'  => '',      // Accepted values: default, radius
        'position' => 'bottom' // Accepted values: default, top, right, bottom, left
    ), $atts);

    $tooltip_text     = addslashes(esc_attr($a['text']));
    $tooltip_position = strtolower(esc_attr($a['position']));

    if ($tooltip_position == 'default') {
        $tooltip_position = 'top';
    }

    return '<span data-tooltip="' . $tooltip_position . '" title="' . $tooltip_text . '">' . do_shortcode($content) . '</span>';
}
add_shortcode('tooltip', 'shortcode_tooltip');

/**
 * Enable [grid] shortcode.
 * Allow site admin to add a grid of content to posts and pages.
 * NOTE: Use [grid] to wrap [columns] to clear column floats
 *
 * @param  string $content
 * @return string
 */
function shortcode_grid($atts, $content = NULL)
{
    return '<div class="grid">' . do_shortcode($content) . '</div>';
}
add_shortcode('grid', 'shortcode_grid');

/**
 * Enable [columns] shortcode.
 * Allow site admin to add columnated content to posts and pages.
 * NOTE: [columns] must be wrapped in [grid] shortcode to clear column floats
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_columns($atts, $content = NULL)
{
    $a = shortcode_atts(array(
        'number' => '12', // Accepted values: Integers 1 through 12
    ), $atts);

    $columns_number = esc_attr($a['number']);

    return '<div class="grid__col-md-' . $columns_number . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('columns', 'shortcode_columns');

// Accordion variables
$accordions_count = 0;

/**
 * Enable [accordion] shortcode.
 * Allow site admin to add accordions to posts and pages.
 * NOTE: Use [accordion] to wrap [accordion-panel] groups.
 *
 * @param  string $content
 * @return string
 */
function shortcode_accordion($atts, $content = NULL)
{
    global $accordions_count;

    $output = '<dl class="accordion" data-toggle-group="accordion-group-' . $accordions_count . '" role="tablist">' . do_shortcode($content) . '</dl>';

    $accordions_count++;

    return $output;
}
add_shortcode('accordion', 'shortcode_accordion');

/**
 * Enable [accordion-panel] shortcode.
 * Allow site admin to add accordions to posts and pages.
 * NOTE: [accordion-panel] must be used within [accordion].
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function shortcode_accordion_panel($atts, $content = NULL)
{
    global $accordions_count;

    $a = shortcode_atts(array(
        'id'     => '', // Accepted values: An alphanumeric string
        'title'  => '', // Accepted values: An alphanumeric string
        'active' => ''  // Accepted values: true, false
    ), $atts);

    $accordion_id     = strtolower(esc_attr($a['id']));
    $accordion_title  = addslashes(esc_attr($a['title']));
    $accordion_active = addslashes(esc_attr($a['active']));

    if ($accordion_active == 'true') {
        $accordion_active = 'in';
    } else {
        $accordion_active = '';
    }

    if(empty($accordion_id)) {
        $accordion_id = $accordion_title . '-' . rand(100000, 999999);
    }

    $accordion_id = strtolower($accordion_id);
    $accordion_id = preg_replace("/[^a-z0-9_\s-]/", "", $accordion_id);
    $accordion_id = preg_replace("/[\s-]+/", " ", $accordion_id);
    $accordion_id = preg_replace("/[\s_]/", "-", $accordion_id);

    $output = '<dt class="accordion__header" data-toggle-switch="' . $accordion_id .'" data-toggle-parent="accordion-group-' . $accordions_count . '" role="tab">';
    $output .= '<h5 class="u--margin-0">' . $accordion_title .'</h5>';
    $output .= '</dt>';
    $output .= '<dd class="toggle__target" data-toggle-target="' . $accordion_id .'" data-toggle-parent="accordion-group-' . $accordions_count . '" role="tabpanel">';
    $output .= '<div class="accordion__content">';
    $output .= do_shortcode($content);
    $output .= '</div>';
    $output .= '</dd>';

    return $output;
}
add_shortcode('accordion-panel', 'shortcode_accordion_panel');

// Tab variables
$tabs_count  = 0;
$tabs_panels = '';

/**
 * Enable [tabs] shortcode.
 * Allow site admin to add tabs to posts and pages.
 * NOTE: Use [tabs] to wrap [tab] groups.
 *
 * @param  string $content
 * @return string
 */
function tabs($atts, $content = NULL)
{
    global $tabs_count;
    global $tabs_panels;

    $tabs_panels = '';

    $output  = '<div class="tabs" data-toggle-group="tabs-group-' . $tabs_count . '" data-toggle-group-require-active>';
    $output .= '<nav class="tabs__nav">';
    $output .= '<ul role="tablist">';
    $output .= '' . do_shortcode($content) . '</ul>';
    $output .= '</nav>';
    $output .= '<div class="tabs__content">' . $tabs_panels . '</div>';
    $output .= '</div>';

    $tabs_count++;

    return $output;
}

/**
 * Enable [tab] shortcode.
 * Allow site admin to add tabs to posts and pages.
 * NOTE: [tab] must be used within [tabs].
 *
 * @param  array  $atts
 * @param  string $content
 * @return string
 */
function tab($atts, $content = NULL)
{
    global $tabs_count;
    global $tabs_panels;

    $a = shortcode_atts(array(
        'id'     => '',  // Accepted values: an alphanumeric string
        'title'  => '',  // Accepted values: an alphanumeric string
        'active' => 'no' // Accepted values: yes, no
    ), $atts);

    $tab_id     = strtolower(esc_attr($a['id']));
    $tab_title  = addslashes(esc_attr($a['title']));
    $tab_active = strtolower(esc_attr($a['active']));

    if ($tab_active == 'yes') {
        $tab_nav_active   = 'toggle__switch--on';
        $tab_panel_active = 'toggle__target--visible';
    } else {
        $tab_nav_active   = '';
        $tab_panel_active = '';
    }

    if(empty($tab_id)) {
        $tab_id = $tab_title . '-' . rand(100000, 999999);
    }

    $tab_id = strtolower($tab_id);
    $tab_id = preg_replace("/[^a-z0-9_\s-]/", "", $tab_id);
    $tab_id = preg_replace("/[\s-]+/", " ", $tab_id);
    $tab_id = preg_replace("/[\s_]/", "-", $tab_id);

    $output = '
        <li>
            <button class="' . $tab_nav_active . '" data-toggle-switch="' . $tab_id .'" data-toggle-parent="tabs-group-' . $tabs_count .'" data-toggle-target-transition="fade" role="tab">' . $tab_title . '</a>
        </li>
    ';

    $tabs_panels .= '<div class="toggle__target ' . $tab_panel_active . '" id="' . $tab_id . '" data-toggle-target="' . $tab_id . '" data-toggle-target-transition="fade" role="tabpanel">' . $content . '</div>';

    return $output;
}
add_shortcode('tabs', 'tabs');
add_shortcode('tab', 'tab');

/**
 * Customize the output for Wordpress's default [gallery] shortcode.
 *
 * @param  array  $attr
 * @param  string $output
 * @return string
 */
function my_post_gallery($output, $attr)
{
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);

        if (!$attr['orderby']) {
            unset($attr['orderby']);
        }
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => '',
        'format'     => 'grid'
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) {
        $orderby = 'none';
    }

    if (!empty($include)) {
        $include      = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
        $attachments  = array();

        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) {
        return '';
    }

    // Set gallery output based on format attr
    if ($attr['format'] == 'grid') {
        $gallery_rel = 'gallery_' . rand(100000, 999999);
        $output      = '<div class="gallery grid">' . PHP_EOL;

        // Loop through each attachment
        foreach ($attachments as $id => $attachment) {
            $img     = wp_get_attachment_image_src($id, 'post-thumb-detail');
            $link    = wp_get_attachment_image_src($id, 'large');
            $output .= '<div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-4">' . PHP_EOL;
            $output .= '<div class="gallery__item">' . PHP_EOL;
            $output .= '<a href="' . $link[0] . '" class="fancybox" rel="' . $gallery_rel . '"><img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" /></a>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }

        $output .= '</div>';

    } elseif ($attr['format'] == 'slideshow') {
        $output = '<div class="gallery gallery--slideshow" data-carousel="single">' . PHP_EOL;

        // Loop through each attachment
        foreach ($attachments as $id => $attachment) {
            $img     = wp_get_attachment_image_src($id, 'post-thumb-detail');
            $link    = wp_get_attachment_image_src($id, 'large');
            $output .= '<div class="gallery__item">' . PHP_EOL;
            $output .= '<img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" />' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }

        $output .= '</div>' . PHP_EOL;

    } elseif ($attr['format'] == 'carousel') {
        $gallery_rel = 'gallery_' . rand(100000, 999999);
        $output      = '<div class="gallery gallery--carousel" data-carousel="multiple">' . PHP_EOL;

        // Loop through each attachment
        foreach ($attachments as $id => $attachment) {
            $img     = wp_get_attachment_image_src($id, 'post-thumb-detail');
            $link    = wp_get_attachment_image_src($id, 'large');
            $output .= '<div class="gallery__item">' . PHP_EOL;
            $output .= '<a href="' . $link[0] . '" class="fancybox" rel="' . $gallery_rel . '"><img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" /></a>' . PHP_EOL;
            $output .= '</div>' . PHP_EOL;
        }

        $output .= '</div>' . PHP_EOL;
    }

    return $output;
}
add_filter('post_gallery', 'my_post_gallery', 10, 2);

/**
 * Returns the HTML for the shortcode reference widget
 * to display on the dashboard.
 *
 * @return string
 */
function wl_dashboard_widget_shortcodes_function()
{
    get_template_part('partials/admin/shortcode-dashboard-widget');
}

/**
 * Adds shortcode reference widget to the dashboard.
 *
 * @return void
 */
function wl_dashboard_widget_shortcodes()
{
    wp_add_dashboard_widget(
        'wl_dashboard_widget_shortcodes',         // widget slug
        'Shortcode Quick Reference',              // widget titled
        'wl_dashboard_widget_shortcodes_function' // display function
    );
}
add_action('wp_dashboard_setup', 'wl_dashboard_widget_shortcodes');
