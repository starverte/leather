<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">

		    	<?php if ( have_posts() ) : ?>
                
                		<header class="page-header">
                            <h1 class="page-title"><?php
                                printf( __( 'Tag Archives: %s', 'leather' ), '<span>' . single_tag_title( '', false ) . '</span>' );
                            ?></h1>
        
                            <?php
                                $tag_description = tag_description();
                                if ( ! empty( $tag_description ) )
                                    echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
                            ?>
                        </header>
                        
                        <?php rewind_posts(); ?>
        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
        
                            <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'content', get_post_format() );
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