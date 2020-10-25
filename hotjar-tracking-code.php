<?php
/**
 * Plugin Name:     Hotjar Tracking Code
 * Plugin URI:      https://github.com/claytoncollie/hotjar-tracking-code
 * Description:     Simple, lightweight solution for inserting your Hotjar tracking code.
 * Author:          Clayton Collie
 * Author URI:      https://github.com/claytoncollie
 * Text Domain:     hotjar-tracking-code
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Content_Pilot_Instant_Search
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/inc/admin.php';
require_once __DIR__ . '/inc/public.php';
