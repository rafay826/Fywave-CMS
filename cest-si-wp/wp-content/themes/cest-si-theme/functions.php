<?php

define('ROOT_PATH', 'http://' . $_SERVER['HTTP_HOST']);

//ADD MENU TO WORDPRESS DASHBOARD
add_theme_support( 'menus' );

//REGISTER MENU WITH WORDPRESS
function register_theme_menus(){

    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ),
            'all-pages' => __( 'All Pages' )
        )
    );
}

add_action( 'init', 'register_theme_menus' );


//STYLES
function fywave_theme_styles(){
    wp_enqueue_style( 'animations_css', get_template_directory_uri() . '/css/animations/animations.css' );
    wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'mobile_css', get_template_directory_uri() . '/css/mobile.css' );
    wp_enqueue_style( 'plugin_css', get_template_directory_uri() . '/js/jQuery-slideshow-plugin/plugin.css' );
}

function fywave_theme_prod_styles(){
    wp_enqueue_style( 'animations_css', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/css/animations/animations.css' );
    wp_enqueue_style( 'style_css', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/style.css' );
    wp_enqueue_style( 'mobile_css', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/css/mobile.css' );
    wp_enqueue_style( 'plugin_css', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/js/jQuery-slideshow-plugin/plugin.css' );
}

add_action( 'wp_enqueue_scripts', 'fywave_theme_styles' );
//add_action( 'wp_enqueue_scripts', 'fywave_theme_prod_styles' );

//SCRIPTS
function fywave_theme_js(){

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery_ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array('jquery'), '', false);
    wp_enqueue_script( 'hammer_js', get_template_directory_uri() . '/js/jQuery-slideshow-plugin/jquery.hammer-full.min', array('jquery'), '', true );
    wp_enqueue_script( 'plugin_js', get_template_directory_uri() . '/js/jQuery-slideshow-plugin/plugin.js', array('jquery', 'hammer_js'), '', true );
    wp_enqueue_script( 'ux_js', get_template_directory_uri() . '/js/ux.js', array('jquery', 'jquery_ui', 'hammer_js', 'plugin_js'), '', false );
    wp_enqueue_script( 'gsap', get_template_directory_uri() . '/js/gsap/minified/TweenMax.min.js', '', '', false );
    wp_enqueue_script( 'scrollmagic', get_template_directory_uri() . '/js/gsap/bower_components/ScrollMagic/scrollmagic/minified/ScrollMagic.min.js', '', '', false );
}

function fywave_theme_prod_js(){

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery_ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array('jquery'), '', false);
    wp_enqueue_script( 'hammer_js', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/js/jQuery-slideshow-plugin/jquery.hammer-full.min', array('jquery'), '', true );
    wp_enqueue_script( 'plugin_js', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/js/jQuery-slideshow-plugin/plugin.js', array('jquery', 'hammer_js'), '', true );
    wp_enqueue_script( 'ux_js', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/js/ux.js', array('jquery', 'jquery_ui', 'hammer_js', 'plugin_js'), '', false );
    wp_enqueue_script( 'gsap', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/js/gsap/minified/TweenMax.min.js', '', '', false );
    wp_enqueue_script( 'scrollmagic', ROOT_PATH . '/projects/cest-si-wp/wp-content/themes/cest-si-theme/js/gsap/bower_components/ScrollMagic/scrollmagic/minified/ScrollMagic.min.js', '', '', false );
}

add_action( 'wp_enqueue_scripts', 'fywave_theme_js' );
//add_action( 'wp_enqueue_scripts', 'fywave_theme_prod_js' );

?>

<?php
function links(){
?>
<ul>
    <li>
        <?php

                    $navmenu = array(

                        'container' => false,
                        'theme_location' => 'all-pages',
                        'menu-class' => 'all-links',
                    );

                    wp_nav_menu( $navmenu );
                ?>
    </li>
</ul>
<?php
};

add_shortcode('AllPageLinks', 'links');

function cest_si_menu()
{
    $navmenu = array(

                        'container' => false,
                        'theme_location' => 'main-menu',
                        'menu-class' => 'menu',
                    );

    wp_nav_menu( $navmenu );
}

?>