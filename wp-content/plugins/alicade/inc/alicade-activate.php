<?php

/**
 * @package Alicade
 */

class AlicadeActivate
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}
