<?php
declare(strict_types=1);

namespace iriss;

use iriss\listener\CommandListener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    protected function onEnable() : void {
        $this->getServer()->getPluginManager()->registerEvents(new CommandListener($this), $this);
    }

}