<?php

/**
 * @package Alicade
 */

class AlicadeDeactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
