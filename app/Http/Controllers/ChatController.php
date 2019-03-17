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
//        $friends = Auth::user()->friends();
//        return view('chat.index')->withFriends($friends);
        $user  = User::where('id',$userId)->first();
        $friends = $user->friends();
        return $friends;
        //return view('chat.index')->withFriends($friends);
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
        //return view('chat.show')->withFriend($friend);
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
        $user = app(User::class);
        $messageDetails = $user->where('id',$userID)->with(['chats' => function($query) use($friendId) {
            $query->where('friend_id',$friendId);
        }])->get();

        return $messageDetails;
    }

    public function sendChat(Request $request) {
        Chat::create([
            'user_id' => $request->user_id,
            'friend_id' => $request->friend_id,
            'chat' => $request->chat
        ]);

        return ['sathishashahsaishiasas'];
    }
}