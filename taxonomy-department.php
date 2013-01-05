<?php
/**
 * The template for displaying Department pages.
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">

  	    <?php if ( have_posts() ) : ?>
            
            			<header class="page-header">
                            <h1 class="page-title"><?php
                                printf( __( 'Category Archives: %s', 'leather' ), '<span>' . single_cat_title( '', false ) . '</span>' );
                            ?></h1>
        
                            <?php
                                $category_description = category_description();
                                if ( ! empty( $category_description ) )
                                    echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
                            ?>
                        </header>
        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', 'sp_item' );
                            ?>
        
                        <?php endwhile; ?>
                        
                        <?php leather_content_nav( 'nav-below' ); ?>
        
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
