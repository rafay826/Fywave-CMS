<?php
/*
Template Name: Form Template
*/
?>

<?php get_header(); ?>

<div class="page-container">
    
    <section id="scene-1"></section>
    
    <section id="scene-2"></section>

    <section id="scene-3">
        <div class="home-content">
            <?php if( have_posts()): while( have_posts()): the_post(); ?>

                <div class="home-title"><?php the_title(); ?></div>
                <div class="home-content"><?php the_content(); ?></div>

            <?php endwhile; else: ?>
            <?php _e('Sorry, no posts matched your criteria'); ?>
            <?php endif; ?>
        </div>
    </section>

</div>

<?php get_footer(); ?>

