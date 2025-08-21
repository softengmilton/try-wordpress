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
// if (! function_exists('add_action')) {
//     echo "Hey, you can't access this file, you silly human!";
//     die;
// }

defined('ABSPATH') or die("Hey, you can't access this file, you silly human!");

if (! class_exists('Alicade')) {
    class Alicade
    {
        function __construct()
        {
            add_action('init', array($this, 'custom_post_type'));
        }

        function register()
        {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));
        }



        function custom_post_type()
        {
            register_post_type('book', ['public' => true, 'label' => 'Books']);
        }

        function enqueue()
        {
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assets/script.js', __FILE__));
        }
    }
    $alicade = new Alicade();
    $alicade->register();
    // activation
    require_once  plugin_dir_path(__FILE__) . 'inc/alicade-activate.php';
    register_activation_hook(__FILE__, array('AlicadeActivate', 'activate'));

    // deactivation
    require_once  plugin_dir_path(__FILE__) . 'inc/alicade-deactivate.php';
    register_deactivation_hook(__FILE__, array('AlicadeDeactivate', 'deactivate'));
}
