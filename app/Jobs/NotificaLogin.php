<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NotificaLogin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $requestInfo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $requestInfo)
    {
        $this->requestInfo = $requestInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \sleep(3);
        Log::info([$this->requestInfo]);
    }
}
