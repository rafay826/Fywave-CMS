<?php
/*
Template Name: Content Template
*/
?>

<?php get_header(); ?>

<div class="page-container">
    
    <section id="scene-1"></section>
    
    <section id="scene-2"></section>

    <section id="scene-3">
        <div class="internal-content">
            <?php if( have_posts()): while( have_posts()): the_post(); ?>

                <div class="internal-title"><?php the_title(); ?></div>
                <div class="internal-content"><?php the_content(); ?></div>

            <?php endwhile; else: ?>
            <?php _e('Sorry, no posts matched your criteria'); ?>
            <?php endif; ?>
        </div>
    </section>

</div>

<?php get_footer(); ?>

