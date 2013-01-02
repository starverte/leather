<?php
/**
 * The Template for displaying all item pages.
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10">
        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
        
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
		    <footer id="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'leather' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- #entry-meta -->
                </article><!-- #post-<?php the_ID(); ?> -->

			<?php leather_content_nav( 'nav-below' ); ?>
        
                        <?php endwhile; ?>

                </section><!-- end #primary -->

                
<?php get_footer(); ?>