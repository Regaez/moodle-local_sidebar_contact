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

<div class="local__sidebar-contact--toggle"><?php echo get_string('sidebar_toggle_text', 'local_sidebar_contact'); ?></div>
<div class="local__sidebar-contact" style="display: none;">
	<div class="toggle">X</div>
	<div class="wrapper">
		<div class="content">
			<?php echo get_config('local_sidebar_contact', 'sidebar_content'); ?>
		</div>
		<form action="" class="form">
			<input type="hidden" value="<?php
                echo new moodle_url($CFG->wwwroot.'/local/sidebar_contact/sendmail.php');
            ?>" class="form__url">
			<input type="text" class="form__input form__name" name="local__sidebar-contact__name" placeholder="<?php
                echo get_string('form_label_name', 'local_sidebar_contact');
            ?>">
			<input type="text" class="form__input form__email" name="local__sidebar-contact__email" placeholder="<?php
                echo get_string('form_label_email', 'local_sidebar_contact');
            ?>">
			<textarea class="form__input form__message" name="local__sidebar-contact__message" placeholder="<?php
                echo get_string('form_label_message', 'local_sidebar_contact');
            ?>"></textarea>
			<input type="submit" class="form__submit" value="<?php
                echo get_string('form_button_text', 'local_sidebar_contact');
            ?>">
			<div class="form__feedback__wrapper">
				<div class="form__feedback form__feedback--success">&#10004; <?php
                    echo get_string('form_message_success', 'local_sidebar_contact');
                ?></div>
				<div class="form__feedback form__feedback--error">&#x2716; <?php
                    echo get_string('form_message_fail', 'local_sidebar_contact');
                ?></div>
			</div>
		</form>
	</div>
</div>
