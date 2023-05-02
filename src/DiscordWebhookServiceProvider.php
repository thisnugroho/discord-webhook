<?php

namespace Thisnugroho\DiscordWebhook;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Thisnugroho\DiscordWebhook\Commands\SendTestMessage;

class DiscordWebhookServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('discord-webhook')
            ->hasCommands($this->getCommands())
            ->hasConfigFile();
    }

    public function getCommands(): array
    {
        return [
            SendTestMessage::class
        ];
    }

    public function packageRegistered(): void
    {
        $this->app->bind('discord-webhook', function () {
            return new DiscordWebhook();
        });
    }
}
