<?php
/**
 * Displays the navigation menu
 *
 * @package Flint/Leather
 * @since 2.0.0
 */
?>
  <div class="container">
    <nav class="navbar navbar-default" role="navigation">
      <h1 class="screen-reader-text"><?php _e( 'Menu', 'flint' ); ?></h1>
      <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'flint' ); ?>"><?php _e( 'Skip to content', 'flint' ); ?></a></div>
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand visible-xs-block" href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
        </div><!-- .navbar-header -->
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => false, 'walker' => new Flint_Bootstrap_Menu ) ); ?>
          <form class="navbar-form navbar-right" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <div class="form-group">
              <input type="hidden" name="business" value="ZPV342PLN7X9S">
              <input type="hidden" name="cmd" value="_cart">
              <input type="hidden" name="display" value="1">
              <button class="btn btn-primary" type="submit" name="submit"><i class="glyphicon glyphicon-shopping-cart"></i> View Cart</button>
            </div>
          </form>
          <form method="get" class="navbar-form navbar-right hidden-sm hidden-xs" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <div class="form-group">
              <input type="text" class="form-control" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Search" style="width: 200px;">
            </div>
          </form>
          
        </div><!-- .navbar-collapse -->
    </nav><!-- .navbar -->
  </div><!-- .container -->