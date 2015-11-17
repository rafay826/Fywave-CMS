<!DOCTYPE html>
<html>
<head>

    <title><?php wp_title(); ?></title>
<!--
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.5/angular.min.js"></script>
    <script src="wp-content/themes/pietra/js/app.js"></script>
-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    
</head>

<body <?php if (function_exists('body_class')) body_class(); ?> >
<?php require_once('includes/nav.php'); ?>
<section id="heading">
    <table id="head-table">
        <tbody>
            <tr>
                <td>
                    <div class="social-links-head">
                        <ul>
                            <li><a  href="http://instagram.com/cestsibonbakery" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/png/instagram-2.png"/></a></li>
                            <li><a href="https://twitter.com/cestsibonbakery" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/png/twitter-2.png"/></a></li>
                            <li><a href="https://www.facebook.com/CestSiBonBakery" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/png/fb-2.png"/></a></li>
                            <li><a href="https://www.pinterest.com/cestsibonbakery/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/png/pinterest-icon.png"/></a></li>
                            <li><a href="http://www.yelp.com/biz/cest-si-bon-bakery-san-jose-2" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/png/yelp-icon.png"/></a></li>
                        </ul>
                    </div>

                    <div class="nav-bttn">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/png/menu-button.png" srcset="<?php echo get_template_directory_uri(); ?>/images/png/menu-button.png 1x, <?php echo get_template_directory_uri(); ?>/images/png/menu-button_2x.png 2x"/>
                    </div>
                </td>
                <td>
                    <div class="cest-si-logo">
        <a href="http://www.cestsibonbakery.com"><img src="<?php echo get_template_directory_uri(); ?>/images/svg/new-csb-logo.svg"/></a>
    </div>
                </td>
                <td>
                    <div class="head-contact">
        <h1>Contact us!</h1>
        <p><a href="tel:+14082662253">(408) 266-2253</a></p>
        <p><a href="mailto:orders@cestsibonbakery.com">orders@cestsibonbakery.com</a></p>
    </div>
                </td>
            </tr>
        </tbody>
    </table>
</section>

<section id="order-now">
        <button>Order Now!</button>
</section>