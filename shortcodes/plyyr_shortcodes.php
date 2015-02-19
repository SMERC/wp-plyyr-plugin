<?php

if (!class_exists('Plyyr_Shortcodes')) {

  class Plyyr_Shortcodes
  {

    public function __construct()
    {
      // register shortcodes
      add_shortcode('gcn', array(&$this, 'create_gcn_embed_code'));
      add_shortcode('plyyr', array(&$this, 'create_plyyr_embed_code'));
    }

    /**
     * Allows to embed gcn script code in wordpress friendly format.
     * Usage: <code>[gcn quiz="trivia_quiz_54cbcf1246a10"]</code>
     */
    public function create_gcn_embed_code($atts, $content = null)
    {
      extract(shortcode_atts(array(
          'quiz' => '',
          'portal' => '',
                      ), $atts));
      $error = "
		<div style='border: 20px solid red; border-radius: 40px; padding: 40px; margin: 50px 0 70px;'>
			<h3>Ooops!</h3>
			<p style='margin: 0;'>Something is wrong with your Gcn shortcode. You need to specify a quiz id and a portal code ({BRANCH}).</p>
		</div>";

      if (!$quiz) {
        return str_replace('{BRANCH}', '1', $error);
      } else {
        //Do we have a portal code?
        if (!$portal) {
          $portal = get_option('plyyr_setting_portal', 'plyyr');
        }

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

        $hook = $content["embed_code"];

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
          'portal' => '',
          'style' => ''
                      ), $atts));

      //Do we have a portal code?
      if (!$portal) {
        $portal = get_option('plyyr_setting_portal',  'plyyr');
      }

      if (!$portal) {

        $error = "
		<div style='border: 20px solid red; border-radius: 40px; padding: 40px; margin: 50px 0 70px;'>
			<h3>Ooops!</h3>
			<p style='margin: 0;'>Something is wrong with your Plyyr shortcode. You need to specify a portal code.</p>
		</div>";

        return $error;
      } else {

        $style = !$style ? "width: 795px; height: 2000px; float: left;" : $style;

        $hook = '<div class="gcntargets" style="' . $style . '" '
                . 'gcn-portal="' . $portal . '"></div>'
                . '<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "https://s3.amazonaws.com/gcn-static-assets/jsmodules/plyyr_embedder.js"; fjs.parentNode.insertBefore(js, fjs);}(document, "script", "gameplayer-gcn"));</script>';

        return "$hook";
      }
    }

  }

}
