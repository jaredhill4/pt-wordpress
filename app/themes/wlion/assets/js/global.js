// CSS
import '../scss/index.scss';

// Polyfills
import './lib/polyfills';

// Vendors
import $ from 'jquery';
import 'fancybox/dist/js/jquery.fancybox.pack';
import 'jquery.maskedinput/src/jquery.maskedinput';
import './lib/wl-share';

// Framework
import carousels from './framework/carousel';
import code from './framework/code';
import dropdowns from './framework/dropdown';
import modals from './framework/modal';
import notices from './framework/notice';
import toggles from './framework/toggle';
import tooltips from './framework/tooltip';
import utilities from './framework/utilities';

// Site modules
import './site/back-to-top';
import './site/mobile-nav';
import './site/search-autosuggest';
import './site/side-nav';

// Apply input masks
$('.mask-input-phone').mask('(999) 999-9999');
$('.mask-input-date').mask('99/99/9999');

// Init Fancybox
$('.fancybox').fancybox({
  helpers: {
    overlay: {
      locked: false // Prevent page from jumping back to top
    }
  }
});

// Init single carousel
const carouselSingle = carousels('[data-carousel="single"]', {
  autoplay: true,
  dots: true,
  infinite: true,
  speed: 500
});

// Init multiple carousel
const carouselMultiple = carousels('[data-carousel="multiple"]', {
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
  ]
});

// Init modals
modals('[data-modal]');

// Init toggles
toggles('[data-toggle-target]');

// Init notices
notices('[data-notice-dismissible]');

// Init code
code('[data-code]');

// Init tooltips
tooltips('[data-tooltip]');

// Init dropdowns
dropdowns('[data-dropdown]');
