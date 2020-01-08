<?php
/**
 * Template Name: Sample Email
 */

if (!current_user_can('editor') and !current_user_can('administrator')) {
    wp_redirect(wp_login_url(get_the_permalink()), 302);
}
?>

<?php get_template_part('partials/email/email', 'header'); ?>

<h2>This is a heading</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus hendrerit libero in lectus lobortis varius. Nunc non sollicitudin est. In consectetur eros non nulla molestie molestie.</p>
<p>Proin vitae ex eu ex elementum viverra. Duis a massa id orci dapibus tincidunt iaculis non tellus. Curabitur dictum lectus finibus imperdiet fermentum. Duis mattis sodales iaculis.</p>
<p>Suspendisse rhoncus neque eu dolor auctor, sed blandit leo gravida. Duis congue tortor non massa fringilla accumsan. Proin maximus enim et velit aliquam facilisis.</p>
<p>Proin tortor nunc, feugiat et odio sit amet, elementum efficitur elit. Maecenas vitae rutrum turpis. Nullam interdum sem non enim placerat lacinia. Praesent quis mattis sem, ac congue sapien.</p>

<?php get_template_part('partials/email/email', 'footer'); ?>
