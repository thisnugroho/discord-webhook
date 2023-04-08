<?php

namespace Thisnugroho\DiscordWebhook;

use Illuminate\Support\Facades\Http;
use Spatie\DiscordAlerts\DiscordAlert;
use Thisnugroho\DiscordWebhook\Messages\Messages;

class DiscordWebhook
{
    public function send(Messages $message)
    {
        $request = Http::asMultipart()
            ->post(
                env("DISCORD_WEBHOOK"),
                $message->getMessages()
            );
        dd($request->body());
    }
}
