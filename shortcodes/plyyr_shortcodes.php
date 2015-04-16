<?php

if (!class_exists('Plyyr_Shortcodes')) {

  class Plyyr_Shortcodes
  {

    const API = 'https://games.gamecloudnetwork.com';

    protected $options = array(
        'colorscheme' => 'standard',
        'display_sharebuttons' => true,
        'display_comments' => true,
        'display_recommendations' => true,
    );
    
    protected $recommendations = array();

    public function __construct()
    {
      // register shortcodes
      add_shortcode('gcn', array(&$this, 'create_gcn_embed_code'));
      add_shortcode('plyyr-item', array(&$this, 'create_gcn_embed_code'));
      add_shortcode('plyyr', array(&$this, 'create_plyyr_embed_code'));
      add_shortcode('plyyr-section', array(&$this, 'create_plyyr_embed_code'));
      $this->setOptions();
    }

    protected function setOptions()
    {
      $portal = $this->getPortalCode();
      if ($portal != "plyyr") {
        $response = file_get_contents(self::API . "/portal/settings?portal=$portal&plyyr");
        if ($response) {
          $content = json_decode($response, true);
          if ($content) {
            $this->options = $content['plyyr'];
          }
        }
      }
    }

    protected function getRecommendations($level_id)
    {
      $portal = $this->getPortalCode();
      $response = file_get_contents(self::API . "/level/" . $level_id . "/suggest?portal=" . $portal);
      if ($response) {
        $content = json_decode($response, true);
        if (is_array($content) && !isset($content['message'])) {
          $this->recommendations = $content;
        }
      }
    }

    public function getPortalCode()
    {
      $portal = trim(get_option('plyyr_setting_portal', 'plyyr'));
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
        $response = file_get_contents(self::API . "/game/basic/$quiz?portal=$portal&plugin=wordpress");
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

        $powered_link = '<span style="font-color:#999999; font-style:italic;font-size: xx-small;text-decoration: none;">
          <a target="_blank" style="text-decoration: none" href="' . $content['plyyr_link'] . '">powered by <img src="' . 
                plugins_url('img/logo_micro_partners.png', __FILE__) . '"></a><br></span>';
        $hook = '<h2>' . $content['description'] . '</h2><br>' . $content['embed_code'] . '<br>';
        
        if ($this->options['display_sharebuttons']) {
          $hook .= $this->addShareButtons($content);
        }
        
        if ($this->options['display_comments']) {
          $hook .= $this->addComments($content);
        }
        
        if ($this->options['display_recommendations']) {
          $hook .= $this->addRecommendations($content);
        }
        
        $hook .= $powered_link;
        
        return $hook;
      }
    }
    
    protected function addShareButtons($quiz)
    {
      $fb_click = $this->getFbShareLink($quiz);
      $tw_click = $this->getTwShareLink($quiz);
      
      return 
        '<p style="width:100%">'
      . '<span style="background-color:blue;color:white;width:50%;cursor:pointer">'
      . '<a href="#" ' . $fb_click . '>Share on facebook</a>'
      . '</span>'
      . '<span style="background-color:DodgerBlue;color:white;width:50%;cursor:pointer">'
      . '<a href="#" ' . $tw_click . '>Share on twitter</a>'
      . '</span>'
      . '</p>';
    }
    
    protected function getFbShareLink($quiz)
    {      
      $url = "http://share.plyyr.com/share/portal/{portal_id}/level/{level_key}/referer/{referer}";
      $url = str_replace('{portal_id}', $this->getPortalCode(), $url);
      $url = str_replace('{level_key}', $quiz['id'], $url);
      $url = str_replace('{referer}', $this->customUrlEncode(site_url($_SERVER["REQUEST_URI"])), $url);
      $url = 'http://www.facebook.com/sharer.php?u=' . $url;
      return 'onclick="window.open(\'' . $url . '\', \'Facebook\', \'toolbar=0, status=0, width=560, height=360\');return false"';
    }
    
    protected function getTwShareLink($quiz)
    {    
      $url = 'http://twitter.com/home?status=' . urlencode($quiz['title']) . ' @_plyyr';
      return 'onclick="window.open(\'' . $url . '\', \'Twitter\', \'toolbar=0, status=0, width=560, height=360\');return false"';
    }
    
    protected function customUrlEncode($url)
    {
      return str_replace(array('/', ':', '#', '?', '&'), array('_sl_', '_--', '-sh-', '-qu-', '6_6'), urldecode($url));
    }
    
    protected function addComments($quiz)
    {
      
    }
    
    protected function addRecommendations($quiz)
    {
      $this->getRecommendations($quiz['id']);
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

        if ($style) {
          if (strpos($style, 'width') == false) {
            $style += 'width:795px;';
          }
        }

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
