<?php
/**
 * The Template for displaying all event pages.
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">
        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
        
                        <?php get_template_part( 'content', 'sp_event' ); ?>

			<?php leather_content_nav( 'nav-below' ); ?>
        
                        <?php endwhile; ?>

                </section><!-- end #primary -->

                
<?php get_sidebar(); ?>
<?php get_footer(); ?>