<?php
/**
 * Leather functions and definitions
 *
 * @package Leather
 * @since Leather 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 580; /* pixels */

if ( ! function_exists( 'leather_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override leather_setup() in a child theme, add your own leather_setup to your child theme's
 * functions.php file.
 */
function leather_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on leather, use a find and replace
	 * to change 'leather' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'leather', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'leather' ),
		'side' => __( 'Side Menu', 'leather' ),
	) );

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery' ) );
}
endif; // leather_setup

/**
 * Tell WordPress to run leather_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'leather_setup' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function leather_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'leather_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function leather_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'leather' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );

	register_sidebar( array(
		'name' => __( 'Items Sidebar', 'leather' ),
		'id' => 'items',
		'description' => __( 'Displayed on single item pages and department pages', 'leather' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'init', 'leather_widgets_init' );

if ( ! function_exists( 'leather_content_nav' ) ):
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Leather 1.0
 */
function leather_content_nav( $nav_id ) {
	global $wp_query;

	?>
	<nav id="<?php echo $nav_id; ?>">
		<h1 class="assistive-text section-heading"><?php _e( 'Post navigation', 'leather' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '<img src="' . get_bloginfo('stylesheet_directory') . '/img/arrleft.png" />', 'Previous post link', 'leather' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', ' %title <span class="meta-nav">' . _x( '<img src="' . get_bloginfo('stylesheet_directory') . '/img/arrright.png" />', 'Next post link', 'leather' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<img src="' . get_bloginfo('stylesheet_directory') . '/img/arrleft.png" /> Older posts', 'leather' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <img src="' . get_bloginfo('stylesheet_directory') . '/img/arrleft.png" />', 'leather' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif; // leather_content_nav


if ( ! function_exists( 'leather_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Leather 1.0
 */
function leather_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'leather' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'leather' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'leather' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'leather' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'leather' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'leather' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for leather_comment()

if ( ! function_exists( 'leather_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 * Create your own leather_posted_on to override in a child theme
 *
 * @since Leather 1.0
 */
function leather_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'leather' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'leather' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Leather 1.0
 */
function leather_body_classes( $classes ) {
	// Adds a class of single-author to blogs with only 1 published author
	if ( ! is_multi_author() ) {
		$classes[] = 'single-author';
	}

	return $classes;
}
add_filter( 'body_class', 'leather_body_classes' );

/**
 * Returns true if a blog has more than 1 category
 *
 * @since Leather 1.0
 */
function leather_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so leather_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so leather_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in leather_categorized_blog
 *
 * @since Leather 1.0
 */
function leather_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'leather_category_transient_flusher' );
add_action( 'save_post', 'leather_category_transient_flusher' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function leather_enhanced_image_navigation( $url ) {
	global $post, $wp_rewrite;

	$id = (int) $post->ID;
	$object = get_post( $id );
	if ( wp_attachment_is_image( $post->ID ) && ( $wp_rewrite->using_permalinks() && ( $object->post_parent > 0 ) && ( $object->post_parent != $id ) ) )
		$url = $url . '#main';

	return $url;
}
add_filter( 'attachment_link', 'leather_enhanced_image_navigation' );

function leather_hide_meta_boxes() {
	remove_meta_box( 'postcustom' , 'post' , 'normal' );
	remove_meta_box( 'postcustom' , 'page' , 'normal' ); 
}
add_action( 'admin_menu' , 'leather_hide_meta_boxes' );

add_theme_support( 'post-thumbnails' );

add_editor_style( 'editor-style.css' );

add_action( 'widgets_init', 'leather_colors' );


function leather_colors() {
	register_widget( 'Colors_Widget' );
	register_widget('Tool_Colors_Widget');
}

class Colors_Widget extends WP_Widget {

	function Colors_Widget() {
		$widget_ops = array( 'classname' => 'colors', 'description' => __('A widget that displays the color swatches', 'colors') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'colors-widget' );
		
		$this->WP_Widget( 'colors-widget', __('Colors Widget', 'colors'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		$directory = get_template_directory_uri(); ?>
        
        <div class="swatches">
        
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/black.png" width="75" height="75" /></dt><dd>Black</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/brandy.png" width="75" height="75" /></dt><dd>Brandy</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/dkbrown.png" width="75" height="75" /></dt><dd>Dark Brown</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/navy.png" width="75" height="75" /></dt><dd>Navy</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/red.png" width="75" height="75" /></dt><dd>Red</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/tobacco.png" width="75" height="75" /></dt><dd>Tobacco</dd></dl>
        
        </div>
		
        <?php 
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Colors', 'colors'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'colors'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

	<?php
	}
}

class Tool_Colors_Widget extends WP_Widget {

	function Tool_Colors_Widget() {
		$widget_ops = array( 'classname' => 'tool-colors', 'description' => __('A widget that displays the tool color swatches', 'tool-colors') );
		
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tool-colors-widget' );
		
		$this->WP_Widget( 'tool-colors-widget', __('Tool Colors Widget', 'tool-colors'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters('widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

		echo $before_widget;

		// Display the widget title 
		if ( $title )
			echo $before_title . $title . $after_title;

		$directory = get_template_directory_uri(); ?>
        
        <div class="swatches">
        
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/blacktool.png" width="75" height="75" /></dt><dd>Black</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/brandytool.png" width="75" height="75" /></dt><dd>Brandy</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/dkbrowntool.png" width="75" height="75" /></dt><dd>Dark Brown</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/navytool.png" width="75" height="75" /></dt><dd>Navy</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/redtool.png" width="75" height="75" /></dt><dd>Red</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/colors/tobaccotool.png" width="75" height="75" /></dt><dd>Tobacco</dd></dl>
        
        </div>
		
        <?php 
		
		echo $after_widget;
	}

	//Update the widget 
	 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	
	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __('Tool Colors', 'tool-colors'), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'tool-colors'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

	<?php
	}
}
function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<div class="caption">'.$thumbnail_image[0]->post_excerpt.'</div>';
  }
}
class sparks_nav_menu extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'?ref=menu"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
class sparks_side_menu extends Walker_Nav_Menu {

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'?ref=side"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

}
