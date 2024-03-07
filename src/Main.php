<?php

namespace xgamer6\MTD;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\server\ServerStartEvent;
use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->enabled();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function enabled() {
        $this->getLogger()->info("§aPlugin got started!");
    }

    public function onServerStart(ServerStartEvent $event): void {
        $webhookUrl = $this->getConfig()->get("webhook_url"); // Replace with your config key

        if (!empty($webhookUrl)) {
            $this->getServer()->getAsyncPool()->submitTask(new SendWebhookTask($webhookUrl, "Server started ✅"));
        }
    }
}
