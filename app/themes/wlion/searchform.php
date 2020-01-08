<?php
/**
 * Title: Search Form
 * Description: Override WordPress's default search form.
 * Documentation: http://codex.wordpress.org/Function_Reference/get_search_form
 */

$search = $_REQUEST['s'] ?? '';
?>
<div class="sidebar-section search-form">
    <form role="search" class="form" method="get" action="<?= home_url('/blog'); ?>">
        <div class="form__field">
            <div class="form__input-group form__input-group--xl">
                <input type="search" class="form__input" placeholder="Search &hellip;" value="<?= $search ?>" name="s" title="Search for:" />
                <button class="btn btn--primary" type="button"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
