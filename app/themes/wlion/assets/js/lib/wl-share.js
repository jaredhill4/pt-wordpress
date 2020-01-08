/**
 * Social Sharing
 * If you need to add more social sites:
 *   1. First add a new function to the main "shareThis()" function below (i.e, "var shareOn_[NAMEOFSITE] = function([VARIABLES]){}")
 *   2. Then add a new conditional statement to be used if the user selects that social site for sharing
 *   3. Finally, ensure that the link you add for that social site follows this format:
 *      <a href="#"
 *      data-share-button
 *      data-share-on="[NAMEOFSITE]"
 *      data-share-url=""
 *      data-share-title=""
 *      data-share-text=""
 *      data-share-image="">
 *    </a>
 *    (Note: All attributes are not used for each site, so you only need to include the ones you need)
 */

// Vendors
import $ from 'jquery';

// Share config
const $shareButton = $('[data-share-button]');

// Define share functions
function shareOnFacebook(shareUrl, popupOptions) {
  window.open(
    `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(
      shareUrl
    )}`,
    'popUpWindow',
    popupOptions
  );
}
function shareOnTwitter(shareUrl, shareText, shareHash, popupOptions) {
  window.open(
    `https://twitter.com/intent/tweet?url=${encodeURIComponent(
      shareUrl
    )}&text=${encodeURIComponent(shareText)}&hashtags=${encodeURIComponent(
      shareHash
    )}`,
    'popUpWindow',
    popupOptions
  );
}
function shareOnGoogle(shareUrl, popupOptions) {
  window.open(
    `https://plus.google.com/share?url=${encodeURIComponent(shareUrl)}`,
    'popUpWindow',
    popupOptions
  );
}
function shareOnLinkedin(shareUrl, shareTitle, shareText, popupOptions) {
  window.open(
    `http://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(
      shareUrl
    )}&title=${encodeURIComponent(shareTitle)}&summary=${encodeURIComponent(
      shareText
    )}`,
    'popUpWindow',
    popupOptions
  );
}
function shareOnPinterest(shareUrl, shareImage, shareText, popupOptions) {
  window.open(
    `http://www.pinterest.com/pin/create/button/?url=${encodeURIComponent(
      shareUrl
    )}&media=${encodeURIComponent(shareImage)}&description=${encodeURIComponent(
      shareText
    )}`,
    'popUpWindow',
    popupOptions
  );
}
function shareOnTumblr(shareUrl, shareTitle, shareText, popupOptions) {
  window.open(
    `http://www.tumblr.com/share/link?url=${encodeURIComponent(
      shareUrl
    )}&name=${encodeURIComponent(shareTitle)}&description=${encodeURIComponent(
      shareText
    )}`,
    'popUpWindow',
    popupOptions
  );
}
function shareOnStumbleupon(shareUrl, popupOptions) {
  window.open(
    `http://www.stumbleupon.com/badge/?url=${encodeURIComponent(shareUrl)}`,
    'popUpWindow',
    popupOptions
  );
}
function shareOnEmail(shareUrl, shareTitle, shareText) {
  window.location.href = `mailto:?subject=${encodeURIComponent(
    shareTitle
  )}&body=${encodeURIComponent(shareText)}%0D%0A%0D%0A${encodeURIComponent(
    shareUrl
  )}`;
}

// Share function
const shareThis = event => {
  // Prevent default action
  event.preventDefault();

  // Retrieve data
  const shareOn = $(event.currentTarget).data('share-on'); // Determines which site to share to
  const shareUrl = $(event.currentTarget).data('share-url'); // For all sites
  const shareTitle = $(event.currentTarget).data('share-title'); // For LinkedIn, Tumblr and Email
  const shareText = $(event.currentTarget).data('share-text'); // For Twitter, LinkedIn, Pinterest, Tumblr and Email
  const shareHash = $(event.currentTarget).data('share-hash'); // For Twitter only
  const shareImage = $(event.currentTarget).data('share-image'); // For Pinterest only
  const popupOptions =
    'height=436,width=626,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes';

  // Determine where to share
  switch (shareOn) {
    case 'facebook':
      shareOnFacebook(shareUrl, popupOptions);
      break;
    case 'twitter':
      shareOnTwitter(shareUrl, shareText, shareHash, popupOptions);
      break;
    case 'google':
      shareOnGoogle(shareUrl, popupOptions);
      break;
    case 'linkedin':
      shareOnLinkedin(shareUrl, shareTitle, shareText, popupOptions);
      break;
    case 'pinterest':
      shareOnPinterest(shareUrl, shareImage, shareText, popupOptions);
      break;
    case 'tumblr':
      shareOnTumblr(shareUrl, shareTitle, shareText, popupOptions);
      break;
    case 'stumbleupon':
      shareOnStumbleupon(shareUrl, popupOptions);
      break;
    case 'email':
      shareOnEmail(shareUrl, shareTitle, shareText);
      break;
    default:
      break;
  }
};

// Click function
$shareButton.on('click', shareThis);
