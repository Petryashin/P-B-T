<?php

namespace App\Services;

use Longman\TelegramBot\Telegram;
use Illuminate\Support\Facades\Log;

abstract class TelegramService
{
    public static function getTelegram()
    {
        $bot_api_key  = config("telegram.key");
        $bot_username = config("telegram.name");
        $mysql_credentials = [
            'host'     => 'mysql',
            'port'     => 3306, // optional
            'user'     => config("access.user"),
            'password' => config("access.password"),
            'database' => config("access.database"),
        ];
        // Create Telegram API object
        // Log::debug($mysql_credentials);
        $telegram = new Telegram($bot_api_key, $bot_username);
        $telegram->enableMySql($mysql_credentials);
        $telegram->addCommandsPaths([app_path("BotCommands")]); //. "\BotCommands"
        $telegram->setDownloadPath(storage_path('app/public/telegram/photos'));
        return $telegram;
    }
}
