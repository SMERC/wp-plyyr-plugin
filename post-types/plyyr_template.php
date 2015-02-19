<?php

if (!class_exists('Plyyr_Template')) {

  /**
   * A PostTypeTemplate class that provides 3 additional meta fields
   */
  class Plyyr_Template
  {

    const POST_TYPE = "plyyr";


    /**
     * The Constructor
     */
    public function __construct()
    {
      // register actions
      add_action('init', array(&$this, 'init'));
      add_action('template_redirect', array(&$this, 'redirect'));
    }

    /**
     * hook into WP's init action hook
     */
    public function init()
    {
      // Initialize Post Type
      $this->create_post_type();
    }

    /**
     * Create the post type
     */
    public function create_post_type()
    {
      register_post_type(self::POST_TYPE, array(
          'labels' => array(
              'name' => __(sprintf('%ss', ucwords(str_replace("_", " ", self::POST_TYPE)))),
              'singular_name' => __(ucwords(str_replace("_", " ", self::POST_TYPE)))
          ),
          'rewrite' => false,
          'public' => true,
          'has_archive' => true,
          'description' => __("Embed quizzes on your own posts as seen on plyyr.com"),
          'supports' => array(
              'title', 'editor', 'excerpt',
          ),
              )
      );
      register_taxonomy(self::POST_TYPE, self::POST_TYPE);
      flush_rewrite_rules();
    }

    /**
     * Parse any url on the namespace plyyr and creates a post using the id parameter 
     * with the correspondent quiz embedded.
     */
    public function redirect()
    {
      if (!is_404()) {
        return;
      }

      //Is query string present?
      if (isset($_REQUEST['plyyr'])) {
        $id = $this->create_new_post($_REQUEST['plyyr']);
      }

      if ($id) {
        header('Location: ' . get_permalink($id));
      }
    }

    /**
     * Contatcts an api to get the quiz information based on the id received and generates
     * the wordpress post. If the api returns an error nothing is generated.
     */
    protected function create_new_post($code)
    {
      $code = urlencode(trim(trim($code), '/'));

      //Now, extract the portal code from the host
      $portal = get_option('plyyr_setting_portal', 'plyyr');

      $response = file_get_contents("https://games.gamecloudnetwork.com/game/decode/$code?portal=$portal&plugin=wordpress");
      if ($response) {
        $content = json_decode($response, true);
      }

      if ($content) {
        if (isset($content['type']) && $content['type'] == 'error') {
          return false;
        }
      } else {
        return false;
      }

      //Check that the post doesnt exist
      if (get_page_by_title($content['title'], OBJECT, 'plyyr')) {
        return false;
      }
      
      //Do we have the word quiz on the title?
      $title = $content['title'];
      if (!substr_count(strtolower($title), 'quiz')) {
        $title = 'Quiz: ' . $title;
      }

      $args = array(
          //'post_author'    => $restaurant_owner_id,
          'post_content' => '<h2>' . $content['description'] . '</h2><br><code>' . $content['wp_shortcode'] . '</code>',
          'post_name' => $content['slug'],
          'post_status' => 'publish',
          'post_title' => $title,
          'post_type' => 'plyyr',
          'post_excerpt' => $content['description'],
      );

      return wp_insert_post($args);
    }

  }

}
