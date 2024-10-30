<?php
/**
 * User guide page.
 */

namespace EnDayrossUserGuide;

/**
 * User guide add detail.
 * Class EnDayrossUserGuide
 * @package EnDayrossUserGuide
 */
if (!class_exists('EnDayrossUserGuide')) {

    class EnDayrossUserGuide
    {

        /**
         * User Guide template.
         */
        static public function en_load()
        {
            ?>
            <div class="en_user_guide">
            <p>
                <?php _e('The User Guide for this application is maintained on the publishers website. To view it click <a href="' . esc_url(EN_DAYROSS_DOCUMENTATION_URL) . '" target="_blank">here</a> or paste the following link into your browser.', 'eniture-technology'); ?>
            </p>
            <?php
            echo esc_url(EN_DAYROSS_DOCUMENTATION_URL);
        }

    }

}