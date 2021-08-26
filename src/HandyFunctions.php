<?php
/**
 * Moqo plugin for Craft CMS 3.x
 *
 * A kickstart plugin for your craft project where you can use some of the most handy functions that are easy accessible with this plugin
 *
 * @link      https://www.github.com/MOQOplugins
 * @copyright Copyright (c) 2021 MOQOplugins
 */

namespace moqobe\handyfunctions;

use moqobe\handyfunctions\variables\FunctionsVariable;
use moqobe\handyfunctions\CraftVariable

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;

use yii\base\Event;

class HandyFunctions extends Plugin {
    public static $plugin;
    public $schemaVersion = '1.0.0';
    public $hasCpSettings = false;
    public $hasCpSection = false;

    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('functions', FunctionsVariable::class);
            }
        );
    }
}
