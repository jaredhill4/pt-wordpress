import $ from 'jquery';
import { cssTimeToMilliseconds } from './utilities';

const CLASS_NAMES = {
  TARGET: 'toggle__target',
  TARGET_VISIBLE: 'toggle__target--visible',
  TARGET_HIDDEN: 'toggle__target--hidden',
  TARGET_SHOWING: 'toggle__target--showing',
  TARGET_HIDING: 'toggle__target--hiding',
  SWITCH: 'toggle__switch',
  SWITCH_ON: 'toggle__switch--on'
};

class Toggle {
  constructor(element) {
    const toggleTarget = $(element);
    const toggleSwitch = toggleTarget.data('toggle-target');

    if (typeof toggleSwitch === 'undefined') {
      throw new Error(
        'Toggle target element attribute "data-toggle-target" must have a value.'
      );
    }

    // Protected
    this.html = $('html');
    this.toggleTarget = toggleTarget;
    this.toggleSwitch = $(`[data-toggle-switch="${toggleSwitch}"]`);
    this.toggleParent = this.toggleSwitch.data('toggle-parent');
    this.toggleGroup = null;
    this.toggleGroupAllowMultiple = false;
    this.toggleTargetTransition = this.toggleTarget.data(
      'toggle-target-transition'
    );

    if (this.toggleParent) {
      this.toggleGroup = $(`[data-toggle-group='${this.toggleParent}']`);
      this.toggleGroupAllowMultiple = this.toggleGroup.data(
        'toggle-group-allow-multiple'
      );
      this.toggleGroupRequireActive = this.toggleGroup.data(
        'toggle-group-require-active'
      );
      this.toggleGroup.data('toggle-group-child-is-transitioning', false);
    }

    this.toggleTarget.addClass(CLASS_NAMES.TARGET);
    this.toggleSwitch.addClass(CLASS_NAMES.SWITCH);
    this._isTransitioning = false;
    this._setListeners();
  }

  _setListeners() {
    this.toggleSwitch.on('click', event => this.toggle(event));
    this.toggleTarget.on('toggle:show', (event, preventSetTransitioning) =>
      this.show(event, preventSetTransitioning)
    );
    this.toggleTarget.on(
      'toggle:hide',
      (event, preventSetTransitioning, isSibling) =>
        this.hide(event, preventSetTransitioning, isSibling)
    );
    this.toggleTarget.on('toggle:toggle', (event, preventSetTransitioning) =>
      this.toggle(event, preventSetTransitioning)
    );

    if (this.toggleGroup) {
      this.toggleGroup.on('toggle:groupShowAll', event =>
        this.groupShowAll(event)
      );
      this.toggleGroup.on('toggle:groupHideAll', event =>
        this.groupHideAll(event)
      );
    }
  }

  _setTransitioning(isTransitioning) {
    this._isTransitioning = isTransitioning;

    if (this.toggleGroup) {
      this.toggleGroup.data(
        'toggle-group-child-is-transitioning',
        isTransitioning
      );
    }
  }

  _checkTransitioning() {
    let transitioning = false;

    if (
      this._isTransitioning ||
      (this.toggleGroup &&
        this.toggleGroup.data('toggle-group-child-is-transitioning'))
    ) {
      transitioning = true;
    }

    return transitioning;
  }

  _getTransitionDuration() {
    let transitionDuration = 0;

    if (this.toggleTargetTransition !== 'none') {
      transitionDuration = cssTimeToMilliseconds(
        this.toggleTarget.css('transition-duration')
      );

      if (this.toggleTargetTransition === 'fade') {
        transitionDuration = transitionDuration / 2;
      }
    }

    return transitionDuration;
  }

  isActive() {
    return this.toggleTarget.hasClass(CLASS_NAMES.TARGET_VISIBLE);
  }

  groupShowAll(event) {
    if (typeof event !== 'undefined') {
      event.preventDefault();
    }

    this.toggleGroup
      .find('[data-toggle-target]')
      .trigger('toggle:show', [true]);
  }

  groupHideAll(event) {
    if (typeof event !== 'undefined') {
      event.preventDefault();
    }

    this.toggleGroup
      .find('[data-toggle-target]')
      .trigger('toggle:hide', [true]);
  }

  toggle(event, preventSetTransitioning = false) {
    if (typeof event !== 'undefined') {
      event.preventDefault();
    }

    if (this.isActive()) {
      this.hide(event, preventSetTransitioning);
    } else {
      this.show(event, preventSetTransitioning);
    }
  }

  show(event, preventSetTransitioning = false) {
    if (typeof event !== 'undefined') {
      event.preventDefault();
    }

    if (
      this._checkTransitioning() ||
      this.toggleTarget.hasClass(CLASS_NAMES.TARGET_VISIBLE)
    ) {
      return;
    }

    let actives = [];
    let toggleTargetHeight = 0;

    this.toggleTarget.trigger('toggle:beforeShow');

    if (this.toggleGroup && !this.toggleGroupAllowMultiple) {
      actives = this.toggleGroup.find(`.${CLASS_NAMES.TARGET_VISIBLE}`);
      actives.trigger('toggle:hide', [true, true]);
    }

    if (!preventSetTransitioning) {
      this._setTransitioning(true);
    }

    this.toggleTarget
      .addClass(CLASS_NAMES.TARGET_SHOWING)
      .css('height', 'auto');

    toggleTargetHeight = this.toggleTarget.outerHeight();

    this.toggleTarget.css('height', '');

    setTimeout(() => {
      this.toggleTarget.css('height', toggleTargetHeight);
    });

    setTimeout(() => {
      this.toggleTarget
        .removeClass(CLASS_NAMES.TARGET_SHOWING)
        .addClass(CLASS_NAMES.TARGET_VISIBLE)
        .css('height', '');

      this._setTransitioning(false);
      this.toggleTarget.trigger('toggle:afterShow');
    }, this._getTransitionDuration());

    this.toggleSwitch.addClass(CLASS_NAMES.SWITCH_ON);
  }

  hide(event, preventSetTransitioning = false, isSibling = false) {
    if (typeof event !== 'undefined') {
      event.preventDefault();
    }

    if (
      this._checkTransitioning() ||
      !this.toggleTarget.hasClass(CLASS_NAMES.TARGET_VISIBLE)
    ) {
      return;
    }

    let actives = [];

    if (this.toggleGroup) {
      actives = this.toggleGroup.find(`.${CLASS_NAMES.TARGET_VISIBLE}`);
    }

    if (!isSibling && actives.length <= 1 && this.toggleGroupRequireActive) {
      return;
    }

    let toggleTargetHeight = 0;

    this.toggleTarget.trigger('toggle:beforeHide');

    if (!preventSetTransitioning) {
      this._setTransitioning(true);
    }

    this.toggleTarget
      .removeClass(CLASS_NAMES.TARGET_VISIBLE)
      .addClass(CLASS_NAMES.TARGET_HIDING)
      .css('height', 'auto');

    toggleTargetHeight = this.toggleTarget.outerHeight();
    this.toggleTarget.css('height', toggleTargetHeight);

    setTimeout(() => {
      this.toggleTarget.css('height', 0);
    });

    setTimeout(() => {
      this.toggleTarget
        .removeClass(CLASS_NAMES.TARGET_HIDING)
        .css('height', '');

      this._setTransitioning(false);
      this.toggleTarget.trigger('toggle:afterHide');
    }, this._getTransitionDuration());

    this.toggleSwitch.removeClass(CLASS_NAMES.SWITCH_ON);
  }
}

const toggle = selector => {
  $(selector).each((index, element) => {
    new Toggle(element);
  });
};

export default toggle;
