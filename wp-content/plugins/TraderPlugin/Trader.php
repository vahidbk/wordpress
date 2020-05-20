<?php
/**
* Plugin Name: WordpressTrader 
* Plugin URI: https://github.com/vahidbk
* Description: wordpress Trader Plugin
* Version: 1.0
* Author: vahidbk
* Author URI: https://github.com/vahidbk
**/

add_action('admin_menu', 'custom_menu');
add_action('admin_menu', 'custom_menu');
add_action('admin_menu', 'custom_menu');

function custom_menu() { 
 
  add_menu_page( 
      'Wordpress Trader', 
      'Trader', 
      'edit_posts', 
      '1363', 
      'custom_dashboard_help', 
      'dashicons-media-spreadsheet' 
     );
}

function custom_dashboard_help() {
    echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>. For WordPress Tutorials visit: <a href="https://www.wpbeginner.com" target="_blank">WPBeginner</a></p>
    <label for="cars">Choose a car:</label>

<select name="cars" id="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>';

//exec('python blibble.py', $output, $ret_code);
    }

