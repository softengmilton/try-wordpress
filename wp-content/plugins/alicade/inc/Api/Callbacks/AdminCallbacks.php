<?php

/**
 * @package Alicade
 */

namespace Inc\Api\CallBacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    function AdminDashboard()
    {
        return require_once("$this->plugin_path" . "/templates/admin.php");
    }
}
