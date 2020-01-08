<?php
/**
 * Template Name: Page - Contact
 */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <section class="section">
        <div class="container">
            <div class="grid">
                <!-- Main Content -->
                <div class="grid__col-xs-12 grid__col-md-8 grid__col-lg-8">
                    <?php if (get_field('location', 'option')): ?>
                        <?php $location = get_field('location', 'option'); ?>
                        <script>
                            window.initMarkerLocation = {
                                lat: <?= $location['lat'] ?>,
                                lng: <?= $location['lng'] ?>
                            };
                        </script>
                        <div id="map" class="map"></div>
                    <?php endif; ?>
                    <hr />
                    <?php the_content(); ?>
                </div>

                <!-- Sidebar -->
                <div class="sidebar grid__col-xs-12 grid__col-md-4 grid__col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
