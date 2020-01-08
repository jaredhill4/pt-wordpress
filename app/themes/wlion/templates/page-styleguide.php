<?php
/**
 * Template Name: Page - Style Guide
 */
get_header(); ?>

<?php while (have_posts()): the_post(); ?>
    <div class="container container--sm">
        <section id="colors" class="section">
            <h2 class="section-title u--margin-top-0">Colors</h2>
            <p>These are the colors used throughout the site. Each has been assigned to a variable in the "framework/variables.scss" file.</p>

            <h3 class="h4">Base</h3>
            <div class="grid">
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--blue">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--green">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--yellow">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--red">
                        <div class="swatch__color"></div>
                    </div>
                </div>
            </div>
            <h3 class="h4">Gray</h3>
            <div class="grid">
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--black">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--gray-darkest">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--gray-darker">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--gray-dark">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--gray">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--gray-light">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--gray-lighter">
                        <div class="swatch__color"></div>
                    </div>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-3">
                    <div class="swatch swatch--gray-lightest">
                        <div class="swatch__color"></div>
                    </div>
                </div>
            </div>
        </section>

        <hr />

        <section id="typography" class="section">
            <h2 class="section-title u--margin-top-0">Typography</h2>
            <p>These are our basic typographic styles. Make updates in the "framework/typography.scss" file.</p>

            <h1 class="u--margin-top-0">H1. The quick brown fox jumps over the lazy dog.</h1>
            <h2 class="u--margin-top-0">H2. The quick brown fox jumps over the lazy dog.</h2>
            <h3 class="u--margin-top-0">H3. The quick brown fox jumps over the lazy dog.</h3>
            <h4 class="u--margin-top-0">H4. The quick brown fox jumps over the lazy dog.</h4>
            <h5 class="u--margin-top-0">H5. The quick brown fox jumps over the lazy dog.</h5>
            <h6 class="u--margin-top-0">H6. The quick brown fox jumps over the lazy dog.</h6>

            <hr />

            <h4>Lead Paragraph</h4>
            <p class="p--lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et justo sed dui feugiat cursus. Phasellus pharetra dui lobortis odio efficitur suscipit. Aenean condimentum ullamcorper ullamcorper. Nunc a tempus neque. Pellentesque nec pharetra purus. Proin fermentum purus non tortor posuere, vel convallis dolor interdum. Suspendisse aliquet felis metus, vel tempus purus tincidunt eget.</p>

            <h4>Default Paragraph</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et justo sed dui feugiat cursus. Phasellus pharetra dui lobortis odio efficitur suscipit. Aenean condimentum ullamcorper ullamcorper. Nunc a tempus neque. Pellentesque nec pharetra purus. Proin fermentum purus non tortor posuere, vel convallis dolor interdum. Suspendisse aliquet felis metus, vel tempus purus tincidunt eget.</p>

            <h4>Small Paragraph</h4>
            <p class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et justo sed dui feugiat cursus. Phasellus pharetra dui lobortis odio efficitur suscipit. Aenean condimentum ullamcorper ullamcorper. Nunc a tempus neque. Pellentesque nec pharetra purus. Proin fermentum purus non tortor posuere, vel convallis dolor interdum. Suspendisse aliquet felis metus, vel tempus purus tincidunt eget.</p>

            <h4>Blockquote</h4>
            <blockquote>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at porttitor sem. Aliquam erat volutpat. Donec placerat nisl magna, et faucibus arcu.
                <cite>John Doe</cite>
            </blockquote>

            <h4>Lists</h4>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ligula est, aliquam eu blandit ac, dictum nec erat.</li>
                <li>Nulla quis sapien non lacus rutrum mollis suscipit scelerisque velit. In hac habitasse platea dictumst.</li>
                <li>Duis in justo tincidunt, luctus ligula sed, placerat diam. Morbi eget tellus ipsum. Fusce iaculis maximus sem eget tincidunt.</li>
            </ul>
            <ol>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ligula est, aliquam eu blandit ac, dictum nec erat.</li>
                <li>Nulla quis sapien non lacus rutrum mollis suscipit scelerisque velit. In hac habitasse platea dictumst.</li>
                <li>Duis in justo tincidunt, luctus ligula sed, placerat diam. Morbi eget tellus ipsum. Fusce iaculis maximus sem eget tincidunt.</li>
            </ol>

        </section>

        <hr />

        <section id="buttons" class="section">
            <h2 class="section-title u--margin-top-0">Buttons</h2>
            <p>These are our basic button styles. Make updates in the "framework/buttons.scss" file.</p>

            <div class="grid">
                <div class="grid__col-md-6">
                    <p><a href="#" class="btn btn--default">.btn.btn--default</a></p>
                    <p><a href="#" class="btn btn--blue">.btn.btn--blue</a></p>
                    <p><a href="#" class="btn btn--green">.btn.btn--green</a></p>
                    <p><a href="#" class="btn btn--yellow">.btn.btn--yellow</a></p>
                    <p><a href="#" class="btn btn--red">.btn.btn--red</a></p>
                    <p><a href="#" class="btn btn--link">.btn.btn--link</a></p>
                </div>

                <div class="grid__col-md-6">
                    <p><a href="#" class="btn btn--blue btn--xs">.btn.btn--xs</a></p>
                    <p><a href="#" class="btn btn--blue btn--sm">.btn.btn--sm</a></p>
                    <p><a href="#" class="btn btn--blue">.btn</a></p>
                    <p><a href="#" class="btn btn--blue btn--lg">.btn.btn--lg</a></p>
                    <p><a href="#" class="btn btn--blue btn--xl">.btn.btn--xl</a></p>
                    <p><a href="#" class="btn btn--blue btn--block">.btn.btn--block</a></p>
                    <p><button type="button" class="btn btn--blue" disabled="disabled">.btn disabled</button></p>
                </div>
            </div>
        </section>

        <hr />

        <section id="forms" class="section section--lg">
            <h2 class="section-title u--margin-top-0">Forms</h2>
            <p>These are our basic form styles. Make updates in the "framework/forms.scss" file.</p>

            <form>
                <div class="grid">
                    <div class="grid__col-xs-12">
                        <div class="form__field">
                            <label class="form__label">Full Name</label>
                            <input type="text" class="form__input" placeholder="Full Name" />
                            <small class="form__help">Please enter your full name.</small>
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <div class="grid__col-xs-12 grid__col-lg-4">
                        <div class="form__field">
                            <label class="form__label">Email Address</label>
                            <input type="text" class="form__input" placeholder="Email Address" />
                        </div>
                    </div>
                    <div class="grid__col-xs-12 grid__col-lg-4">
                        <div class="form__field">
                            <label class="form__label">Phone Number</label>
                            <input type="text" class="form__input" placeholder="Phone Number" />
                        </div>
                    </div>
                    <div class="grid__col-xs-12 grid__col-lg-4">
                        <div class="form__field">
                            <label class="form__label">Website</label>
                            <div class="form__input-group">
                                <div class="form__input-group-addon">http://</div>
                                <input type="text" class="form__input" placeholder="yourdomain.com" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <div class="grid__col-xs-12">
                        <div class="form__field">
                            <label class="form__label">Message</label>
                            <textarea class="form__input" placeholder="Enter a message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="grid">
                    <div class="grid__col-xs-12 grid__col-sm-4 grid__col-md-3">
                        <div class="form__field">
                            <div class="form__submit"><button type="submit" class="btn btn--primary btn--block">Submit</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <hr />

        <section id="notices" class="section">
            <h2 class="section-title u--margin-top-0">Notices</h2>
            <p>These are our basic notice styles. Make updates in the "framework/notices.scss" file.</p>

            <div class="notice notice--green" data-notice-dismissible>
                <span class="notice__close" data-notice-close></span>
                <p><strong class="notice__title">Success</strong> Et adipisicing culpa deserunt nostrud ad veniam nulla. Est velit labore esse esse cupidatat.</p>
            </div>
            <div class="notice notice--blue" data-notice-dismissible>
                <span class="notice__close" data-notice-close></span>
                <p><strong class="notice__title">Info</strong> Et adipisicing culpa deserunt nostrud ad veniam nulla. Est velit labore esse esse cupidatat.</p>
            </div>
            <div class="notice notice--yellow" data-notice-dismissible>
                <span class="notice__close" data-notice-close></span>
                <p><strong class="notice__title">Warning</strong> Et adipisicing culpa deserunt nostrud ad veniam nulla. Est velit labore esse esse cupidatat.</p>
            </div>
            <div class="notice notice--red" data-notice-dismissible>
                <span class="notice__close" data-notice-close></span>
                <p><strong class="notice__title">Error</strong> Et adipisicing culpa deserunt nostrud ad veniam nulla. Est velit labore esse esse cupidatat.</p>
            </div>
        </section>

        <hr />

        <section id="tables" class="section">
            <h2 class="section-title u--margin-top-0">Tables</h2>
            <p>These are our table styles. Make updates in the "framework/tables.scss" file.</p>

            <table class="table table--striped">
                <thead>
                    <tr>
                        <th>Col 1</th>
                        <th>Col 2</th>
                        <th>Col 3</th>
                        <th>Col 4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row 1 / Col 1</td>
                        <td>Row 1 / Col 2</td>
                        <td>Row 1 / Col 3</td>
                        <td>Row 1 / Col 4</td>
                    </tr>
                    <tr>
                        <td>Row 2 / Col 1</td>
                        <td>Row 2 / Col 2</td>
                        <td>Row 2 / Col 3</td>
                        <td>Row 2 / Col 4</td>
                    </tr>
                    <tr>
                        <td>Row 3 / Col 1</td>
                        <td>Row 3 / Col 2</td>
                        <td>Row 3 / Col 3</td>
                        <td>Row 3 / Col 4</td>
                    </tr>
                    <tr>
                        <td>Row 4 / Col 1</td>
                        <td>Row 4 / Col 2</td>
                        <td>Row 4 / Col 3</td>
                        <td>Row 4 / Col 4</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Col 1</th>
                        <th>Col 2</th>
                        <th>Col 3</th>
                        <th>Col 4</th>
                    </tr>
                </tfoot>
            </table>
        </section>

        <hr />

        <section id="carousel" class="section">
            <h2 class="section-title u--margin-top-0">Carousels</h2>
            <p>These are our table styles. Make updates in the "framework/carousel.scss" file.</p>
            <p>We use Slick.js for carousels. For full documentation and options visit <a href="http://kenwheeler.github.io/slick/">http://kenwheeler.github.io/slick/</a>.</p>

            <div data-carousel="single">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <div class="sample-carousel-slide">
                        Slide <?= $i ?>
                    </div>
                <?php endfor; ?>
            </div>
        </section>

        <hr />

        <section id="modals" class="section">
            <h2 class="section-title u--margin-top-0">Modals</h2>
            <p>These are our modal styles. Make updates in the "framework/modals.scss" file.</p>
            <button type="button" class="btn" data-modal-show="modal-xs">Extra Small</button>
            <button type="button" class="btn" data-modal-show="modal-sm">Small (default)</button>
            <button type="button" class="btn" data-modal-show="modal-md">Medium</button>
            <button type="button" class="btn" data-modal-show="modal-lg">Large</button>
            <button type="button" class="btn" data-modal-show="modal-xl">Extra Large</button>
            <button type="button" class="btn" data-modal-show="modal-full">Full</button>
        </section>

        <hr />

        <section id="accordions" class="section">
            <h2 class="section-title u--margin-top-0">Accordions</h2>
            <p>These are our accordion styles. Make updates in the "framework/accordions.scss" file.</p>

            <dl class="accordion" data-toggle-group="accordion-sample">
                <dt class="accordion__header" data-toggle-switch="accordion-sample-item-1" data-toggle-parent="accordion-sample">
                    <h5 class="u--margin-0">This is an accordion header.</h5>
                </dt>
                <dd class="toggle__target" data-toggle-target="accordion-sample-item-1" data-toggle-parent="accordion-sample">
                    <div class="accordion__content">Adipisicing aliqua proident occaecat do do adipisicing adipisicing ut fugiat culpa. Pariatur ullamco aute sunt esse adipisicing. Excepteur eu non eiusmod occaecat commodo commodo et ad ipsum elit. Pariatur sit adipisicing sunt excepteur enim nostrud pariatur incididunt.</div>
                </dd>
                <dt class="accordion__header" data-toggle-switch="accordion-sample-item-2" data-toggle-parent="accordion-sample">
                    <h5 class="u--margin-0">This is an accordion header.</h5>
                </dt>
                <dd class="toggle__target" data-toggle-target="accordion-sample-item-2" data-toggle-parent="accordion-sample">
                    <div class="accordion__content">Adipisicing aliqua proident occaecat do do adipisicing adipisicing ut fugiat culpa. Pariatur ullamco aute sunt esse adipisicing. Excepteur eu non eiusmod occaecat commodo commodo et ad ipsum elit. Pariatur sit adipisicing sunt excepteur enim nostrud pariatur incididunt.</div>
                </dd>
                <dt class="accordion__header" data-toggle-switch="accordion-sample-item-3" data-toggle-parent="accordion-sample">
                    <h5 class="u--margin-0">This is an accordion header.</h5>
                </dt>
                <dd class="toggle__target" data-toggle-target="accordion-sample-item-3">
                    <div class="accordion__content">Adipisicing aliqua proident occaecat do do adipisicing adipisicing ut fugiat culpa. Pariatur ullamco aute sunt esse adipisicing. Excepteur eu non eiusmod occaecat commodo commodo et ad ipsum elit. Pariatur sit adipisicing sunt excepteur enim nostrud pariatur incididunt.</div>
                </dd>
            </dl>
        </section>

        <hr />

        <section id="tabs" class="section">
            <h2 class="section-title u--margin-top-0">Tabs</h2>
            <p>These are our tab styles. Make updates in the "framework/tabs.scss" file.</p>

            <div class="tabs" data-toggle-group="tabs-sample" data-toggle-group-require-active="true">
                <nav class="tabs__nav">
                    <ul role="tablist">
                        <li><button class="toggle__switch--on" data-toggle-switch="tab-1" data-toggle-parent="tabs-sample">Tab 1</button></li>
                        <li><button data-toggle-switch="tab-2" data-toggle-parent="tabs-sample">Tab 2</button></li>
                        <li><button data-toggle-switch="tab-3" data-toggle-parent="tabs-sample">Tab 3</button></li>
                    </ul>
                </nav>

                <div class="tabs__content">
                    <div class="toggle__target toggle__target--visible" data-toggle-target="tab-1" data-toggle-target-transition="fade" role="tabpanel">
                        Occaecat do do adipisicing adipisicing ut fugiat culpa consequat pariatur ullamco aute sunt. Adipisicing irure excepteur eu non eiusmod occaecat commodo commodo. Ad ipsum elit esse pariatur sit adipisicing sunt excepteur.
                    </div>
                    <div class="toggle__target" data-toggle-target="tab-2" data-toggle-target-transition="fade" role="tabpanel">
                        Do do adipisicing adipisicing ut fugiat culpa consequat pariatur ullamco aute sunt esse. Irure excepteur eu non eiusmod. Commodo commodo et ad ipsum elit esse pariatur sit adipisicing sunt excepteur enim. Pariatur incididunt duis commodo mollit esse veniam non exercitation dolore occaecat ea. Laboris nisi adipisicing occaecat fugiat fugiat irure fugiat in magna non consectetur. Fugiat cupidatat commodo magna et aliqua elit sint cupidatat dolor sint aute ullamco.
                    </div>
                    <div class="toggle__target" data-toggle-target="tab-3" data-toggle-target-transition="fade" role="tabpanel">
                        Aliqua proident occaecat do do. Adipisicing ut fugiat culpa consequat. Ullamco aute sunt esse adipisicing irure excepteur eu non eiusmod occaecat commodo commodo. Ad ipsum elit esse pariatur sit adipisicing sunt excepteur. Nostrud pariatur incididunt duis commodo mollit esse veniam.
                    </div>
                </div>
            </div>
        </section>

        <hr />

        <section id="tooltips" class="section">
            <h2 class="section-title u--margin-top-0">Tooltips</h2>
            <p>These are our tooltip styles. Make updates in the "framework/tooltips.scss" file.</p>

            <button type="button" class="btn" data-tooltip="top" title="Tooltip top">Tooltip top</button>
            <button type="button" class="btn" data-tooltip="right" title="Tooltip right">Tooltip right</button>
            <button type="button" class="btn" data-tooltip="bottom" title="Tooltip bottom">Tooltip bottom</button>
            <button type="button" class="btn" data-tooltip="left" data-tooltip-delay="500" title="Tooltip left with delay">Tooltip left with delay</button>
        </section>

        <hr />

        <section id="dropdowns" class="section">
            <h2 class="section-title u--margin-top-0">Dropdowns</h2>
            <p>These are our tooltip styles. Make updates in the "framework/dropdowns.scss" file.</p>

            <button type="button" class="btn" data-dropdown-toggle="dropdown-example-1">Dropdown (default)</button>
            <div class="dropdown" data-dropdown="dropdown-example-1">
                <a href="#" class="dropdown__item">Link 1</a>
                <a href="#" class="dropdown__item">Link 2</a>
                <a href="#" class="dropdown__item">Link 3</a>
                <div class="dropdown__divider"></div>
                <a href="#" class="dropdown__item">Link 4</a>
            </div>

            <button type="button" class="btn" data-dropdown-toggle="dropdown-example-2">Dropdown (top-end)</button>
            <div class="dropdown" data-dropdown="dropdown-example-2" data-dropdown-position="top-end">
                <a href="#" class="dropdown__item">Link 1</a>
                <a href="#" class="dropdown__item">Link 2</a>
                <a href="#" class="dropdown__item">Link 3</a>
                <div class="dropdown__divider"></div>
                <a href="#" class="dropdown__item">Link 4</a>
            </div>

            <button type="button" class="btn" data-dropdown-toggle="dropdown-example-3">Dropdown (right-start)</button>
            <div class="dropdown" data-dropdown="dropdown-example-3" data-dropdown-position="right-start">
                <a href="#" class="dropdown__item">Link 1</a>
                <a href="#" class="dropdown__item">Link 2</a>
                <a href="#" class="dropdown__item">Link 3</a>
                <div class="dropdown__divider"></div>
                <a href="#" class="dropdown__item">Link 4</a>
            </div>
        </section>

        <hr />

        <section id="cards" class="section">
            <h2 class="section-title u--margin-top-0">Cards</h2>
            <p>These are our tooltip styles. Make updates in the "framework/cards.scss" file.</p>

            <div class="grid">
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-4">
                    <article class="card">
                        <header class="card__header">
                            <p class="u--font-size-sm">Category Name</p>
                        </header>
                        <section class="card__body">
                            <h4>This is a card title</h4>
                            <p>Officia et mollit incididunt nisi consectetur esse laborum. Pariatur proident Lorem eiusmod et adipisicing culpa deserunt.</p>
                            <p>Adipisicing aliqua proident occaecat do do adipisicing adipisicing ut fugiat culpa. Pariatur ullamco aute sunt esse adipisicing.</p>
                            <p><button class="btn btn--red">Learn More</button></p>
                        </section>
                        <footer class="card__footer">
                            <p class="u--font-size-sm u--color-gray-dark">Last updated 3 mins ago</p>
                        </footer>
                    </article>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-4">
                    <article class="card">
                        <img src="//placehold.it/600x400" class="card__media" alt="Card media" />
                        <section class="card__body">
                            <h4>This is a card title</h4>
                            <p>Officia et mollit incididunt nisi consectetur esse laborum. Pariatur proident Lorem eiusmod et adipisicing culpa deserunt.</p>
                            <p><button class="btn btn--green">Learn More</button></p>
                        </section>
                        <footer class="card__footer">
                            <p class="u--font-size-sm u--color-gray-dark">Last updated 3 mins ago</p>
                        </footer>
                    </article>
                </div>
                <div class="grid__col-xs-12 grid__col-sm-6 grid__col-md-4">
                    <article class="card">
                        <section class="card__body">
                            <p class="u--font-size-sm u--color-gray-dark">Category Name</p>                                    <h4>This is a card title</h4>
                            <p>Officia et mollit incididunt nisi consectetur esse laborum. Pariatur proident Lorem eiusmod et adipisicing culpa deserunt.</p>
                            <p><button class="btn btn--blue">Learn More</button></p>
                        </section>
                        <footer class="card__footer">
                            <p class="u--font-size-sm u--color-gray-dark">Last updated 3 mins ago</p>
                        </footer>
                    </article>
                </div>
            </div>
        </section>

        <hr />

        <section id="responsive-embed" class="section">
            <h2 class="section-title u--margin-top-0">Responsive Embeds</h2>
            <p>We offer a utility style for responsive embeds. For this and other utility classes, checkout out the  "framework/utilities.scss" file.</p>
            <div class="u--embed-responsive">
                <iframe src="https://www.youtube.com/embed/WQJuGeqdbn4" title="Responsive embed with default 16x9 aspect ratio" allowfullscreen></iframe>
            </div>
        </section>

        <hr />

        <section id="pagination" class="section">
            <h2 class="section-title u--margin-top-0">Pagination</h2>
            <p>These are our pagination styles. Make updates in the "framework/pagination.scss" file.</p>

            <nav>
                <ul class="pagination pagination--xs">
                    <li class="pagination__item">
                        <a href="#">Prev</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">1</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">2</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">3</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <br />

            <nav>
                <ul class="pagination pagination--sm">
                    <li class="pagination__item">
                        <a href="#">Prev</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">1</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">2</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">3</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <br />

            <nav>
                <ul class="pagination pagination--md">
                    <li class="pagination__item">
                        <a href="#">Prev</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">1</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">2</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">3</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <br />

            <nav>
                <ul class="pagination pagination--lg">
                    <li class="pagination__item">
                        <a href="#">Prev</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">1</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">2</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">3</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <br />

            <nav>
                <ul class="pagination pagination--xl">
                    <li class="pagination__item">
                        <a href="#">Prev</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">1</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">2</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">3</a>
                    </li>
                    <li class="pagination__item">
                        <a href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </section>

        <hr />

        <section id="icons" class="section">
            <h2 class="section-title u--margin-top-0">Icons</h2>
            <p>We use Font Awesome as our default icon font. For more icons and documentation, visit <a href="http://fortawesome.github.io/Font-Awesome/">http://fortawesome.github.io/Font-Awesome/</a></p>
            <p>Or, to generate your own icon set, you may use the <a href="https://icomoon.io/">IcoMoon App</a>.</p>

            <div class="grid u--text-align-center">
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2><span class="fa fa-bars"></span></h2>
                    <h2><span class="fa fa-times"></span></h2>
                    <h2><span class="fa fa-shopping-cart"></span></h2>
                    <h2><span class="fa fa-info"></span></h2>
                    <h2><span class="fa fa-plus"></span></h2>
                    <h2><span class="fa fa-cog"></span></h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2><span class="fa fa-envelope"></span></h2>
                    <h2><span class="fa fa-phone"></span></h2>
                    <h2><span class="fa fa-chevron-up"></span></h2>
                    <h2><span class="fa fa-chevron-right"></span></h2>
                    <h2><span class="fa fa-chevron-down"></span></h2>
                    <h2><span class="fa fa-chevron-left"></span></h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2><span class="fa fa-caret-up"></span></h2>
                    <h2><span class="fa fa-caret-right"></span></h2>
                    <h2><span class="fa fa-caret-down"></span></h2>
                    <h2><span class="fa fa-caret-left"></span></h2>
                    <h2><span class="fa fa-arrow-up"></span></h2>
                    <h2><span class="fa fa-arrow-right"></span></h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2><span class="fa fa-arrow-down"></span></h2>
                    <h2><span class="fab fa-facebook"></span></h2>
                    <h2><span class="fab fa-twitter"></span></h2>
                    <h2><span class="fab fa-facebook"></span></h2>
                    <h2><span class="fab fa-youtube-square"></span></h2>
                    <h2><span class="fab fa-pinterest"></span></h2>
                </div>
            </div>
        </section>

        <hr />

        <section id="loading-elements" class="section">
            <h2 class="section-title u--margin-top-0">Loading Elements</h2>
            <p>These are our built-in options to add loaders to a section or page. Make updates in the "loading.scss" file.</p>

            <div class="tabs" data-toggle-group="tabs-loading" data-toggle-group-require-active="true">
                <nav class="tabs__nav">
                    <ul>
                        <li><button class="toggle__switch--on" data-toggle-switch="tab-loading-revolve" data-toggle-parent="tabs-loading">Revolve</button></li>
                        <li><button data-toggle-switch="tab-loading-rotate" data-toggle-parent="tabs-loading">Rotate</button></li>
                        <li><button data-toggle-switch="tab-loading-circle-bounce" data-toggle-parent="tabs-loading">Circle Bounce</button></li>
                        <li><button data-toggle-switch="tab-loading-rectangle-bounce" data-toggle-parent="tabs-loading">Rectangle Bounce</button></li>
                        <li><button data-toggle-switch="tab-loading-pulse" data-toggle-parent="tabs-loading">Pulse</button></li>
                    </ul>
                </nav>

                <div class="tabs__content">
                    <div class="toggle__target toggle__target--visible" data-toggle-target="tab-loading-revolve" data-toggle-target-transition="fade">
                        <div class="loading-container">
                            <div class="loading loading--revolve">
                                <div class="loading__ball"></div>
                                <div class="loading__ball"></div>
                                <div class="loading__ball"></div>
                                <div class="loading__ball"></div>
                            </div>
                        </div>
                    </div>

                    <div class="toggle__target" data-toggle-target="tab-loading-rotate" data-toggle-target-transition="fade">
                        <div class="loading-container">
                            <div class="loading loading--rotate">
                                <div class="loading__rotate-container">
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                </div>

                                <div class="loading__rotate-container">
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                </div>

                                <div class="loading__rotate-container">
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                    <div class="loading__ball"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="toggle__target" data-toggle-target="tab-loading-circle-bounce" data-toggle-target-transition="fade">
                        <div class="loading-container">
                            <div class="loading loading--circle-bounce">
                                <div class="loading__ball"></div>
                                <div class="loading__ball"></div>
                                <div class="loading__ball"></div>
                            </div>
                        </div>
                    </div>
                    <div class="toggle__target" data-toggle-target="tab-loading-rectangle-bounce" data-toggle-target-transition="fade">
                        <div class="loading-container">
                            <div class="loading loading--rectangle-bounce">
                                <div class="loading__box"></div>
                                <div class="loading__box"></div>
                                <div class="loading__box"></div>
                                <div class="loading__box"></div>
                                <div class="loading__box"></div>
                            </div>
                        </div>
                    </div>
                    <div class="toggle__target" data-toggle-target="tab-loading-pulse" data-toggle-target-transition="fade">
                        <div class="loading-container">
                            <div class="loading loading--pulse">
                                <div class="loading__ball"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <hr />

        <section id="social-sharing" class="section">
            <h2 class="section-title u--margin-top-0">Social Sharing</h2>
            <p>We have some built-in functions that make use of data attributes to make sharing on common social networks easier. You can find out more by viewing the "lib/wl-share.js" file.</p>

            <div class="grid u--text-align-center">
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="facebook" data-share-url="<?php the_permalink(''); ?>">
                            <span class="fab fa-facebook"></span>
                        </a>
                    </h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="twitter" data-share-url="<?php the_permalink(''); ?>" data-share-text="<?= get_the_twitter_description($post->ID); ?>" data-share-hash="<?php the_field('twitter_hash_tags'); ?>">
                            <span class="fab fa-twitter"></span>
                        </a>
                    </h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="google" data-share-url="<?php the_permalink(''); ?>">
                            <span class="fab fa-google-plus"></span>
                        </a>
                    </h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="linkedin" data-share-url="<?php the_permalink(''); ?>" data-share-title="<?= get_the_og_title($post->ID); ?>" data-share-text="<?= get_the_og_description($post->ID); ?>">
                            <span class="fab fa-linkedin"></span>
                        </a>
                    </h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="pinterest" data-share-url="<?php the_permalink(''); ?>" data-share-image="<?= get_the_og_image($post->ID); ?>" data-share-text="<?= get_the_og_description($post->ID); ?>">
                            <span class="fab fa-pinterest"></span>
                        </a>
                    </h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="tumblr" data-share-url="<?php the_permalink(''); ?>" data-share-title="<?= get_the_og_title($post->ID); ?>" data-share-text="<?= get_the_og_description($post->ID); ?>">
                            <span class="fab fa-tumblr"></span>
                        </a>
                    </h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="stumbleupon" data-share-url="<?php the_permalink(''); ?>">
                            <span class="fab fa-stumbleupon"></span>
                        </a>
                    </h2>
                </div>
                <div class="grid__col-xs-6 grid__col-sm-3">
                    <h2>
                        <a href="#" data-share-button data-share-on="email" data-share-url="<?php the_permalink(''); ?>" data-share-title="<?= get_the_og_title($post->ID); ?> on <?php bloginfo('name'); ?>" data-share-text="<?= get_the_og_description($post->ID); ?>">
                            <span class="fa fa-envelope"></span>
                        </a>
                    </h2>
                </div>
            </div>
        </section>

        <hr />

        <section id="favicons" class="section">
            <h2 class="section-title u--margin-top-0">Favicons</h2>
            <p>These are our website favicons and app icons.</p>

            <div class="grid">
                <div class="grid__col-md-4">
                    <p>
                        <img src="<?= get_template_directory_uri() ?>/images/app_icon_144x144.png" /><br />
                        iPad 3 Retina (144x144)
                    </p>
                </div>
                <div class="grid__col-md-4">
                    <p>
                        <img src="<?= get_template_directory_uri() ?>/images/app_icon_114x114.png" /><br />
                        iPhone 4 Retina (114x114)
                    </p>
                </div>
                <div class="grid__col-md-4">
                    <p>
                        <img src="<?= get_template_directory_uri() ?>/images/app_icon_72x72.png" /><br />
                        iPad (72x72)
                    </p>
                </div>
            </div>
            <div class="grid">
                <div class="grid__col-md-4">
                    <p>
                        <img src="<?= get_template_directory_uri() ?>/images/app_icon_57x57.png" /><br />
                        iPhone Apple Touch (57x57)
                    </p>
                </div>
                <div class="grid__col-md-4">
                    <p>
                        <img src="<?= get_template_directory_uri() ?>/images/favicon_32x32.png" /><br />
                        Favicon Retina (32x32)
                    </p>
                </div>
                <div class="grid__col-md-4">
                    <p>
                        <img src="<?= get_template_directory_uri() ?>/images/favicon_16x16.png" /><br />
                        Favicon (16x16)
                    </p>
                </div>
            </div>
        </section>
    </div>

    <div id="modal-xs" data-modal="modal-xs" class="modal modal--xs">
        <div class="modal__dialog">
            <div class="modal__content">
                <span class="modal__close" data-modal-close></span>
                <header class="modal__header">
                    <h2 class="modal__title">This is a modal title</h2>
                </header>
                <section class="modal__body">
                    <p>Nostrud ad veniam nulla aute est velit. Esse esse cupidatat amet velit id elit consequat minim ullamco mollit. Excepteur ea laboris adipisicing aliqua proident occaecat do.</p>
                </section>
                <footer class="modal__footer u--text-align-right">
                    <a href="#modal-extra-small" class="btn" data-modal-close>Close</a>
                </footer>
            </div>
        </div>
    </div>

    <div id="modal-sm" data-modal="modal-sm" class="modal modal--sm">
        <div class="modal__dialog">
            <div class="modal__content">
                <span class="modal__close" data-modal-close></span>
                <header class="modal__header">
                    <h2 class="modal__title">This is a modal title</h2>
                </header>
                <section class="modal__body">
                    <p>Nostrud ad veniam nulla aute est velit. Esse esse cupidatat amet velit id elit consequat minim ullamco mollit. Excepteur ea laboris adipisicing aliqua proident occaecat do.</p>
                </section>
                <footer class="modal__footer u--text-align-right">
                    <a href="#modal-extra-small" class="btn" data-modal-close>Close</a>
                </footer>
            </div>
        </div>
    </div>

    <div id="modal-md" data-modal="modal-md" class="modal modal--md">
        <div class="modal__dialog">
            <div class="modal__content">
                <span class="modal__close" data-modal-close></span>
                <header class="modal__header">
                    <h2 class="modal__title">This is a modal title</h2>
                </header>
                <section class="modal__body">
                    <p>Nostrud ad veniam nulla aute est velit. Esse esse cupidatat amet velit id elit consequat minim ullamco mollit. Excepteur ea laboris adipisicing aliqua proident occaecat do.</p>
                </section>
                <footer class="modal__footer u--text-align-right">
                    <a href="#modal-extra-small" class="btn" data-modal-close>Close</a>
                </footer>
            </div>
        </div>
    </div>

    <div id="modal-lg" data-modal="modal-lg" class="modal modal--lg">
        <div class="modal__dialog">
            <div class="modal__content">
                <span class="modal__close" data-modal-close></span>
                <header class="modal__header">
                    <h2 class="modal__title">This is a modal title</h2>
                </header>
                <section class="modal__body">
                    <p>Nostrud ad veniam nulla aute est velit. Esse esse cupidatat amet velit id elit consequat minim ullamco mollit. Excepteur ea laboris adipisicing aliqua proident occaecat do.</p>
                </section>
                <footer class="modal__footer u--text-align-right">
                    <a href="#modal-extra-small" class="btn" data-modal-close>Close</a>
                </footer>
            </div>
        </div>
    </div>

    <div id="modal-xl" data-modal="modal-xl" class="modal modal--xl">
        <div class="modal__dialog">
            <div class="modal__content">
                <span class="modal__close" data-modal-close></span>
                <header class="modal__header">
                    <h2 class="modal__title">This is a modal title</h2>
                </header>
                <section class="modal__body">
                    <p>Nostrud ad veniam nulla aute est velit. Esse esse cupidatat amet velit id elit consequat minim ullamco mollit. Excepteur ea laboris adipisicing aliqua proident occaecat do.</p>
                </section>
                <footer class="modal__footer u--text-align-right">
                    <a href="#modal-extra-small" class="btn" data-modal-close>Close</a>
                </footer>
            </div>
        </div>
    </div>

    <div id="modal-full" data-modal="modal-full" class="modal modal--full">
        <div class="modal__dialog">
            <div class="modal__content">
                <span class="modal__close" data-modal-close></span>
                <header class="modal__header">
                    <h2 class="modal__title">This is a modal title</h2>
                </header>
                <section class="modal__body">
                    <p>Nostrud ad veniam nulla aute est velit. Esse esse cupidatat amet velit id elit consequat minim ullamco mollit. Excepteur ea laboris adipisicing aliqua proident occaecat do.</p>
                </section>
                <footer class="modal__footer u--text-align-right">
                    <a href="#modal-extra-small" class="btn" data-modal-close>Close</a>
                </footer>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>
