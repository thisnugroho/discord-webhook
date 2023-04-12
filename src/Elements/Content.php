<?php

namespace Thisnugroho\DiscordWebhook\Elements;

use Thisnugroho\DiscordWebhook\Elements\Concerns\HasFile;

class Content extends Element
{
    use HasFile;

    /**
     * The username of the user.
     *
     * @var string|null
     */
    protected string | null $username = null;

    /**
     * The URL of the user's avatar image, or null if no avatar has been set.
     *
     * @var string|null
     */
    protected string | null $avatarUrl = null;
    /**
     * The content of the object, represented as a string.
     * 
     * @var string|null
     */
    protected string | null $content = null;

    /**
     * An array that holds the embedded resources.
     * 
     * @var array|null
     */
    protected array | null $embeds = [];

    /**
     * Indicates whether Text-to-Speech (TTS) is enabled or not.
     *
     * @var bool $tts
     */
    protected bool $tts = false;

    /**
     * Set the content of the response.
     *
     * @param  string  $content
     * @return static
     */
    public function content(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Set the username for the request.
     *
     * @param string $username
     * @return static
     */
    public function username(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Set the avatar URL for the user.
     *
     * @param string $avatarUrl
     * @return static
     */
    public function avatarUrl(string $avatarUrl): static
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * Set the embeds for the resource.
     *
     * @param  array  $embeds
     * @return static
     */
    public function embeds(array $embeds): static
    {
        $this->embeds = $embeds;
        return $this;
    }

    /**
     * Set the files to be sent with the request.
     *
     * @param  array  $files
     * @return static
     */
    public function file(File $file): static
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Get the username of the user.
     *
     * @return string
     */
    public function getUsername(): string | null
    {
        return $this->username;
    }

    /**
     * Returns the avatar URL of the user.
     *
     * @return string
     */
    public function getAvatarUrl(): string | null
    {
        return $this->avatarUrl;
    }

    /**
     * Returns the array of embeds.
     *
     * @return array
     */
    public function getEmbeds(): array
    {
        return $this->embeds;
    }

    /**
     * Returns whether the current object is a TTS (Text-to-Speech) object or not.
     *
     * @return bool
     */
    public function isTts(): bool
    {
        return $this->tts;
    }

    /**
     * Get the content of the file.
     *
     * @return string
     */
    public function getContent(): string | null
    {
        return $this->content;
    }
}
