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
          <?php if (is_singular()) {
            $options = steel_get_options();
            $bag_colors = array('Black','Brandy','Dk. Brown','Purple','Red','Tobacco');
            $tool_colors = array('Black','Brandy','Dk. Brown','Purple','Red','Tobacco'); ?>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><?php the_title(); ?></h3>
                <div style="float: right; margin-top: -1.25em;">$<?php echo steel_product_meta( 'price' ) ?></div>
              </div>
              <div class="panel-body">
                <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="business" value="<?php echo $options['paypal_merchant_id']; ?>">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="add" value="1">
                <input type="hidden" name="item_name" value="<?php the_title(); ?>">
                <input type="hidden" name="amount" value="<?php echo steel_product_meta( 'price' ) ?>">
                <input type="hidden" name="currency_code" value="USD">
                <?php if (!empty($bag_colors)) { ?>
                  <div class="form-group">
                    <label for="os0">Bag color</label>
                    <input type="hidden" name="on0" value="Bag color">
                    <select class="form-control" name="os0" required>
                      <option>Select bag color</option>
                    <?php
                      foreach($bag_colors as $bag_color) {
                        echo '<option value="'.$bag_color.'">'.$bag_color.'</option>';
                      }
                    ?>
                    </select>
                  </div>
                <?php } ?>
                <?php if (!empty($tool_colors)) { ?>
                  <div class="form-group">
                    <label for="os1">Tool color</label>
                    <input type="hidden" name="on1" value="Tool color">
                    <select class="form-control" name="os1" required>
                      <option>Select tool color</option>
                      <option value="No tooling">No tooling</option>
                    <?php
                      foreach($tool_colors as $color) {
                        echo '<option value="'.$color.'">'.$color.'</option>';
                      }
                    ?>
                    </select>
                  </div>
                <?php } ?>
                  <button type="submit" class="btn btn-primary btn-block">Add to Cart</button>
                  <div id="paypal-logo"><table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_SbyPP_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"></a></td></tr></table></div>
                </form>
              </div>
            </div>
          <?php
          } ?>
          <?php dynamic_sidebar('right_steel_product'); ?>
        </div><!-- .widget-area -->
    </div><!-- .widgets.widgets-right -->
  </div><!-- .row -->

