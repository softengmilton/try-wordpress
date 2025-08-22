<?php

/**
 * @package Alicade
 */

/**
 * Plugin Name: Alicade
 * Plugin URI: http://alicade.com
 * Description: This is my first plugin
 * Version: 1.0.0
 * Author: Alicade 
 * Author URI:http://alicade.com
 * License: GPLv2 or later
 * Text Domain: alicade
 */

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the free software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

defined('ABSPATH') or die("Hey, you can't access this file, you silly human!");


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Define CONSTANTS
define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN', plugin_basename(__FILE__));

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * The code that runs during plugin deactivate
 */
function activate_alicade_plugin()
{
    Activate::activate();
}

/**
 * The code that runs during plugin deactivate
 */
function deactivate_alicade_plugin()
{
    Deactivate::deactivate();
}

register_activation_hook(__FILE__, 'activate_alicade_plugin');
register_deactivation_hook(__FILE__, 'deactivate_alicade_plugin');

/**
 * Initialize all the core classes of the plugin 
 */
if (class_exists('Inc\\Init')) {
    Inc\Init::register_services();
}
