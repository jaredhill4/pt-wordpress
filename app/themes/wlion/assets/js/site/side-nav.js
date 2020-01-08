// Vendors
import $ from 'jquery';

// Toggle nested menu items
$('.side-nav .caret').on('click', event => {
  event.preventDefault();
  $(event.currentTarget)
    .parent('a')
    .siblings('.children')
    .slideToggle('show');
});
