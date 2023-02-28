<?php
/*
Plugin Name: Contact Form
Plugin URI: http://programmerblog.net 
Description: A simple contact form plugin
Version: 1.0
Author: Programmer Blog
Author URI: http://programmerblog.net
*/

function display_contact_form() {
  $form = '<form action="" method="post">';
  $form .= '<label for="name">Name:</label>';
  $form .= '<input type="text" id="name" name="name" required><br>';
  $form .= '<label for="email">Email:</label>';
  $form .= '<input type="email" id="email" name="email" required><br>';
  $form .= '<label for="message">Message:</label>';
  $form .= '<textarea id="message" name="message" required></textarea><br>';
  $form .= '<input type="submit" name="submit" value="Submit">';
  $form .= '</form>';

  return $form;
}

function process_contact_form() {
  if ( isset( $_POST['submit'] ) ) {
    $to = get_option( 'admin_email' );
    $subject = 'Contact Form Submission';
    $body = 'Name: ' . $_POST['name'] . "\n\n";
    $body .= 'Email: ' . $_POST['email'] . "\n\n";
    $body .= 'Message: ' . $_POST['message'];
    $headers = array( 'Content-Type: text/html; charset=UTF-8' );

    wp_mail( $to, $subject, $body, $headers );
  }
}

function add_contact_form_to_content($content) {
  if ( is_single() ) {
    $content .= display_contact_form();
    $content .= process_contact_form();
  }
  return $content;
}
add_filter( 'the_content', 'add_contact_form_to_content' );

function load_contact_form_css() {
  wp_enqueue_style( 'wp-contact-form', plugin_dir_url( __FILE__ ) . 'wp-contact-form.css' );
}
add_action( 'wp_enqueue_scripts', 'load_contact_form_css' );

