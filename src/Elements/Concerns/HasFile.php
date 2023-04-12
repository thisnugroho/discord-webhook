<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;


trait HasFile
{
    /**
     * An array to store file paths.
     *
     * @var array
     */
    public array $file = [];

    /**
     * Returns the array of files.
     *
     * @return array
     */
    public function getFile(): array
    {
        return $this->file;
    }

    abstract public function file(array $files): static;
}
