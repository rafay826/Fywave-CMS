<?php get_header(); ?>

<?php include('includes/nav.php') ?>

<div class="page-container">

<?php
    
    $args = array( 'post_type' => 'weddings', 'posts_per_page' => 1 );
    $weddings = new WP_Query( $args );
?>
  <?php  
    if( have_posts()): while( have_posts()): the_post(); ?>

    <div class="page-title"><?php the_title(); ?></div>
    <div class="page-content"><?php the_content(); ?></div>

<?php endwhile; else: ?>
<?php _e('Sorry, no posts matched your criteria'); ?>
<?php endif; ?>

</div>

<?php get_footer(); ?>

