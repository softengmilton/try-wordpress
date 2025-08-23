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

        $this->setSettings();
        $this->setSections();
        $this->setFields();

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
                'callback'   => array($this->callbacks, 'adminDashboard'),
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
                'callback'   => array($this->callbacks, 'adminCpt'),
            ),
            array(
                'parent_slug' => 'alicade',
                'page_title' => 'Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade_taxonomies',
                'callback'   => array($this->callbacks, 'adminTaxonomy'),
            ),
            array(
                'parent_slug' => 'alicade',
                'page_title' => 'Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug'  => 'alicade_widget',
                'callback'   => array($this->callbacks, 'adminWidget'),
            ),
        );
    }

    public function setSettings()
    {
        $args = array(
            array(
                'option_group' => 'alicad_options_group',
                'option_name'  => 'text_example',
                'callback'     => array($this->callbacks, 'alicadOptionsGroup')
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            array(
                'id'        => 'alicade_admin_index',
                'title'     => 'Settings',
                'callback'  => array($this->callbacks, 'alicadAdminSection'),
                'page'      =>  'alicade',
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields()
    {
        $args = array(
            array(
                'id'        => 'aliced_admin_index',
                'title'     => 'Settings',
                'callback'  => array($this->callbacks, 'alicadTextExample'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'text_example',
                    'class'     => 'example-class',

                )
            )
        );

        $this->settings->setFields($args);
    }
}
