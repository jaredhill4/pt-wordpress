// Vendors
import $ from 'jquery';
import _ from 'lodash';

// Config
const searchContainer = '.search-autosuggest';
const resultsContainer = '.search-autosuggest__results';
const searchInput = '.search-autosuggest__input';
const resultsLoading = '.search-autosuggest__loading';

// Remove focus on page load
$(resultsContainer).hide();

// Trigger ajax search query on input change
$(searchContainer).on(
  'input',
  searchInput,
  _.debounce(event => ajaxSearchQuery(event), 150)
);

$('html').on('click', event => {
  $(resultsContainer).hide();
  $(searchContainer).removeClass('search-autosuggest--focused');
});

$('html').on('click', searchContainer, event => {
  event.stopPropagation();
  $(searchContainer).addClass('search-autosuggest--focused');

  // Hide auto-suggest results and load full results
  // when user clicks "view all"
  if ($(event.target).hasClass('search-autosuggest__view-all')) {
    event.preventDefault();
    $(event.target)
      .closest('form')
      .submit();

    // Show results container
  } else {
    $(resultsContainer).show();
  }
});

function ajaxSearchQuery(event) {
  const self = $(event.currentTarget);
  const search = self.val();

  // Make sure the search field has a value
  if (
    $(searchContainer)
      .find(searchInput)
      .val() !== ''
  ) {
    // If key is "enter", then fetch all results
    if (event.keyCode === 13) {
      $(event.currentTarget)
        .closest('form')
        .submit();

      // Fetch auto-suggest results
    } else if (search.length > 0) {
      const data = {
        search: search,
        limit: 5
      };

      $(resultsContainer).show();
      $(searchContainer)
        .find(resultsLoading)
        .addClass('search-autosuggest__loading--visible');

      $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php?action=post_ajax_search_autosuggest',
        data: data,
        dataType: 'json',
        encode: true,
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        success: res => {
          let output = '';

          if (res.data.hits.length) {
            output = '<ul>';

            res.data.hits.forEach((post, index) => {
              output += '<li>';
              output += `<a href="${post.permalink}">`;
              output += `<h5>${post.post_highlighted_title}</h5>`;

              if ($(searchContainer).data('search-autosuggest-show-excerpt')) {
                output += `<p>${post.post_excerpt}</p>`;
              }

              output += '</a></li>';
            });

            if (res.data.view_more) {
              output += `<li><a href="#" class="search-autosuggest__view-all btn btn-default">View All</a></li>`;
            }

            output += '</ul>';
          } else {
            output =
              '<div class="search-autosuggest__no-results">No posts found...</div>';
          }

          $(searchContainer)
            .find(resultsLoading)
            .removeClass('search-autosuggest__loading--visible');
          $(resultsContainer).empty();
          $(resultsContainer).append(output);
          $(searchContainer).addClass('search-autosuggest--showing-results');
        },
        error: res => {
          $(searchContainer)
            .find(resultsLoading)
            .removeClass('search-autosuggest__loading--visible');
          $(resultsContainer).empty();
          $(resultsContainer).append(
            '<div class="search-autosuggest__no-results">There was an error fetching the posts.</div>'
          );
          $(searchContainer).addClass('search-autosuggest--showing-results');
        }
      });
    } else {
      $(resultsContainer).empty();
      $(resultsContainer).hide();
      $(searchContainer).removeClass('search-autosuggest--showing-results');
    }
  } else {
    $(resultsContainer).empty();
    $(resultsContainer).hide();
    $(searchContainer).removeClass('search-autosuggest--showing-results');
  }
}
