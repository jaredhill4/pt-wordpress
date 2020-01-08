/**
 * Dynamic Subnav
 * This script creates a dynamic submenu based on all the elements
 * with the class "content-section" on pages that have it enabled.
 */

// Vendors
import $ from 'jquery';

// Init
const $contentSection = $('.content-section');
const subnavMenu = '#table-of-contents';
let subnavMenuItems = '';

// Function to output submenu list items
const loadDynamicSubnav = () => {
  $(subnavMenu).html(subnavMenuItems);
};

// Init localScroll for the submenu list items
$(subnavMenu).localScroll({ lazy: true });

// Create submenu list items
$contentSection.each((index, element) => {
  const contentSectionId = $(element).attr('id');
  const contentSectionTitle = $(element).data('section-title');
  subnavMenuItems += `<li class="nav-${contentSectionId}"><a href="#${contentSectionId}">${contentSectionTitle}</a></li>`;
});

// Load submenu list items
loadDynamicSubnav();

// Create waypoints
$contentSection.waypoint({
  handler: function(direction) {
    // eslint-disable-line func-names, object-shorthand
    const thisSection = this;
    const prevSection = this.previous();

    if (direction === 'down') {
      $(`${subnavMenu} li`).removeClass('active');
      $(`${subnavMenu} li.nav-${thisSection.element.id}`).addClass('active');
    } else if (direction === 'up') {
      $(`${subnavMenu} li`).removeClass('active');
      $(`${subnavMenu} li.nav-${prevSection.element.id}`).addClass('active');
    }
  },
  offset: 30,
});
