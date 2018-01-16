<?php 
/*
* Plugin Name: Boxful
* Plugin URI: http://mariadesiree.se
* Author: Maria Cetinic
* Author URI: http://mariadesiree.se
* Version: 0.0.1
* Description: This plugin is useful for products that you want to have together like in a package.
*/

//pattern that is gonna be used working with Wordpress Hooks
//do a function because you wanna do something, name it.

function dwwp_remove_dashboard_widget() {
    //remove news widget
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    //which id, what kind of page, which section
}

//Core fundamentials
add_action('wp_dashboard_setup', 'dwwp_remove_dashboard_widget'); //takes 4 parameters, Hooks: where you want to Wordpress to execute the code. There are already built in ones.
// you want your function to get executed at a certain point in time and at a certain point in time will determine which hook
//first put a hook, and then the next thing is the function to be added
//add_filter('a_hook', 'dwwp_do_something_cool');
//dwwp = develop with wordpress. Important to prefix your functions. Why? No collision with same name. dwwp is a prefix


function dwwp_add_google_link() {
    //add link in admin panel
    //find global variabel
    global $wp_admin_bar;
    //var_dump($wp_admin_bar);
    $args = [
        //key => value
        'id' => 'google_analytics',
        'title' => 'Google Analytics',
        'href' => 'http://google.com/analytics'
    ];
    $wp_admin_bar->add_menu($args);
}
add_action('wp_before_admin_bar_render', 'dwwp_add_google_link');

//filter does something different with a excisting data
