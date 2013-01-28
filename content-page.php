<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Leather
 * @since Leather 1.0
 */
?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                    
                    <div class="entry-content">
			<?php the_content('Read more'); ?>
                        <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'leather' ), 'after' => '</div>' ) ); ?>
                        <?php edit_post_link( __( 'Edit', 'leather' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-content -->

                </article><!-- #post-<?php the_ID(); ?> -->