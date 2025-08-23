<?php

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\CallBacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi;

        $this->callbacks = new AdminCallbacks;

        $this->addPages();

        $this->addSubPages();

        $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }

    public function addPages()
    {
        $this->pages = array(
            array(
                'page_title' => 'Alicade Plugin',
                'menu_title' => 'Alicade',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade',
                'callback'   => array($this->callbacks, 'AdminDashboard'),
                'icon_url'   => 'dashicons-store',
                'position'   => 110,
            ),
        );
    }


    public function addSubPages()
    {
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
}
