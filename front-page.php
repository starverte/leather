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

		    <div class="royalSlider rsDefault">
    			<img class="rsImg" src="http://fortcollinscreative.com/lewnme/wp-content/uploads/2013/01/051.jpg" alt="cover" />
			<img class="rsImg" src="http://fortcollinscreative.com/lewnme/wp-content/uploads/2013/01/65.jpg" />
    			<img class="rsImg" src="http://fortcollinscreative.com/lewnme/wp-content/uploads/2013/01/145.jpg" />
                        <img class="rsImg" src="http://fortcollinscreative.com/lewnme/wp-content/uploads/2013/01/145cf.jpg" />
                        <img class="rsImg" src="http://fortcollinscreative.com/lewnme/wp-content/uploads/2013/01/SacTote.jpg" />
		    </div>	

                </section><!-- end #primary -->

                
		<div id="secondary" class="grid_5 push_1" role="complementary">
			<?php do_action( 'before_sidebar' ); ?>
			<?php wp_nav_menu( array( 'theme_location' => 'side', 'walker' => new sparks_side_menu ) ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>

				<aside id="archives" class="widget">
					<h1 class="widget-title"><?php _e( 'Archives', 'toolbox' ); ?></h1>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h1 class="widget-title"><?php _e( 'Meta', 'toolbox' ); ?></h1>
					<ul>
						<?php wp_register(); ?>
						<aside><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
<?php get_footer(); ?>
