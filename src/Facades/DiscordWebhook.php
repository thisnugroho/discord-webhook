<?php

namespace Thisnugroho\DiscordWebhook\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Thisnugroho\DiscordWebhook\DiscordWebhook send(
 *     \Thisnugroho\DiscordWebhook\Elements\Element|string|array $content
 * )
 * @method static \Thisnugroho\DiscordWebhook\DiscordWebhook to(string|array $names)
 * @method static \Thisnugroho\DiscordWebhook\DiscordWebhook toUrl(string|array $urls)
 * @method static \Thisnugroho\DiscordWebhook\DiscordWebhook multipart(bool $value = true)
 */

class DiscordWebhook extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'discord-webhook';
    }
}
