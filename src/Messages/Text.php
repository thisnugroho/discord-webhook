<?php

namespace Thisnugroho\DiscordWebhook\Messages;

use Illuminate\Support\Str;


// Ref https://discord.com/developers/docs/resources/webhook#execute-webhook-jsonform-params
class Text extends Messages
{
    public string $content = '';
    public string $username = '';
    public string $avatarUrl = '';
    public bool $tts = false;
    public array $file = [];
    // public array $embeds = [];
    // public array $components = [];

    public static function make()
    {
        return app(static::class);
    }

    public function getMessages()
    {
        $properties = (new \ReflectionClass(static::class))->getProperties();
        $messages = [];
        foreach ($properties as $property) {
            if (!$this->{$property->name}) continue;
            $messages[$property->name] = $this->{$property->name};
        }
        return $messages;
    }

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
        $this->username = $avatarUrl;
        return $this;
    }

    public function tts(bool $tts)
    {
        $this->tts = $tts;
        return $this;
    }

    public function files(array $file)
    {
        $this->file = $file;
        return $this;
    }
}
