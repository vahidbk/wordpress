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

function enqueue_select2_jquery() {
  wp_register_style( 'select2css', '//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.css', false, '1.0', 'all' );
  wp_register_script( 'select2', '//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_style( 'select2css' );
  wp_enqueue_script( 'select2' );
  wp_enqueue_script( 'jquery' );

  wp_register_style( 'persianDatepicker', '/wp-content/plugins/TraderPlugin/css/persianDatepicker-default.css', false, '1.0', 'all' );
  wp_register_script( 'persianDatepicker', '/wp-content/plugins/TraderPlugin/js/persianDatepicker.min.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_style( 'persianDatepicker' );
  wp_enqueue_script( 'persianDatepicker' );

}
add_action( 'admin_enqueue_scripts', 'enqueue_select2_jquery' );

?>


