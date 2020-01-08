<?php
/**
 * Template Name: Page - Site Map
 */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <section class="section">
        <div class="grid grid--center">
            <!-- Main content -->
            <div class="grid__col-xs-12 grid__col-md-8">
                <?php if (get_the_content()): ?>
                    <?php the_content(); ?>
                <?php endif; ?>

                <ul class="sitemap">
                    <?php
                        $exclude_pages = '';

                        if (get_field('sitemap_exclude_pages')) {
                            foreach (get_field('sitemap_exclude_pages') as $k => $page) {
                                $exclude_pages .= $page . ',';
                            }
                            $exclude_pages = rtrim($exclude_pages, ',');
                        }
                        $args = [
                            'title_li'    => '',
                            'exclude'     => $exclude_pages,
                            'sort_column' => 'menu_order'
                        ];
                        wp_list_pages($args);
                    ?>
                </ul>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
