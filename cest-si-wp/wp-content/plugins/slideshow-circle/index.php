<?php

/*
Plugin Name: Slideshow Circles
Description: Slideshow with circle shaped thumbnails
Author: Rafay Choudhury
Version: 1.0
*/

add_action('admin_menu', 'slideshow_menu');

function slideshow_menu()
{
	add_menu_page('Slideshow Circles Menu', 'Slideshow Circles', 'manage_options', 'slideshow-menu', 'slideshow_init');
}

function slideshow_init()
{
	echo "I'm working!";
}

?>
