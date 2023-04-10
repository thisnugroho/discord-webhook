<?php

namespace Thisnugroho\DiscordWebhook\Elements;

class Field extends Element
{
    public string | null $name = null;
    public string | null $value = null;
    public bool $inline = false;

    public function name(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function value(string $value)
    {
        $this->value = $value;
        return $this;
    }

    public function inline(bool $inline = true)
    {
        $this->inline = $inline;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isInline()
    {
        return $this->inline;
    }
}
