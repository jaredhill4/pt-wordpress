<?php
/**
 * Partial: Page Header - Home
 * Description: The header for the home page.
 */

if (get_field('hero_image')): ?>
    <?php $hero_image = get_field('hero_image'); ?>
    <section class="hero hero--page" style="background-image: url('<?= $hero_image['sizes']['hero-page'] ?>');">
        <div class="hero__overlay">
            <div class="hero__content">
                <div class="container">
                    <div class="grid">
                        <div class="grid__col-xs-12 grid__col-md-10 grid__col-lg-6">
                            <h1><?php the_title(); ?></h1>
                            <?php if (get_field('hero_text')): ?>
                                <p class="p--lead"><?php the_field('hero_text'); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <header class="page-header">
        <div class="container">
            <div class="grid grid--middle">
                <div class="<?= (is_archive() or is_singular('post')) ? 'grid__col-xs-6' : 'grid__col-xs-12' ?>">
                    <h1 class="page-title">
                        <?php if (is_blog()): ?>
                            Blog
                        <?php elseif (is_search()): ?>
                            Search
                        <?php else: ?>
                            <?php the_title(); ?>
                        <?php endif; ?>
                    </h1>
                </div>
                <?php if (is_archive() or is_singular('post')): ?>
                    <div class="grid__col-xs-6 u--text-align-right">
                        <a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="btn btn--primary btn-sm">&larr; <span class="u--display-none u--display-inline-md">Back to</span><span class="u--display-inline u--display-none-md">All</span> Posts</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
<?php endif; ?>

