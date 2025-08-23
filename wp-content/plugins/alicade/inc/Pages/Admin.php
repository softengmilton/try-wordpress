<?php

namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin extends BaseController
{
    public $settings;
    public $pages = array();
    public $subpages = array();

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

        $this->subpages = array(
            array(
                'parent_slug' => 'alicade',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'Cpt',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade_cpt',
                'callback'   => function () {
                    echo '<h1>Custom Post type manager </h1>';
                },
            ),
            array(
                'parent_slug' => 'alicade',
                'page_title' => 'Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade_taxonomies',
                'callback'   => function () {
                    echo '<h1>Taxonomies Manager </h1>';
                },
            ),
            array(
                'parent_slug' => 'alicade',
                'page_title' => 'Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade_widget',
                'callback'   => function () {
                    echo '<h1>Widget Manger</h1>';
                },
            ),
        );
    }

    public function register()
    {
        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
}
