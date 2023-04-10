<?php

namespace Thisnugroho\DiscordWebhook;

use Illuminate\Support\Facades\Http;
use Spatie\DiscordAlerts\DiscordAlert;
use Thisnugroho\DiscordWebhook\Elements\Element;
use Thisnugroho\DiscordWebhook\Messages\Messages;

class DiscordWebhook
{
    public function send(Element $message)
    {
        // dd($message->toPayload());
        $request = Http::asJson()
            ->post(
                env("DISCORD_WEBHOOK"),
                $payload = $message->toPayload()
            );
        dd($payload, $request->body());
    }
}
