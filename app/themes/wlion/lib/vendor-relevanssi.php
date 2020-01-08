<?php
/**
 * Title: Vendor - Relevanssi
 * Description: Override or add functionality to the Relevanssi plugin.
 * Documentation:
 * -- https://www.relevanssi.com/user-manual/
 * -- https://www.relevanssi.com/category/knowledge-base/
 */

/**
 * Allow one letter searches.
 *
 * @param  boolean $boolean
 * @return boolean
 */
function wl_relevanssi_block_one_letter_searches($boolean)
{
    return FALSE;
}
add_filter('relevanssi_block_one_letter_searches', 'wl_relevanssi_block_one_letter_searches', 10);

/**
 * Allow one letter highlights.
 *
 * @param  boolean $boolean
 * @return boolean
 */
function wl_relevanssi_allow_one_letter_highlights($boolean)
{
    return TRUE;
}
add_filter('relevanssi_allow_one_letter_highlights', 'wl_relevanssi_allow_one_letter_highlights', 10);
