<?php
 /*Template Name: New Template
 */
 
get_header(); ?>
      <?php echo $_wrapper_start ?>
        <?php while ($loop->have_posts() ) : $loop->the_post(); ?> 
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">

                    <!-- Display Title and Author Name -->
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <br />

                    <?php $description = get_post_meta(get_the_ID(), 'plyyr_description', true) ?>
                    <p><?php echo $description ?></p>
                    <br />
                </header>
                <div class="entry-content">
                  <!-- Display featured image in right-aligned floating div -->
                    <?php $image = get_post_meta(get_the_ID(), 'plyyr_image', true) ?>
                    <?php if ($image): ?>
                      <a href="<?php the_permalink() ?>">
                        <img class="img-responsive" src="<?php echo $image ?>">
                      </a>
                    <?php endif ?>
                </div>
            </article>
            <br>
        <?php endwhile ?>
        <br><br>    
        <a target="_blank" href="http://plyyr.com">Powered by Plyyr.com</a>    
      <?php echo $_wrapper_end ?>
        
<?php wp_reset_query(); ?>
<?php get_footer(); ?>