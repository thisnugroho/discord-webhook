<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    /*
     * The webhook URLs that we'll use to send a message to Discord.
     */
    'webhook_urls' => [
        'default' => env('DISCORD_ALERT_WEBHOOK'),
    ],

    /*
     * This job will send the message to Discord. You can extend this
     * job to set timeouts, retries, etc...
     */
    'job' => \Thisnugroho\DiscordWebhook\Jobs\SendToDiscordChannelJob::class,
];
