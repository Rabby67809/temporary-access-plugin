<?php
/**
 * Plugin Name: Temporary Access Live Control
 * Description: Give scoped, time-limited content access with live monitoring, granular permissions, approvals, rollback, notifications, and session reports.
 * Version: 0.4.0
 * Requires at least: 6.5
 * Requires PHP: 8.0
 * Author: Rabby67809
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: temporary-access-live
 */

defined( 'ABSPATH' ) || exit;
define( 'TAL_VERSION', '0.4.0' );
define( 'TAL_FILE', __FILE__ );
define( 'TAL_DIR', __DIR__ . '/' );

require_once TAL_DIR . 'includes/class-tal-policy.php';
require_once TAL_DIR . 'includes/class-tal-store.php';
require_once TAL_DIR . 'includes/class-tal-plugin.php';
require_once TAL_DIR . 'includes/class-tal-admin.php';

register_activation_hook( __FILE__, array( 'TAL_Store', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'TAL_Store', 'deactivate' ) );
add_action( 'plugins_loaded', static function () {
	TAL_Store::maybe_upgrade();
	TAL_Plugin::boot();
	TAL_Admin::boot();
} );
