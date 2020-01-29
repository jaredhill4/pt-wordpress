<?php get_header(); ?>

<section class="section">
    <div class="container">
        <div class="grid grid--center">
            <!-- Main content -->
            <div class="grid__col-sm-12 grid__col-md-8">
                <form role="search" class="search-form" method="get" action="<?= home_url(); ?>">
                    <div class="form__field">
                        <div class="search-autosuggest" data-search-autosuggest-show-excerpt="true">
                            <input type="search" name="s" value="<?= (!empty($_REQUEST['s'])) ? $_REQUEST['s'] : '' ?>" class="search-autosuggest__input form__input form__input--lg" placeholder="Search" autocomplete="off" />
                            <div class="search-autosuggest__results"></div>
                            <div class="search-autosuggest__loading"></div>
                        </div>
                    </div>
                    <?php
                        global $wp_query;

                        $posts_per_page      = $wp_query->query_vars['posts_per_page'];
                        $paged               = $wp_query->query_vars['paged'];
                        $posts_found         = $wp_query->found_posts;
                        $posts_showing_first = 1;
                        $posts_showing_last  = ($posts_per_page < $posts_found) ? $posts_per_page : $posts_found;

                        if ($wp_query->query_vars['paged']) {
                            $posts_showing_first = $posts_per_page * $paged - $posts_per_page + 1;
                            $posts_showing_last  = $posts_per_page * $paged;

                            if ($posts_per_page * $paged > $posts_found) {
                                $posts_showing_last = $posts_found;
                            }
                        }
                    ?>
                    <small>Showing <?= $posts_showing_first ?>&ndash;<?= $posts_showing_last ?> of <?= $posts_found ?> result<?= ($posts_found > 1) ? 's' : '' ?>.</small>
                    <hr />
                </form>

                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <h3 class="h4">
                            <a href="<?php the_permalink(); ?>">
                                <?php relevanssi_the_title(); ?>
                            </a>
                        </h3>
                        <?php if (has_excerpt()): ?>
                            <?php relevanssi_the_excerpt(); ?>
                        <?php endif; ?>
                        <small class="text-muted"><?php the_permalink(); ?></small>
                        <hr />
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>&nbsp;</p>
                    <div class="u--text-align-center">
                    <h2 class="u--margin-0 u--border-width-0">Your search returned no results.</h2>
                    <p>Please try some other keywords, or click on the button below to</p>
                    <p><a href="<?= home_url(); ?>" class="btn btn--primary">Return to our Home Page</a></p>
                <?php endif; ?>

                <?php wl_partial('pagination'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
