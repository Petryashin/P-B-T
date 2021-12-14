<?php

namespace App\Http\Controllers\TelegramBot;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\TelegramService;

class TelegramMessageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Log::debug("Message get away from");
        $telegram = TelegramService::getTelegram();
        $telegram->handle();
    }
}
