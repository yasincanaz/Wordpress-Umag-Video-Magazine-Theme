<?php
if( ! defined( 'ABSPATH' ) ) {
	die();
}

function umag_do_login_form() {
	check_ajax_referer( 'login_action', 'login_field' );

        $email    = sanitize_email( $_POST['email'] );
        $password = sanitize_text_field( $_POST['password'] );
        $remember = isset($_POST["remember"] );
        $creds=array(
            "user_login" => $email,
            "user_password" => $password,
            "remember" => $remember
        );
        $user = wp_signon( $creds, is_ssl());
        if(is_wp_error( $user )){
            wp_send_json_error(array("message" => $user->get_error_message()));
        }
        wp_send_json_success( array("message" => esc_html__("Login successful, you are redirected..","umag")));
}

add_action( 'wp_ajax_nopriv_umag_do_login_form', 'umag_do_login_form' );

function umag_do_register_form(){
	check_ajax_referer( "register_action","register_field" );
	
	$first_name= sanitize_text_field( $_POST["first_name"] );
	$last_name= sanitize_text_field( $_POST["last_name"] );
	$user_login= sanitize_text_field( $_POST["user_login"] );
	$email = sanitize_email( $_POST["email"] );
	$password = sanitize_text_field( $_POST["password"] );

	$creds=array(
		"first_name" => $first_name,
		"last_name"  => $last_name,
		"user_login"   => $user_login,
		"show_admin_bar_front" => true,
		"user_email" => $email,
		"user_pass" => $password,
	);
	$user=wp_insert_user( $creds );

	if(is_wp_error( $user )){
		wp_send_json_error( array("message" => $user->get_error_message()));
	}
	$log=array(
		"user_login" => $email,
		"user_password" => $password
	);
	$login_user=wp_signon( $log);
	wp_send_json_success( array("message" => esc_html__("registration was successful","umag")) );
}
add_action( "wp_ajax_nopriv_umag_do_register_form","umag_do_register_form" );

function umag_do_post_submit() {
	check_ajax_referer( "post-submit","security");

	$thumbnail_id= media_handle_upload( 'thumbnail',0);

	$title   = sanitize_text_field($_POST["title"]);
	$content = wp_kses_post($_POST["content"]);
	$tags    = sanitize_text_field($_POST["tags"]);
	$cat = (int) $_POST[ 'category' ];
	$post_submit=array(
		"post_author" => get_current_user_id(),
		"post_content" => $content,
		"post_title" => $title,
		"post_category" => array($cat),
		"tags_input" => explode("," , $tags) ,
	);
	$post_id=wp_insert_post($post_submit);

	if(is_wp_error( $post_id )){
		wp_send_json_error( array("message" => $post_id->get_error_message()));
	}
	if(! is_wp_error( $thumbnail_id )){
		set_post_thumbnail( $post_id , $thumbnail_id );
	}
	wp_send_json_success( array("message" => esc_html__("Content submitted successfully, waiting for confirmation","umag")));
}

add_action( 'wp_ajax_umag_do_post_submit', 'umag_do_post_submit' );

