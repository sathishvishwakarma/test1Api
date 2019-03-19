<?php
namespace App\Http\Controllers;
use App\Chat;
use App\User;
use Auth;
use Illuminate\Http\Request;
class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userId)
    {
        $user  = User::where('id',$userId)->first();
        $friends = $user->friends();
        return $friends;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        $friend = User::where('id',$userId)->first();
        return $friend;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }

    public function getChat($userID,$friendId) {

        $chats = Chat::where(function ($query) use ($friendId,$userID) {
            $query->where('user_id', '=', $userID)->where('friend_id', '=', $friendId);
        })->orWhere(function ($query) use ($friendId,$userID) {
            $query->where('user_id', '=', $friendId)->where('friend_id', '=', $userID);
        })->with(['user' => function($query) {
            $query->select('id','name','profile_img');
        }])->get();

        return $chats;
    }

    public function getLastChat($userID,$friendId)
    {
        $chats = Chat::where(function ($query) use ($friendId,$userID) {
            $query->where('user_id', '=', $userID)->where('friend_id', '=', $friendId);
        })->orWhere(function ($query) use ($friendId,$userID) {
            $query->where('user_id', '=', $friendId)->where('friend_id', '=', $userID);
        })->with(['user' => function($query) {
            $query->select('id','name','profile_img');
        }])->orderBy('id','desc')->first();

        return $chats;
    }

    public function sendChat(Request $request) {
        Chat::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'chat' => $request->chat
        ]);

        return [];
    }
}