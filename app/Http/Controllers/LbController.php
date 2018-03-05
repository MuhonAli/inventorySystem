<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use\App\Le;

use Session;

class LbController extends Controller
{
    /**
     * Display a listing of the resourlb.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lb = Le::orderBy('id', 'asc')->paginate(500);
        return view('building.lb.index')->withlb($lb);
    }

    public function lbinfo()
    {
          $lb = Le::orderBy('id', 'asc')->paginate(500);
        return view('building.lb.lbinfo')->withlb($lb);
    }

    /**
     * Show the form for creating a new resourlb.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.lb.create');
    }

    /**
     * Store a newly created resourlb in storage.
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
            

   $lb = new Le;

        $lb->room_no = $request->room_no;
        $lb->capacity = $request->capacity;
        $lb->room_type = $request->room_type;

         Session::flash('sucess', 'Added sucessfully.');

       

           $lb->save();
        session()->flash('roomaddlb', 'Room Added Successfully');

            return redirect('lbinfo');
          
    }
    
    /**
     * Display the specified resourlb.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lb = Le::find($id);
        return view('building.lb.show')->withlb($lb);
    }

    /**
     * Show the form for editing the specified resourlb.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lb = Le::find($id);
        
        return view('building.lb.edit')->withlb($lb);
    }

    /**
     * Update the specified resourlb in storage.
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
            


   $lb = Le::find($id);

        $lb->room_no = $request->input('room_no');
        $lb->capacity = $request->input('capacity');
        $lb->room_type = $request->input('room_type');
       
           $lb->save();

             return redirect()->route('lb.show', $lb->id);
    }

    /**
     * Remove the specified resourlb from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $lb = Le::find($id);
         
        $lb->delete();
        $lb = Le::orderBy('id', 'asc')->paginate(500);
        return view('building.lb.lbinfo')->withlb($lb);

    }
}
