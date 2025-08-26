<?php

/**
 * @package Alicade
 */

namespace Inc\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        if (get_option('alicade')) {
            return;
        }

        $default = array();
        update_option('alicade', $default);
    }
}
