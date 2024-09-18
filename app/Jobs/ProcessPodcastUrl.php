<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPodcastUrl implements ShouldQueue
{
    use Queueable;

    public $rssUrl;

    /**
     * Create a new job instance.
     */
    public function __construct($rssUrl)
    {
        $this->rssUrl = $rssUrl;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
