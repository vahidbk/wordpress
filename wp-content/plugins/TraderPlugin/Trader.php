<?php
/*
Plugin Name:Trader
Plugin Type:piklist
*/
add_filter('piklist_admin_pages', 'my_admin_pages');

function my_admin_pages($pages) {

    $pages[] = array(
      'page_title' => 'Trader'
      ,'menu_title' => 'Trader'
      ,'menu_slug' => 'about_my_plugin'
      ,'capability' => 'manage_options'
    );

    return $pages;
  }

function my_enqueue_files() {
    wp_enqueue_script( 'my-great-script', get_template_directory_uri() . '/wordpress/wp-content/plugins/customPlugin/js/jquery-3.5.1.min.js', array( 'jquery' ), '1.0.0', true );

    wp_enqueue_style( 'chosen_styles', 'https://harvesthq.github.io/chosen/chosen.css', false );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'chosen_js', 'https://harvesthq.github.io/chosen/chosen.jquery.js', array('jquery'), null, true );
    wp_enqueue_style( 'select2_styles', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css', false );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'select2_js', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js', array('jquery'), null, true );
  
}
// add_action( 'wp_enqueue_scripts', 'my_enqueue_files' );
add_action( 'admin_enqueue_scripts', 'my_enqueue_files' );
?>