<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Profile;
use App\Blog;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $blogs = Blog::where('user_id', Auth::user()->id)->get();
        $messages = Message::where('user_id', Auth::user()->id)->get();
        $mentors = Profile::where('mentor', '1')->get();
        return view('home', compact('user', 'blogs', 'messages', 'mentors'));
    }
}
