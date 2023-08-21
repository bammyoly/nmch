<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bcategory;
use App\Book;

class BcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcategories = Bcategory::all();

        return view('bcategory.index', compact('bcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bcategory.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bcategory = new Bcategory();
        $bcategory->name = $request->name;
        $bcategory->slug = str_slug($bcategory->name);
        $bcategory->save();

        return redirect()->route('bcategories')->withStatus("Category Name $bcategory->name Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $bcategory = Bcategory::where('slug', $slug)->first();
        $books = Book::where('bcategory_id', $bcategory->id)->latest()->paginate(18);

        return view('bcategory.show', compact('bcategory', 'books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bcategory = Bcategory::where('id', $id)->first();

        return view('bcategory.edit', compact('bcategory'));
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
        $bcategory = Bcategory::where('id', $id)->first();
        $bcategory->name = $request->name;
        $bcategory->slug = str_slug($bcategory->name);
        $bcategory->update();

        return redirect()->route('bcategories')->withStatus("Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bcategory = Bcategory::where('id', $id)->first();
        $bcategory->delete();

        return back()->withStatus('Category Deleted');
    }
}
