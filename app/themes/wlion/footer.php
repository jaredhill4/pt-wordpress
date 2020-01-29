    </main>

    <footer class="site-footer">
        <div class="site-footer-top">
            <div class="container">
                <div class="grid">
                    <div class="grid__col-xs-12 grid__col-md-4 grid__col-lg-4">
                        <?php dynamic_sidebar('footer-column-1'); ?>
                    </div>
                    <div class="grid__col-xs-12 grid__col-md-2 grid__col-lg-2">
                        <?php dynamic_sidebar('footer-column-2'); ?>
                    </div>
                    <div class="grid__col-xs-12 grid__col-md-3 grid__col-lg-3">
                        <?php dynamic_sidebar('footer-column-3'); ?>
                    </div>
                    <div class="grid__col-xs-12 grid__col-md-3 grid__col-lg-3">
                        <?php dynamic_sidebar('footer-column-4'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-footer-bottom">
            <div class="container">
                <div class="grid">
                    <div class="grid__col-xs-12 grid__col-md-9 grid__col-lg-9 u--text-align-center u--text-align-left-md u--text-align-left-lg u--text-align-left-xl">
                        &copy; <?= date('Y'); ?> <em><?php the_field('company_name', 'option'); ?></em>. All rights reserved.
                        <nav class="site-links">
                            <?php nav_footer(); ?>
                        </nav>
                    </div>
                    <div class="grid__col-xs-12 grid__col-md-3 grid__col-lg-3 u--text-align-center u--text-align-right-md u--text-align-right-lg u--text-align-right-xl">
                        <a href="https://www.wlion.com" class="site-by" rel="nofollow">Site by White Lion</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="back-to-top">
        <a href="#top" class="btn btn--primary"><i class="fa fa-arrow-up"></i></a>
    </div>

    <!-- Include modals -->
    <?php wl_partial('modal-share'); ?>

    <!-- Include analytics -->
    <?php wl_partial('analytics'); ?>

    <!-- Modernizr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <?php wp_footer(); ?>

    <?php if (is_page('contact') and get_field('google_maps_api_key', 'option') and get_field('location', 'option')): ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?= get_field('google_maps_api_key', 'option'); ?>&callback=initMap" async defer></script>
    <?php endif; ?>
</body>
</html>
