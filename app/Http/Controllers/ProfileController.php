<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use App\Exco;
use App\Blog;
use App\Book;
use App\User;
use App\Profile;
use App\Gallery;
use App\Category;
use App\Mrequest;
use App\Bcategory;
use Illuminate\Http\Request;
use App\Notifications\MentorshipNotification;


class ProfileController extends Controller
{
    public function profile($slug)
    {
    	$user =User::where('slug', $slug)->first();
        $profile = Profile::where('user_id', $user->id)->first();
        $blogs = Blog::where('user_id', $user->id)->get();

    	return view('profile.index', compact("user", 'profile', 'blogs'));
    }

    public function edit($slug)
    {
    	$user =User::where('slug', $slug)->first();
        $categories = Category::all();

    	return view('profile.edit', compact('user', 'categories'));
    }

    public function update(Request $request, $slug)
    {
        $user =User::where('slug', $slug)->first();
        $user->profile()->update([
            'spec' => $request->spec,
            'grad' => $request->grad,
            'ehistory' => $request->ehistory,
            'whistory' => $request->whistory,
            'experience' => $request->experience,
            'employment' => $request->employment,
            'role' => $request->role,
            'skills' => $request->skills,
            'hobbies' => $request->hobbies,
            'bio' => $request->bio,
            'category_id' => $request->category_id
        ]);

        return redirect()->back()->withStatus('Profile updated');
    }

    public function profileUpdate(Request $request, $slug)
    {
        $user =User::where('slug', $slug)->first();
        $user->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'fullname' => $request->fullname,
        ]);

        return redirect()->route('home')->withStatus('Info updated');
    }

    public function joinMentor($slug)
    {
        $user = User::where('slug', $slug)->first();
        $categories = Category::all();
        
        return view('profile.join', compact('user', 'categories'));
    }

    public function becomeMentor(Request $request, $slug)
    {

        $user = User::where('slug', $slug)->first();
        $about = Mrequest::where('user_id', $user->id)->first();
        if ($about)
        {
            $about->status = 'approved';
            $about->save();
        }
        $user->profile()->update([
            'mentor' => '1',
            'category_id' => $request->category_id
        ]);

        $user->notify(new MentorshipNotification($user));
        return redirect()->route('mentors.manage')->withStatus('Mentorship Request Approved Successfully');
    }

    public function removeMentor($slug)
    {
    	$user = User::where('slug', $slug)->first();
    	$user->profile()->update([
    		'mentor' => '0'
    	]);
    	return redirect()->back()->withStatus('Removed as Mentor');
    }

    public function mentors()
    {
    	$users = Profile::where('mentor', '1')->get();

    	return view('mentor.index', compact('users'));
    }

    public function profileImage(Request $request, $slug)
    {
        $this->validate($request, [
            'avatar' => 'required|mimes:jpeg,jpg,png|max:2048'
            ]);

        $user = User::where('slug', $slug)->first();
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = Auth::user()->name . '.' . time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(600, 600)->save( public_path('uploads/avatar/'. $filename));
            $user->avatar = $filename;
            $user->save();
        }

        return redirect()->back();
 
    }

    public function manage()
    {
        $users = User::latest()->paginate(15);

        return view('profile.users', compact('users'));
    }

    public function makeAdmin($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->admin = '1';
        $user->save();

        return redirect()->back()->withStatus('Done');
    }

    public function removeAdmin($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->admin = '0';
        $user->save();

        return redirect()->back()->withStatus('Done');
    }

    public function manageMentors()
    {
        $users = Profile::where('mentor', '1')->paginate(15);

        return view('mentor.manage', compact('users'));
    }

    public function manageAdmins()
    {
        $users = User::admins()->where('id', '!=', '1')->paginate(15);

        return view('profile.admin', compact('users'));
    }

    public function adminpanel()
    {
        $users = User::all();
        $blogs = Blog::all();
        $excos = Exco::all();
        $categories = Category::all();
        $books = Book::all();
        $galleries = Gallery::all();
        $requests = Mrequest::all();
        $bcategories = Bcategory::all();

        return view('adminpanel', compact('users', 'blogs', 'excos', 'categories', 'books', 'galleries', 'requests', 'bcategories'));
    }

}
