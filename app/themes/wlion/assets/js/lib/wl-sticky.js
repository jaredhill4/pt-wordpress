/**
 * Sticky Element
 * Creates a element that sticks on the page when scrolling.
 */

// Vendors
import $ from 'jquery';

// Plugin
$.fn.sticky = function(options) {
  // eslint-disable-line func-names
  const config = $.extend(
    {
      breakpoint: 768, // Set the mobile breakpoint
      offset: 30, // Set the top offset
      stopper: null,
    },
    options
  );

  const stick = () => {
    $(this).addClass('sticky-wrapper');

    if ($(this).find('.sticky-element').length === 0) {
      $(this).wrapInner('<div class="sticky-element"></div>');
    }

    const $stickyWrapper = $(this); // Set the sticky element to the assigned object
    const $stickyElement = $(this).find('.sticky-element'); // Set the sticky element to the assigned object
    const stickyElementHeight = $stickyElement.outerHeight(); // Get the height from the sticky element
    const stickyWrapperHeight = $stickyWrapper.outerHeight(); // Get the height of the container element
    const stickyWrapperWidth = $stickyWrapper.outerWidth(); // Get the height of the container element
    const stickyWrapperOffsetTop = $stickyWrapper.offset().top; // Get the offset of the container element from the top of the document
    const stickyBreakPoint = config.breakpoint; // Set the default breakpoint to remove sticky behavior for mobile devices
    const stickyOffset = config.offset; // Set the offset of the sticky element when stuck
    const stickyStopper = config.stopper ? $(config.stopper) : null; // Set the offset of the sticky element when stuck
    const stickyStopperPosition = config.stopper
      ? $(config.stopper).offset().top
      : null; // Set the stop position of the sticky element
    const stickyScrollTop = $(document).scrollTop() + stickyOffset; // Get the scroll position
    const windowWidth = $(window).width(); // Get the window width
    const windowHeight = $(window).height(); // Get the window height

    $stickyWrapper.css('position', 'relative');

    if (windowWidth > stickyBreakPoint) {
      if (stickyScrollTop > stickyWrapperOffsetTop) {
        if (
          stickyStopperPosition === null ||
          stickyScrollTop + stickyElementHeight < stickyStopperPosition
        ) {
          $stickyElement.css({
            position: 'fixed',
            top: stickyOffset,
            width: stickyWrapperWidth,
          });
        } else {
          $stickyElement.css({
            position: 'absolute',
            top:
              stickyStopperPosition -
              stickyElementHeight -
              stickyWrapperOffsetTop,
            width: stickyWrapperWidth,
          });
        }
      } else {
        $stickyElement.css({
          position: 'relative',
          top: 0,
          width: 'auto',
        });
      }

      $stickyElement.css({
        'max-height': windowHeight,
        overflow: 'auto',
      });
    } else {
      $stickyElement.css({
        top: 0,
        'max-height': 'none',
      });
    }
  };

  return this.each(() => {
    $(window).on('scroll', $.proxy(stick, this));
    $(window).on('resize', $.proxy(stick, this));
    $(window).on('load', $.proxy(stick, this));
    $.proxy(stick, this);
  });
};
