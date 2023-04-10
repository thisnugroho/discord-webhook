<?php

namespace Thisnugroho\DiscordWebhook\Elements;

class File extends Element
{
    /**
     * The filename associated with this object, or null if not set.
     *
     * @var string|null
     */
    public string | null $filename = null;

    /**
     * The contents of the file, represented as a string.
     *
     * @var string|null
     */
    public string | null $contents = null;

    /**
     * The name of the object. Can be null if the object has no name.
     *
     * @var string|null
     */
    public string | null $name = null;

    /**
     * Set the filename for the current instance.
     *
     * @param string $filename
     * @return static
     */
    public function filename(string $filename): static
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * Set the name of the object.
     *
     * @param string $name
     * @return static
     */
    public function name(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the contents of the file.
     *
     * @param string $contents
     * @return $this
     */
    public function contents(string $contents): static
    {
        $this->contents = $contents;
        return $this;
    }

    /**
     * Returns the filename associated with this object.
     *
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Get the name of the object.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the contents of the file.
     *
     * @return string
     */
    public function getContents(): string
    {
        return $this->contents;
    }
}
