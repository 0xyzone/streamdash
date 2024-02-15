<?php

namespace App\Events;

use App\Models\Caster;
use App\Models\Tournament;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class FetchDetails implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tournament;

    /**
     * Create a new event instance.
     */
    public function __construct(Tournament $tournament)
    {
        $this->tournament = $tournament;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('tournament.' . $this->tournament->id),
        ];
    }

    // public function broadcastAs()
    // {
    //     return 'tournament' . $this->tournament->id;
    // }

    // public function broadcastWith()
    // {
    //     return [
    //         $this->tournament,
    //     ];
    // }
}
