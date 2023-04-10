<?php

namespace Thisnugroho\DiscordWebhook\Elements;

class Field extends Element
{
    /**
     * The name of the object. Can be null if the object has no name.
     *
     * @var string|null
     */
    public string | null $name = null;

    /**
     * The value of the string or null if it has not been set.
     *
     * @var string|null
     */
    public string | null $value = null;

    /**
     * A boolean flag indicating whether the object should be displayed inline or not.
     *
     * @var bool
     */
    public bool $inline = false;

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
     * Set the value of the constraint.
     *
     * @param string $value
     * @return static
     */
    public function value(string $value): static
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Set whether or not the image should be displayed inline.
     *
     * @param bool $inline
     * @return static
     */
    public function inline(bool $inline = true): static
    {
        $this->inline = $inline;
        return $this;
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
     * Get the value of the object.
     *
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Determine if the element is inline.
     *
     * @return bool
     */
    public function isInline(): bool
    {
        return $this->inline;
    }
}
