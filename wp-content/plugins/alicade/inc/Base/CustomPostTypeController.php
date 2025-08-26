<?php

/**
 * @package Alicade
 */

namespace Inc\Base;

use Inc\Api\CallBacks\AdminCallbacks;
use Inc\Api\SettingsApi;
use \Inc\Base\BaseController;

class CustomPostTypeController extends BaseController
{
    public $callbacks;
    public $settings;
    public $subpages = array();

    public function register()
    {
        $option = get_option('alicade');
        $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

        if (! $activated) return;

        $this->settings = new SettingsApi();
        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages($this->subpages)->register();
        add_action('init', array($this, 'activate'));
    }


    public function activate()
    {
        register_post_type('alicade_products', array(
            'labels' => array(
                'name' => 'Products',
                'singular_name' => 'Product'
            ),
            'public' => true,
            'has_archive' => true,
        ));
    }

    public function setSubPages()
    {
        $this->subpages = array(
            array(
                'parent_slug' => 'alicade',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT Manager',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade_cpt',
                'callback'   => array($this->callbacks, 'adminCpt'),
            ),
        );
    }
}
