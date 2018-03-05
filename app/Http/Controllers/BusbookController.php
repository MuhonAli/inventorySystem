<?php

namespace App\Http\Controllers;

use App\Busbook;
use App\Http\Requests;
use Auth;
use Illuminate\Http\Request;
use Session;

class BusbookController extends Controller
{

    public function __construct()
    {
         
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $busbook = Busbook::orderBy('id', 'asc')->paginate(500);
        return view('busbook.index')->withbusbook($busbook);
    }
    public function busbookinfo()
    {
        $busbook = Busbook::orderBy('id', 'asc')->paginate(500);
        return view('busbook.busbookinfo')->withbusbook($busbook);
    }


    public function bookconfirm($id)
    {
        $book = Busbook::find($id);
        $book->status = 1;
        $book->save(); 

        return redirect('busbookinfo');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('busbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user() == TRUE) {

            $this->validate($request, array(

                'customer_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'customer_address'          => 'required',
                'customer_mobile'          => 'required|numeric',
                'bus_number'          => 'required'
       
                
            ));
            
            $id = Auth::user()->id;

            $busbook = new Busbook;

            $busbook->user_id = $id;
            $busbook->customer_name = $request->customer_name;
            $busbook->customer_address = $request->customer_address;
            $busbook->customer_mobile = $request->customer_mobile;
            $busbook->bus_number = $request->bus_number;

            $busbook->save();

            Session::set('bookid', $busbook->id);

            return redirect('booked');

        }
        else{
             return redirect('login');
        }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $busbook = Busbook::find($id);
        return view('busbook.show')->withbusbook($busbook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $busbook = Busbook::find($id);
        
        return view('busbook.edit')->withbusbook($busbook);
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

                'customer_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'customer_address'          => 'required',
                'customer_mobile'          => 'required|numeric',
                'bus_number'          => 'required'
               
                
                 ));
            


   $busbook = Busbook::find($id);

        $busbook->customer_name = $request->input('customer_name');
        $busbook->customer_address = $request->input('customer_address');
        $busbook->customer_mobile = $request->input('customer_mobile');
        $busbook->bus_number = $request->input('bus_number');
       
       
           $busbook->save();

             return redirect()->route('busbook.show', $busbook->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $busbook = Busbook::find($id);
         
        $busbook->delete();
    }
}
