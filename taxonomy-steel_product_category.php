<?php
/**
 * The template for displaying product category pages
 *
 * @package Flint/Leather
 * @since 2.0.0
 */

get_header(); ?>
<?php flint_get_sidebar('header'); ?>

  <section id="primary" class="content-area container">

  <?php flint_get_sidebar('left'); ?>

    <div id="content" class="site-content<?php if ( is_active_sidebar( 'left' ) ) { echo ' col-lg-6 col-md-6'; } else { echo ' col-lg-9 col-md-9'; } ?>" role="main">

    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <h1 class="page-title">
          <?php
            do_action('flint_open_' . single_term_title( '', false ) . '_title');

            printf( __( '%s', 'flint' ), '<span>' . single_term_title( '', false ) . '</span>' );

            do_action('flint_close_' . single_term_title( '', false ) . '_title');
          ?>
        </h1>
        <?php
          //Term Description
          $term_description = term_description();
          if ( ! empty( $term_description ) ) { echo apply_filters( 'tag_archive_meta', '<p class="taxonomy-description">' . $term_description . '</p>' ); }
        ?>
      </header><!-- .page-header -->

      <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'type', 'steel_product' ); ?>

      <?php endwhile; ?>

      <?php flint_content_nav( 'nav-below' ); ?>

    <?php else : ?>

      <?php get_template_part( 'no-results', 'archive' ); ?>

    <?php endif; ?>

    </div><!-- #content -->

    <?php flint_get_sidebar('right_steel_product'); ?>

  </section><!-- #primary -->

<?php flint_get_sidebar('footer'); ?>
<?php get_footer(); ?>
