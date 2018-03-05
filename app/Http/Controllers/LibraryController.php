<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use\App\library;

use Session;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $library = Library::orderBy('id', 'asc')->paginate(500);
        return view('library.index')->withlibrary($library);
    }


public function libraryinfos()
    {
        
        return view('library.libraryinfos');
    }


     public function libraryinfo()
    {
          $library = Library::orderBy('id', 'asc')->paginate(500);
        return view('library.libraryinfo')->withlibrary($library);
    }



public function librarysearch()
    {
    $q = Input::get ( 'q' );
    $library = Library::where ( 'book_name', 'LIKE', '%' . $q . '%' )->orWhere ( 'author', 'LIKE', '%' . $q . '%' )->orWhere ( 'category', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $library ) > 0)
        return view ( 'library.librarysearch' )->withlibrary ( $library )->withQuery ( $q )->withlibrary($library);
    else
        return view ( 'library.librarysearch' )->withMessage ( 'No Details found. Try to search again !' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('library.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'book_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'quantity'         => 'required|numeric',
                'author'          => 'required|regex:/^[\pL\s\-]+$/u',
                'category'          => 'required|regex:/^[\pL\s\-]+$/u'
            
                 ));
            

   $library = new Library;

        $library->book_name = $request->book_name;
        $library->quantity = $request->quantity;
        $library->author = $request->author;
        $library->category = $request->category;

         Session::flash('success', 'Added successfully.');

       

           $library->save();

            return redirect()->route('library.show', $library->id);
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $library = Library::find($id);
        return view('library.show')->withlibrary($library);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $library = Library::find($id);
        
        return view('library.edit')->withlibrary($library);
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
        $this->validate($request, array(

                'book_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'quantity'         => 'required|numeric',
                'author'          => 'required|regex:/^[\pL\s\-]+$/u',
                'category'          => 'required|regex:/^[\pL\s\-]+$/u'
                 ));
            


   $library = Library::find($id);

        $library->book_name = $request->input('book_name');
        $library->quantity = $request->input('quantity');
        $library->author = $request->input('author');
        $library->category = $request->input('category');
       
           $library->save();

             return redirect()->route('library.show', $library->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $library = Library::find($id);
         
        $library->delete();
         $library = Library::orderBy('id', 'asc')->paginate(500);
        return view('library.libraryinfo')->withlibrary($library);
    
    }
}
