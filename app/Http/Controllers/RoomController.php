<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::orderBy('id', 'asc')->paginate(500);
        return view('room.index')->withroom($room);
    }

    public function roominfo()
    {
          $room = Room::orderBy('id', 'asc')->paginate(500);
        return view('room.roominfo')->withroom($room);
    }
   

    // Search Room by date
    public function roomsearch(Request $request)
    {

        $this->validate($request, array(
            'sdate'         => 'required',
            'edate'          => 'required'           
        ));


        Session::set('sdate', $request->sdate);
        Session::set('edate', $request->edate);
        $s =  $this->rooms();
        echo $s;

    }
    public function rooms()
    {
        $sdate = Session::get('sdate');
        $edate = Session::get('edate');
        
        // $sdate = Carbon::parse($start)->format('d M Y');
        // $edate = Carbon::parse($end)->format('d M Y');
        $room = Room::whereBetween('date', array($sdate, $edate))->get();

        $searchroom = array();
        $j = 0;

        for ($i=0; $i < count($room); $i++) { 
           $bookedroom = DB::table('roombooks')->where([
            ['room_number', '=', $room[$i]->room_number],
            ['status', '=', '1'],
        ])->first();

           if(count($bookedroom) == 0){
               $searchroom[$j] = $room[$i];         
           }

           $j++;
       }

       return view('room.roomsearch')->with('room',$searchroom)->with('start',$sdate)->with('end',$edate);
   }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
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
               
                'room_type'         => 'required|regex:/^[\pL\s\-]+$/u',
                'room_number'          => 'required|numeric',
                'capacity'          => 'required|numeric',
                'date'          => 'required'
               
                
                
                 ));
            

   $room = new Room;

        $room->room_type = $request->room_type;
        $room->room_number = $request->room_number;
        $room->capacity = $request->capacity;
        $room->date = $request->date;

           $room->save();

            return redirect()->route('room.create', $room->id);
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        return view('room.show')->withroom($room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        
        return view('room.edit')->withroom($room);
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

                'room_type'         => 'required|regex:/^[\pL\s\-]+$/u',
                'room_number'          => 'required|numeric',
                'capacity'          => 'required|numeric',
                'date'          => 'required'
               
                
                 ));
            


   $room = Room::find($id);

        $room->room_type = $request->input('room_type');
        $room->room_number = $request->input('room_number');
        $room->capacity = $request->input('capacity');
        $room->date = $request->input('date');
       
       
           $room->save();

             return redirect()->route('room.show', $room->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $room = Room::find($id);
         
        $room->delete();
    }
}
