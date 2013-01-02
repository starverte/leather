<?php
/**
 * The template for displaying posts in the Aside Post Format on index and archive pages
 *
 * @package Leather
 * @since Leather 1.0
 */
?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'leather' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
                    </header><!-- .entry-header -->
                    
                    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
                        <div class="entry-summary">
							<?php the_excerpt(); ?>
                        </div><!-- .entry-summary -->
                    <?php else : ?>
                        <div class="entry-content">
							<?php the_content( __( 'Read more', 'leather' ) ); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'leather' ), 'after' => '</div>' ) ); ?>
                        </div><!-- .entry-content -->
                    <?php endif; ?>
                    
                    <footer class="entry-meta">
						<?php leather_posted_on(); ?>
						<?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
                        <span class="sep"> | </span>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'leather' ), __( '1 Comment', 'leather' ), __( '% Comments', 'leather' ) ); ?></span>
                        <?php endif; ?>
                        <?php edit_post_link( __( 'Edit', 'leather' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
                    </footer><!-- #entry-meta -->
                </article><!-- #post-<?php the_ID(); ?> -->