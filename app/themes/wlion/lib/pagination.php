<?php
 /**
  * Title: Pagination
  * Description: Pagination that appears at the bottom of the default blog, archive, category and search pages.
  * Documentation: http://codex.wordpress.org/Function_Reference/paginate_links
  */

/**
 * Setup the pagintion template
 *
 * @param  string $pages
 * @param  int    $range
 * @return void
 */
function wl_pagination($pages = '', $range = 1)
{
    $showitems = ($range * 2) + 1;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if ($pages != 1) {
        echo '<ul class="pagination">';

        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
            echo '<li class="pagination__item"><a href="' . get_pagenum_link(1) . '">&laquo;</a></li>';
        }
        if ($paged > 1 && $showitems < $pages) {
            echo '<li class="pagination__item"><a href="' . get_pagenum_link($paged - 1) . '">&lsaquo;</a></li>';
        }

        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? '<li class="pagination__item pagination__item--active"><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>' : '<li class="pagination__item"><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
            }
        }

        if ($paged < $pages && $showitems < $pages) {
            echo '<li class="pagination__item"><a href="' . get_pagenum_link($paged + 1) . '">&rsaquo;</a></li>';
        }
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) {
            echo '<li class="pagination__item"><a href="' . get_pagenum_link($pages) . '">&raquo;</a></li>';
        }
        echo '</ul>';
    }
}
