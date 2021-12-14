<?php

namespace App\Http\Controllers\TelegramBot;

use Illuminate\Http\Request;
use Longman\TelegramBot\Telegram;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Longman\TelegramBot\Exception\TelegramException;

class SetWebhookController extends Controller
{
    public function __invoke()
    {
        $bot_api_key  = config("telegram.key");
        $bot_username = config("telegram.name");
        $subdomain = config("telegram.domain") ?  "https://".config("telegram.domain") : asset('');
        $hook_url     = $subdomain ."/api/telegram"; 
        

        try {
            // Create Telegram API object
            $telegram = new Telegram($bot_api_key, $bot_username);

            // Set webhook
            $result = $telegram->setWebhook($hook_url, ['certificate' => base_path("../../data/ssl/docker.loc.crt")]);
            dump($hook_url);
            if ($result->isOk()) {
                Log::info($result->getDescription());
                echo "OK!";
            } else {
                Log::error("An error occured with setting webhook!");
                echo "Not OK, check logs";
            }
        } catch (TelegramException $e) {
            dump($hook_url);
            dump($e);
            // log telegram errors
            // echo $e->getMessage();
        }
    }
}
