<?php

namespace xgamer6\MTD;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
use xgamer6\MTD\task\SendWebhookTask;
use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;

class Main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);

        // Server started logic
        $webhookUrl = $this->getConfig()->get("webhook_url");

        if (!empty($webhookUrl)) {
            $this->getServer()->getAsyncPool()->submitTask(new SendWebhookTask($webhookUrl, "Server started ✅"));
        }
    }
}
