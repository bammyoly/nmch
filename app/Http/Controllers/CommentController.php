<?php

namespace App\Http\Controllers;

use Auth;
use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use App\Notifications\PostComment;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $blog_id)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $blog = Blog::where('blog_id', $blog_id)->first();
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->blog_id = $blog->id;
        $comment->user_id = Auth::user()->id;
        $comment->save();

        if ($comment->user->id !== $blog->user->id)
        {
            $blog->user->notify(new PostComment($comment));
        }
        return redirect()->back()->withStatus('Comment Posted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
