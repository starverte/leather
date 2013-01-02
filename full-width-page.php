<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_16">
    
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <?php get_template_part( 'content', 'page' ); ?>
                            
							<?php comments_template( '', true ); ?>
        
                        <?php endwhile; ?>

                </section><!-- end #primary -->

<?php get_footer(); ?>