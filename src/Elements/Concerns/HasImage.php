<?php

namespace Thisnugroho\DiscordWebhook\Elements\Concerns;

use Thisnugroho\DiscordWebhook\Elements\Image;

trait HasImage
{

    /**
     * An array of email attachments. If there are no attachments, this property is null.
     *
     * @var array|null
     */
    protected Image | null $image = null;

    /**
     * Returns an array of attachments associated with the email message.
     *
     * @return array
     */
    public function getImage(): Image | null
    {
        return $this->image;
    }

    /**
     * Set the attachments for the message.
     *
     * @param  array  $attachments
     * @return static
     */
    abstract function image(Image $image): static;
}
