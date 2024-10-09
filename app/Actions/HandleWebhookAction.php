<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Log;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

class HandleWebhookAction
{
    public function __invoke()
    {
        try {
            // Create Telegram API object
            $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'), env('TELEGRAM_BOT_USERNAME'));

            // Add commands classes
            $telegram->addCommandsPaths([
                __DIR__ . '/../BotCommands',
            ]);

            // Add commands classes
            // $telegram->addCommandClass(StartCommand::class);

            // Load all command-specific configurations
            // foreach ($config['commands']['configs'] as $command_name => $command_config) {
            //     $telegram->setCommandConfig($command_name, $command_config);
            // }

            // Requests Limiter (tries to prevent reaching Telegram API limits)
            $telegram->enableLimiter([
                'enabled' => (bool)env('TELEGRAM_LIMITER_ENABLED'),
            ]);

            $telegram->useGetUpdatesWithoutDatabase();
            // Handle telegram getUpdates request

            // Handle telegram webhook request
            $telegram->handle();
        } catch (TelegramException $e) {
            // Silence is golden!
            // log telegram errors
            // echo $e->getMessage();
        }
    }
}
