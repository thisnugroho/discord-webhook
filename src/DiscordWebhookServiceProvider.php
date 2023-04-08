<?php

namespace Thisnugroho\DiscordWebhook;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class DiscordWebhookServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('discord-webhook')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        $this->app->bind('discord-webhook', function () {
            return new DiscordWebhook();
        });
    }
}
