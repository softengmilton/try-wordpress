<?php

/**
 * @package Alicade
 */

namespace Inc\Api\CallBacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    function adminDashboard()
    {
        return require_once("$this->plugin_path" . "/templates/admin.php");
    }

    function adminCpt()
    {
        return require_once("$this->plugin_path" . "/templates/cpt.php");
    }

    function adminTaxonomy()
    {
        return require_once("$this->plugin_path" . "/templates/taxonomy.php");
    }

    function adminWidget()
    {
        return require_once("$this->plugin_path" . "/templates/widget.php");
    }

    function alicadOptionsGroup($input)
    {
        return $input;
    }

    function alicadAdminSection()
    {
        echo "Check the beautiful section";
    }

    function alicadTextExample()
    {
        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="' . $value . '" placeholder="Write something Here!">';
    }
}
