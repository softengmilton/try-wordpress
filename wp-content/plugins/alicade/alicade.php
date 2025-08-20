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

// if(!defined('ABSPATH'))
// {
//     die;
// }

// defined('ABSPATH') or die("Hey, you can't access this file, you silly human!");


if (! function_exists('add_action')) {
    echo "Hey, you can't access this file, you silly human!";
    die;
}


class Alicade
{
    function __construct($string)
    {
        echo $string;
    }

    function activate()
    {
        // generate CPT
        // flush rewrite the rules
    }

    function deactivate()
    {
        // flush rewrite the rules
    }

    function uninstall()
    {
        // delete CPT
        // delete all the plugin data from the DB
    }
}

if (class_exists('Alicade')) {
    $alicade = new Alicade("This is alicade plugin");
}

// activation
register_activation_hook(__FILE__, array($alicade, 'activate'));

// deactivation
register_deactivation_hook(__FILE__, array($alicade, 'deactivate'));
// uninstall