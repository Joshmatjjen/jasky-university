<?php

/*
Plugin Name: My First Amazing Plugin
Description: This plugin will change your life
*/

add_shortcode('programCount', 'programCountFunction');

function programCountFunction(){
    return 2;
}


// Make research of @  codex.wordpress.org    developer.wordpress.org
// add_menu_page();
// add_option();
// get_option();
// update_option();
// delete_option();