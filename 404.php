<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">
        
                        <article id="post-0" class="grid_10 post error404 not-found">
                            <header class="entry-header">
                                <h1 class="entry-title"><?php _e( 'Nothing Found', 'leather' ); ?></h1>
                            </header><!-- .entry-header -->
        
                            <div class="entry-content">
                                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'leather' ); ?></p>
                            </div><!-- .entry-content -->
                        </article><!-- #post-0 -->

                </section><!-- end #primary -->
            
<?php get_footer(); ?>