<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;
    public $pages = array();

    public function __construct()
    {
        $this->settings = new SettingsApi;

        $this->pages = array(
            array(
                'page_title' => 'Alicade Plugin',
                'menu_title' => 'Alicade',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade',
                'callback'   => function () {
                    echo '<h1>Plugin</h1>';
                },
                'icon_url'   => 'dashicons-store',
                'position'   => 110,
            ),
        );
    }

    public function register()
    {
        $this->settings->AddPages($this->pages)->register();
    }
}
