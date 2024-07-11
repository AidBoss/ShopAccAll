<?php

namespace App\Listeners;

use App\Events\PurchaseSuccessful;
use App\Models\PurchaseHistory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreatePurchaseHistory
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(PurchaseSuccessful $event)
    {
        PurchaseHistory::create([
            'user_id' => $event->user->id,
            'account_id' => $event->account->id,
        ]);
    }
}
