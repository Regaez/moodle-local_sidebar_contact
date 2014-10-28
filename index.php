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
require_once(dirname(__FILE__).'/lib.php');

global $CFG;

?>

<div class="local__sidebar-contact--toggle">Contact Us</div>
<div class="local__sidebar-contact">
	<div class="toggle">X</div>
	<div class="wrapper">
		<div class="content">
			<?php echo get_config('local_sidebar_contact', 'sidebar_content'); ?>
		</div>
		<form action="" class="form">
			<input type="hidden" value="<?php echo new moodle_url($CFG->wwwroot.'/local/sidebar_contact/sendmail.php');?>" class="form__url">
			<input type="text" class="form__input form__name" name="local__sidebar-contact__name" placeholder="Your name">
			<input type="text" class="form__input form__email" name="local__sidebar-contact__email" placeholder="Your email">
			<textarea class="form__input form__message" name="local__sidebar-contact__message" placeholder="Your message"></textarea>
			<input type="submit" class="form__submit" value="Send Message">
			<div class="form__feedback__wrapper">
				<div class="form__feedback form__feedback--success">&#10004; Message sent successfully!</div>
				<div class="form__feedback form__feedback--error">&#x2716; Error sending message!</div>
			</div>
		</form>
	</div>
</div>
