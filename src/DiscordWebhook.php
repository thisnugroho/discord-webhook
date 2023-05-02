<?php

namespace Thisnugroho\DiscordWebhook;

use Illuminate\Support\Facades\Http;
use Thisnugroho\DiscordWebhook\Elements\Element;
use Thisnugroho\DiscordWebhook\Exceptions\DiscordWebhookException;

class DiscordWebhook
{

    protected Element | string | array $payload = [];

    protected bool $payloadHasFile = false;

    public function getPayload(): array | null
    {
        return match (gettype($this->payload)) {
            'string' => json_decode($this->payload, true),
            'object' => $this->payload->toArray(),
            default => $this->payload,
        };
    }

    public function isPayloadHasFile(): bool
    {
        return $this->payloadHasFile;
    }

    protected function getBaseRequest(bool $multipart = false)
    {
        return $multipart ? Http::asMultipart() : Http::asJson();
    }

    protected function payloadIsRaw(): bool
    {
        return is_string($this->payload);
    }

    protected function validatePayload(): void
    {
        $payload = $this->getPayload();
        if (json_last_error() != JSON_ERROR_NONE) {
            throw new DiscordWebhookException("Payload is not valid JSON");
        }

        $payloadKeys = array_keys($payload);
        $this->payloadHasFile = in_array('file', $payloadKeys);

        if ($this->isPayloadHasFile() && in_array('embeds', $payloadKeys)) {
            throw new DiscordWebhookException("Embeds and files cannot be sent at once");
        }
    }

    public function send(Element | string $payload): \Illuminate\Http\Client\Response
    {
        $this->payload = $payload;
        $this->validatePayload();

        $baseRequest = $this->getBaseRequest();

        return $baseRequest
            ->post(
                env("DISCORD_WEBHOOK"),
                $this->getPayload()
            )->throw();
    }
}
