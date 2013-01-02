<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">
        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <?php get_template_part( 'content', 'single' ); ?>

							<?php leather_content_nav( 'nav-below' ); ?>
            
                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template( '', true );
                            ?>
        
                        <?php endwhile; ?>

                </section><!-- end #primary -->

                
<?php get_sidebar(); ?>
<?php get_footer(); ?>