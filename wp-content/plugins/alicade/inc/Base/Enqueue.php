<?php

/**
 * @package Alicade
 */

namespace Inc\Base;

use \Inc\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function enqueue()
    {
        wp_enqueue_style('mypluginstyle', $this->plugin_url . '/assets/style.css');
        wp_enqueue_script('mypluginscript', $this->plugin_url . '/assets/script.js');
    }
}
