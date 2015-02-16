<?php

/*
  Plugin Name: Plyyr quiz post generator
  Description: Captures requests that contain the plyyr parameter and generates a new post with the correspondent quiz embedded on it. Example: http://your-site.com?plyyr=quiz-54d507967664c-how-does-golf-work generates a post with the quiz "How does golf work?" embedded on it. If no quiz is found the user is redirected to your 404 page. Use it on combination with the plyyr iframe and generate instant content for your site.
  Version: 0.6
  Author: Lucia Figueroa
 */

/*  Copyright 2015 Lucia Figueroa <lucia.ftasca@gmail.com>

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if (!class_exists('Plyyr')) {

  class Plyyr
  {

    /**
     * Construct the plugin object
     */
    public function __construct()
    {
      // Initialize Settings
      require_once(sprintf("%s/plyyr_settings.php", dirname(__FILE__)));
      $Plyyr_Settings = new Plyyr_Settings();

      // Register custom post types
      require_once(sprintf("%s/post-types/plyyr_template.php", dirname(__FILE__)));
      $Plyyr_Template = new Plyyr_Template();
      
      // Register shortcodes
      require_once(sprintf("%s/shortcodes/plyyr_shortcodes.php", dirname(__FILE__)));
      $Plyyr_Shortcodes = new Plyyr_Shortcodes();

      $plugin = plugin_basename(__FILE__);
      add_filter("plugin_action_links_$plugin", array($this, 'plugin_settings_link'));
    }

    /**
     * Activate the plugin
     */
    public static function activate()
    {
      // Do nothing
    }

    /**
     * Deactivate the plugin
     */
    public static function deactivate()
    {
      flush_rewrite_rules();
    }

    /**
     * Add the settings link to the plugins page
     */
    function plugin_settings_link($links)
    {
      $settings_link = '<a href="options-general.php?page=plyyr">Settings</a>';
      array_unshift($links, $settings_link);
      return $links;
    }

  }

}

if (class_exists('Plyyr')) {
  // Installation and uninstallation hooks
  register_activation_hook(__FILE__, array('Plyyr', 'activate'));
  register_deactivation_hook(__FILE__, array('Plyyr', 'deactivate'));

  // instantiate the plugin class
  $wp_plugin_template = new Plyyr();
}
