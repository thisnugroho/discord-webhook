<?php

namespace Thisnugroho\DiscordWebhook;

use Illuminate\Support\Facades\Http;
use Thisnugroho\DiscordWebhook\Elements\Element;
use Thisnugroho\DiscordWebhook\Exceptions\DiscordWebhookException;

class DiscordWebhook
{
    protected Element|string|array|null $payload = null;
    protected array $webhookUrls = [];
    protected bool $multipart = false;
    protected bool $sent = false;

    public static function __callStatic(string $method, array $arguments)
    {
        $instance = new self();

        if (! method_exists($instance, $method)) {
            throw new \BadMethodCallException(
                "Method {$method} does not exist."
            );
        }

        return $instance->$method(...$arguments);
    }

    public function send(Element|string|array $content): self
    {
        $this->payload = $content;

        return $this->trySend();
    }

    public function to(string|array $names): self
    {
        foreach ((array) $names as $name) {
            $url = config("discord-webhook.webhook_urls.$name");

            if (! $url) {
                throw new DiscordWebhookException(
                    "Webhook [$name] is not configured."
                );
            }

            $this->webhookUrls[] = $url;
        }

        return $this->trySend();
    }

    public function toUrl(string|array $urls): self
    {
        foreach ((array) $urls as $url) {
            $this->webhookUrls[] = $url;
        }

        return $this->trySend();
    }

    public function multipart(bool $value = true): self
    {
        $this->multipart = $value;

        return $this->trySend();
    }

    protected function trySend(): self
    {
        if ($this->sent || ! $this->payload) {
            return $this;
        }

        // Default webhook fallback
        if (empty($this->webhookUrls)) {
            $default = config('discord-webhook.webhook_urls.default');

            if ($default) {
                $this->webhookUrls[] = $default;
            }
        }

        if (empty($this->webhookUrls)) {
            throw new DiscordWebhookException(
                'No Discord webhook URL defined.'
            );
        }

        $this->validatePayload();

        $request = $this->multipart
            ? Http::asMultipart()
            : Http::asJson();

        foreach ($this->webhookUrls as $url) {
            $request->post($url, $this->getPayload())->throw();
        }

        $this->sent = true;

        return $this;
    }

    protected function getPayload(): array|null
    {
        return match (gettype($this->payload)) {
            'string' => json_decode($this->payload, true),
            'object' => $this->payload->toArray(),
            default  => $this->payload,
        };
    }

    protected function validatePayload(): void
    {
        $payload = $this->getPayload();

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new DiscordWebhookException(
                'Payload is not valid JSON.'
            );
        }

        if (isset($payload['file'], $payload['embeds'])) {
            throw new DiscordWebhookException(
                'Embeds and files cannot be sent at once.'
            );
        }
    }
}
