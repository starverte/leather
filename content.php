<?php
/**
 * @package Leather
 */
?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'leather' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php $title = get_the_title(); $type = get_post_type(); if (empty($title)) { printf( __( 'Untitled %1$s', 'leather' ), $type );} else { the_title(); } ?></a></h1>
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
						<?php if ( 'post' == get_post_type() ) : ?>
                        <?php
                        /* translators: used between list items, there is a space after the comma */
                        $categories_list = get_the_category_list( __( ', ', 'leather' ) );
                        if ( $categories_list && leather_categorized_blog() ) :
                        ?>
                        <span class="cat-links">
                        <?php printf( __( 'Posted in %1$s', 'leather' ), $categories_list ); ?>
                        </span>
                        <span class="sep"> | </span>
                        <?php endif; // End if categories ?>
                        
                        <?php
                        /* translators: used between list items, there is a space after the comma */
                        $tags_list = get_the_tag_list( '', __( ', ', 'leather' ) );
                        if ( $tags_list ) :
                        ?>
                        <span class="tag-links">
                        <?php printf( __( 'Tagged %1$s', 'leather' ), $tags_list ); ?>
                        </span>
                        <span class="sep"> | </span>
                        <?php endif; // End if $tags_list ?>
                        <?php endif; // End if 'post' == get_post_type() ?>
                        
                        <?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'leather' ), __( '1 Comment', 'leather' ), __( '% Comments', 'leather' ) ); ?></span>
                        <span class="sep"> | </span>
                        <?php endif; ?>
                        
                        <?php edit_post_link( __( 'Edit', 'leather' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- #entry-meta -->
                </article><!-- #post-<?php the_ID(); ?> -->