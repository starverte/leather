<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">
        
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <?php get_template_part( 'content', 'page' ); ?>
                            
                            <?php comments_template( '', true ); ?>
        
                        <?php endwhile; ?>

                </section><!-- end #primary -->

                
<?php get_sidebar(); ?>
<?php get_footer(); ?>