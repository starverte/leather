<?php
/**
 * Template Name: Front
 * Description: The template for the home page
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10 alpha">

		    <?php nivo_slider('splash'); ?>	

                </section><!-- end #primary -->

                
		<div id="secondary" class="grid_5 push_1" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( !dynamic_sidebar('sidebar') ) : ?>
			
				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Browse by Category', 'toolbox' ); ?></h1>
					<?php wp_nav_menu( array( 'menu_class' => 'widget_nav_menu', 'theme_location' => 'side', 'walker' => new sparks_side_menu ) ); ?>
				</aside>
				
			<?php endif; ?>
		</div><!-- #secondary .widget-area -->
<?php get_footer(); ?>
