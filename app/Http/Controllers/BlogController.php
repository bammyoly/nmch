<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Blog;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\BlogNotification;
use App\Notifications\PostApproval;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('status', 'approved')->latest()->paginate(15);

        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs',
            'type' => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2048'
        ]);

        $user = Auth::user();
        if ($user->is_admin())
        {
            $status = 'approved';
            $notification = 'Blog Posted';
        }
        else
        {
            $status = 'pending';
            $notification = 'Blog Has Been Posted To Admin For Approval';
        }
        $admins = User::where('admin', '1')->get();
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->description = $request->description;
        $blog->status = $status;
        $blog->slug = str_slug($blog->title);
        $blog->blog_id = strtoupper(str_random(5));
        $blog->user_id = Auth::user()->id;
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = $blog->title . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('uploads/blog/' . $filename));
            $blog->image = $filename;
        }
        $blog->save();
        if (!$user->is_admin())
        {
            foreach ($admins as $admin)
            {
                $admin->notify(new BlogNotification($blog));
            }
        }

        return redirect()->route('blog.manage')->withStatus($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blogs = Blog::where('status', 'approved')->latest()->take(4)->get();

        if ($blog->status == 'pending') {
            return view('welcome');
        }

        return view('blog.show', compact('blog', 'blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog_id)
    {
        $blog = Blog::where('blog_id', $blog_id)->first();
        $blog->title = $request->title;
        $blog->type = $request->type;
        $blog->description = $request->description;
        $blog->slug = str_slug($blog->title);
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = $blog->title . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('uploads/blog/' . $filename));
            $blog->image = $filename;
        }
        $blog->update();

        return redirect()->route('blogs')->withStatus('Blog Updated');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($blog_id)
    {
        $blog = Blog::where('blog_id', $blog_id)->first();
        $blog->delete();

        return back();
    }

    public function manage()
    {
        $blogs = Blog::where('user_id', Auth::user()->id)->latest()->paginate(35);

        return view('blog.manage', compact('blogs'));
    }

    public function pending()
    {
        $blogs = Blog::where('status', 'pending')->latest()->take(4)->paginate(20);

        return view('blog.pending', compact('blogs'));
    }

    public function all()
    {
        $blogs = Blog::latest()->paginate(20);

        return view('blog.all', compact('blogs'));
    }

    public function approve($blog_id)
    {
        $blog = Blog::where('blog_id', $blog_id)->first();
        $blog->status = 'approved';
        $blog->save();

        $blog->user->notify(new PostApproval($blog));
        return redirect()->back()->withStatus('Post Approved');
    }
}
