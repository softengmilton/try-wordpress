<?php

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\CallBacks\AdminCallbacks;
use \Inc\Api\CallBacks\ManagerCallbacks;

class Admin extends BaseController
{
    public $settings;

    public $callbacks;

    public $callbacks_mngr;

    public $pages = array();

    public $subpages = array();

    public function register()
    {
        $this->settings = new SettingsApi;

        $this->callbacks = new AdminCallbacks;

        $this->callbacks_mngr = new ManagerCallbacks;

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
        $args = array();
        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => $key,
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            );
        }

        $this->settings->setSettings($args);
    }



    public function setSections()
    {
        $args = array(
            array(
                'id'        => 'alicade_admin_index',
                'title'     => 'Settings Manger',
                'callback'  => array($this->callbacks_mngr, 'adminSectionManager'),
                'page'      =>  'alicade',
            )
        );

        $this->settings->setSections($args);
    }


    public function setFields()
    {
        $args = array();

        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'id'        => $key,
                'title'     => 'Activate ' . $value,
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      => 'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'option_name' => 'alicade_plugin', // consistent with setSettings
                    'label_for'   => $key,
                    'class'       => 'ui-toggle'
                )
            );
        }

        $this->settings->setFields($args); // actually register fields
    }
}
