<?php
/**
 * The template used for displaying products from Steel Marketplace
 *
 * @package Flint/Leather
 * @since 2.0.0
 */

$permalink = get_permalink();
$title = get_the_title();
?>

  <div class="row">
    <?php if (!is_singular()) { ?>
    <div class="col-lg-3 col-md-3 col-sm-3">
      <a class="entry-thumb" href="<?php echo $permalink ?>" rel="bookmark"><?php steel_product_thumbnail(); ?></a>
    </div>
    <?php } ?>
    <article id="post-<?php the_ID(); ?>" <?php if (is_singular()) { post_class('col-lg-12 col-md-12 col-sm-12'); } else { post_class('col-lg-9 col-md-9 col-sm-9'); }  ?>>
      <?php if (is_singular()) { steel_product_thumbnail(); } ?>
      <header class="entry-header">
        <?php $type = get_post_type(); ?>
        <?php do_action('flint_open_entry_header_'.$type); ?>
      
        <h1 class="entry-title"><button type="button" class="btn btn-primary" disabled="disabled"><?php echo steel_product_meta('ref'); ?></button> <?php if (is_single()) { echo the_title(); } else { echo '<a href="' . $permalink .'" rel="bookmark">' . $title . '</a>'; } ?></h1>
        <?php if ( current_user_can('edit_posts') ) { ?><a class="btn btn-default btn-sm btn-edit hidden-xs" href="<?php echo get_edit_post_link(); ?>">Edit</a><?php } ?>
        
        <div class="entry-meta">
          <?php do_action('flint_entry_meta_above_'.$type); ?>
        </div><!-- .entry-meta -->
        
        <?php do_action('flint_close_entry_header_'.$type); ?>
        
      </header><!-- .entry-header -->
      
      <?php if ( is_search() | is_archive() ) : ?>
      <div class="entry-summary">
        <p><strong>Price</strong>: $<?php echo steel_product_meta('price'); ?></p>
        <?php the_excerpt(); ?>
        <div class="clearfix"></div>
        <p><strong>Dimensions</strong>: <?php echo steel_product_dimensions(); ?></p>
        <a class="btn btn-primary hidden-xs" href="<?php echo $permalink ?>" style="float:right;margin-top:-1.25em;"><?php the_title(); ?> Details</a>
        <a class="btn btn-block btn-primary visible-xs" href="<?php echo $permalink ?>"><?php the_title(); ?> Details</a>
      </div><!-- .entry-summary -->
      <?php else : ?>
      <div class="entry-content">
        <?php flint_the_content(); ?>
        <div class="clearfix"></div>
        Dimensions: <?php echo steel_product_dimensions(); ?>
      </div><!-- .entry-content -->
      <?php endif; ?>
      
      <footer class="entry-meta clearfix">
        <?php do_action('flint_entry_meta_below_steel_product'); ?>
      </footer><!-- .entry-meta -->
    </article><!-- #post-<?php the_ID(); ?> -->
  </div><!-- .row -->
