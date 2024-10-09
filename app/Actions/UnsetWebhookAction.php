<?php

declare(strict_types=1);

namespace App\Actions;

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

class UnsetWebhookAction
{
    public function __invoke()
    {
        try {
            // Create Telegram API object
            $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'), env('TELEGRAM_BOT_USERNAME'));

            // Unset / delete the webhook
            $result = $telegram->deleteWebhook();

            echo $result->getDescription();
        } catch (TelegramException $e) {
            echo $e->getMessage();
        }
    }
}
