<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;

use Thisnugroho\DiscordWebhook\Elements\File;

trait HasFile
{
    /**
     * The file associated with this object, or null if no file is associated.
     *
     * @var File|null
     */
    public File | null $file = null;


    /**
     * Returns the file associated with this object, or null if no file is associated.
     *
     * @return File|null
     */
    public function getFile(): File | null
    {
        return $this->file;
    }

    /**
     * Set the uploaded files for the request.
     *
     * @param  array  $files
     * @return static
     */
    abstract public function file(File $files): static;
}
