<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <section class="section">
        <div class="container">
            <div class="u--display-block u--hidden-md">
                <div class="grid">
                    <div class="grid__col-xs-12">
                        <?php get_search_form(); ?>
                        <hr />
                    </div>
                </div>
            </div>

            <div class="grid">
                <div class="grid__col-xs-12 grid__col-md-8">
                    <article class="post">
                        <header class="post__header">
                            <h2 class="post__title"><?php the_title(); ?></h2>
                            <div class="post__meta u--display-flex u--align-items-center u--justify-content-space-between">
                                <div>
                                    <?php the_author_posts_link(); ?>
                                    <span class="bullet">&bull;</span>
                                    <?php the_time('F d, Y'); ?>
                                    <span class="bullet">&bull;</span>
                                    <?php the_category(', '); ?>
                                </div>
                                <a href="#modal-share" class="btn" data-modal-show="modal-share"><span class="fa fa-share-alt"></span> Share</a>
                            </div>
                        </header>

                        <div class="post__body">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="post__thumb">
                                    <?php the_post_thumbnail('post-thumb-detail'); ?>
                                </div>
                            <?php endif; ?>
                            <?php the_content(); ?>
                        </div>

                        <div class="post__tags">
                            <?php the_tags('Tags: ', '', ''); ?>
                        </div>
                    </article>

                    <?php
                        $prev_post = get_adjacent_post(FALSE, '', TRUE);
                        $next_post = get_adjacent_post(FALSE, '', FALSE);
                    ?>

                    <?php if (is_a($prev_post, 'WP_Post') or is_a($next_post, 'WP_Post')): ?>
                        <nav class="post__nav">
                            <div class="grid grid-valign-center grid--between">
                                <div class="grid__col-xs-6 grid__col-md-4">
                                    <?php if (is_a($prev_post, 'WP_Post')): ?>
                                        <a href="<?= get_permalink($prev_post->ID); ?>" class="btn btn--block btn--primary"><span class="fa fa-angle-left"></span>&nbsp;&nbsp;Prev<span class="u--display-none u--display-inline-sm">ious Story</span></a>
                                    <?php endif; ?>
                                </div>
                                <div class="grid__col-xs-6 grid__col-md-4 u--text-align-right">
                                    <?php if (is_a($next_post, 'WP_Post')): ?>
                                        <a href="<?= get_permalink($next_post->ID); ?>" class="btn btn--block btn--primary">Next<span class="u--display-none u--display-inline-sm"> Story</span>&nbsp;&nbsp;<span class="fa fa-angle-right"></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </nav>
                    <?php endif; ?>
                    <h3>Comments</h3>
                    <?php comments_template(); ?>
                </div>

                <div class="grid__col-xs-12 grid__col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
