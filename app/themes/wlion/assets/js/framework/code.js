import $ from 'jquery';
import 'google-code-prettify/src/prettify';
import 'google-code-prettify/src/lang-css';

const CLASS_NAMES = {
  BASE: 'code',
  PRE: 'code__pre',
  CODE: 'code__code',
  LINES: 'code__lines',
  LINE_NUMBERS: 'code__line-numbers',
  LINE_HIGHLIGHT: 'code__line-highlight',
  COPY_BTN: 'code__copy-btn',
  UNSTYLED_CODE: 'code__unstyled-code'
};

class Code {
  constructor(element) {
    // Protected
    this.html = $('html');
    this.code = $(element);
    this.lines = null;
    this.lineHighlight = null;
    this.copyBtn = null;

    this.code
      .addClass(`${CLASS_NAMES.PRE} prettyprint linenums`)
      .wrap(`<div class="${CLASS_NAMES.BASE}"></div>`)
      .after(`<textarea class="${CLASS_NAMES.UNSTYLED_CODE}"></textarea>`);

    this.code
      .next(`.${CLASS_NAMES.UNSTYLED_CODE}`)
      .html(this.code.html())
      .text();

    window.prettyPrint();

    this.code
      .prepend(`<div class="${CLASS_NAMES.LINE_HIGHLIGHT}"></div>`)
      .prepend(`<ol class="${CLASS_NAMES.LINE_NUMBERS}"></ol>`)
      .wrapInner(`<code class="${CLASS_NAMES.CODE}"></code>`)
      .prepend(`<span class="${CLASS_NAMES.COPY_BTN}"></span>`);

    this.code.find('ol.linenums').addClass(CLASS_NAMES.LINES);

    this.lines = this.code.find(`.${CLASS_NAMES.LINES}`);
    this.lineHighlight = this.code.find(`.${CLASS_NAMES.LINE_HIGHLIGHT}`);
    this.copyBtn = this.code.find(`.${CLASS_NAMES.COPY_BTN}`);

    this.lines
      .children('li')
      .each((i, el) =>
        this.code
          .find(`.${CLASS_NAMES.LINE_NUMBERS}`)
          .append(`<li>${i + 1}</li>`)
      );

    this._setListeners();
  }

  _setListeners() {
    this.html.on('click', event => this.onBodyClick(event));
    this.lines.on('scroll', event => this.toggleScrollState(event));
    this.lines
      .children('li')
      .on('click', event => this.showLineHighlight(event));
    this.copyBtn.on('click', event => this.copyCode(event));
    this.copyBtn.on('mouseleave', event => this.removeCopiedClass(event));
  }

  onBodyClick(event) {
    if ($(event.target).closest(`.${CLASS_NAMES.PRE}`)[0] !== this.code[0]) {
      this.hideLineHighlight(event);
    }
  }

  showLineHighlight(event) {
    const self = $(event.currentTarget);

    this.lineHighlight
      .css({
        top: self.position().top,
        height: self.outerHeight()
      })
      .addClass(`${CLASS_NAMES.LINE_HIGHLIGHT}--visible`);
  }

  hideLineHighlight(event) {
    this.lineHighlight.removeClass(`${CLASS_NAMES.LINE_HIGHLIGHT}--visible`);
  }

  toggleScrollState(event) {
    const self = $(event.currentTarget);

    if (self.scrollLeft() > 0) {
      this.code.addClass(`${CLASS_NAMES.PRE}--scrolled`);
    } else {
      this.code.removeClass(`${CLASS_NAMES.PRE}--scrolled`);
    }
  }

  copyCode(event) {
    const self = $(event.currentTarget);

    this.code.next(`.${CLASS_NAMES.UNSTYLED_CODE}`).select();
    document.execCommand('Copy');
    self.addClass(`${CLASS_NAMES.COPY_BTN}--copied`);
  }

  removeCopiedClass(event) {
    $(event.currentTarget).removeClass(`${CLASS_NAMES.COPY_BTN}--copied`);
  }
}

const code = selector => {
  $(selector).each((index, element) => {
    new Code(element);
  });
};

export default code;
