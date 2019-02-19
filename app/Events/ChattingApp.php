<?php
/**
 * Created by PhpStorm.
 * User: sathishks
 * Date: 19/02/19
 * Time: 2:33 PM
 */
namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChattingApp
{
    use InteractsWithSockets;
    /**
     * Information about the shipping status update.
     *
     * @var string
     */
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user.'.$this->user->name);
    }
}