<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use\App\Ad;

use Session;

class adController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ad = Ad::orderBy('id', 'asc')->paginate(500);
        return view('building.ad.index')->withad($ad);
    }

     public function adinfo()
    {
          $ad = Ad::orderBy('id', 'asc')->paginate(500);
        return view('building.ad.adinfo')->withad($ad);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.ad.create');
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
                 'room_no'         => 'required|numeric',
                'capacity'          => 'required|numeric',
                'room_type'          => 'required|regex:/^[\pL\s\-]+$/u'
            
                 ));
            

   $ad = new Ad;

        $ad->room_no = $request->room_no;
        $ad->capacity = $request->capacity;
        $ad->room_type = $request->room_type;

         Session::flash('success', 'Added successfully.');

       

           $ad->save();

             session()->flash('roomaddad', 'Room Added Successfully');

            return redirect('adinfo');
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::find($id);
        return view('building.ad.show')->withad($ad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Ad::find($id);
        
        return view('building.ad.edit')->withad($ad);
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

                 'room_no'         => 'required|numeric',
                'capacity'          => 'required|numeric',
                'room_type'          => 'required|regex:/^[\pL\s\-]+$/u'
                
                 ));
            


   $ad = Ad::find($id);

        $ad->room_no = $request->input('room_no');
        $ad->capacity = $request->input('capacity');
        $ad->room_type = $request->input('room_type');
       
           $ad->save();

             return redirect()->route('ad.show', $ad->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $ad = Ad::find($id);
         
        $ad->delete();
        $ad = Ad::orderBy('id', 'asc')->paginate(500);
        return view('building.ad.adinfo')->withad($ad);
    }
}
