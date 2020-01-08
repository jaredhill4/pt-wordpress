<?php
/**
 * Template Name: Default - Full Width
 */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <section class="section">
        <div class="container">
            <div class="grid">
                <!-- Main content -->
                <div class="grid__col-xs-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
