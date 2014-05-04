<?php
/* 
* @Author: Damien Corona
* @Date:   2014-05-02 11:40:40
* @Last Modified by:   Damien Corona
* @Last Modified time: 2014-05-04 16:41:53
*/

/**
 * Validation of the form
 */
function validate_form($data)
{
	$error = array();
	if (!isset($data['firstname']) || $data['firstname'] == '') {
		$error[] = "The firstname is required";
	}

	if (!isset($data['lastname']) || $data['lastname'] == '') {
		$error[] = "The lastname is required";
	}

	if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
		$error[] = "The email is required and must be a valid address";
	}

	if(!isset($data['pass']) || $data['pass'] == '') {
		$error[] = "The password is required";
	}

	if(!isset($data['confirm']) || $data['confirm'] == '') {
		$error[] = "The password's confirmation is required";
	}

	if (isset($data['pass']) && isset($data['confirm']) && $data['pass'] != $data['confirm']) {
		$error[] = "the password and the confirmation are not equal";
	}

	return (empty($error)) ? false : '<ul><li>'.implode('</li><li>', $error).'</li></ul>';
}

/**
 * Register a new user
 * @param  array $data info from form
 * @return bool        
 */
function register_user($data)
{

	$user["user_login"] = $_POST["email"];
    $user["user_pass"] = $_POST["pass"];
    $user["user_email"] = $_POST["email"];
    $user["first_name"] = $_POST["firstname"];
    $user["last_name"] = $_POST["lastname"];
    $user["display_name"] = $_POST["firstname"].' '.$_POST["lastname"];
    $user["user_nicename"] = $_POST["firstname"].' '.$_POST["lastname"];
    $user["password_clear"] = $_POST["pass"];
    $user["password"] = wp_hash_password($_POST["pass"]);
    $user["role"] = 'subscriber';
    $user["user_registered"] = date('Y-m-d H:i:s');
    $user["show_admin_bar_front"] = false;

    $key = wp_generate_password(20);
    $user_id = wp_insert_user($user);

    if (is_int($user_id)) {
    	add_user_meta( $user_id, 'key', $key, true );
    	return $user;
    }
    return $user_id->errors;
}

/**
 * Send a confirmation email
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
function send_email($data)
{
	$user_info = '<ul style="list-style-type: none;">';
	$user_info .= '<li>Name: '.$data["display_name"].'</li>';
	$user_info .= '<li>Login: '.$data["user_login"].'</li>';
	$user_info .= '<li>Password: '.$data["password_clear"].'</li>';
	$user_info .= '</ul>';
	$headers = 'From: Desks <noreply@desks.com>' . "\r\n";
	wp_mail( $data['user_email'], get_option('subject_email'), str_replace('[user_info]', $user_info, get_option('text_email')), $headers);
	return 1;
}