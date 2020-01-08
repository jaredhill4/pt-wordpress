import $ from 'jquery';
import Popper from 'popper.js';

const CLASS_NAMES = {
  VISIBLE: 'tooltip--visible'
};

class Tooltip {
  constructor(element) {
    // Private
    this._hideTimeout = null;
    this._showTimeout = null;
    this._popper = null;
    this._tooltip = null;

    // Protected
    this.reference = $(element);
    this.options = {
      delay: this.reference.data('tooltip-delay') || 0,
      placement:
        typeof this.reference.data('tooltip') === 'string'
          ? this.reference.data('tooltip')
          : 'top',
      transition: 250 // This should match the CSS transition duration
    };

    this._moveTitle();
    this._setListeners();
  }

  _moveTitle() {
    this.reference
      .attr('data-original-title', this.reference.attr('title'))
      .attr('title', '');
  }

  _setListeners() {
    this.reference
      .on('mouseenter', event => this.show(event))
      .on('mouseleave', event => this.hide(event));
  }

  getTitle() {
    return this.reference.attr('data-original-title') || '';
  }

  isActive() {
    return !!this._tooltip;
  }

  show(event) {
    this._showTimeout = setTimeout(() => {
      clearTimeout(this._hideTimeout);

      if (!this.isActive()) {
        this._tooltip = $(`<div class="tooltip">${this.getTitle()}</div>`);

        $('body').append(this._tooltip);

        this._popper = new Popper(this.reference, this._tooltip, {
          placement: this.options.placement,
          removeOnDestroy: false
        });
      }

      this._tooltip.addClass(CLASS_NAMES.VISIBLE);
    }, this.options.delay);
  }

  hide(event) {
    clearTimeout(this._showTimeout);

    if (this.isActive()) {
      this._tooltip.removeClass(CLASS_NAMES.VISIBLE);

      this._hideTimeout = setTimeout(() => {
        this._popper.destroy();
        this._tooltip.remove();
        this._popper = null;
        this._tooltip = null;
      }, this.options.transition);
    }
  }
}

const tooltip = selector => {
  $(selector).each((index, element) => {
    new Tooltip(element);
  });
};

export default tooltip;
