<?php

namespace App\Events;

use App\Models\Accounts;
use App\Models\PurchaseHistory;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PurchaseSuccessful
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $account;

    public function __construct(User $user, Accounts $account)
    {
        $this->user = $user;
        $this->account = $account;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
