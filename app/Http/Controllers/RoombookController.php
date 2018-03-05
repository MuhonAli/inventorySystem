<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use\App\Roombook;

use Auth;

use Session;

class RoombookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
         // $this->middleware('auth',['only'=>['store']]);
    }

    public function index()
    {
        $roombook = Roombook::orderBy('id', 'asc')->paginate(500);
        return view('roombook.index')->withroombook($roombook);
    }

    public function roombookinfo()
    {
          $roombook = Roombook::orderBy('id', 'asc')->paginate(500);
        return view('roombook.roombookinfo')->withroombook($roombook);
    }

    // Confirm book room 
    public function bookconfirm($id)
    {
        $book = Roombook::find($id);
        $book->status = 1;
        $book->save(); 

        return redirect('roombookinfo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roombook.create');
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
                'room_number'          => 'required|numeric'
                   
                    
                    
                     ));
                
             $id = Auth::user()->id;

            $roombook = new Roombook;

            $roombook->user_id = $id;
            $roombook->customer_name = $request->customer_name;
            $roombook->customer_address = $request->customer_address;
            $roombook->customer_mobile = $request->customer_mobile;
            $roombook->room_number = $request->room_number;

               $roombook->save();

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
        $roombook = Roombook::find($id);
        return view('roombook.show')->withroombook($roombook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roombook = Roombook::find($id);
        
        return view('roombook.edit')->withroombook($roombook);
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
                'room_number'          => 'required|numeric'
               
                
                 ));
            


   $roombook = Roombook::find($id);

        $roombook->customer_name = $request->input('customer_name');
        $roombook->customer_address = $request->input('customer_address');
        $roombook->customer_mobile = $request->input('customer_mobile');
        $roombook->room_number = $request->input('room_number');
       
       
           $roombook->save();

             return redirect()->route('roombook.show', $roombook->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $roombook = Roombook::find($id);
         
        $roombook->delete();
    }
}
