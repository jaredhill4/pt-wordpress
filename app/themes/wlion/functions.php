<?php
/**
 * White Lion Wordpress Theme
 * http://wlion.com
 * Copyright (C) 2018, White Lion Interactive
 *
 * Title: Functions
 * Description: Require all theme functions files.
 * Documentation: http://codex.wordpress.org/Functions_File_Explained
 */

require_once('lib/helpers.php');                 // Global helper functions
require_once('lib/assets.php');                  // Manage theme assets
require_once('lib/admin.php');                   // Functions for customizing the admin interface
require_once('lib/email.php');                   // Custom email template functions
require_once('lib/metadata.php');                // Functions for declaring metadata
require_once('lib/nav-menus.php');               // Register navigation menus
require_once('lib/pagination.php');              // Setup Bootstrap pagination
require_once('lib/post-types.php');              // Register theme post-types
require_once('lib/shortcodes.php');              // Register theme shortcodes
require_once('lib/theme-setup.php');             // Theme setup functions
require_once('lib/widgets.php');                 // Register custom widgets
require_once('lib/widget-areas.php');            // Create widget areas

// Vendor Overrides
require_once('lib/vendor-acf.php');              // Advanced Custom Fields Overrides
require_once('lib/vendor-cf7.php');              // Contact Form 7 Overrides
require_once('lib/vendor-relevanssi.php');       // Relevanssi Overrides

// AJAX
require_once('lib/ajax-search-autosuggest.php'); // Search Auto-suggest
