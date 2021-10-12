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
        $userId = "f1bb4de2-a038-467e-a036-3b6cc4af715f";
        $params = [];
        $params['include_player_ids'] = [$userId];
        $contents = [
        "en" => "Usuário cadastrado com sucesso!",
        ];
        $params['contents'] = $contents;

        OneSignal::sendNotificationCustom($params);
    }
}