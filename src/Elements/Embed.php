<?php

namespace Thisnugroho\DiscordWebhook\Elements;

use Thisnugroho\DiscordWebhook\Elements\Concerns\HasFields;

class Embed extends Element
{
    use HasFields;

    /**
     * A string that describes the object or null if no description is set.
     *
     * @var string|null
     */
    protected string | null $description = null;

    /**
     * The URL associated with the object, if any.
     *
     * @var string|null
     */
    protected string | null $url = null;

    /**
     * The title of the object.
     *
     * @var string|null
     */
    protected string | null $title = null;

    /**
     * Set the description for the expectation.
     *
     * @param string $description
     * @return static
     */
    public function description(string $description): static
    {
        $this->description = $description;
        return $this;
    }

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
     * Set the title of the current object.
     *
     * @param string $title
     * @return static
     */
    public function title(string $title): static
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set the fields to be retrieved from the database.
     *
     * @param  array  $fields
     * @return static
     */
    public function fields(array $fields): static
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * Get the description of the expectation.
     *
     * @return string
     */
    public function getDescription(): string | null
    {
        return $this->description;
    }

    /**
     * Get the URL associated with the current object.
     *
     * @return string
     */
    public function getUrl(): string | null
    {
        return $this->url;
    }

    /**
     * Get the title of the object.
     *
     * @return string
     */
    public function getTitle(): string | null
    {
        return $this->title;
    }
}
