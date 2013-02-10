<?php
/**
* The Header for our theme.
*
* Displays all of the <head> section and everything up till <div id="main">
*
* @package Leather
* @since Leather 1.0.1
*/
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <title><?php
    /*
    * Print the <title> tag based on what is being viewed.
    */
    global $page, $paged;
    
    wp_title( '|', true, 'right' );
    
    // Add the blog name.
    bloginfo( 'name' );
    
    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | $site_description";
    
    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
    echo ' | ' . sprintf( __( 'Page %s', 'leather' ), max( $paged, $page ) );
    
    ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/text.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/960.css">
    <link href='http://fonts.googleapis.com/css?family=Strait' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=159844140708871";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div class="container_16" id="page">
        <header class="grid_16">
            <hgroup>        
                <a class="grid_3 alpha" href="<?php echo home_url( '/?ref=logo' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
		<h3 class="grid_10" id="tagline">Fine Leather Goods Handcrafted in Colorado since 1974</h3>
                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>" class="omega grid_3">
                    <div><label class="screen-reader-text" for="s">Search for:</label>
                        <input class="alpha grid_3 tall_33 omega" type="text" value="<?php echo trim( get_search_query() ); ?>" name="s" id="s" placeholder="Search">
                        <input type="submit" id="searchsubmit" value="Search">
                    </div>
                </form>       
            </hgroup>
	    
            <div id="main-nav">
                <nav class="grid_14 alpha" id="access" role="navigation">
                    <h1 class="assistive-text section-heading"><?php _e( 'Main menu', 'leather' ); ?></h1>
                    <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'leather' ); ?>"><?php _e( 'Skip to content', 'leather' ); ?></a></div>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'walker' => new sparks_nav_menu ) ); ?>
                </nav><!-- #access -->
            
            
			<form class="grid_2 omega" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">

    				<?php $options = get_option('sparks_options'); ?>
            
                		<!-- Identify your business so that you can collect the payments. -->
                		<input type="hidden" name="business" value="<?php if (isset($options['merch_id'])) { echo $options["merch_id"]; } ?>">
            
                		<!-- Specify a PayPal Shopping Cart View Cart button. -->
                		<input type="hidden" name="cmd" value="_cart">
                		<input type="hidden" name="display" value="1">
            
                		<!-- Display the View Cart button. -->
                		<input type="image" id="c" name="submit" border="0"
                    			src="<?php echo get_template_directory_uri(); ?>/img/cart2.png"
                    			alt="PayPal - The safer, easier way to pay online">
            		</form>

	    </div>

        </header>
        
        <div id="main" class="grid_16">
