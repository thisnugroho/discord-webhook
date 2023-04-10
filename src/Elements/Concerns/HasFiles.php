<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;

trait HasFiles
{
    public array $files = [];

    public function getFiles(): array
    {
        return $this->files;
    }
}
