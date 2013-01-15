<?php
/**
 * The Template for displaying all item pages.
 *
 * @package Leather
 * @since Leather 1.0
 */

get_header(); ?>
            
                <section id="primary" class="grid_10">
        
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
			<?php	$custom = get_post_custom();
				$item_ref = $custom['item_ref'][0];
				$item_price = $custom['item_price'][0]; ?>
        
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php the_post_thumbnail_caption();
			  the_post_thumbnail( 'large' ); ?>

                    <header class="entry-header">
                        <div id="ref"><p><?php echo $item_ref; ?></p></div><h1 class="entry-title"><?php the_title(); ?></h1>
                    </header><!-- .entry-header -->
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div><!-- .entry-content -->
		    <footer id="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'leather' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- #entry-meta -->
                </article><!-- #post-<?php the_ID(); ?> -->
        
                        <?php endwhile; ?>

                </section><!-- end #primary -->

		<div id="secondary" class="grid_5 push_1" role="complementary">

				<aside id="add2cart" class="widget">
                
                	<div id="price"><p>$<?php echo $item_price; ?></p></div>
                
                    <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr"
            method="post">

			<?php 	$settings = get_option('steel_options');
				$merch_id = $settings['merch_id']; ?>
			
                    
                        <!-- Identify your business so that you can collect the payments. -->
                        <input type="hidden" name="business" value="<?php echo $merch_id; ?>">
                    
                        <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="add" value="1">
                    
                        <!-- Specify details about the item that buyers will purchase. -->
                        <input type="hidden" name="item_name"
                            value="<?php echo $item_ref; ?>">
                        <input type="hidden" name="amount" value="<?php echo $item_price; ?>">
                        <input type="hidden" name="currency_code" value="USD">
                        
                        <!-- Provide a dropdown menu option field, without prices. -->
                        <input type="hidden" name="on0" value="Bag Color"><h3>Bag Color</h3>
                            <select name="os0">
                                <option
                                    value="Select a color">-- Select a color--
                                <option value="Brandy">Brandy</option>
                                <option value="Dark Brown">Dark Brown</option>
                                <option value="Black">Black</option>
                                <option value="Navy">Navy</option>
                                <option value="Red">Red</option>
                                <option value="Purple">Purple</option>
                                <option value="Turquoise">Turquoise</option>
                                <option value="Tobacco">Tobacco</option>
                                <option value="Bone">Bone</option>
                                <option value="Burgundy">Burgundy</option>
                                <option value="Olive">Olive</option>
                            </select>
    
                        <input type="hidden" name="on1" value="Tool Color"><h3>Tool Color</h3>
                            <select name="os1">
                                <option
                                    value="Select a color">-- Select a color--
                    <option value="Black">Black</option>
                                <option value="Brandy">Brandy</option>
                                <option value="Red">Red</option>
                                <option value="Olive">Olive</option>
                                <option value="Dark Brown">Dark Brown</option>
                            </select>
    
    
                    
                        <!-- Display the payment button. -->
                        <input type="image" id="paypal" name="submit" border="0"
                            src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif"
                            alt="PayPal - The safer, easier way to pay online">
                        <img alt="" border="0" width="1" height="1"
                            src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                    </form>

				</aside>

			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'items' ) ) : ?>

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

		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
		<div id="tertiary" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div><!-- #tertiary .widget-area -->
		<?php endif; ?>
                
<?php get_footer(); ?>
