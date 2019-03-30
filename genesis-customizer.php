<?php
/**
 * Genesis Customizer
 *
 * Plugin Name: Genesis Customizer
 * Version:     0.1.13
 * Text Domain: genesis-customizer
 * Plugin URI:  https://genesiscustomizer.com/
 * Description: Core functionality plugin for the Genesis Customizer theme.
 * Author:      SEO Themes
 * Author URI:  https://seothemes.com/
 * GitHub URI:  https://github.com/seothemes/genesis-customizer/
 * Domain Path: /languages
 * License:     GPL-3.0-or-later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 *
 * @package   SeoThemes\GenesisCustomizer
 * @link      https://genesiscustomizer.com
 * @author    Genesis Customizer
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

// Check compatibility.
if ( ! require_once __DIR__ . '/src/bootstrap/compat.php' ) {
	return;
}

// Load helper functions.
require_once __DIR__ . '/src/bootstrap/helpers.php';

// Do plugin setup.
require_once __DIR__ . '/src/bootstrap/setup.php';

// Load plugin files.
require_once __DIR__ . '/src/bootstrap/autoload.php';
