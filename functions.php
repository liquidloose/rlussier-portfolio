<?php

//register styles
add_action('init', 'register_site_styles');
function register_site_styles() {
    $home_url = get_stylesheet_directory_uri() . '/assets/css/home.css';
    $smooth_url = get_stylesheet_directory_uri() . '/assets/css/smooth.css';

    wp_register_style('home', $home_url, [], 1.0);
    wp_register_style('smooth', $smooth_url, [], 1.0);
}

//register scripts
add_action('init', 'register_site_scripts');
function register_site_scripts() {
    $url = get_stylesheet_directory_uri() . '/assets/js-compiled/smooth.js';
    wp_register_script('smooth', $url, [], 1.0);
}

// Enqueue Styles
add_action('wp_enqueue_scripts', 'enqueue_styles');
function enqueue_styles() {
    if (is_home()) {
        wp_enqueue_style('home');
    }

    if (is_page('smoothtest')) {
        wp_enqueue_style('smooth');
    }
}

//Enqueue Scripts
add_action('wp_enqueue_scripts', 'enqueue_scripts');
function enqueue_scripts() {
    if (is_home()) {
        wp_enqueue_script('smooth');
    }

    if (is_page('smoothtest')) {
        wp_enqueue_script('smooth');
    }
}






















function add_cors_http_header() {
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
    header('Content-Type: application/json');
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header('HTTP/1.1 200 OK');
        exit();
    }
}
add_action('init', 'add_cors_http_header');
