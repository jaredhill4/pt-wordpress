import $ from 'jquery';
import { cssTimeToMilliseconds } from './utilities';

const CLASS_NAMES = {
  HTML_VISIBLE: 'html--modal-visible',
  VISIBLE: 'modal--visible'
};

class Modal {
  constructor(element) {
    const modal = $(element);
    const modalId = modal.data('modal');
    const modalDialog = modal.find('.modal__dialog');

    if (typeof modalId === 'undefined') {
      throw new Error(
        'Modal element attribute "data-modal" must have a value.'
      );
    }

    if (!modalDialog.length) {
      throw new Error(
        'Modal must include a descendent element with class name "modal__dialog."'
      );
    }

    // Protected
    this.html = $('html');
    this.modal = modal;
    this.modalId = modalId;
    this.modalDialog = modalDialog;
    this.modalContent = modal.find('.modal__content');
    this.modalClose = modal.find('[data-modal-close]');
    this.modalShow = $(`[data-modal-show="${modalId}"]`);
    this.modalHide = $(`[data-modal-hide="${modalId}"]`);

    this._setListeners();
  }

  _setListeners() {
    this.modal.on('click', event => this.hide(event));
    this.modal.on('keyup', event => this.onKeyup(event));
    this.modalDialog.on('click', event => event.stopPropagation());
    this.modalShow.on('click', event => this.show(event));
    this.modalHide.on('click', event => this.hide(event));
    this.modalClose.on('click', event => this.hide(event));
    this.modal.on('modal:show', event => this.show(event));
    this.modal.on('modal:hide', event => this.hide(event));
    this.modal.on('modal:toggle', event => this.toggle(event));
  }

  _getTransitionDuration() {
    const modalTransitionDuration = cssTimeToMilliseconds(
      this.modal.css('transition-duration')
    );
    const modalDialogTransitionDuration = cssTimeToMilliseconds(
      this.modalDialog.css('transition-duration')
    );
    return Math.max(modalTransitionDuration, modalDialogTransitionDuration);
  }

  isActive() {
    return this.modal.hasClass(CLASS_NAMES.VISIBLE);
  }

  show(event) {
    if (typeof event !== 'undefined') {
      event.preventDefault();
    }

    this.modal.trigger('modal:beforeShow');
    this.html.addClass(CLASS_NAMES.HTML_VISIBLE);
    this.modal.addClass(CLASS_NAMES.VISIBLE);

    setTimeout(() => {
      this.modal.attr('tabindex', '-1').focus();
      this.modal.trigger('modal:afterShow');
    }, this._getTransitionDuration());
  }

  hide(event) {
    if (typeof event !== 'undefined') {
      event.preventDefault();
    }

    this.modal.trigger('modal:beforeHide');
    this.html.removeClass(CLASS_NAMES.HTML_VISIBLE);
    this.modal.removeClass(CLASS_NAMES.VISIBLE);

    setTimeout(() => {
      this.modal.scrollTop(0);
      this.modalDialog.scrollTop(0);
      this.modalContent.scrollTop(0);
      this.modal.trigger('modal:afterHide');
    }, this._getTransitionDuration());
  }

  toggle(event) {
    if (this.isActive()) {
      this.hide(event);
    } else {
      this.show(event);
    }
  }

  onKeyup(event) {
    if (event.which === 27) {
      event.preventDefault();
      this.hide();
    }
  }
}

const modal = selector => {
  $(selector).each((index, element) => {
    new Modal(element);
  });
};

export default modal;
