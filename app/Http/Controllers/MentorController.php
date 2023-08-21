<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Profile;
use App\Mentor;
use App\Mrequest;
use App\Category;
use Illuminate\Http\Request;
use App\Notifications\MentorshipRequest;


class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('mentors', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('mentor.add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $admins = User::where('admin', '1')->get();
        $check = Mrequest::where('user_id', $user->id)->first();
        if ($check)
        {
            return redirect()->back()->withStatus('You Have Already Sent A Request');
        }
        else
        {
            $about = new Mrequest;
            $about->about = $request->about;
            $about->status = 'pending';
            $about->user_id = $user->id;
            $about->save();
            foreach ($admins as $admin)
            {
                $admin->notify(new MentorshipRequest($about));
            }
        }

        return redirect()->back()->withStatus('Your Request Has Been Sent To An Admin For Approval');
    }

    public function viewRequests()
    {
        $mrequests = Mrequest::latest()->paginate(15);

        return view('mentor.requests', compact('mrequests'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function mentor(User $user)
    {
        Auth::user()->mentors()->attach($user->id);
        return redirect()->back()->withStatus('Mentor Added');
    }

    public function unmentor(User $user)
    {
        Auth::user()->mentors()->detach($user->id);
        return redirect()->back()->withStatus('Mentor Removed');
    }
}
