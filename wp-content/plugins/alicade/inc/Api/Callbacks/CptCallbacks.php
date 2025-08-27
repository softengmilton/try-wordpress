<?php

/**
 * @package Alicade
 */

namespace Inc\Api\CallBacks;

use Inc\Base\BaseController;

class CptCallbacks extends BaseController
{

    public function cptSanitize($input)
    {
        return $input;
    }

    public function cptSectionManager()
    {
        echo 'Create as many Custom Post Types as you want.';
    }

    public function textField($args)
    {
        $name = $args['label_for'];
        $option_name = $args['option_name'];
        $value = '';

        if (isset($_POST["edit_post"])) {
            $input = get_option($option_name);
            $value = $input[$_POST["edit_post"]][$name];
        }

        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="' . $value . '" placeholder="' . $args['placeholder'] . '" required>';
    }


    public function checkboxField($args)
    {
        $name = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        $checked = isset($checkbox[$name]) ? ($checkbox[$name] ? true : false) : false;

        echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[' . $name . ']" value="1" class="" ' . ($checked ? 'checked' : '') . '><label for="' . $name . '"><div></div></label></div>';
    }
}
