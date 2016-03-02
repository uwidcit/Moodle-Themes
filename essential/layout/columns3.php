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
 * This is built using the bootstrapbase template to allow for new theme's using
 * Moodle's new Bootstrap theme engine
 *
 * @package     theme_essential
 * @copyright   2013 Julian Ridden
 * @copyright   2014 Gareth J Barnard, David Bezemer
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(\theme_essential\toolbox::get_include_file('additionaljs'));
require_once(\theme_essential\toolbox::get_include_file('header'));

if (core_useragent::get_device_type() == "tablet") {
    $tablet = true;
} else {
    $tablet = false;
}
?>

<div id="page" class="container-fluid">
    <div id="page-navbar" class="clearfix row-fluid">
        <div
            class="breadcrumb-nav pull-<?php echo ($left) ? 'left' : 'right'; ?>"><?php echo $OUTPUT->navbar(); ?></div>
        <nav
            class="breadcrumb-button pull-<?php echo ($left) ? 'right' : 'left'; ?>"><?php echo $OUTPUT->page_heading_button(); ?></nav>
    </div>
    <section role="main-content">
        <!-- Start Main Regions -->
        <div id="page-content" class="row-fluid">
            <div id="<?php echo $regionbsid ?>" class="span9">
                <div class="row-fluid">
                    <?php if ($tablet) { ?>
                        <section id="region-main" class="span12">
                    <?php } else if ($hasboringlayout) { ?>
                        <section id="region-main" class="span8 pull-right">
                    <?php } else { ?>
                        <section id="region-main" class="span8 desktop-first-column">
                    <?php }
                    if ($COURSE->id > 1) {
                        echo $OUTPUT->heading(format_string($COURSE->fullname), 1, 'coursetitle');
                        echo '<div class="bor"></div>';
                    }
                    echo $OUTPUT->course_content_header();
                    echo $OUTPUT->main_content();
                    if (empty($PAGE->layout_options['nocoursefooter'])) {
                        echo $OUTPUT->course_content_footer();
                    }
                    ?>  </section> <?php
                    if (!$tablet) {
                        if ($hasboringlayout) {
                            echo $OUTPUT->blocks('side-pre', 'span4 desktop-first-column');
                        } else {
                            echo $OUTPUT->blocks('side-pre', 'span4 pull-right');
                        }
                    } ?>
                </div>
            </div>
            <?php
            if ($tablet) {
                ?> <div class="span3"><div class="row-fluid"> <?php
                echo $OUTPUT->blocks('side-pre', '');
                echo $OUTPUT->blocks('side-post', '');
                ?> </div></div> <?php
            } else {
                echo $OUTPUT->blocks('side-post', 'span3');
            }
            ?>
        </div>
        <!-- End Main Regions -->
    </section>
</div>

<?php require_once(\theme_essential\toolbox::get_include_file('footer')); ?>
</body>
</html>