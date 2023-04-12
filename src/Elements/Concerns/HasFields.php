<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;

trait HasFields
{
    /**
     * An array to store the fields of the object.
     *
     * @var array
     */
    protected array $fields = [];

    /**
     * Returns the fields of this object.
     *
     * @return array
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    abstract public function fields(array $fields): static;
}
