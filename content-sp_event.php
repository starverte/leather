<?php
/**
 * @package Leather
 */
?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php	$custom = get_post_custom();
			$event_loc = $custom['event_loc'][0];
			$event_start = $custom['event_start'][0];
			$event_end = $custom['event_end'][0];
			$start_mth = date( 'M', $event_start );
			$start_day = date( 'j', $event_start );
			$start_time = date( 'g:i a', $event_start );
			$end_time = date( 'g:i a', $event_end ); ?>
			
                    <header class="entry-header">
                    	<div class="event-date">
                    		<span class="month"><?php echo $start_mth; ?></span>
                    		<span class="day"><?php echo $start_day; ?></span>
                    	</div>
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <p class="event-time"><?php echo $start_time; ?> to <?php echo $end_time; ?>
                    </header><!-- .entry-header -->
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                        <a class="directions" href="https://maps.google.com/maps?q=<?php echo $event_loc; ?>">Directions</a>
                    </div><!-- .entry-content -->
		    <footer id="entry-meta">
                        <?php edit_post_link( __( 'Edit', 'leather' ), '<span class="edit-link">', '</span>' ); ?>
                    </footer><!-- #entry-meta -->
                </article><!-- #post-<?php the_ID(); ?> -->
