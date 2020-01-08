<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package White Lion
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>

<section class="section section--lg u--text-align-center">
    <div class="container">
        <h1 class="h6 u--margin-top-0">404 ERROR</h1>
        <h2 class="h1">PAGE NOT FOUND</h2>
        <p class="p--lead">Sorry! We could not find the page you are looking for.</p>
        <a class="btn btn--primary" href="<?= home_url(); ?>">Click here to visit our home page</a>
    </div>
</section>

<?php get_footer(); ?>

