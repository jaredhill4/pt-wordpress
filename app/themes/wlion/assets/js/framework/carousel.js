import $ from 'jquery';
import 'slick-carousel/slick/slick.js';

class Carousel {
  constructor(element, settings) {
    // Protected
    this.carousel = $(element);
    this.settings = settings;

    this.carousel.slick(settings);
  }

  on(event, callback) {
    this.carousel.on(event, callback);
  }

  getCurrentSlide() {
    return this.carousel.slick('slickCurrentSlide');
  }

  goToSlide(index, preventAnimation) {
    this.carousel.slick('slickGoTo', index, preventAnimation);
  }

  next() {
    this.carousel.slick('slickNext');
  }

  prev() {
    this.carousel.slick('slickPrev');
  }

  pause() {
    this.carousel.slick('slickPause');
  }

  play() {
    this.carousel.slick('slickPlay');
  }

  addSlide(html, index, addBefore) {
    this.carousel.slick('slickAdd', html, index, addBefore);
  }

  removeSlide(index, removeBefore) {
    this.carousel.slick('slickRemove', index, removeBefore);
  }

  filter(filter) {
    this.carousel.slick('slickFilter', filter);
  }

  unfilter(index) {
    this.carousel.slick('slickUnfilter', index);
  }

  getOption(option) {
    return this.carousel.slick('slickGetOption', option);
  }

  setOption(option, value, refresh) {
    this.carousel.slick('slickSetOption', option, value, refresh);
  }

  destroy() {
    this.carousel.slick('unslick');
  }

  getSlick() {
    return this.carousel.slick('getSlick');
  }
}

const carousel = (selector, settings) => {
  if ($(selector).length === 1) {
    return new Carousel($(selector)[0], settings);
  } else {
    $(selector).each((index, element) => {
      new Carousel($(selector)[index], settings);
    });
  }
};

export default carousel;
