<?php 

if (!is_admin()) add_action("wp_enqueue_scripts", "dtla_jquery", 11);
function dtla_jquery() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}



if (!is_admin()) add_action("wp_enqueue_scripts", "laac_scripts", 11);
function laac_scripts() {
   wp_register_script('main_scripts', '/assets/javascripts/main.min.js', false, null);
   wp_enqueue_script('main_scripts');
}


// if (!is_admin()) add_action("wp_enqueue_scripts", "symbolset_scripts", 11);
// function symbolset_scripts() {
//    wp_register_script('icon_scripts', '/assets/javascripts/scripts.min.js', false, null, true);
//    wp_enqueue_script('icon_scripts');
// }


// if (!is_admin()) add_action("wp_enqueue_scripts", "history_scripts", 11);
// function history_scripts() {
//   if ( is_page( 'history' ) ){
//     wp_register_script('history_scripts', '/assets/javascripts/history.page.js', false, null);
//     wp_enqueue_script('history_scripts');
//   }
// }
