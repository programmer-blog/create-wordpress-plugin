<?php 
/* 
Plugin Name: My First Plugin Plugin 
URI: https://www.example.com/my-first-plugin 
Description: This plugin displays a custom message to visitors of the site. 
Version: 1.0 
Author: Programmer Blog 
Author URI: http://programmerblog.net 
License: GPLv2 or later Text 
Domain: http://programmerblog.net/ 
*/

function display_message() { 
    echo "Welcome to our website!"; 
}

add_action('wp_footer', 'display_message');