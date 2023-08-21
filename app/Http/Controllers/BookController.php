<?php

namespace App\Http\Controllers;

use Auth;
use App\Book;
use App\Upload;
use App\Bcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(18);
        $bcategories = Bcategory::all();

        return view('books.index', compact('books', 'bcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bcategories = Bcategory::all();

        return view('books.add', compact('bcategories'));
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
            'title' => 'required|unique:books',
            'description' => 'required'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->type = $request->type;
        $book->description = $request->description;
        $book->slug = str_slug($book->title);
        $book->book_id = strtoupper(str_random(5));
        $book->bcategory_id = $request->bcategory_id;
        $book->user_id = Auth::user()->id;
        $book->save();

        return redirect()->route('book.files', $book->book_id)->with('book_id', $book->book_id);
    }

    public function files($book_id)
    {
        $book = Book::where('book_id', $book_id)->first();

        return view('books.files', compact('book'));
    }

    public function uploadFiles(Request $request, $id)
    {
        $book = Book::where('id', $id)->first();
        $upload = new Upload();
        $upload->book_id = $book->id;
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $filename = $book->title . '.' . time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put($filename,  File::get($file));

            $upload->file = $filename;
        }
        $upload->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($book_id)
    {
        $book = Book::where('book_id', $book_id)->first();

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book_id)
    {
        $book = Book::where('book_id', $book_id)->first();
        $bcategories = Bcategory::all();

        return view('books.edit', compact('book', 'bcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book_id)
    {
        $book = Book::where('book_id', $book_id)->first();
        $book->title = $request->title;
        $book->type = $request->type;
        $book->description = $request->description;
        $book->bcategory_id = $request->bcategory_id;
        $book->slug = str_slug($book->title);
        $book->update();

        return redirect()->route('books.manage')->withStatus('Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id)
    {
        $book = Book::where('book_id', $book_id)->first();
        $book->delete();

        return redirect()->back()->withStatus('Book Deleted');
    }

    public function download($file)
    {
        $upload = Upload::where('file', $file)->first();
        $file = Storage::disk('local')->get($upload->file);

        return (new Response($file, 200))
              ->header('Content-Type', 'application/pdf');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $books = Book::where('type', 'LIKE', '%' .$search. '%')
        ->orwhere('title', 'LIKE', '%' .$search. '%')
        ->orwhere('description', 'LIKE', '%' .$search. '%')->paginate(15);

        return view('books.search', compact('books', 'search'));
    }

    public function elibrary()
    {
        return view('elibrary');
    }

    public function manage()
    {
        $books = Book::latest()->get();

        return view('books.manage', compact('books'));
    }

    public function deleteFile($id)
    {
        $upload = Upload::where('id', $id)->first();
        $upload->delete();

        return redirect()->back()->withStatus('Deleted');
    }

}
