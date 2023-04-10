<?php

namespace Thisnugroho\DiscordWebhook\Elements;

use Thisnugroho\DiscordWebhook\Elements\Concerns\HasFiles;

class Content extends Element
{
    use HasFiles;

    protected string | null $username = null;
    protected string | null $avatarUrl = null;
    protected string | null $content = null;
    protected array | null $embeds = [];
    protected bool $tts = false;

    public function content(string $content)
    {
        $this->content = $content;
        return $this;
    }

    public function username(string $username)
    {
        $this->username = $username;
        return $this;
    }

    public function avatarUrl(string $avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    public function embeds(array $embeds)
    {
        $this->embeds = [$embeds];
        return $this;
    }

    public function files(array $files)
    {
        $this->files = $files;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    public function getEmbeds()
    {
        return $this->embeds;
    }

    public function isTts()
    {
        return $this->tts;
    }

    public function getContent()
    {
        return $this->content;
    }
}
