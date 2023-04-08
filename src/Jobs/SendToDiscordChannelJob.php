<?php

namespace Thisnugroho\DiscordWebhook\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Spatie\DiscordAlerts\Jobs\SendToDiscordChannelJob as ParentJob;

class SendToDiscordChannelJob extends ParentJob
{
}
