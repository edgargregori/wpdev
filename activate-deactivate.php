<?php

/*

Plugin Name: Deactivation & Activation

Description: Welcome to WordPress plugin development.

Plugin URI:  https://something.com/

Author:      Ana Loyo

Version:     1.0

License:     GPLv2 or later

License URI: https://www.gnu.org/licenses/gpl-2.0.txt



This program is free software; you can redistribute it and/or

modify it under the terms of the GNU General Public License

as published by the Free Software Foundation; either version

2 of the License, or (at your option) any later version.



This program is distributed in the hope that it will be useful,

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

GNU General Public License for more details.



You should have received a copy of the GNU General Public License

with this program. If not, visit: https://www.gnu.org/licenses/



*/
namespace Pruebas;

//Hacer algo al activar
/*
function myplugin_on_activation (){

  if(!current_user_can('activate_plugins')) return;

  add_option ('myplugin_posts_per_page',10);

  add_option('myplugin_show_welcome_page',true);

}

register_activation_hook(__FILE__,'myplugin_on_activation');

 */





// Hacer algo al desactivar

function myplugin_on_deactivation() {

  //wp_die('El plugin ha sido desactivado...');

	if ( ! current_user_can( 'activate_plugins' ) ) return;



	flush_rewrite_rules();



}

register_deactivation_hook( __FILE__, 'myplugin_on_deactivation' );



// Hacer algo al desinstalar

function myplugin_on_uninstall() {



	if ( ! current_user_can( 'activate_plugins' ) ) return;



	delete_option( 'myplugin_posts_per_page', 10 );

	delete_option( 'myplugin_show_welcome_page', true );



}

register_uninstall_hook( __FILE__, 'myplugin_on_uninstall' );



///*

//Singleton

class Myplugin{

     static function install() {

            // do not generate any output here

            add_option ('myplugin_posts_per_page',10);

            add_option('myplugin_show_welcome_page',true);

            // wp_die('El plugin ha sido activado...');

     }

}

register_activation_hook( __FILE__, array( 'MyPlugin', 'install' ) );



//*/
