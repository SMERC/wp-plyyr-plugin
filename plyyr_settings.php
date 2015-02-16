<?php

if (!class_exists('Plyyr_Settings')) {

  class Plyyr_Settings
  {

    /**
     * Construct the plugin object
     */
    public function __construct()
    {
      // register actions
      add_action('admin_init', array(&$this, 'admin_init'));
      add_action('admin_menu', array(&$this, 'add_menu'));
    }

    /**
     * hook into WP's admin_init action hook
     */
    public function admin_init()
    {
      // register your plugin's settings
      register_setting('plyyr-group', 'plyyr_setting_portal');

      // add description section
      add_settings_section(
              'plyyr-section', '', array(&$this, 'settings_section_plyyr'), 'plyyr'
      );
    }

    public function settings_section_plyyr()
    {
      // add your setting's fields
      add_settings_field(
              'plyyr_setting_portal', 'Portal code', array(&$this, 'settings_portal_code'), 'plyyr', 'plyyr-section', array(
          'field' => 'plyyr_setting_portal'
              )
      );
    }

    /**
     * This function provides text inputs for settings fields
     */
    public function settings_portal_code($args)
    {
      $help = 'Any revenue you generate with your posts is going to be associated to this code. '
              . 'You can get it from <a href="http://plyyr.com/publishers" target="_blank">http://plyyr.com/publishers</a><br>'
              . 'By registering a portal code you can customize your widgets and get benefits from the plyyr platform.';
      // Get the field name from the $args array
      $field = $args['field'];
      
      // Get the value of this setting
      $value = get_option($field);

      // echo a proper input type="text"
      echo sprintf('<input type="text" name="%s" id="%s" value="%s" placeholder="" />'
              . '<p>%s</p>', $field, $field, $value, $help);
    }

    /**
     * add a menu
     */
    public function add_menu()
    {
      // Add a page to manage this plugin's settings
      add_options_page(
              'WP Plugin Template Settings', 'WP Plugin Template', 'manage_options', 'plyyr', array(&$this, 'plugin_settings_page')
      );
    }

    /**
     * Menu Callback
     */
    public function plugin_settings_page()
    {
      if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
      }

      // Render the settings template
      include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
    }

// END public function plugin_settings_page()
  }

}
