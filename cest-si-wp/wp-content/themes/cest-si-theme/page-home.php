<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div class="page-container">
    
    <section id="scene-1" class="header">
        <img style="width:100%;margin-bottom:-25%;" class="headerImg" src="<?php echo get_template_directory_uri(); ?>/images/jpg/slideshow/eli5.jpg"
             data-slideshow='<?php echo get_template_directory_uri(); ?>/images/jpg/slideshow/eli3.jpg | <?php echo get_template_directory_uri(); ?>/images/jpg/slideshow/eli4.jpg | <?php echo get_template_directory_uri(); ?>/images/jpg/slideshow/eli2.jpg'>
    </section>
    
    <section id="scene-2">
        <div>
            <a target="_blank" href="http://yodas.brain/cest-si-wp/?p=12">
                <img src="<?php echo get_template_directory_uri(); ?>/images/png/cake-icon.png" srcset="<?php echo get_template_directory_uri(); ?>/images/png/cake-icon.png 1x, <?php echo get_template_directory_uri(); ?>/images/png/cake-icon_2x.png 2x" />
            <h1>Cake</h1>
            </a>
        </div>
        <div>
           <a target="_blank" href="http://yodas.brain/cest-si-wp/?p=204">
                <img src="<?php echo get_template_directory_uri(); ?>/images/png/cupcake-icon.png" srcset="<?php echo get_template_directory_uri(); ?>/images/png/cupcake-icon.png 1x, <?php echo get_template_directory_uri(); ?>/images/png/cupcake-icon_2x.png 2x" />
            <h1>Cupcake</h1>
           </a>
        </div>
        <div>
            <a target="_blank" href="http://yodas.brain/cest-si-wp/?p=206">
                <img src="<?php echo get_template_directory_uri(); ?>/images/png/cookies-icon.png" srcset="<?php echo get_template_directory_uri(); ?>/images/png/cookies-icon.png 1x, <?php echo get_template_directory_uri(); ?>/images/png/cookies-icon_2x.png 2x" />
            <h1>Cookies</h1>
            </a>
        </div>
        <div>
            <a target="_blank" href="http://yodas.brain/cest-si-wp/?p=209">
                <img src="<?php echo get_template_directory_uri(); ?>/images/png/pastry-icon.png" srcset="<?php echo get_template_directory_uri(); ?>/images/png/pastry-icon.png 1x, <?php echo get_template_directory_uri(); ?>/images/png/pastry-icon_2x.png 2x" />
            <h1>Pastries</h1>
            </a>
        </div>
    </section>

    <section id="scene-3">
        <div class="home-content">
            <?php if( have_posts()): while( have_posts()): the_post(); ?>

                <div class="home-title"><?php the_title(); ?></div>
                <div class="home-p"><?php the_content(); ?></div>

            <?php endwhile; else: ?>
            <?php _e('Sorry, no posts matched your criteria'); ?>
            <?php endif; ?>
        </div>
    </section>
    
</div>

<?php get_footer(); ?>

