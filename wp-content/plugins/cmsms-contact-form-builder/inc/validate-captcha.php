<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.2.0
 * 
 * Contact Form Shortcode reCAPTCHA Validator
 * Changed by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


require_once(CMSMS_FORM_BUILDER_PATH . 'inc/recaptchalib.php');


$cmsms_option = cmsms_get_global_options();


$resp = recaptcha_check_answer($cmsms_option[CMSMS_SHORTNAME . '_recaptcha_private_key'], $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);


if (!$resp->is_valid) {
	echo 'error';
} else {
	echo 'success';
}

