<?php get_header(); ?>

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
            <!-- Main content -->
            <div class="grid__col-sm-12 grid__col-md-8 grid__col-lg-8">
                <?php if (is_archive()): ?>
                    <div class="post__archive-header">
                        <?php the_archive_title(); ?>
                    </div>
                <?php endif; ?>

                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <article class="post">
                            <header class="post__header rm-p-bot rm-b-bot">
                                <h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <div class="post__meta">
                                    <?php the_author_posts_link(); ?>
                                    <span class="bullet">&bull;</span>
                                    <?php the_time('F d, Y'); ?>
                                    <span class="bullet">&bull;</span>
                                    <?php the_category(', '); ?>
                                </div>
                            </header>

                            <div class="post__body">
                                <?php if (has_post_thumbnail()): ?>
                                    <a class="post__thumb" href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumb'); ?>
                                    </a>
                                 <?php endif; ?>

                                <?php the_excerpt(); ?>

                                <a href="<?php the_permalink(); ?>" class="btn btn--primary">Read More</a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php _e('
                        <div class="error error-search">
                            <h1>Nothing found.</h1>
                            <p class="lead">Your search query returned no results. Please try again.</p>
                            <a class="btn btn--primary" href="/blog">&larr; Go back to posts</a>
                        </div>
                    '); ?>
                <?php endif; ?>

                <?php wl_partial('pagination'); ?>
            </div>

            <!-- Sidebar -->
            <div class="grid__col-sm-12 grid__col-md-4 grid__col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
