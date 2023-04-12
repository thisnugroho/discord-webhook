<?php

namespace Thisnugroho\DiscordWebhook;

use Illuminate\Support\Facades\Http;
use Spatie\DiscordAlerts\DiscordAlert;
use Thisnugroho\DiscordWebhook\Elements\Element;
use Thisnugroho\DiscordWebhook\Exceptions\DiscordWebhookException;
use Thisnugroho\DiscordWebhook\Messages\Messages;

class DiscordWebhook
{

    private Element $element;


    private function getPayload(): array
    {
        return $this->element->toPayload();
    }

    private function getPayloadKeys(): array
    {
        return array_keys($this->getPayload());
    }

    public function send(Element $element)
    {
        $this->element = $element;
        if (($fileExists = in_array('file', $this->getPayloadKeys())) && in_array('embeds', $this->getPayloadKeys())) {
            throw new DiscordWebhookException("Embeds and files cannot be sent at once");
        }

        $baseRequest = $fileExists ? Http::asMultipart() : Http::asJson();

        $request = $baseRequest
            ->post(
                env("DISCORD_WEBHOOK"),
                $this->getPayload()
            );
        return $request->body();
    }
}
