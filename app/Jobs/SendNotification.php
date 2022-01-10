<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use OneSignal;

class SendNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userId = "b32cee2a-6fe5-11ec-96c3-d22c369e2009";
        $params = [];
        $params['include_player_ids'] = [$userId];
        $contents = [
        "en" => "Usuário cadastrado com sucesso!",
        ];
        $params['contents'] = $contents;

        OneSignal::sendNotificationCustom($params);
    }
}
