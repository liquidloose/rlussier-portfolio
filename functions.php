<?php

if (is_front_page()) {
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '');
}
