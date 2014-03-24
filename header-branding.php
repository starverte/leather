<?php
/**
 * Displays the branding header element
 *
 * @package Flint/Leather
 * @since 2.0.0
 */
?>

  <div id="masthead" class="site-header" role="banner">
    <?php if (current_theme_supports('custom-header')) { ?>
      <div class="container hidden-xs">
        <?php $header_image = get_header_image();
        if ( ! empty( $header_image ) ) { ?>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" <?php if ( display_header_text() ) { ?> class="col-lg-2 col-md-3 col-sm-4"<?php } ?>>
            <img src="<?php header_image(); ?>" alt="Lew 'n' Me" />
          </a>
        <?php } /* if ( ! empty( $header_image ) ) */
        if ( display_header_text() ) { ?>
          <div class="site-branding <?php if ( ! empty( $header_image ) ) { ?>col-lg-10 col-md-9 col-sm-8<?php } ?>">
            <h2 class="site-description hidden-xs"><?php bloginfo( 'description' ); ?></h2>
          </div><!-- .site-branding -->
        <?php } /* if ( display_header_text() ) */ ?>
      </div><!-- .container -->
    <?php } /* if (current_theme_supports('custom-header')) */ ?>
  </div><!-- #masthead -->