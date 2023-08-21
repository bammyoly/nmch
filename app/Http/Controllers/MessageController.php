<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Reply;
use App\User;
use Auth;
use App\Notifications\MessageReceived;
use App\Notifications\ReplyReceived;


class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('recipient_id', Auth::user()->id)->latest()->paginate(10);

        return view('message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $user = User::where('slug', $slug)->first();

        return view('message.new', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->first();

        $message = new Message();
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->recipient_id = $user->id;
        $message->user_id = Auth::user()->id;
        $message->save();

        $user->notify(new MessageReceived($message));
        return redirect()->back()->withStatus("Message Sent");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::where('id', $id)->first();

        return view('message.show', compact('message'));
    }

    public function outbox()
    {
        $messages = Message::where('user_id', Auth::user()->id)->latest()->paginate(10);

        return view('message.outbox', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reply(Request $request, $id)
    {
        $message = Message::where('id', $id)->first();

        $reply = new Reply();
        $reply->reply = $request->reply;
        $reply->message_id = $message->id;
        $reply->user_id = Auth::user()->id;
        $reply->save();

        if (Auth::user()->id == $message->user_id)
        {
            $message->recipient->notify(new ReplyReceived($reply));
        }
        else
        {
            $message->user->notify(new ReplyReceived($reply));
        }

        return redirect()->back();
    }

    public function request($slug)
    {
        $user = 
    }
}
