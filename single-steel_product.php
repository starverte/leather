<?php
/**
 * The Template for displaying single products.
 *
 * @package Flint/Leather
 * @since 2.0
 */

get_header(); ?>
<?php flint_get_widgets('header'); ?>

  <div id="primary" class="content-area container">
  
    <?php flint_get_widgets('left'); ?>
    
    <div id="content" class="site-content<?php if ( is_active_sidebar( 'left' ) ) { echo ' col-lg-6 col-md-6'; } else { echo ' col-lg-9 col-md-9'; } ?>" role="main">
  
    <?php while ( have_posts() ) : the_post(); ?>
  
      <?php get_template_part( 'type', 'steel_product' ); ?>
  
      <?php flint_content_nav( 'nav-below' ); ?>
  
      <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
          comments_template();
      ?>
  
    <?php endwhile; ?>
  
    </div><!-- #content -->
    
    <?php flint_get_widgets('right_steel_product'); ?>
    
  </div><!-- #primary -->

<?php flint_get_widgets('footer'); ?>
<?php get_footer(); ?>
