<?php

namespace Thisnugroho\DiscordWebhook\Elements;

use Thisnugroho\DiscordWebhook\Elements\Concerns\HasFields;

class Embed extends Element
{
    use HasFields;

    protected string | null $description = null;

    protected string | null $url = null;

    protected string | null $title = null;

    public function description(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function url(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function fields(array $fields)
    {
        $this->fields = [$fields];
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
