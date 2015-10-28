<?php
// This file is part of the Don't Memorise Dashboard block
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
 * @package    block
 * @subpackage categoryicons
 * @copyright  2015 Bas Brands, bas@sonsbeekmedia.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_categoryicons extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_categoryicons');
    }

    public function instance_allow_multiple() {
        return false;
    }

    public function has_config() {
        return true;
    }

    public function instance_allow_config() {
        return true;
    }

    public function applicable_formats() {
        return array(
            'admin' => true,
            'site-index' => true,
            'course-view' => true,
            'mod' => true,
            'block' => true,
            'my' => true
        );
    }

    public function specialization() {
    }

    public function get_content() {
        global $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->config)) {
            $this->config = new stdClass();
        } else {
            $config = get_config('block_categoryicons');
        }

        $this->content = new stdClass();

        $this->content->text = html_writer::start_tag('div', array('class' => 'container-fluid'));
        $this->content->text .= html_writer::start_tag('div', array('class' => 'text-center'));
        $this->content->text .= html_writer::tag('h2', get_string('heading', 'block_categoryicons'));

        $this->content->text .= '<hr class="star-primary">';
        $this->content->text .= html_writer::end_tag('div');
        $this->content->text .= $OUTPUT->fronticons();

        $this->content->text .= html_writer::end_tag('div');

        return $this->content;
    }
}