<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <?php if (get_field('services')): ?>
        <?php $services = get_field('services'); ?>
        <section class="section section--lg">
            <div class="container">
                <?php if (get_field('services_title')): ?>
                    <div class="grid">
                        <div class="grid__col-xs-12 grid__col-lg-12">
                            <header class="u--text-align-center">
                                <h2 class="u--margin-top-0"><?php the_field('services_title') ?></h2>
                            </header>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="grid">
                    <?php foreach ($services as $service): ?>
                        <div class="grid__col-xs-12 grid__col-md-4 grid__col-lg-4 u--text-align-center">
                            <?php if ($service['icon']): ?>
                                <a href="<?= $service['page_link'] ?>" class="home-service-icon">
                                    <i class="fa fa-<?= $service['icon'] ?>"></i>
                                </a>
                            <?php endif; ?>
                            <?php if ($service['title']): ?>
                                <h3><a href="<?= $service['page_link'] ?>"><?= $service['title'] ?></a></h3>
                            <?php endif; ?>
                            <?php if ($service['text']): ?>
                                <p><?= $service['text'] ?></p>
                            <?php endif; ?>
                            <?php if ($service['button_text']): ?>
                                <p><a href="<?= $service['page_link'] ?>" class="btn btn--primary"><?= $service['button_text'] ?></a></p>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (get_field('testimonials')): ?>
        <?php $testimonials = get_field('testimonials'); ?>
        <section class="section section--lg u--background-color-gray-lightest">
            <div class="container">
                <?php if (get_field('testimonials_title')): ?>
                    <div class="grid">
                        <div class="grid__col-xs-12 grid__col-md-12">
                            <header class="u--text-align-center">
                                <h2 class="u--margin-top-0"><?php the_field('testimonials_title'); ?></h2>
                            </header>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="grid grid--center">
                    <div class="grid__col-xs-12 grid__col-md-11">
                        <div data-carousel="single">
                            <?php foreach ($testimonials as $testimonial): ?>
                                <div class="home-testimonial u--text-align-center">
                                    <?php if ($testimonial['text']): ?>
                                        <p>&ldquo;<?= $testimonial['text']; ?>&rdquo;</p>
                                    <?php endif; ?>
                                    <?php if ($testimonial['name']): ?>
                                        <p><em>&mdash; <?= $testimonial['name']; ?><?= ($testimonial['company']) ? ', ' . $testimonial['company'] : '' ?></em></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php $my_query = new WP_Query('post_type=post&posts_per_page=3'); ?>
    <?php if ($my_query->have_posts()): ?>
        <section class="section section--lg">
            <header>
                <div class="container">
                    <div class="grid grid--middle">
                        <div class="grid__col-xs-12 grid__col-sm-8 grid__col-md-9">
                            <h2 class="u--margin-0">The latest news</h2>
                        </div>
                        <div class="grid__col-xs-12 grid__col-sm-4 grid__col-md-3 u--text-align-right">
                            <a href="<?= home_url('blog'); ?>" class="btn btn-default btn-sm">View all</a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="section u--padding-bottom-0">
                <div class="container">
                    <div class="grid">
                        <?php while ($my_query->have_posts()): $my_query->the_post(); ?>
                            <?php
                                $excerpt = get_the_excerpt();
                                $excerpt = substr($excerpt, 0, 100) . '...';
                            ?>
                            <div class="grid__col-xs-12 grid__col-md-4">
                                <?php if (has_post_thumbnail()): ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumb'); ?>
                                    </a>
                                 <?php endif; ?>
                                <h3 class="u--margin-bottom-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <p><small><?php the_time('F d, Y'); ?> in <?php the_category(', '); ?></small></p>
                                <p><?= $excerpt; ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn--primary">Read More &rarr;</a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; ?>

<?php get_footer(); ?>
