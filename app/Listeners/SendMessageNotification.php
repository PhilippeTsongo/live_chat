<?php 

namespace App\Listeners;

use App\Events\MessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMessageNotification
{
    public function handle(MessageSent $event)
    {
        // Handle the event (e.g., send notification)
    }
}

