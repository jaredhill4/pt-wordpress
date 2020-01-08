<?php
/**
 * Plugin Name: White Lion: Custom WordPress System Emails
 * Plugin URI: https://www.wlion.com/
 * Description: Customize the content for the various system emails sent from WordPress.
 * Version: 1.0.0
 * Author: White Lion
 * Author URI: https://www.wlion.com/
 * Copyright: White Lion
 */

/**
 * Email login credentials to a newly-registered user.
 *
 * A new user registration notification is also sent to admin email.
 *
 * @param  integer $user_id
 * @param  string  $deprecated
 * @param  string  $notify
 * @return void
 */
if (!function_exists('wp_new_user_notification')) {
    function wp_new_user_notification($user_id, $deprecated = null, $notify = '')
    {
        if ($deprecated !== null) {
            _deprecated_argument(__FUNCTION__, '4.3.1');
        }

        global $wpdb, $wp_hasher;
        $user = get_userdata($user_id);

        // The blogname option is escaped with esc_html on the way into the database in sanitize_option
        // we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

        if ('user' !== $notify) {
            $switched_locale = switch_to_locale(get_locale());
            $message  = '<p>' . sprintf(__('New user registration on your site %s:'), $blogname) . '</p>' . PHP_EOL;
            $message .= '<p>' . sprintf(__('Username: %s'), $user->user_login) . '</p>' . PHP_EOL;
            $message .= '<p>Email: <a href="mailto:' . $user->user_email . '">' . $user->user_email . '</a></p>' . PHP_EOL;

            @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);

            if ($switched_locale) {
                restore_previous_locale();
            }
        }

        // `$deprecated was pre-4.3 `$plaintext_pass`. An empty `$plaintext_pass` didn't sent a user notification.
        if ('admin' === $notify || (empty($deprecated) && empty($notify))) {
            return;
        }

        // Generate something random for a password reset key.
        $key = wp_generate_password(20, false);

        /** This action is documented in wp-login.php */
        do_action('retrieve_password_key', $user->user_login, $key);

        // Now insert the key, hashed, into the DB.
        if (empty($wp_hasher)) {
            require_once ABSPATH . WPINC . '/class-phpass.php';
            $wp_hasher = new PasswordHash(8, true);
        }
        $hashed = time() . ':' . $wp_hasher->HashPassword($key);
        $wpdb->update($wpdb->users, array('user_activation_key' => $hashed), array('user_login' => $user->user_login));

        $switched_locale = switch_to_locale(get_user_locale($user));

        $message  = '<p>' . sprintf(__('Username: %s'), $user->user_login) . '</p>' . PHP_EOL;
        $message .= '<p>' . __('To set your password, visit the following address:') . '<br />' . PHP_EOL;
        $message .= '<a href="' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') . '">' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user->user_login), 'login') . '</a></p>' . PHP_EOL;
        $message .= '<p>Or login at <a href="' . wp_login_url() .'">' . wp_login_url() . '</a></p>' . PHP_EOL;

        wp_mail($user->user_email, sprintf(__('[%s] Your username and password info'), $blogname), $message);

        if ($switched_locale) {
            restore_previous_locale();
        }
    }
}

/**
 * Notify the blog admin of a user changing password, normally via email.
 *
 * @param  object $user
 * @return void
 */
if (!function_exists('wp_password_change_notification')) {
    function wp_password_change_notification($user)
    {
        // send a copy of password change notification to the admin
        // but check to see if it's the admin whose password we're changing, and skip this
        if (0 !== strcasecmp($user->user_email, get_option('admin_email'))) {
            /* translators: %s: user name */
            $message = '<p>' . sprintf(__('Password changed for user: %s'), $user->user_login) . '</p>' . PHP_EOL;
            // The blogname option is escaped with esc_html on the way into the database in sanitize_option
            // we want to reverse this for the plain text arena of emails.
            $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
            /* translators: %s: site title */
            wp_mail(get_option('admin_email'), sprintf(__('[%s] Password Changed'), $blogname), $message);
        }
    }
}

/**
 * Customize the user password change email text.
 *
 * @param  array  $pass_change_email
 * @param  object $user
 * @param  object $userdata
 * @return array
 */
function wl_password_change_email($pass_change_email, $user, $userdata)
{
    $pass_change_email['message']  = '<p>Hi ' . $user['display_name'] . ',</p>' . PHP_EOL;
    $pass_change_email['message'] .= '<p>This notice confirms that your password was changed on ###SITENAME###.</p>' . PHP_EOL;
    $pass_change_email['message'] .= '<p>If you did not change your password, please contact the Site Administrator at <a href="mailto:###ADMIN_EMAIL###">###ADMIN_EMAIL###</a>.</p>' . PHP_EOL;
    $pass_change_email['message'] .= '<p>This email has been sent to <a href="mailto:###EMAIL###">###EMAIL###</a>.</p>' . PHP_EOL;
    $pass_change_email['message'] .= '<p>Regards,<br />' . PHP_EOL;
    $pass_change_email['message'] .= '###SITENAME###<br />' . PHP_EOL;
    $pass_change_email['message'] .= '<a href="###SITEURL###">###SITEURL###</a></p>' . PHP_EOL;

    return $pass_change_email;
}
add_filter('password_change_email', 'wl_password_change_email', 10, 3);

/**
 * Customize the retrieve password email text.
 *
 * @param  string $message
 * @param  string $key
 * @param  string $user_login
 * @param  object $user_data
 * @return string
 */
function wl_retrieve_password_message($message, $key, $user_login, $user_data)
{
    $message  = '<p>' . __('Someone has requested a password reset for the following account:') . '</p>' . PHP_EOL;
    $message .= '<p><a href="' . network_home_url('/') . '">' . network_home_url('/') . '</a></p>' . PHP_EOL;
    $message .= '<p>' . sprintf(__('Username: %s'), $user_login) . '</p>' . PHP_EOL;
    $message .= '<p>' . __('If this was a mistake, just ignore this email and nothing will happen.') . '</p>' . PHP_EOL;
    $message .= '<p>' . __('To reset your password, visit the following address:') . '</p>' . PHP_EOL;
    $message .= '<p><a href="' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . '">' . network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login') . '</a></p>' . PHP_EOL;

    return $message;
}
add_filter('retrieve_password_message', 'wl_retrieve_password_message', 10, 4);
