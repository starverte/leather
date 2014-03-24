<?php
/**
 * The widget area that appears to the right of content.
 *
 * @package Flint/Leather
 * @since 2.0.0
 */
?>
    <div class="col-lg-3 col-md-3 widgets widgets-right" role="complementary">
        <div class="widget-area" >
          <?php do_action( 'before_sidebar' ); ?>
          <?php if (is_singular()) { do_action( 'flint_widget_area_right_steel_product' ); } ?>
          <?php dynamic_sidebar('right_steel_product'); ?>
        </div><!-- .widget-area -->
    </div><!-- .widgets.widgets-right -->
  </div><!-- .row -->