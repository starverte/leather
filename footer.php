<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Flint/Leather
 * @since 2.0.0
 */
?>

</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="site-info container">
    <div id="custom-footer">
      <?php flint_custom_footer(); ?>
    </div>
    <div id="credits">
      <?php $theme = wp_get_theme(); ?>
      Proudly powered by <a href="http://wordpress.org/" title="A Semantic Personal Publishing Platform">WordPress</a> | Theme: <a href="<?php echo $theme->get( 'ThemeURI' ) ?>"><?php echo $theme ?></a> by <?php echo $theme->get( 'Author' ) ?>
    </div>
  </div><!-- .site-info -->
</footer><!-- #colophon -->

<?php get_footer( 'close' );
