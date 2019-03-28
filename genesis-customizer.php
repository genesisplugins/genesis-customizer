<?php
/**
 * Genesis Customizer
 *
 * Plugin Name: Genesis Customizer
 * Version:     0.1.12
 * Text Domain: genesis-customizer
 * Plugin URI:  https://genesiscustomizer.com/
 * Description: Core functionality plugin for the Genesis Customizer theme.
 * Author:      Genesis Plugins
 * Author URI:  https://genesisplugins.com/
 * GitHub URI:  https://github.com/genesisplugins/genesis-customizer/
 * Domain Path: /languages
 * License:     GPL-3.0-or-later
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 *
 * @package   GenesisPlugins\GenesisCustomizer
 * @link      https://genesiscustomizer.com
 * @author    Genesis Customizer
 * @copyright Copyright © 2019 Genesis Plugins
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
