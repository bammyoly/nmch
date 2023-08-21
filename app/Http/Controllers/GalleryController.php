<?php

namespace App\Http\Controllers;

use App\Photo;
use Image;
use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(15);

        return view('gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.add');
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
            'title' => 'unique:galleries'
        ]);

        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->slug = str_slug($gallery->title);
        if ($request->hasFile('cover'))
        {
            $cover = $request->file('cover');
            $filename = $gallery->title . '.' . time() . '.' . $cover->getClientOriginalExtension();
            Image::make($cover)->resize(1280, 720)->save(public_path('uploads/gallery/' . $filename));
            $gallery->cover = $filename;
        }
        $gallery->save();

        return redirect()->route('gallery.photos', $gallery->id)->with('gallery', $gallery->id);
    }

    public function uploadImage(Request $request, $id)
    {
        $gallery = Gallery::where('id', $id)->first();
        $photo = new Photo();
        $photo->gallery_id = $gallery->id;
        if($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(600, 600)->save(public_path('uploads/gallery/'.$filename));
            $photo->photo = $filename;
        }
        $photo->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $gallery = Gallery::where('slug', $slug)->first();

        return view('gallery.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::where('id', $id)->first();

        return view('gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::where('id', $id)->first();
        $gallery->title = $request->title;
        $gallery->slug = str_slug($gallery->title);
        $gallery->update();

        return redirect()->route('gallery.manage')->withStatus('Gallery Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::where('id', $id)->first();
        $gallery->delete();

        return back()->withStatus('Deleted');
    }

    public function manage()
    {
        $galleries = Gallery::latest()->get();

        return view('gallery.manage', compact('galleries'));
    }

    public function photos($id)
    {
        $gallery = Gallery::where('id', $id)->first();

        return view('gallery.photos', compact('gallery'));
    }

    public function destroyPhoto($id)
    {
        $photo = Photo::where('id', $id)->first();
        $photo->delete();

        return redirect()->back();
    }
}
