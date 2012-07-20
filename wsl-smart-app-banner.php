<?php
/**
 * @package WSLSmartAppBanner
 * @version 0.1
 */
/*
Plugin Name: Smart App Banner
Plugin URI: http://www.wandlesoftware.com/products/open-source-software/wordpress-smart-app-banner-plugin
Description: Makes the Smart App Banner appear on iOS6 and above. Use the wsl-app-id custom field to add your App ID.
Author: Stephen Darlington, Wandle Software Limited
Version: 0.1
Author URI: http://www.wandlesoftware.com/
License: GPL
*/

/*  Copyright 2012 Stephen Darlington, Wandle Software Limited

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// This just echoes the chosen line, we'll position it later
function wsl_output_safari_app_banner($post_ID) {
  if (is_front_page()) {
    $app_id = get_option('wsl_homepage_appid');
  }
  else {
    // check for properties that give us the app id
    $custom_fields = get_post_custom($post_ID);
    $app_id_list = $custom_fields['_wsl-app-id'];

    if (is_null($app_id_list)) {
      // no custom fields; move on
      return;
    }

    foreach ( $app_id_list as $key => $value ) {
      $app_id = $value;
    }
  }

  // if it's not there, exit
  if (is_null($app_id) or $app_id == "") {
    return;
  }

  // if it is, output the header
  echo "<meta name=\"apple-itunes-app\" content=\"app-id=$app_id\">";
}

add_action( 'wp_head', 'wsl_output_safari_app_banner' );

// Admin menu gubbins
function wsl_smart_app_banner_admin_menu() {
  add_options_page( 'Smart App Banner Options',
                    'Smart App Banner',
                    'manage_options',
                    'wsl-smart-app-banner',
                    'wsl_smart_app_banner_options' );
}

function wsl_smart_app_banner_options() {
    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names 
    $opt_name = 'wsl_homepage_appid';
    $hidden_field_name = 'wsl_submit_hidden';
    $data_field_name = 'wsl_homepage_appid';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('settings saved.', 'wsl-smart-app-banner' ); ?></strong></p></div>
<?php

    }

    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Smart App Banner Settings', 'wsl-smart-app-banner' ) . "</h2>";

    // settings form
    
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Application ID shown on home page:", 'wsl-smart-app-banner' ); ?> 
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="20">
</p>
<p>(Leave blank if no banner is required on the home page.)</p>
<hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>

<?php
}

add_action( 'admin_menu', 'wsl_smart_app_banner_admin_menu' );

// register the meta box
add_action( 'add_meta_boxes', 'wsl_smart_app_banner_post_options' );
function wsl_smart_app_banner_post_options() {
    foreach (array('post','page') as $element) {
      add_meta_box(
          'wsl_smart_app_banner_id',          // this is HTML id of the box on edit screen
          'Smart App Banner',    // title of the box
          'wsl_smart_app_banner_display_options',   // function to be called to display the checkboxes, see the function below
          $element,        // on which edit screen the box should appear
          'normal',      // part of page where the box should appear
          'default'      // priority of the box
      );
    }
}

// display the metabox
function wsl_smart_app_banner_display_options( $post_id ) {
    // nonce field for security check, you can have the same
    // nonce field for all your meta boxes of same plugin
    wp_nonce_field( plugin_basename( __FILE__ ), 'wsl-sab-nonce' );

    $custom_fields = get_post_custom($post_ID);
    $app_id_list = $custom_fields['_wsl-app-id'];

    echo "App ID: <input type=\"text\" name=\"wsl_smart_app_banner_app_id\" value=\"$app_id_list[0]\" />";
}

// save data from checkboxes
add_action( 'save_post', 'wsl_smart_app_banner_app_save' );
function wsl_smart_app_banner_app_save($post_ID) {

    // check if this isn't an auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    // security check
    if ( !wp_verify_nonce( $_POST['wsl-sab-nonce'], plugin_basename( __FILE__ ) ) )
        return;

    // further checks if you like, 
    // for example particular user, role or maybe post type in case of custom post types

    // now store data in custom fields based on checkboxes selected
    if ( isset( $_POST['wsl_smart_app_banner_app_id'] ) ) {
      
      add_post_meta($post_ID, '_wsl-app-id', $_POST['wsl_smart_app_banner_app_id'] , true) or
          update_post_meta($post_ID, '_wsl-app-id', $_POST['wsl_smart_app_banner_app_id']);
    }
}

?>
