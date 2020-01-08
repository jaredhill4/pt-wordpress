<?php
/**
 * Title: Sidebar
 * Description: This is the sidebar for the blog and blog posts.
 * Documentation: http://codex.wordpress.org/Function_Reference/dynamic_sidebar
 */


if (is_blog()): ?>
    <div class="u--display-none u--display-block-md">
        <?php get_search_form(); ?>
    </div>

    <?php dynamic_sidebar('sidebar-blog'); ?>
<?php else: ?>
    <?php dynamic_sidebar('sidebar-page'); ?>
<?php endif; ?>

