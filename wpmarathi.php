<?php
    /*
    
    Plugin Name: WPMarathi
    Description: Type in Marathi inside WordPress. Hello -> हेलो. WPMarathi helps you save time by letting you type inside Classic Editor and Gutenberg in Marathi.
    Author: Zozuk
    Author URI: https://www.zozuk.com
    Version: 1.0.0
    Requires at least: 5.0
    
    */
    include(plugin_dir_path(__FILE__).'constant.php');
    include(plugin_dir_path(__FILE__).'class/wpmarathi-transliterator.php');

    add_action( 'admin_enqueue_scripts', function($hook){
        new WPMarathi_Transliterator($hook);
    });

    /*
        Enqueue Required FrontEnd Scripts.
    */
    add_action( 'wp_enqueue_scripts', function($hook){
        wp_enqueue_style('wpmarathi-frontend',
            plugin_dir_url(__FILE__).'/assets/css/wpmarathi-frontend.css',
            null,
            WPMARATHI_VERSION
        );
    });