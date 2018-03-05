<?php

namespace App\Http\Controllers;

use App\Bus;
use App\Busbook;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bus = Bus::orderBy('id', 'asc')->paginate(500);
        return view('bus.index')->withbus($bus);
    }
    
    public function businfo()
    {
          $bus = Bus::orderBy('id', 'asc')->paginate(500);
        return view('bus.businfo')->withbus($bus);
    }

    // Search bus by date
    public function bussearch(Request $request)
    {

        $this->validate($request, array(
            'sdate'         => 'required',
            'edate'          => 'required'           
        ));


        Session::set('sdate', $request->sdate);
        Session::set('edate', $request->edate);
        $s =  $this->buses();
        echo $s;

    }
    public function buses()
    {
        $sdate = Session::get('sdate');
        $edate = Session::get('edate');
        
        $bus = Bus::whereBetween('date', [$sdate, $edate])->get();

        $searchbus = array();
        $j = 0;

        for ($i=0; $i < count($bus); $i++) { 
             $bookedbus = DB::table('busbooks')->where([
                ['bus_number', '=', $bus[$i]->bus_number],
                ['status', '=', '1'],
            ])->first();

             if(count($bookedbus) == 0){
                 $searchbus[$j] = $bus[$i];         
             }

             $j++;
        }

        return view('bus.bussearch')->with('bus',$searchbus)->with('start',$sdate)->with('end',$edate);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bus.create');
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
               
                'bus_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'bus_number'          => 'required',
                'capacity'          => 'required|numeric',
                'date'          => 'required',
                'image'         => 'required'
                
                 ));


        $bus = new Bus;

       $bus->bus_name = $request->bus_name;
       $bus->bus_number = $request->bus_number;
       $bus->capacity = $request->capacity;
       $bus->date = $request->date;

       $files = $request->image;
       $destinationPath = 'upload';
       $filename = $files->getClientOriginalName();
       $upload_success = $files->move($destinationPath, $filename);

       $bus->image = $upload_success;


       $bus->save();

       return redirect()->route('bus.create', $bus->id);
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bus = Bus::find($id);
        return view('bus.show')->withbus($bus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::find($id);
        
        return view('bus.edit')->withbus($bus);
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

                'bus_name'         => 'required|regex:/^[\pL\s\-]+$/u',
                'bus_number'          => 'required',
                'capacity'          => 'required|numeric',
                'date'          => 'required'
               
                
                 ));



   $bus = Bus::find($id);

        $bus->bus_name = $request->bus_name;
        $bus->bus_number = $request->bus_number;
        $bus->capacity = $request->capacity;
        $bus->date = $request->date;
       
       
           $bus->save();

             return redirect()->route('bus.show', $bus->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $bus = Bus::find($id);
         
        $bus->delete();
    }
}
