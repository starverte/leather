<?php
/**
 * @package Leather
 */
?>

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $custom = get_post_custom();
				$item_ref = $custom['item_ref'][0];
				$item_price = $custom['item_price'][0]; ?>

		   <a class="grid_3" id="dep-item" href="<?php the_permalink(); ?>">
                    	<?php the_post_thumbnail(); ?>
			<div class="dep-info">
				<h4><?php the_title(); ?></h4>
				<div class="price">$<?php echo $item_price; ?></div>
			</div>
		   </a>
                </div><!-- #post-<?php the_ID(); ?> -->