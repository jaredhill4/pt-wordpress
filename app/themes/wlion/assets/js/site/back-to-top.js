// Vendors
import $ from 'jquery';
import 'jquery.scrollto/jquery.scrollTo.min';
import 'jquery.localscroll/jquery.localScroll.min';
import 'waypoints/lib/jquery.waypoints.min';

// Init local scroll
$('.back-to-top').localScroll();

// Create waypoint for back to top button
$('.page-content').waypoint(
  direction => {
    if (direction === 'down') {
      $('.back-to-top').addClass('back-to-top--visible');
    } else if (direction === 'up') {
      $('.back-to-top').removeClass('back-to-top--visible');
    }
  },
  { offset: 0 }
);
