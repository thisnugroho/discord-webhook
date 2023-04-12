<?php

namespace Thisnugroho\DiscordWebhook\Elements;

class Image extends Element
{
    protected string | null $url = null;

    protected int | null $width = null;

    protected int | null $height = null;

    public function url(string $url): static
    {
        $this->url = $url;
        return $this;
    }

    public function width(int $width): static
    {
        $this->width = $width;
        return $this;
    }

    public function height(int $height): static
    {
        $this->height = $height;
        return $this;
    }

    public function getUrl(): string | null
    {
        return $this->url;
    }

    public function getWidth(): int | null
    {
        return $this->width;
    }

    public function getHeight(): int | null
    {
        return $this->height;
    }
}
