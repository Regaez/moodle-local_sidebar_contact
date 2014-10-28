<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle Plugin
 *
 * Index file
 *
 * @package    local
 * @subpackage sidebar_contact
 * @copyright  2014 Thomas Threadgold, LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


require_once(dirname(dirname(dirname(__FILE__))).'/config.php');

if( isset($_POST['action']) && $_POST['action'] === 'sendmail' ) {

	// GET POST VARS
	$userName = $_POST['name'];
	$userEmail = $_POST['email'];
	$userMessage = $_POST['message'];

	// GET SUPPORT CONTACT EMAIL
	$to = get_config('local_sidebar_contact', 'email');

	if(!isset($to) || strlen($to) < 1 ) {
		$to = $CFG->supportemail;
	}

	// FORM EMAIL PARAMS
	$subject = 'New Contact Message';
	$message = sprintf(
		'<p>Name: %s</p><p>Email: %s</p><p>%s</p>',
		$userName,
		$userEmail,
		$userMessage		
	);

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ' . $userEmail . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	// SEND EMAIL
	$result = mail($to, $subject, $message, $headers);

	// RETURN RESULT
	if($result) {
		echo 'true';
		exit;
	} else {
		echo 'false';
	}
} else {
	echo 'wrong action';
}

?>


