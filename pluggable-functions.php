<?php

/*

Plugin Name: Pluggable functions

Description: Welcome to WordPress plugin development.

Plugin URI:  https://something.com/

Author:      Ana Loyo

Version:     1.0

License:     GPLv2 or later

License URI: https://www.gnu.org/licenses/gpl-2.0.txt

*/

// pluggable function

/*

function wp_logout() {

	wp_destroy_current_session();

	wp_clear_auth_cookie();



	myplugin_custom_logout();


 */
	/**

	 * Fires after a user is logged-out.

	 *

	 * @since 1.5.0

	 */

/*
	do_action( 'wp_logout' );

}
*/
/*
do_action( 'wp_logout' );


// customize logout function

function myplugin_custom_logout() {



	// Hace algo cuando el usuario sale logs out..



}

add_action( 'wp_logout', 'myplugin_custom_logout' );
 */
