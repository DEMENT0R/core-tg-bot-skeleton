<?php

declare(strict_types=1);

namespace App\Actions;

use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Telegram;

class SetWebhookAction
{
    public function __invoke()
    {
        try {
            // Create Telegram API object
            $telegram = new Telegram(env('TELEGRAM_BOT_TOKEN'), env('TELEGRAM_BOT_USERNAME'));

            // Set webhook
            $result = $telegram->setWebhook(env('TELEGRAM_WEBHOOK_URL'));
            if ($result->isOk()) {
                echo $result->getDescription();
            }
        } catch (TelegramException $e) {
            // log telegram errors
            echo $e->getMessage();
        }
    }
}
