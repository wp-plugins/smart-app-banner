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
  // check for properties that give us the app id
  $custom_fields = get_post_custom($post_ID);
  $app_id_list = $custom_fields['wsl-app-id'];

  if (is_null($app_id_list)) {
    // no custom fields; move on
    return;
  }

  foreach ( $app_id_list as $key => $value )
    $app_id = $value;

  // if it's not there, exit
  if (is_null($app_id) or $app_id == "") {
    return;
  }

  // if it is, output the header
  echo "<meta name=\"apple-itunes-app\" content=\"app-id=$app_id\">";
}

// 
add_action( 'wp_head', 'wsl_output_safari_app_banner' );

?>
