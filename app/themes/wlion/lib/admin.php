<?php
/**
 * Title: Admin Functions
 * Description: These are the functions that are used to customize the admin interface.
 * Documentation:
 * -- http://codex.wordpress.org/Creating_Admin_Themes
 * -- http://codex.wordpress.org/Dashboard_Widgets_API
 * -- https://codex.wordpress.org/TinyMCE_Custom_Buttons
 */

/**
 * Customize the login logo url.
 *
 * @return string
 */
function customize_login_logo_url($url) {
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'customize_login_logo_url');

/**
 * Insert 'styleselect' into the $buttons array.
 *
 * @param  array $buttons
 * @return array
 */
function wl_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');

    return $buttons;
}
add_filter('mce_buttons_2', 'wl_mce_buttons_2');

/**
 * Apply custom Tiny MCE style buttons and settings.
 *
 * @param  array  $init_array
 * @return string
 */
function wl_tiny_mce_before_init($init_array)
{
    $style_formats = array(
        array(
            'title' => 'Text Format',
            'items' => array(
                array(
                    'title'   => 'Bold',
                    'inline'  => 'strong',
                    'exact'   => FALSE,
                    'wrapper' => FALSE,
                    'icon'    => 'bold'
                ),
                array(
                    'title'   => 'Italic',
                    'inline'  => 'em',
                    'exact'   => FALSE,
                    'wrapper' => FALSE,
                    'icon'    => 'italic'
                ),
                array(
                    'title'   => 'Underline',
                    'inline'  => 'u',
                    'exact'   => FALSE,
                    'wrapper' => FALSE,
                    'icon'    => 'underline'
                ),
                array(
                    'title'   => 'Strikethrough',
                    'inline'  => 'del',
                    'exact'   => FALSE,
                    'wrapper' => FALSE,
                    'icon'    => 'strikethrough'
                ),
                array(
                    'title'   => 'Superscript',
                    'inline'  => 'sup',
                    'exact'   => FALSE,
                    'wrapper' => FALSE,
                    'icon'    => 'superscript'
                ),
                array(
                    'title'   => 'Subscript',
                    'inline'  => 'sub',
                    'exact'   => FALSE,
                    'wrapper' => FALSE,
                    'icon'    => 'subscript'
                ),
                array(
                    'title'   => 'Code',
                    'inline'  => 'code',
                    'exact'   => TRUE,
                    'classes' => 'prettyprint',
                    'wrapper' => FALSE,
                    'icon'    => 'code'
                ),
                array(
                    'title'   => 'Preformatted',
                    'block'   => 'pre',
                    'classes' => 'prettyprint',
                    'exact'   => TRUE,
                    'wrapper' => TRUE
                ),
                array(
                    'title'   => 'Highlight',
                    'inline'  => 'mark',
                    'exact'   => TRUE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Small',
                    'inline'  => 'small',
                    'exact'   => TRUE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Address',
                    'block'  => 'address',
                    'exact'   => TRUE,
                    'wrapper' => TRUE
                ),
                array(
                    'title'   => 'Lead',
                    'block'   => 'p',
                    'classes' => 'p--lead',
                    'exact'   => TRUE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Citation',
                    'inline'  => 'cite',
                    'exact'   => TRUE,
                    'wrapper' => FALSE
                )
            )
        ),
        array(
            'title' => 'Buttons',
            'items' => array(
                array(
                    'title'   => 'Default',
                    'inline'  => 'a',
                    'classes' => 'btn btn--default',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'White',
                    'inline'  => 'a',
                    'classes' => 'btn btn--white',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Black',
                    'inline'  => 'a',
                    'classes' => 'btn btn--black',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Blue',
                    'inline'  => 'a',
                    'classes' => 'btn btn--blue',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Green',
                    'inline'  => 'a',
                    'classes' => 'btn btn--green',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Yellow',
                    'inline'  => 'a',
                    'classes' => 'btn btn--yellow',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Red',
                    'inline'  => 'a',
                    'classes' => 'btn btn--red',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Link',
                    'inline'  => 'a',
                    'classes' => 'btn btn--link',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'    => 'Small',
                    'inline'   => 'a',
                    'selector' => '.btn',
                    'classes'  => 'btn--sm',
                    'exact'    => FALSE,
                    'wrapper'  => FALSE
                ),
                array(
                    'title'    => 'Large',
                    'inline'   => 'a',
                    'selector' => '.btn',
                    'classes'  => 'btn--lg',
                    'exact'    => FALSE,
                    'wrapper'  => FALSE
                ),
                array(
                    'title'    => 'Outline',
                    'inline'   => 'a',
                    'selector' => '.btn',
                    'classes'  => 'btn--outline',
                    'exact'    => FALSE,
                    'wrapper'  => FALSE
                ),
                array(
                    'title'    => 'Round',
                    'inline'   => 'a',
                    'selector' => '.btn',
                    'classes'  => 'btn--round',
                    'exact'    => FALSE,
                    'wrapper'  => FALSE
                )
            )
        ),
        array(
            'title' => 'Notices',
            'items' => array(
                array(
                    'title'      => 'Green',
                    'block'      => 'div',
                    'classes'    => 'notice notice--green',
                    'exact'      => TRUE,
                    'wrapper'    => TRUE,
                    'attributes' => array(
                        'role' => 'alert'
                    )
                ),
                array(
                    'title'      => 'Yellow',
                    'block'      => 'div',
                    'classes'    => 'notice notice--yellow',
                    'exact'      => TRUE,
                    'wrapper'    => TRUE,
                    'attributes' => array(
                        'role' => 'alert'
                    )
                ),
                array(
                    'title'      => 'Red',
                    'block'      => 'div',
                    'classes'    => 'notice notice--red',
                    'exact'      => TRUE,
                    'wrapper'    => TRUE,
                    'attributes' => array(
                        'role' => 'alert'
                    )
                ),
            )
        ),
        array(
            'title' => 'Text Transform',
            'items' => array(
                array(
                    'title'   => 'Lowercase',
                    'inline'  => 'span',
                    'classes' => 'u--text-transform-lowercase',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Uppercase',
                    'inline'  => 'span',
                    'classes' => 'u--text-transform-uppercase',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Capitalize',
                    'inline'  => 'span',
                    'classes' => 'u--text-transform-capitalize',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                )
            )
        ),
        array(
            'title' => 'Text Color',
            'items' => array(
                array(
                    'title'   => 'Blue',
                    'inline'  => 'span',
                    'classes' => 'u--color-blue',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Green',
                    'inline'  => 'span',
                    'classes' => 'u--color-green',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Yellow',
                    'inline'  => 'span',
                    'classes' => 'u--color-yellow',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Red',
                    'inline'  => 'span',
                    'classes' => 'u--color-red',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'White',
                    'inline'  => 'span',
                    'classes' => 'u--color-white',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Gray - Darkest',
                    'inline'  => 'span',
                    'classes' => 'u--color-gray-darkest',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Gray - Darker',
                    'inline'  => 'span',
                    'classes' => 'u--color-gray-darker',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Gray - Dark',
                    'inline'  => 'span',
                    'classes' => 'u--color-gray-dark',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Gray',
                    'inline'  => 'span',
                    'classes' => 'u--color-gray',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Gray - Light',
                    'inline'  => 'span',
                    'classes' => 'u--color-gray-light',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Gray - Lighter',
                    'inline'  => 'span',
                    'classes' => 'u--color-gray-lighter',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
                array(
                    'title'   => 'Gray - Lighter',
                    'inline'  => 'span',
                    'classes' => 'u--color-gray-lightest',
                    'exact'   => FALSE,
                    'wrapper' => FALSE
                ),
            )
        ),
    );
    $init_array['style_formats'] = json_encode($style_formats);

    return $init_array;
}
add_filter('tiny_mce_before_init', 'wl_tiny_mce_before_init');
