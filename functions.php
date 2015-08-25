<?php
/**
 * Leather functions and definitions
 *
 * @package Flint/Leather
 * @since 2.0.0
 */

function leather_widgets_init() {
  register_widget('Colors_Widget' );
  register_widget('Tool_Colors_Widget');
  register_sidebar( array(
    'name'          => __( 'Right (Marketplace)', 'flint' ),
    'id'            => 'right_steel_product',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );
}
add_action( 'widgets_init', 'leather_widgets_init' );

class Colors_Widget extends WP_Widget {

  function Colors_Widget() {
    $widget_ops = array( 'classname' => 'colors', 'description' => __('A widget that displays the color swatches', 'colors') );

    $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'colors-widget' );

    $this->__construct( 'colors-widget', __('Leather: Colors Widget', 'colors'), $widget_ops, $control_ops );
  }

  function widget( $args, $instance ) {
    extract( $args );

    //Our variables from the widget settings.
    $title = apply_filters('widget_title', $instance['title'] );
    $show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

    echo '<div class="panel panel-default">';

    // Display the widget title
    if ( $title )
      echo '<div class="panel-heading"><h3 class="panel-title">'.$title.'</h3></div>';

    $directory = get_stylesheet_directory_uri(); ?>

        <div class="panel-body">

            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/black.png" width="75" height="75" /></dt><dd>Black</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/brandy.png" width="75" height="75" /></dt><dd>Brandy</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/dkbrown.png" width="75" height="75" /></dt><dd>Dk. Brown</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/navy.png" width="75" height="75" /></dt><dd>Purple</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/red.png" width="75" height="75" /></dt><dd>Red</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/tobacco.png" width="75" height="75" /></dt><dd>Tobacco</dd></dl>

        </div>

        <?php

    echo '</div>';
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

    $this->__construct( 'tool-colors-widget', __('Leather: Tool Colors Widget', 'tool-colors'), $widget_ops, $control_ops );
  }

  function widget( $args, $instance ) {
    extract( $args );

    //Our variables from the widget settings.
    $title = apply_filters('widget_title', $instance['title'] );
    $show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;

    echo '<div class="panel panel-default">';

    // Display the widget title
    if ( $title )
      echo '<div class="panel-heading"><h3 class="panel-title">'.$title.'</h3></div>';

    $directory = get_stylesheet_directory_uri(); ?>

        <div class="panel-body">

            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/blacktool.png" width="75" height="75" /></dt><dd>Black</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/brandytool.png" width="75" height="75" /></dt><dd>Brandy</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/dkbrowntool.png" width="75" height="75" /></dt><dd>Dk. Brown</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/navytool.png" width="75" height="75" /></dt><dd>Purple</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/redtool.png" width="75" height="75" /></dt><dd>Red</dd></dl>
            <dl class="swatch"><dt><img src="<?php echo $directory; ?>/img/tobaccotool.png" width="75" height="75" /></dt><dd>Tobacco</dd></dl>

        </div>

        <?php

    echo '</div>';
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

remove_filter('get_the_excerpt','wp_trim_excerpt');

