<?php
/**
 * Partial: Share Modal
 * Description: Contains additional social sharing options than what appears in blog posts.
 */
$post_id = wl_get_post_id();
?>
<div id="modal-share" class="modal modal--valign-center" data-modal="modal-share" tabindex="-1" role="dialog" aria-labelledby="modal-share-label">
    <div class="modal__dialog" role="document">
        <div class="modal__content">
            <span class="modal__close" data-modal-close aria-label="Close"></span>
            <header class="modal__header">
                <h4 class="modal__title" id="modal-share-label">Share this Page</h4>
            </header>
            <section class="modal__body u--text-align-center">
                <div class="grid grid--middle">
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="facebook" data-share-url="<?php the_permalink(); ?>">
                            <span class="fab fa-facebook"></span> Facebook
                        </a>
                    </div>
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="twitter" data-share-url="<?php the_permalink(); ?>" data-share-text="<?= get_the_twitter_description($post_id); ?>" data-share-hash="<?php the_field('twitter_hash_tags'); ?>">
                            <span class="fab fa-twitter"></span> Twitter
                        </a>
                    </div>
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="google" data-share-url="<?php the_permalink(); ?>">
                            <span class="fab fa-google-plus"></span> Google Plus
                        </a>
                    </div>
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="linkedin" data-share-url="<?php the_permalink(); ?>" data-share-title="<?= get_the_og_title($post_id); ?>" data-share-text="<?= get_the_og_description($post_id); ?>">
                            <span class="fab fa-linkedin"></span> LinkedIn
                        </a>
                    </div>
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="pinterest" data-share-url="<?php the_permalink(); ?>" data-share-image="<?= get_the_og_image($post_id); ?>" data-share-text="<?= get_the_og_description($post_id); ?>">
                            <span class="fab fa-pinterest"></span> Pinterest
                        </a>
                    </div>
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="tumblr" data-share-url="<?php the_permalink(); ?>" data-share-title="<?= get_the_og_title($post_id); ?>" data-share-text="<?= get_the_og_description($post_id); ?>">
                            <span class="fab fa-tumblr"></span> Tumblr
                        </a>
                    </div>
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="stumbleupon" data-share-url="<?php the_permalink(); ?>">
                            <span class="fab fa-stumbleupon"></span> StumbleUpon
                        </a>
                    </div>
                    <div class="grid__col-xs-6">
                        <a href="#" class="btn btn--primary btn--block btn--lg" data-share-button data-share-on="email" data-share-url="<?php the_permalink(); ?>" data-share-title="<?= get_the_og_title($post_id); ?> on <?php bloginfo('name'); ?>" data-share-text="<?= get_the_og_description($post_id); ?>">
                            <span class="fab fa-envelope"></span> Email
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
