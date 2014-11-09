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
 * lib
 *
 * @package    local
 * @subpackage sidebar_contact
 * @copyright  2014 Thomas Threadgold, LearningWorks Ltd
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $COURSE, $USER, $DB, $CFG, $PAGE;

function local_sidebar_contact_init() {
    global $CFG, $PAGE;

    // IF THE PLUGIN IS ENABLED.
    if ( local_sidebar_contact_enable_sidebar_contact() ) {

        // ADD JAVASCRIPT.
        $PAGE->requires->jquery();
        $PAGE->requires->js( new moodle_url($CFG->wwwroot . '/local/sidebar_contact/js/scripts.js') );
    }
}

function local_sidebar_contact_enable_sidebar_contact() {
    $enabled = get_config('local_sidebar_contact', 'enable_sidebar_contact');
    if (empty($enabled)) {
        return false;
    } else {
        return true;
    }
}

// INITIALISE THE PLUGIN.
local_sidebar_contact_init();