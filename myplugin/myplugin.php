<?php
/*
Plugin Name:  MyPlugin
Description:  Ejemplo de Plugin, "WordPress: Plugin Development".
Plugin URI:   https://something
Author:       Nombre del Autor
Version:      1.0
Text Domain:  myplugin
Domain Path:  /languages
License:      GPL v2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
*/



// salida si el archivo se solicita directo
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}



// carga los textos
function myplugin_load_textdomain() {

	load_plugin_textdomain( 'myplugin', false, plugin_dir_path( __FILE__ ) . 'languages/' );

}
add_action( 'plugins_loaded', 'myplugin_load_textdomain' );



// se incluyen las dependencias para el administrador
if ( is_admin() ) {

	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';

}

// se incluyen las dependencias públicas
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';



// Opciones por default del plugin- las del formulario
function myplugin_options_default() {

	return array(
		'custom_url'     => 'https://wordpress.org/',
		'custom_title'   => esc_html__('Powered by WordPress', 'myplugin'),
		'custom_style'   => 'disable',
		'custom_message' => '<p class="custom-message">'. esc_html__('My custom message', 'myplugin') .'</p>',
		'custom_footer'  => esc_html__('Special message for users', 'myplugin'),
		'custom_toolbar' => false,
		'custom_scheme'  => 'default',
	);

}
