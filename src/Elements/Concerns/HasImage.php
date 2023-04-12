<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;

use Thisnugroho\DiscordWebhook\Elements\Image;

trait HasImage
{

    /**
     * The image property of the object.
     *
     * @var Image|null
     */
    protected Image | null $image = null;

    /**
     * Get the image associated with the model, if any.
     *
     * @return Image|null
     */
    public function getImage(): Image | null
    {
        return $this->image;
    }

    /**
     * Apply an image transformation to the current object and return the modified object.
     *
     * @param Image $image The image transformation to apply.
     * @return static The modified object.
     */
    abstract function image(Image $image): static;
}
