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
 * Settings
 *
 * @package    local
 * @subpackage sidebar_contact
 * @copyright  2014 Thomas Threadgold, LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($hassiteconfig) {
    global $CFG, $USER, $DB;

    $settings = new admin_settingpage('local_sidebar_contact', get_string('pluginname', 'local_sidebar_contact'));
    $ADMIN->add('localplugins', $settings);

    // ADD ENABLE CHECKBOX.
    $settings->add(
        new admin_setting_configcheckbox(
            'local_sidebar_contact/enable_sidebar_contact',
            get_string('enable_sidebar_contact', 'local_sidebar_contact'),
            get_string('enable_sidebar_contact_desc', 'local_sidebar_contact'),
            0
        )
    );


    // ADD EMAIL SETTING.
    $settings->add(
        new admin_setting_configtext(
            'local_sidebar_contact/email',
            get_string('email', 'local_sidebar_contact'),
            get_string('email_desc', 'local_sidebar_contact'),
            $CFG->supportemail
        )
    );


    // ADD WYSIWYG SETTING.
    $settings->add(
        new admin_setting_confightmleditor(
            'local_sidebar_contact/sidebar_content',
            get_string('sidebar_content', 'local_sidebar_contact'),
            get_string('sidebar_content_desc', 'local_sidebar_contact'),
            '<h4>Contact Us:</h4>'
        )
    );

}
