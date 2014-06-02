<?php
/*
Plugin Name: MailPoet - Contact Form 7 Integration
Plugin URI: https://github.com/BFTrick/mailpoet-contact-form-7
Description: Add a MailPoet signup field to your Contact Form 7 forms
Author: Patrick Rauland
Author URI: http://www.patrickrauland.com/
Text Domain: mpcf7
Domain Path: /languages/
Version: 1.0.2
*/

// require the mailpoet signup field module
include('modules'.DIRECTORY_SEPARATOR.'mailpoet-signup.php') ;


/**
 * Get an array of MailPoet lists
 *
 * @return mixed
 */
function wpcf7_mailpoetsignup_get_lists() {

	// make sure we have the class loaded
	if ( ! ( class_exists( 'WYSIJA' ) ) ) {
		return;
	}

	// get MailPoet / Wysija lists
	$model_list = WYSIJA::get('list','model');
	$mailpoet_lists = $model_list->get( array( 'name', 'list_id' ), array( 'is_enabled'=>1 ) );

	return $mailpoet_lists;
}