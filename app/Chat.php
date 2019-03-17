<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Events\BroadcastChat;
class Chat extends Model
{
    protected $dispatchesEvents = [
        'created' => BroadcastChat::class
    ];
    protected $table = 'chats';
    protected $fillable = ['user_id', 'friend_id', 'chat'];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}