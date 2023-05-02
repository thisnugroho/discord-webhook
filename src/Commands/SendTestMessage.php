<?php

namespace Thisnugroho\DiscordWebhook\Commands;

use Illuminate\Console\Command;
use Thisnugroho\DiscordWebhook\Elements\Content;
use Thisnugroho\DiscordWebhook\Elements\Element;
use Thisnugroho\DiscordWebhook\Elements\Embed;
use Thisnugroho\DiscordWebhook\Elements\Field;
use Thisnugroho\DiscordWebhook\Elements\Image;
use Thisnugroho\DiscordWebhook\Facades\DiscordWebhook;

class SendTestMessage extends Command
{
    protected  $description = 'Send a test message to the webhook';

    protected $signature = 'discord-webhook:test';

    /**
     * Example payload by:
     * https://gist.github.com/Birdie0/78ee79402a4301b1faf412ab5f1cdcf9
     */
    protected function getJsonPayload(): string
    {
        return '{"username":"Webhook","avatar_url":"https://i.imgur.com/4M34hi2.png","content":"Send using JSON as the payload","embeds":[{"title":"Title","url":"https://twitter.com/dedenugroho_","description":"Text message. You can use Markdown here. *Italic* **bold** __underline__ ~~strikeout~~ [hyperlink](https://google.com) `code`","color":15258703,"fields":[{"name":"Text","value":"More text","inline":true},{"name":"Even more text","value":"Yup","inline":true},{"name":"Use `\"inline\": true` parameter, if you want to display fields in the same line.","value":"okay..."},{"name":"Thanks!","value":"You\'re welcome :wink:"}],"image":{"url":"https://upload.wikimedia.org/wikipedia/commons/5/5a/A_picture_from_China_every_day_108.jpg"}}]}';
    }

    protected function getObjectPayload()
    {
        $element = Content::make()
            ->username("Webhook")
            ->avatarUrl("https://i.imgur.com/4M34hi2.png")
            ->content("Sent using Object as the payload")
            ->embeds([
                Embed::make()
                    ->url("https://twitter.com/dedenugroho_")
                    ->iconUrl("https://i.imgur.com/R66g1Pe.jpg")
                    ->title("Title")
                    ->description("Text message. You can use Markdown here. *Italic* **bold** __underline__ ~~strikeout~~ [hyperlink](https://google.com) `code`")
                    ->color(15258703)
                    ->fields([
                        Field::make()
                            ->name("Text")
                            ->value("More text")
                            ->inline(),
                        Field::make()
                            ->name("Even more text")
                            ->value("Yup")
                            ->inline(),
                        Field::make()
                            ->name("Use `\"inline\": true` parameter, if you want to display fields in the same line.")
                            ->value("okay...")
                            ->inline(),
                        Field::make()
                            ->name("Thanks!")
                            ->value("You're welcome :wink:")
                            ->inline(),
                    ])
                    ->image(Image::make()->url("https://upload.wikimedia.org/wikipedia/commons/5/5a/A_picture_from_China_every_day_108.jpg")),
            ]);
        return $element;
    }

    public function handle(): int
    {
        try {
            DiscordWebhook::send($this->getJsonPayload());
            DiscordWebhook::send($this->getObjectPayload());
            return static::SUCCESS;
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return static::FAILURE;
        }
    }
}
