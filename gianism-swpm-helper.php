<?php
/**
 * Plugin Name: Gianism SWPM Helper
 * Plugin URI: https://github.com/hametuha/gianism-swpm-helper
 * Description: GianismをSimple Membershipに連携させるためのプラグインです。
 * Author: Hametuha INC.
 * Version: 1.0.0
 * Author URI: https://hametuha.co.jp
 * License: GPL2 or Later
 */

/*
    Copyright 2021 Hametuha INC.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Don't allow plugin to be loaded directory.
defined( 'ABSPATH' ) || die( 'Do not load directly.' );

// Load all related files.
add_action( 'plugins_loaded', function () {
	if ( is_dir( __DIR__ . '/inc' ) ) {
		foreach ( scandir( __DIR__ . '/inc' ) as $file ) {
			if ( preg_match( '/\.php$/u', $file ) ) {
				require __DIR__ . '/inc/' . $file;
			}
		}
	}
}, 11 );
