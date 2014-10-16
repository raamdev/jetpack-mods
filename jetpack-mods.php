<?php
/*
Plugin Name: Jetpack Mods

Version: 140323
Stable tag: 140323
Requires at least: 2.9.2
Tested up to: 3.8

Plugin URI: http://wordpress.org/extend/plugins/jetpack-mods
Description: Provides various enhacements to the Jetpack plugin, including simplified sharing icons and tweaks to Publicize.

Text Domain: jetpack-mods
Domain Path: /langs

Author: Raam Dev
Author URI: http://raamdev.com/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=82JLPADVDAB2Q
Contributors: raamdev

License: GNU General Public License v3 or later.

*/

if(!defined('WPINC')) // MUST have WordPress.
	exit('Do NOT access this file directly: '.basename(__FILE__));


/** Get a list of active JetPack modules so that we only load enhancements for those modules */
$jetpack_active_modules = get_option('jetpack_active_modules');

/**
 * Enhancements to the JetPack Publicize Module
 *
 * - If the post being publicized is an Aside post format
 *   the entire post content will be used as the custom message
 *   if the post content is 100 characters or less.
 */
if ( $jetpack_active_modules && in_array( 'publicize', $jetpack_active_modules ) ) {
	require_once('modules/publicize.php');
}