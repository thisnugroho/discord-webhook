<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;

trait HasFields
{
    protected array $fields = [];

    public function getFields(): array
    {
        return $this->fields;
    }
}
