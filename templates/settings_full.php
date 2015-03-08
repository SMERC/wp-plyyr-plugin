<a name="top"></a>
<div class="wrap" id="plyyr-admin">
    <h1><?php _e('Plyyr Plugin', 'plyyr'); ?></h1>
    <h2 class="nav-tab-wrapper">
        <a href="?page=plyyr&tab=start"      class="nav-tab <?php echo $active_tab == 'start' ? 'nav-tab-active' : ''; ?>"><?php _e('Start & Settings', 'plyyr'); ?></a>
        <a href="?page=plyyr&tab=shortcodes" class="nav-tab <?php echo $active_tab == 'shortcodes' ? 'nav-tab-active' : ''; ?>"><?php _e('Shortcodes', 'plyyr'); ?></a>
        <a href="?page=plyyr&tab=feedback"   class="nav-tab <?php echo $active_tab == 'feedback' ? 'nav-tab-active' : ''; ?>"><?php _e('Feedback', 'plyyr'); ?></a>
    </h2>

    <?php if ($active_tab == 'start'): ?>

      <div class="plyyr_start">

          <form method="post" action="options.php"> 
              <?php @settings_fields('plyyr-group'); ?>
              <?php @do_settings_fields('plyyr-group'); ?>

              <?php do_settings_sections('plyyr'); ?>

              <?php @submit_button(); ?>
          </form>

      </div>

      <!--div class="plyyr_start">
          <h3></h3>
          <ol class="circles-list">
              <li><p></p></li>
              <li><p></p></li>
              <li><p></p></li>
          </ol>
      </div-->

    <?php elseif ($active_tab == 'shortcodes'): ?>

      <div class="plyyr_shortcodes">

          <div class="plyyr_shortcodes">

              <h3><?php _e('Portal Shortcode', 'plyyr'); ?></h3>
              <p>Embeds the plyyr page</p>
              <p><code>[plyyr style="width: 300px; height: 2000px;"]</code></p>
              <p><?php _e('You can tweak the size of your portal section with regular css style:', 'plyyr'); ?></p>

          </div>

          <h3><?php _e('Item Shortcode', 'plyyr'); ?></h3>
          <p><?php printf(__('Choose any item from %s and easily embed it in a post.', 'plyyr'), '<a href="http://www.plyyr.com/" target="_blank">plyyr.com</a>'); ?></p>
          <p><?php _e('For basic use, paste the item URL into your text editor and go to the visual editor to make sure it loads.', 'plyyr'); ?></p>
          <p><code>[gcn quiz="trivia_quiz_54cbcf1246a10"]</code></p>
          <dl>
              <dt>quiz</dt>
              <dd>
                  <p><?php _e('The identificator of the item that will be displayed.', 'plyyr'); ?></p>
                  <p><?php _e('Type: String', 'plyyr'); ?></p>
              </dd>
          </dl>

      </div>
      

<?php elseif ($active_tab == 'feedback'): ?>

      <div class="plyyr_feedback">

          <h3><?php _e('We Are Listening', 'plyyr'); ?></h3>

          <p><?php _e('We’d love to know about your experiences with our WordPress plugin and beyond. Drop us a line using the form below', 'plyyr'); ?></p>
          <p><br><p>

              <?php if ($feedback == 'true'): ?>

            <p><?php
                $to = 'mail@gamecloudnetwork.com';
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

  <?php elseif ($active_tab == 'feedback'): ?>
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
  <?php endif ?>

      </div>

      <div class="plyyr_feedback">

          <h3><?php _e('Join the Plyyr Publishers Community', 'plyyr'); ?></h3>
          <p>
              <a href="http://www.facebook.com/plyyr" target="_blank" class="plyyr_facebook"></a>
              <a href="http://twitter.com/_plyyr" target="_blank" class="plyyr_twitter"></a>
          </p>

      </div>

      <!--div class="plyyr_feedback">

          <h3><?php _e('Enjoying the Plyyr WordPress Plugin?', 'plyyr'); ?></h3>
          <p><?php printf(__('<a href="%s" target="_blank">Rate us</a> on the Wordpress Plugin Directory to help others to discover the engagement value of Plyyr embeds!', 'plyyr'), 'http://wordpress.org/support/view/plugin-reviews/plyyr#postform'); ?></p>

      </div-->

      <div class="plyyr_feedback">

          <h3><?php _e('Become a Premium Plyyr Publisher', 'plyyr'); ?></h3>
          <p><?php _e('Want to learn how Plyyr can take your publication’s engagement to new heights?', 'plyyr'); ?></p>
          <p><a href="http://plyyr.com/publishers" target="_blank"><?php _e('Lets Talk!', 'plyyr'); ?></a></p>

      </div>

<?php endif ?>

</div>