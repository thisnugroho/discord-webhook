<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;


trait HasFiles
{
    /**
     * An array to store file paths.
     *
     * @var array
     */
    public array $files = [];

    /**
     * Returns the array of files.
     *
     * @return array
     */
    public function getFiles(): array
    {
        return $this->files;
    }
}
