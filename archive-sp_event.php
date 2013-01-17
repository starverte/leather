<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">

  	    <?php if ( have_posts() ) : ?>
                        
                        <?php rewind_posts(); ?>
        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', 'sp_event' );
                            ?>
        
                        <?php endwhile; ?>
        
                    <?php else : ?>
        
                        <article id="post-0" class="grid_10 post no-results not-found">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php _e( 'Nothing Found', 'leather' ); ?></h1>
                            </header><!-- .entry-header -->
        
                            <div class="entry-content">
                                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'leather' ); ?></p>
                            </div><!-- .entry-content -->
                        </article><!-- #post-0 -->
        
                    <?php endif; ?> 

                </section><!-- end #primary -->

                
<?php get_sidebar(); ?>
<?php get_footer(); ?>
