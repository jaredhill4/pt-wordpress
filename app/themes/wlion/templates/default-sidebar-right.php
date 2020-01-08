<?php
/**
 * Template Name: Default - Right Sidebar
 */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <section class="section">
        <div class="container">
            <div class="grid">
                <!-- Main content -->
                <div class="grid__col-xs-12 grid__col-md-8 grid__col-lg-8">
                    <?php the_content(); ?>
                </div>

                <!-- Sidebar -->
                <div class="grid__col-xs-12 grid__col-md-4 grid__col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
