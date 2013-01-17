<?php
/**
 * @package Leather
 */
?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> class="grid_10"">
                <?php	$custom = get_post_custom();
			$event_loc = $custom['event_loc'][0];
			$event_start = $custom['event_start'][0];
			$event_end = $custom['event_end'][0];
			$start_mth = date( 'M', $event_start );
			$start_day = date( 'j', $event_start );
			$start_time = date( 'g:i a', $event_start );
			$end_time = date( 'g:i a', $event_end ); ?>
			
			<div class="event-date grid_1 alpha">
                    		<div class="month"><?php echo $start_mth; ?></div>
                    		<div class="day"><?php echo $start_day; ?></div>
                    	</div>
			
                    	<header class="entry-header grid_8 omega">
                        	<h1 class="entry-title"><?php the_title(); ?></h1>
                        	<p class="event-time"><?php echo $start_time; ?> to <?php echo $end_time; ?></p>
                    	</header><!-- .entry-header -->
                    
                    	<div class="entry-content grid_8 push_1 alpha">
                        	<?php the_content(); ?>
                        	<a class="directions" href="https://maps.google.com/maps?q=<?php echo $event_loc; ?>">Directions</a>
                    	</div><!-- .entry-content -->
                    	
		   	 <footer id="entry-meta">
                       		<?php edit_post_link( __( 'Edit', 'leather' ), '<span class="edit-link">', '</span>' ); ?>
                    	</footer><!-- #entry-meta -->
                </article><!-- #post-<?php the_ID(); ?> -->
