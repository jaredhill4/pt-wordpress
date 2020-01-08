<?php
/**
 * Title: Email
 * Description: Functions associated with WordPress email filters, actions and templates.
 * Documentation:
 * -- https://codex.wordpress.org/Plugin_API/Action_Reference/phpmailer_init
 * -- https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_mail_from
 * -- https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_mail_from_name
 * -- https://codex.wordpress.org/Plugin_API/Filter_Reference/wp_mail_content_type
 */

/**
 * Set the mail from email address.
 *
 * @param  string $original_email_address
 * @return string
 */
function wl_set_mail_from($original_email_address)
{
    $email_from_email = $original_email_address;

    if (get_field('email_from_email', 'option')) {
        $email_from_email = get_field('email_from_email', 'option');
    }

    return $email_from_email;
}
add_filter('wp_mail_from', 'wl_set_mail_from');

/**
 * Set the mail from name.
 *
 * @param  string $original_email_from
 * @return string
 */
function wl_set_mail_from_name($original_email_from)
{
    $email_from_name = $original_email_from;

    if (get_field('email_from_name', 'option')) {
        $email_from_name = get_field('email_from_name', 'option');
    }

    return $email_from_name;
}
add_filter('wp_mail_from_name', 'wl_set_mail_from_name');

/**
 * Set the mail content type to "html."
 *
 * @param  string $content_type
 * @return string
 */
function wl_set_mail_content_type($content_type)
{
    return 'text/html';
}
add_filter('wp_mail_content_type', 'wl_set_mail_content_type');

/**
 * Add our header and footer email templates the PHP Mailer object.
 * This applies the email template to emails sent from the
 * WordPress and the Contact Form 7 plugin.
 *
 * @param  object $phpmailer
 * @return object
 */
function wl_phpmailer_init($phpmailer)
{
    global $current_user;

    // Apply our email template to the mailer body
    $phpmailer->Body = wl_apply_email_template($phpmailer->Body);

    // Establish variables available for use in email
    $data = array(
        'site_name'          => get_option('blogname'),
        'login_link'         => wp_login_url(),
        'user_name'          => $current_user->display_name,
        'user_email'         => $current_user->user_email,
        'subject'            => $phpmailer->Subject,
        'company_name'       => get_field('company_name'),
        'company_short_name' => get_field('company_short_name'),
        'phone_number'       => get_field('phone_number'),
        'email'              => get_field('email'),
        'address_line_1'     => get_field('address_line_1'),
        'address_line_2'     => get_field('address_line_2'),
        'city'               => get_field('city'),
        'state'              => get_field('state'),
        'zip_code'           => get_field('zip_code'),
        'site_url'           => home_url()
    );

    // Replace variable in email
    foreach ($data as $key => $value) {
        $phpmailer->Body = str_replace('!!' . $key . '!!', $value, $phpmailer->Body);
    }

    return $phpmailer;
}
add_action('phpmailer_init', 'wl_phpmailer_init', 10);

/**
 * Apply the email template (header and footer) to a given string.
 *
 * @param  string $html
 * @return string
 */
function wl_apply_email_template($html)
{
    $message  = wl_get_email_header() . PHP_EOL;
    $message .= $html;
    $message .= wl_get_email_footer() . PHP_EOL;
    return $message;
}

/**
 * Get the email header template.
 *
 * @return string
 */
function wl_get_email_header()
{
    ob_start();
    include(get_template_directory() . '/partials/email/email-header.php');
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

/**
 * Get the email footer template.
 *
 * @return string
 */
function wl_get_email_footer()
{
    ob_start();
    include(get_template_directory() . '/partials/email/email-footer.php');
    $html = ob_get_contents();
    ob_end_clean();
    return $html;
}

/**
 * Get the email template options.
 *
 * @return array
 */
function wl_get_email_options()
{
    $options = [
        'logo'                    => get_field('email_logo', 'option'),
        'company_name'            => get_field('company_name', 'option'),
        'font_family'             => get_field('email_font_family', 'option'),
        'font_size'               => get_field('email_font_size', 'option') . 'px',
        'line_height'             => '1.7',
        'heading_color'           => get_field('email_heading_color', 'option'),
        'text_color'              => get_field('email_text_color', 'option'),
        'link_color'              => get_field('email_link_color', 'option'),
        'background_color'        => get_field('email_background_color', 'option'),
        'header_background_color' => get_field('email_header_background_color', 'option'),
        'header_text_color'       => get_field('email_header_text_color', 'option'),
        'body_background_color'   => get_field('email_body_background_color', 'option')
    ];
    return $options;
}
