<?php

namespace Thisnugroho\DiscordWebhook\Elements;

class Image extends Element
{
    /**
     * The URL associated with the object, if any.
     *
     * @var string|null
     */
    protected string | null $url = null;

    /**
     * The width of the object, if applicable.
     *
     * @var int|null
     */
    protected int | null $width = null;

    /**
     * The height of the node in the AVL tree.
     * If the node is not part of an AVL tree, the value is null.
     *
     * @var int|null
     */
    protected int | null $height = null;

    /**
     * Set the URL for the request.
     *
     * @param  string  $url
     * @return static
     */
    public function url(string $url): static
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Set the width of the image.
     *
     * @param  int  $width
     * @return static
     */
    public function width(int $width): static
    {
        $this->width = $width;
        return $this;
    }

    /**
     * Set the height of the object.
     *
     * @param int $height
     * @return static
     */
    public function height(int $height): static
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Get the URL associated with the link.
     *
     * @return string|null The URL associated with the link, or null if no URL is set.
     */
    public function getUrl(): string | null
    {
        return $this->url;
    }

    /**
     * Get the width of the object.
     *
     * @return int|null The width of the object, or null if it is not set.
     */
    public function getWidth(): int | null
    {
        return $this->width;
    }

    /**
     * Get the height of the object.
     *
     * @return int|null The height of the object, or null if it is not set.
     */
    public function getHeight(): int | null
    {
        return $this->height;
    }
}
