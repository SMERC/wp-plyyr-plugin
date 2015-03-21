<h1>Plyyr is the easiest way to add social quizzes and polls to your wordpress site.<h1>
<h2>The Plyyr plugin is unique in that it creates posts for you so you do not have to!<h2>
<h3>Sites with 1000+ monthly views qualify to start making money from our affiliate program. <a href="mailto:mail@gamecloudnetwork.com">Learn More</a><h3>
<p>Start off by registering and gettting your code from plyyr.com. You can get it from <a href="http://plyyr.com/publishers" target="_blank">http://plyyr.com/publishers</a><br></p>
<p>By registering a portal code you can customize your widgets and get benefits from the plyyr platform.</p>
<div class="plyyr_pubvalue">
    <div class="wrap">
        <form method="post" action="options.php"> 
            <?php @settings_fields('plyyr-group'); ?>
            <?php @do_settings_fields('plyyr-group'); ?>

            <?php do_settings_sections('plyyr'); ?>

            <?php @submit_button(); ?>
        </form>
    </div>
</div>

<div class="wrap" id="plyyr-admin">
    <h1><?php _e('Plyyr Plugin', 'plyyr'); ?></h1>
    <h2 class="nav-tab-wrapper">
        <a href="options-general.php?page=<?php echo $this->get_option_name(); ?>&tab=start"      class="nav-tab <?php echo $active_tab == 'start' ? 'nav-tab-active' : ''; ?>"><?php _e('Getting Started', 'plyyr'); ?></a>
        <!--a href="?page=<?php echo $this->get_option_name(); ?>&tab=embed"      class="nav-tab <?php echo $active_tab == 'embed' ? 'nav-tab-active' : ''; ?>"><?php _e('Site Settings', 'plyyr'); ?></a-->
        <a href="options-general.php?page=<?php echo $this->get_option_name(); ?>&tab=shortcodes" class="nav-tab <?php echo $active_tab == 'shortcodes' ? 'nav-tab-active' : ''; ?>"><?php _e('Shortcodes', 'plyyr'); ?></a>
        <a href="options-general.php?page=<?php echo $this->get_option_name(); ?>&tab=feedback"   class="nav-tab <?php echo $active_tab == 'feedback' ? 'nav-tab-active' : ''; ?>"><?php _e('Feedback', 'plyyr'); ?></a>
    </h2>
    <?php if ($active_tab == 'start') { ?>
      <div class="plyyr_start">

              <!--img src="<?php echo plugins_url('img/admin-embed-customization.png', __FILE__); ?>" class="location_img"-->

          <h3><?php _e('Registering', 'plyyr'); ?></h3>

          <ol class="circles-list">
              <li>
                  <p><?php _e('Go to http://plyyr.com and click on the <strong>Publishers</strong> tab', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Enter a name for your site', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Enter your blog URL', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Enter tags to filter the type of quizzes you want add to your site', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Submit', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Copy the "portal code" provided at Plyyr.com into the Field above and save.', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('You are ready to go.', 'plyyr'); ?></p>
              </li>
          </ol>

      </div>
      <div class="plyyr_start">

              <!--img src="<?php echo plugins_url('img/admin-embed-customization.png', __FILE__); ?>" class="location_img"-->

          <h3><?php _e('Creating a Plyyr Page On Your Site', 'plyyr'); ?></h3>

          <ol class="circles-list">
              <li>
                  <p><?php _e('A Plyyr page will filter in all the latest content based on the tags you set in the PUBLISHERS section on Plyyr.com', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('When users click on an item Plyrr creates a new post for the item on your site.', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Create a page or post on your site', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Paste [plyyr portal="YOUR PLYYR CODE HERE" style="width: 400px; height: 840px; float: left"]', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Paste [plyyr portal="YOUR PLYYR CODE HERE" style="width: 400px; height: 840px; float: left"]', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Adjust the HEIGHT attribute is you desire', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Publish and you are done!  Make sure you share your site!', 'plyyr'); ?></p>
              </li>
          </ol>

      </div>
      <div class="plyyr_start">

              <!--img src="<?php echo plugins_url('img/admin-embed-items.png', __FILE__); ?>" class="location_img"-->

          <h3><?php _e('Embed Items from Plyyr', 'plyyr'); ?></h3>

          <ol class="circles-list">
              <li>
                  <p><?php _e('You can embed and individual item from Plyyr.', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Click on the EMBED button on any page and copy the SHORT CODE.', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Create a new post / page on your site.', 'plyyr'); ?></p>
              </li>
              <li>
                  <p><?php _e('Paste in the SHORT CODE from the Plyyr site.', 'plyyr'); ?></p>
              </li>
              <p><?php _e('Publish and you are done! Make sure you share your post!', 'plyyr'); ?></p>
              </li>
          </ol>

      </div>


      <div class="plyyr_start">

          <h3><?php _e('Default Site Settings', 'plyyr'); ?></h3>

          <ol class="circles-list">
              <li>
                  <p><?php _e('This option is always available for you <a target="_blank" href="http://plyyr.com/publishers">here</a>'); ?></p>
              </li>
              <li>
                  <p><?php _e('These settings will not apply on items you customize manually', 'plyyr'); ?></p>
              </li>
          </ol>

      </div>

    <?php } elseif ($active_tab == 'embed') { ?>

      <form method="post" action="options.php">

          <?php settings_fields('plyyr'); ?>

          <div class="plyyr_embed">

              <h3><?php _e('Default Site Settings', 'plyyr'); ?></h3>

              <label for="<?php echo $this->get_option_name(); ?>[info]">
                  <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[info]" name="<?php echo $this->get_option_name(); ?>[info]" value="1" <?php if (isset($options['info']) && ( '1' == $options['info'] )) echo 'checked="checked"'; ?>>
                  <?php _e('Display item information', 'plyyr'); ?>
              </label>
              <p class="description indent"><?php _e('Show item thumbnail, name, description, creator.', 'plyyr'); ?></p>

              <label for="<?php echo $this->get_option_name(); ?>[shares]">
                  <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[shares]" name="<?php echo $this->get_option_name(); ?>[shares]" value="1" <?php if (isset($options['shares']) && ( '1' == $options['shares'] )) echo 'checked="checked"'; ?>>
                  <?php _e('Display share buttons', 'plyyr'); ?>
              </label>
              <p class="description indent"><?php _e('Show share buttons with links to YOUR site.', 'plyyr'); ?></p>

              <label for="<?php echo $this->get_option_name(); ?>[comments]">
                  <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[comments]" name="<?php echo $this->get_option_name(); ?>[comments]" value="1" <?php if (isset($options['comments']) && ( '1' == $options['comments'] )) echo 'checked="checked"'; ?>>
                  <?php _e('Display Facebook comments', 'plyyr'); ?>
              </label>
              <p class="description indent"><?php _e('Show Facebook comments in your items.', 'plyyr'); ?></p>

          </div>



          <div class="plyyr_embed">

              <h3><?php _e('Appearance Preferences', 'plyyr'); ?></h3>

              <label for="<?php echo $this->get_option_name(); ?>[embeddedon]">
                  <?php _e('Choose Color Scheme', 'plyyr'); ?>
                  <select id="<?php echo $this->get_option_name(); ?>[embeddedon]" name="<?php echo $this->get_option_name(); ?>[embeddedon]">
                      <option value="standard" <?php if (isset($options['embeddedon']) && ( 'standard' == $options['embeddedon'] )) echo 'selected'; ?>><?php _e('Standard', 'plyyr'); ?></option>
                      <option value="grey"     <?php if (isset($options['embeddedon']) && ( 'grey' == $options['embeddedon'] )) echo 'selected'; ?>><?php _e('Grey', 'plyyr'); ?></option>
                      <option value="white"    <?php if (isset($options['embeddedon']) && ( 'white' == $options['embeddedon'] )) echo 'selected'; ?>><?php _e('White', 'plyyr'); ?></option>
                  </select>
              </label>
              <p class="description"><?php printf(__('You can personalize your look here by selecting an option that works with your site!', 'plyyr')); ?></p>

          </div>

          <div class="plyyr_embed">

              <h3><?php _e('Item Recommendations', 'plyyr'); ?></h3>

              <label for="<?php echo $this->get_option_name(); ?>[recommend]">
                  <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[recommend]" name="<?php echo $this->get_option_name(); ?>[recommend]" class="tags_toggle_triger" value="1" <?php if (isset($options['recommend']) && ( '1' == $options['recommend'] )) echo 'checked="checked"'; ?>>
                  <?php _e('Display more recommendations', 'plyyr'); ?>
              </label>
              <p class="description indent"><?php _e('Show recommendations for more items.', 'plyyr'); ?></p>

              <div class="tags_toggle">

                  <hr class="indent">

                  <img src="<?php echo plugins_url('img/admin-recommendations.png', __FILE__); ?>" class="location_img">

                  <label class="indent"><?php _e('Tags', 'plyyr'); ?></label>
                  <label for="<?php echo $this->get_option_name(); ?>[tags-mix]" class="indent">
                      <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[tags-mix]" name="<?php echo $this->get_option_name(); ?>[tags-mix]" value="1" <?php if (isset($options['tags-mix']) && ( '1' == $options['tags-mix'] )) echo 'checked="checked"'; ?>>
                      <?php _e('All', 'plyyr'); ?>
                  </label>
                  <label for="<?php echo $this->get_option_name(); ?>[tags-fun]" class="indent">
                      <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[tags-fun]" name="<?php echo $this->get_option_name(); ?>[tags-fun]" value="1" <?php if (isset($options['tags-fun']) && ( '1' == $options['tags-fun'] )) echo 'checked="checked"'; ?>>
                      <?php _e('Fun', 'plyyr'); ?>
                  </label>
                  <label for="<?php echo $this->get_option_name(); ?>[tags-pop]" class="indent">
                      <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[tags-pop]" name="<?php echo $this->get_option_name(); ?>[tags-pop]" value="1" <?php if (isset($options['tags-pop']) && ( '1' == $options['tags-pop'] )) echo 'checked="checked"'; ?>>
                      <?php _e('Pop', 'plyyr'); ?>
                  </label>
                  <label for="<?php echo $this->get_option_name(); ?>[tags-geek]" class="indent">
                      <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[tags-geek]" name="<?php echo $this->get_option_name(); ?>[tags-geek]" value="1" <?php if (isset($options['tags-geek']) && ( '1' == $options['tags-geek'] )) echo 'checked="checked"'; ?>>
                      <?php _e('Geek', 'plyyr'); ?>
                  </label>
                  <label for="<?php echo $this->get_option_name(); ?>[tags-entertainment]" class="indent">
                      <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[tags-entertainment]" name="<?php echo $this->get_option_name(); ?>[tags-entertainment]" value="1" <?php if (isset($options['tags-entertainment']) && ( '1' == $options['tags-entertainment'] )) echo 'checked="checked"'; ?>>
                      <?php _e('Entertainment', 'plyyr'); ?>
                  </label>
                  <label for="<?php echo $this->get_option_name(); ?>[tags-sports]" class="indent">
                      <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[tags-sports]" name="<?php echo $this->get_option_name(); ?>[tags-sports]" value="1" <?php if (isset($options['tags-sports']) && ( '1' == $options['tags-sports'] )) echo 'checked="checked"'; ?>>
                      <?php _e('Sports', 'plyyr'); ?>
                  </label>
                  <label for="<?php echo $this->get_option_name(); ?>[tags-editors-pick]" class="indent">
                      <input type="checkbox" id="<?php echo $this->get_option_name(); ?>[tags-editors-pick]" name="<?php echo $this->get_option_name(); ?>[tags-editors-pick]" value="1" <?php if (isset($options['tags-editors-pick']) && ( '1' == $options['tags-editors-pick'] )) echo 'checked="checked"'; ?>>
                      <?php _e('Editor\'s Pick', 'plyyr'); ?>
                  </label>

                  <hr class="indent">
                  <label for="<?php echo $this->get_option_name(); ?>[more-tags]" class="indent"><?php _e('Custom Tags', 'plyyr'); ?></label>
                  <input type="text" class="regular-text indent" id="<?php echo $this->get_option_name(); ?>[more-tags]" name="<?php echo $this->get_option_name(); ?>[more-tags]" value="<?php /* echo $options['more-tags']; */ ?>" class="regular-text" placeholder="<?php _e('Comma separated tags, e.g. food, rap, weather', 'plyyr'); ?>">

                  <div class="plyyr_embed" style="display:none;">

                      <h3><?php _e('Authentication', 'plyyr'); ?></h3>

                      <label for="<?php echo $this->get_option_name(); ?>[key]" class="indent"><?php _e('API Key', 'plyyr'); ?></label>
                      <input type="text" class="regular-text indent" id="
                             <?php echo $this->get_option_name(); ?>[key]" name="<?php echo $this->get_option_name(); ?>[key]" value="<?php echo $value; ?>" class="regular-text" placeholder="<?php echo esc_attr(str_replace('www.', '', parse_url(home_url(), PHP_URL_HOST))); ?>">

                  </div>

              </div>

          </div>



          <?php submit_button(); ?>



      </form>
    <?php } elseif ($active_tab == 'shortcodes') { ?>

      <div class="plyyr_shortcodes">

          <h3><?php _e('Item Shortcode', 'plyyr'); ?></h3>
          <p><?php printf(__('Choose any Playful Content item from %s and easily embed it in a post.', 'plyyr'), '<a href="https://www.plyyr.com/" target="_blank">plyyr.com</a>'); ?></p>
          <p><?php _e('For basic use, paste the item URL into your text editor and go to the visual editor to make sure it loads.', 'plyyr'); ?></p>
          <p><?php _e('For more advance usage, use the following shortcode if you want to adjust the item appearance:', 'plyyr'); ?></p>
          <p><code>[plyyr-item url="https://www.plyyr.com/llamap10/how-weird-are-you" comments="false"]</code></p>
          <p><?php printf(__('You can set default appearance settings in the <a href="%s">Site Settings</a> tab.', 'plyyr'), ('?page=' . $this->get_option_name() . '&tab=embed')); ?></p>
          <p><?php _e('Or you can override the default appearance and customize each item with the following shortcode attributes:', 'plyyr'); ?></p>
          <dl>
              <dt>url</dt>
              <dd>
                  <p><?php _e('The URL of the item that will be displayed.', 'plyyr'); ?></p>
                  <p><?php _e('Type: URL', 'plyyr'); ?></p>
              </dd>
              <dt>info</dt>
              <dd>
                  <p><?php _e('Show item info (thumbnail, name, description, editor, etc).', 'plyyr'); ?></p>
                  <p><?php _e('Type: Boolean (true/false) ; Default: true', 'plyyr'); ?></p>
              </dd>
              <dt>shares</dt>
              <dd>
                  <p><?php _e('Show sharing buttons.', 'plyyr'); ?></p>
                  <p><?php _e('Type: Boolean (true/false) ; Default: true', 'plyyr'); ?></p>
              </dd>
              <dt>comments</dt>
              <dd>
                  <p><?php _e('Show comments control from the item page.', 'plyyr'); ?></p>
                  <p><?php _e('Type: Boolean (true/false) ; Default: true', 'plyyr'); ?></p>
              </dd>
              <dt>recommend</dt>
              <dd>
                  <p><?php _e('Show recommendations for more items.', 'plyyr'); ?></p>
                  <p><?php _e('Type: Boolean (true/false) ; Default: true', 'plyyr'); ?></p>
              </dd>
              <dt>links</dt>
              <dd>
                  <p><?php _e('Destination page, containing the [plyyr-section] shortcode, where new items will be displayed.', 'plyyr'); ?></p>
                  <p><?php _e('Type: URL ; Default: https://www.plyyr.com/', 'plyyr'); ?></p>
              </dd>
              <dt>width</dt>
              <dd>
                  <p><?php _e('Define custom width in pixels.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String ; Default: auto', 'plyyr'); ?></p>
              </dd>
              <dt>height</dt>
              <dd>
                  <p><?php _e('Define custom height in pixels.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String ; Default: auto', 'plyyr'); ?></p>
              </dd>
              <dt>margin-top</dt>
              <dd>
                  <p><?php _e('Define custom margin-top in pixels.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String ; Default: 0px', 'plyyr'); ?></p>
              </dd>
          </dl>

      </div>

      <div class="plyyr_shortcodes">

          <h3><?php _e('Section Shortcode', 'plyyr'); ?></h3>
          <p><?php printf(__('Choose any list of Playful Items in a specific vertical from %s and easily embed it in a post. This is best used as a "Playful Section" displaying items in the selected tags (topics).', 'plyyr'), '<a href="https://plyyr.com/" target="_blank">plyyr.com</a>'); ?></p>
          <p><?php _e('For basic use, paste the section URL into your text editor and go to the visual editor to make sure it loads.', 'plyyr'); ?></p>
          <p><?php _e('Use the following shortcode if you want to adjust the settings of your embedded section:', 'plyyr'); ?></p>
          <p><code>[plyyr-section tags="All" width="600"]</code></p>
          <p><?php _e('You can tweak the general settings for the section with the following shortcode attributes:', 'plyyr'); ?></p>
          <dl>
              <dt>tags</dt>
              <dd>
                  <p><?php _e('Filters the content shown by comma separated tags.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String ; Default: All', 'plyyr'); ?></p>
              </dd>
              <dt>shares</dt>
              <dd>
                  <p><?php _e('Show sharing buttons.', 'plyyr'); ?></p>
                  <p><?php _e('Type: Boolean (true/false) ; Default: true', 'plyyr'); ?></p>
              </dd>
              <dt>comments</dt>
              <dd>
                  <p><?php _e('Show comments control from the item page.', 'plyyr'); ?></p>
                  <p><?php _e('Type: Boolean (true/false) ; Default: true', 'plyyr'); ?></p>
              </dd>
              <dt>recommend</dt>
              <dd>
                  <p><?php _e('Show recommendations for more items.', 'plyyr'); ?></p>
                  <p><?php _e('Type: Boolean (true/false) ; Default: true', 'plyyr'); ?></p>
              </dd>
              <dt>links</dt>
              <dd>
                  <p><?php _e('Destination page, containing the [plyyr-section] shortcode, where new items will be displayed.', 'plyyr'); ?></p>
                  <p><?php _e('Type: URL ; Default: https://www.plyyr.com/', 'plyyr'); ?></p>
              </dd>
              <dt>width</dt>
              <dd>
                  <p><?php _e('Define custom width in pixels.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String ; Default: auto', 'plyyr'); ?></p>
              </dd>
              <dt>height</dt>
              <dd>
                  <p><?php _e('Define custom height in pixels.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String ; Default: auto', 'plyyr'); ?></p>
              </dd>
              <dt>margin-top</dt>
              <dd>
                  <p><?php _e('Define custom margin-top in pixels.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String ; Default: 0px', 'plyyr'); ?></p>
              </dd>
          </dl>

      </div>
    <?php } elseif ($active_tab == 'feedback') { ?>

      <div class="plyyr_feedback">

          <h3><?php _e('We Are Listening', 'plyyr'); ?></h3>

          <p><?php _e('We’d love to know about your experiences with our WordPress plugin and beyond. Drop us a line using the form below', 'plyyr'); ?></p>
          <p><br><p>

              <?php if ($feedback == 'true') { ?>

            <p><?php
                $to = 'support@plyyr.com';
                $subject = 'WordPress plugin feedback from ' . home_url();
                $message = $_POST['description'];
                $headers[] = 'From: ' . $_POST['name'] . ' <' . $_POST['email'] . '>' . "\r\n";
                $mail_result = wp_mail($to, $subject, $message, $headers);
                if ($mail_result) {
                  _e('Feedback Sent.', 'plyyr');
                } else {
                  _e('Error sending feedback.', 'plyyr');
                }
                ?></p>

          <?php } elseif ($active_tab == 'feedback') { ?>
            <form action="options-general.php?page=plyyr&tab=feedback&mail=true" method="post">
                <p>
                    <label for="name"><?php _e('Your Name', 'plyyr'); ?></label>
                    <input type="text" name="name" class="regular-text">
                </p>
                <p>
                    <label for="email"><?php _e('Email (so we can write you back)', 'plyyr'); ?></label>
                    <input type="text" name="email" class="regular-text" value="<?php echo get_bloginfo('admin_email'); ?>">
                </p>
                <p>
                    <label for="description"><?php _e('Description', 'plyyr'); ?></label>
                    <textarea name="description" rows="5" class="widefat" placeholder="<?php _e('What\'s on your mind?', 'plyyr'); ?>"></textarea>
                </p>
                <?php submit_button(__('Submit', 'plyyr')); ?>
            </form>
          <?php } ?>

      </div>

      <div class="plyyr_feedback">

          <h3><?php _e('Join the plyyr Publishers Community', 'plyyr'); ?></h3>
          <p>
              <a href="https://www.facebook.com/plyyr" target="_blank" class="plyyr_facebook"></a>
              <a href="https://twitter.com/_plyyr" target="_blank" class="plyyr_twitter"></a>
              <a href="https://plus.google.com/+plyyr/posts" target="_blank" class="plyyr_googleplus"></a>

          </p>

      </div>

      <div class="plyyr_feedback">

          <h3><?php _e('Enjoying the plyyr WordPress Plugin?', 'plyyr'); ?></h3>
          <p><?php printf(__('<a href="%s" target="_blank">Rate us</a> on the Wordpress Plugin Directory to help others to discover the engagement value of plyyr embeds!', 'plyyr'), 'https://wordpress.org/support/view/plugin-reviews/plyyr#postform'); ?></p>

      </div>

      <div class="plyyr_feedback">

          <h3><?php _e('Become a Premium plyyr Publisher', 'plyyr'); ?></h3>
          <p><?php _e('Want to learn how plyyr can take your publication’s engagement to new heights?', 'plyyr'); ?></p>
          <p><a href="https://publishers.plyyr.com/" target="_blank"><?php _e('Lets Talk!', 'plyyr'); ?></a></p>

      </div>
    <?php } ?>
</div>
