<?php

if (!class_exists('Plyyr_Shortcodes')) {

  class Plyyr_Shortcodes
  {

    public function __construct()
    {
      // register shortcodes
      add_shortcode('gcn', array(&$this, 'create_gcn_embed_code'));
      add_shortcode('plyyr-item', array(&$this, 'create_gcn_embed_code'));
      add_shortcode('plyyr', array(&$this, 'create_plyyr_embed_code'));
      add_shortcode('plyyr-section', array(&$this, 'create_plyyr_embed_code'));
    }
    
    public function getPortalCode()
    {
      $portal = trim(get_option('plyyr_setting_portal',  'plyyr'));
      if (!$portal) {
        $portal = 'plyyr';
      }
      return $portal;
    }

    /**
     * Allows to embed a plyyr item script code in wordpress friendly format.
     * Usage: <code>[plyyr-item quiz="trivia_quiz_54cbcf1246a10"]</code>
     */
    public function create_gcn_embed_code($atts, $content = null)
    {
      extract(shortcode_atts(array(
          'quiz' => '',
          'portal' => '',
                      ), $atts));
      
      $portal = $this->getPortalCode();
      $error = "
		<div style='border: 20px solid red; border-radius: 40px; padding: 40px; margin: 50px 0 70px;'>
			<h3>Ooops!</h3>
			<p style='margin: 0;'>Something is wrong with your plyyr-item shortcode. You need to specify a quiz id
            and check that your portal code \"$portal\" is enabled on plyyr. You can always remove it from the 
              <a href=\"/wp-admin/options-general.php?page=plyyr\">settings</a>. ({BRANCH}).</p>
		</div>";

      if (!$quiz) {
        return str_replace('{BRANCH}', '1', $error);
      } else {
        $response = file_get_contents("https://games.gamecloudnetwork.com/game/basic/$quiz?portal=$portal&plugin=wordpress");
        if ($response) {
          $content = json_decode($response, true);
        }

        if ($content) {
          if (isset($content['type']) && $content['type'] == 'error') {
            return str_replace('{BRANCH}', '2', $error);
          }
        } else {
          return str_replace('{BRANCH}', '3', $error);
        }

        $powered_link = '<a target="_blank" href="' . $content['plyyr_link'] . '">Powered by Plyyr.com</a><br>';
        $hook = '<h2>' . $content['description'] . '</h2><br>' . $content['embed_code'] . '<br>' . $powered_link;

        return $hook;
      }
    }

    /**
     * Allows to embed the plyyr iframe code in wordpress friendly format.
     * Usage: <code>[plyyr portal="yourportalcode" style="width: 300px; height: 2000px; float: left"]</code>
     * If you are not sure about the style don't include the parameter.
     */
    public function create_plyyr_embed_code($atts, $content = null)
    {
      extract(shortcode_atts(array(
          'style' => ''
                      ), $atts));

      //Do we have a portal code?
      $portal = $this->getPortalCode();

      if (!$portal) {

        $portal = 'plyyr';

      } else {

        $style = !$style ? "width: 795px; height: 2000px; float: left;" : $style;

        $hook = '<div class="gcntargets" style="' . $style . '" '
                . 'gcn-portal="' . $portal . '"></div>'
                . '<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "https://s3.amazonaws.com/gcn-static-assets/jsmodules/plyyr_embedder.js"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "gameplayer-gcn"));</script>';

        $hook .= '<a target="_blank" href="http://plyyr.com">Powered by Plyyr.com</a>';
        return "$hook";
      }
    }

  }

}
