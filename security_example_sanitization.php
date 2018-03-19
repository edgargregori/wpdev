<?php

/*

Plugin Name: Security Example:Data sanitization

Description: Welcome to WordPress plugin development.

Plugin URI:  https://something.com/

Author:      Ana Loyo

Version:     1.0

License:     GPLv2 or later

License URI: https://www.gnu.org/licenses/gpl-2.0.txt

*/



// Despliega formulario

function myplugin_form_favorite_movie() {



	?>



	<form method="post">

		<p><label for="movie">Cuál es tu película favorita?</label></p>

		<p><input id="movie" type="text" name="myplugin-favorite-movie"></p>

		<p><label for="movie">Genero favorito?</label></p>

		<p><input id="movie" type="text" name="myplugin-favorite-genero"></p>

		<p><input type="submit" value="Enviar"></p>

	</form>



<?php



}







// Procesa el envío del formulario

function myplugin_process_favorite_movie() {


   if ( !empty($_POST) ) {
		$fav_movie = sanitize_text_field( $_POST[ 'myplugin-favorite-movie' ] );
		$fav_genero = sanitize_text_field( $_POST[ 'myplugin-favorite-genero' ] );
//	if ( isset( $_POST['myplugin-favorite-movie'] ) ) {
//		$fav_movie = sanitize_text_field( $_POST[ 'myplugin-favorite-movie' ] );


        //msg from validation
		if ( ! empty( $fav_movie ) ) {



			echo '<p>Tu película favorita es '. $fav_movie .'.</p>';



		} else {



			echo '<p>Por favor escribe tu película favorita!</p>';



		}

		if ( ! empty( $fav_genero ) ) {



			echo '<p>Tu genero favorito es '. $fav_genero .'.</p>';



		} else {



			echo '<p>Por favor escribe tu genero favorito!</p>';



		}


	}



}





/*

	Añadiendo el menú y las configuraciones de página

*/



// añade top-level menu

function security_example_sanitization_add_toplevel_menu() {



	add_menu_page(

		'Security Example: Data Sanitization',

		'Data Sanitization',

		'manage_options',

		'security-example-sanitization',

		'security_example_sanitization_display_settings_page',

		'dashicons-admin-generic',

		null

	);
}

function security_example_sanitization_add_top_sublevel_menu() {

	add_submenu_page(
        //'index.php',
        'options-general.php',

    	'Security Example: Data Sanitization',

		'Data Sanitization',

		'manage_options',

		'security-example-sanitization',

		'security_example_sanitization_display_settings_page',

		'dashicons-admin-generic',

		null

    );       
}


//add_action( 'admin_menu', 'security_example_sanitization_add_toplevel_menu' );

add_action( 'admin_menu', 'security_example_sanitization_add_top_sublevel_menu' );






// Despliega la configuración de la página

function security_example_sanitization_display_settings_page() {



	// check if user is allowed access

	if ( ! current_user_can( 'manage_options' ) ) return;



	?>



	<div class="wrap">



		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>



		<?php myplugin_form_favorite_movie(); ?>

		<?php myplugin_process_favorite_movie(); ?>



	</div>



<?php



}
