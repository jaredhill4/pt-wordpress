// Vendors
import $ from 'jquery';

// Toggle mobile nav
$('[data-toggle="nav-mobile"]').on('click', event => {
  event.preventDefault();
  $(event.currentTarget).toggleClass('hamburger--active');
  $('.mobile-nav').toggleClass('mobile-nav--visible');
  $('.mobile-nav').scrollTop(0);
  $('body').toggleClass('nav-mobile-is-visible');
  $('html').toggleClass('nav-mobile-is-visible');
});

// Toggle nested menu items
$('.mobile-nav .caret').on('click', event => {
  event.preventDefault();
  if (
    !$(event.currentTarget)
      .siblings('.sub-menu')
      .hasClass('sub-menu--visible')
  ) {
    $(event.currentTarget)
      .siblings('.sub-menu')
      .addClass('sub-menu--visible');
    $(event.currentTarget).removeClass('caret--down');
    $(event.currentTarget).addClass('caret--up');
  } else {
    $(event.currentTarget)
      .siblings('.sub-menu')
      .removeClass('sub-menu--visible');
    $(event.currentTarget).removeClass('caret--up');
    $(event.currentTarget).addClass('caret--down');
  }
});
