// Vendors
import $ from 'jquery';

// Config
let map;
let marker;

// Init map
window.initMap = () => {
  map = new google.maps.Map(document.getElementById('map'), {
    center: window.initMarkerLocation,
    zoom: 15,
    scrollwheel: false
  });

  marker = new google.maps.Marker({
    position: window.initMarkerLocation,
    map
  });
};
