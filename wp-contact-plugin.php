<?php
/**
 * Plugin Name: WP Contact Form Plugin
 * Description: contact form plugin for WordPress 
 * Author: Letizia DI MAIO
 * Author URI: https://letiziadimaio.netlify.app/
 * Version: 1.0.0
 * Text Domain: wp-contact-plugin
 */

 function wp_contact_plugin()
 {
    $content = '';
    $content .= '<h2>Contact Us!</h2>';
    $content .= '<form method="post" action="http://plugin-creation.local/thank-you/">';

    $content .= '<label for="your_name">Name</label>';
    $content .= '<input type="text" name="your_name" placeholder="Enter your name" class="form-control" />';
    
    $content .= '<label for ="your_email">Email</label>';
    $content .= '<input type="email" name="your_email" placeholder="Enter your email" class="form-control" />';

    $content .= '<label for="your_comments">Questions or comments</label>';
    $content .= '<textarea name="your_comments" placeholder="Enter your questions or comments" class="form-control"></textarea>';

    $content .= '<input type="submit" name="wp_contact_submit" value ="SEND YOUR INFORMATION" class="btn btn-md btn-primary">';
    $content .= '</form>';
    
    return $content;
 }

 add_shortcode('wp_contact', 'wp_contact_plugin');

 function wp_contact_capture()
{
        if(isset($_POST['wp_contact_submit']))
        {
        $name = sanitize_text_field($_POST['your_name']);
        $email = sanitize_text_field($_POST['your_email']);
        $comments = sanitize_textarea_field($_POST['your_comments']);
        
        $to = 'juliet@plugin-creation.local';
        $subject = 'Test form submission';
        $message = ''.$name.' - '.$email.' - '.$comments; 

        wp_mail($to, $subject, $message);
    }
}
add_action('wp_head', 'wp_contact_capture');







?>