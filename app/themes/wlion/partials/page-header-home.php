<?php
/**
 * Partial: Page Header - Home
 * Description: The header for the home page.
 */

if (get_field('hero_slides')): ?>
    <?php $hero_slides = get_field('hero_slides'); ?>
    <section class="hero-carousel">
        <div data-carousel="single">
            <?php foreach ($hero_slides as $hero): ?>
                <div class="hero" style="background-image: url('<?= $hero['image']['sizes']['hero-home'] ?>');">
                    <div class="hero__overlay">
                        <div class="hero__content">
                            <div class="container">
                                <div class="grid">
                                    <div class="grid__col-xs-12 grid__col-md-8 grid__col-lg-6">
                                        <?php if ($hero['title']): ?>
                                            <h1><?= $hero['title'] ?></h1>
                                        <?php endif; ?>
                                        <?php if ($hero['text']): ?>
                                            <p class="p--lead"><?= $hero['text'] ?></p>
                                        <?php endif; ?>
                                        <?php if ($hero['button_text'] and $hero['button_link']): ?>
                                            <p><a href="<?= $hero['button_link'] ?>" class="btn btn--primary btn-lg"><?= $hero['button_text'] ?></a></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php endif; ?>
