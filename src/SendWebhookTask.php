<?php

namespace xgamer6\MTD\task;

use pocketmine\scheduler\AsyncTask;
use pocketmine\utils\Internet;

class SendWebhookTask extends AsyncTask {

    private $webhookUrl;
    private $message;

    public function __construct(string $webhookUrl, string $message) {
        $this->webhookUrl = $webhookUrl;
        $this->message = $message;
    }

    public function onRun(): void {
        $data = [
            "content" => $this->message
        ];

        Internet::postURL($this->webhookUrl, json_encode($data), 5, [], "application/json");
    }
}
