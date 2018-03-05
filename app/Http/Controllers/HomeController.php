<?php

namespace App\Http\Controllers;

use Auth;
use App\Busbook;
use App\Http\Requests;
use App\Roombook;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('admin');
    }

    // Show message after Booked
    public function showmsgs()
    {
        $userid = Auth::user()->id;
        
        $busdata = Busbook::where('user_id', '=', $userid)->get();
        foreach ($busdata as $key => $value) {
            if ($value->status == 1 && $value->seen == 0) {
                $booked = Busbook::find($value->id);
                $booked->seen = 1;
                $booked->save();
            }
        }

        $roomdata = Roombook::where('user_id', '=', $userid)->get();
        foreach ($roomdata as $key => $value) {
            if ($value->status == 1 && $value->seen == 0) {
                $booked = Roombook::find($value->id);
                $booked->seen = 1;
                $booked->save();
            }
        }

        //$bus = Busbook::where('user_id', '=', $userid)->orderBy('created_at', 'desc')->get();
        //$room = Roombook::where('user_id', '=', $userid)->orderBy('created_at', 'desc')->get();

        $bus  =  DB::table('busbooks')
                ->join('buses', 'buses.bus_number', '=', 'busbooks.bus_number')
                ->where('busbooks.user_id', '=', $userid)
                ->get();

        $room  =  DB::table('roombooks')
                ->join('rooms', 'rooms.room_number', '=', 'roombooks.room_number')
                ->where('roombooks.user_id', '=', $userid)
                ->get();


        return view('msg')->with('bus',$bus)->with('room',$room);
    }




    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

     public function home2()
    {
        return view('home2');
    }

     public function index()
    {
        return view('index');
    }

      public function info()
    {
        return view('info');
    }

    public function sidebar()
    {
        return view('admin.sidebar');
    }
 public function check()
    {
        return view('admin.check');
    }
public function check2()
    {
        return view('admin.check2');
    }



public function buildingList()
    {
        return view('building/buildingList');
    }

}
