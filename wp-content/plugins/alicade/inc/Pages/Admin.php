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
        $args = array(
            // array(
            //     'option_group' => 'alicad_options_group',
            //     'option_name'  => 'text_example',
            //     'callback'     => array($this->callbacks, 'alicadOptionsGroup')
            // ),
            // array(
            //     'option_group' => 'alicad_options_group',
            //     'option_name'  => 'first_name',
            // ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'cpt_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'taxonomy_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'media_widget',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'gallery_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'testimonial_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'templates_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'login_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'membership_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
            array(
                'option_group' => 'alicad_plugin_settings',
                'option_name'  => 'chat_manager',
                'callback'     => array($this->callbacks, 'checkboxSanitize')
            ),
        );

        $this->settings->setSettings($args);
    }

    public function setSections()
    {
        $args = array(
            // array(
            //     'id'        => 'alicade_admin_index',
            //     'title'     => 'Settings',
            //     'callback'  => array($this->callbacks, 'alicadAdminSection'),
            //     'page'      =>  'alicade',
            // ),
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
        $args = array(
            // array(
            //     'id'        => 'text_example',
            //     'title'     => 'Text Example',
            //     'callback'  => array($this->callbacks, 'alicadTextExample'),
            //     'page'      =>  'alicade',
            //     'section'   => 'alicade_admin_index',
            //     'args'      => array(
            //         'label_for' => 'text_example',
            //         'class'     => 'example-class',

            //     )
            // ),
            // array(
            //     'id'        => 'first_name',
            //     'title'     => 'First Name',
            //     'callback'  => array($this->callbacks, 'alicadFirstName'),
            //     'page'      =>  'alicade',
            //     'section'   => 'alicade_admin_index',
            //     'args'      => array(
            //         'label_for' => 'text_example',
            //         'class'     => 'example-class',

            //     )
            // ),
            array(
                'id'        => 'cpt_manager',
                'title'     => 'Activate CPT Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'cpt_manager',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'taxonomy_manager',
                'title'     => 'Activate Taxonomy Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'taxonomy_manager',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'media_widget',
                'title'     => 'Activate Widget Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'media_widget',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'gallery_manager',
                'title'     => 'Activate Gallery Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'gallery_manager',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'testimonial_manager',
                'title'     => 'Activate Testimonial Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'testimonial_manager',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'templates_manager',
                'title'     => 'Activate Templates Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'templates_manager',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'login_manager',
                'title'     => 'Activate login Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'login_manager',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'membership_manager',
                'title'     => 'Activate Membership Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'membership_manager',
                    'class'     => 'ui-toggle'

                )
            ),
            array(
                'id'        => 'chat_manager',
                'title'     => 'Activate Chat Manager',
                'callback'  => array($this->callbacks_mngr, 'checkboxField'),
                'page'      =>  'alicade',
                'section'   => 'alicade_admin_index',
                'args'      => array(
                    'label_for' => 'chat_manager',
                    'class'     => 'ui-toggle'

                )
            ),
        );

        $this->settings->setFields($args);
    }
}
