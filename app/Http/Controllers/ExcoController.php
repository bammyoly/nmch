<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Exco;
use Image;

class ExcoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excos = Exco::all();

        return view('excos.index', compact('excos'));
    }

    public function welcome()
    {
        $excos = Exco::oldest()->take(4)->get();
        $blogs = Blog::latest()->take(3)->get();
        $president = Exco::where('position', 'president')->first();

        return view('welcome', compact('excos', 'blogs', 'president'));
    }

    public function addAddress()
    {
        $president = Exco::where('position', 'president')->first();

        return view('excos.address', compact('president'));
    }

    public function postAddress(Request $request)
    {
        $president = Exco::where('position', 'president')->first();
        $president->address = $request->address;
        $president->save();

        return redirect()->back()->withStatus("Welcome Address Updated");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('excos.add');
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
            'name' => 'required'
        ]);

        $exco = new Exco();
        $exco->name = $request->name;
        $exco->position = $request->position;
        $exco->email = $request->email;
        $exco->level = $request->level;
        $exco->phone = $request->phone;
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = $exco->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('uploads/excos/' . $filename));
            $exco->image = $filename;
        }

        $exco->save();

        return redirect()->route('excos.manage')->withStatus("Excos Added");
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
        $exco = Exco::where('id', $id)->first();

        return view('excos.edit', compact('exco'));
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
        $exco = Exco::where('id', $id)->first();
        $exco->name = $request->name;
        $exco->position = $request->position;
        $exco->email = $request->email;
        $exco->level = $request->level;
        $exco->phone = $request->phone;
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = $exco->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('uploads/excos/' . $filename));
            $exco->image = $filename;
        }

        $exco->save();

        return redirect()->route('excos.manage')->withStatus('Exco Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exco = Exco::where('id', $id)->first();
        $exco->delete();

        return redirect()->back();
    }

    public function manage()
    {
        $excos = Exco::all();

        return view('excos.manage', compact('excos'));
    }
}
