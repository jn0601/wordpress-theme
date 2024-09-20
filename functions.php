<?php

function custom_theme_support()
{
  // add dynamic title tag to page
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'custom_theme_support');

function theme_register_style()
{

  // get parameter of the theme and get version of theme description
  $version = wp_get_theme()->get('Version');
  // path to css (id name, path, array, version, type)
  // custom style depends on bootstrap, added dependency parameter to array
  wp_enqueue_style('custom-style', get_template_directory_uri() . "/style.css", array('custom-bootstrap'), $version, 'all');
  wp_enqueue_style('custom-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
  wp_enqueue_style('custom-fontAwesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

// execute function when running the script hook
add_action('wp_enqueue_scripts', 'theme_register_style');

function theme_register_scripts()
{

  // path to js (id name, path, array, version, true or false (true is footer, false is header) )
  wp_enqueue_script('custom-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '4.4.1', true);
  wp_enqueue_script('custom-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '4.4.1', true);
  wp_enqueue_script('custom-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
  wp_enqueue_script('custom-js', get_template_directory_uri() . "/assets/js/main.js", array(), '4.4.1', true);
}

// execute function when running the script hook
add_action('wp_enqueue_scripts', 'theme_register_scripts');


function custom_menu()
{
  $locations = array(
    'primary' => "Desktop left sidebar",
    'footer' => "Footer menu items"
  );

  register_nav_menus($locations);
}

// execute function when running the script hook
add_action('init', 'custom_menu');

function custom_widget_area()
{
  register_sidebar(
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
      'after_widget' => '</ul>',
      'name' => 'Sidebar Area',
      'id' => 'sidebar-1',
      'description' => 'Sidebar Widget Area'
    )
  );

  register_sidebar(
    array(
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
      'after_widget' => '</ul>',
      'name' => 'Footer Area',
      'id' => 'footer-1',
      'description' => 'Footer Widget Area'
    )
  );
}

add_action('widgets_init', 'custom_widget_area');
