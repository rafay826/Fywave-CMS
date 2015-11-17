<?php
/*
Template Name: Cookies Page
*/
?>

<?php get_header(); ?>

<div class="page-container">
    
    <table class="product-table">
        <tr>
            <td>

            </td>
            <td>
                <section id="product-scene-2">
                    <div class="product-title"><?php the_title(); ?></div>
                    <?php if (function_exists('slideshow')) { slideshow(true, "3", false, array()); } ?>
                </section>
            </td>
        </tr>
    </table>

</div>

<?php get_footer(); ?>

