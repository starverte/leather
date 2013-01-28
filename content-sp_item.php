<?php
/**
 * @package Leather
 */
?>

		<?php	$custom = get_post_custom();
				$item_ref = $custom['item_ref'][0];
				$item_price = $custom['item_price'][0];
				$departments = get_terms( 'department' ); ?>
        
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="grid_10">

                    <a href="<?php the_permalink(); ?>?ref=thumb" class="grid_3 alpha"><?php the_post_thumbnail(); ?></a>

                    <div class="grid_7 omega" style="min-height:150px;">
			<a href="<?php the_permalink(); ?>?ref=title"><header class="entry-header">
                        	<div id="ref"><p><?php echo $item_ref; ?></p></div><h1 class="entry-title"><?php the_title(); ?></h1>
                    	</header><!-- .entry-header --></a>
                    
                    	<div class="entry-content">
                        	<p>Price: $<?php echo $item_price; ?></p>
				<p><?php echo get_the_term_list( $post->ID, 'department', 'Listed under ', ', ', '' ); ?></p>
				<p><?php echo get_the_term_list( $post->ID, 'keyword', 'Keywords: ', ', ', '' ); ?></p>
                    	</div><!-- .entry-content -->
			<a href="<?php the_permalink(); ?>?ref=more" class="more-link">More info</a>
		    </div>
                </div><!-- #post-<?php the_ID(); ?> -->