<?php
/*
* Plugin Name: Examplugin
* Description: This plugin is for my examproject. It will allow you to combine several products into one package.
* Plugin URI: http://mariadesiree.se
* Author: Maria Cetinic
* Author URI: http://mariadesiree.se
* Version: 0.0.1
*/


// För säkerheten. Gör en exit ifall det är någon annan som inte tillhör abspath
if ( ! defined ('ABSPATH') ) {
    exit;
}

//försäkrar pathen till den här filen. Låter dig veta att detta är huvudfilen så resterande filer kan kopplas ihop
require_once ( plugin_dir_path (__FILE__) . 'ep-cpt.php');
require_once ( plugin_dir_path(__FILE__) . 'ep-render-admin.php');
require_once( plugin_dir_path (__FILE__) . 'ep-fields.php' );

function dwwp_admin_enqueue_scripts() {
    //definiera två globala variablar
    global $pagenow, $typenow;

    //$screen = get_current_screen();
    //strängen syns om jag tar display:none på vänstra admin baren...
    //var_dump($screen);

    if ( ($pagenow == 'post.php' || $pagenow == 'post-new.php') && $typenow == 'box' ) {
        //enqueue our admin style
        wp_enqueue_style('dwwp-admin-css', plugins_url( 'assets/css/admin-boxes.css', __FILE__  ) );
        wp_enqueue_script( 'dwwp-box-js', plugins_url( 'assets/js/admin-boxes.js', __FILE__ ), array('jquery', 'jquery-ui-datepicker' ), '20180119', true );
    }
}
//styles som används endast i admin, ta en hook som anpassar sig efter det.
add_action('admin_enqueue_scripts', 'dwwp_admin_enqueue_scripts');

//för front-end används en annan hook