<?php

namespace xgamer6\MTD;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase {

    public function onEnable(): void {
        $this->enabled();
    }

    public function enabled() {
        $this->getLogger()->info("§aPlugin got started!");
    }
}
