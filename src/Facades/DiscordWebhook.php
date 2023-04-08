<?php

namespace Thisnugroho\DiscordWebhook\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Thisnugroho\DiscordWebhook\Skeleton\SkeletonClass
 * @method static void send(\Thisnugroho\DiscordWebhook\Messages\Messages $message)
 * 
 */
class DiscordWebhook extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'discord-webhook';
    }
}
