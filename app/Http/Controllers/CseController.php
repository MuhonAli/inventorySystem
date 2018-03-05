<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

Use Illuminate\Support\Facades\Redirect;

use App\Furniture;
use App\Instrument;
use DB;

use\App\Cse;

use Session;


class CseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tsc = Cse::orderBy('id', 'asc')->paginate(500);

    
        return view('building.cse.index',compact('tsc'));
    }
   
    public function cseinfo()
    {
          $cse = Cse::orderBy('id', 'asc')->paginate(500);
        return view('building.cse.cseinfo')->withcse($cse);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.cse.create');
    }

     public function addcse($type, $id)
    {
        if ($type == 'furniture') {            
            $data = Furniture::pluck('furniture_name', 'id')->toArray();
        }
        else{            
            $data = Instrument::pluck('ins_name', 'id')->toArray();            
        }

        return view('building.cse.addcse',compact(['data','type','id']));
    }


    public function addtocse(Request $request)
    {

        if ($request->type == 'furniture') {

            $furniture = DB::table('furnitures')->where('id','=',$request->furniture)->first();

            $all_fur = DB::table('furnitures')->get();
            
            $cse_fur = DB::table('furnitures')
            ->join('cse_furniture', 'cse_furniture.furniture_id', '=', 'furnitures.id')
            ->where('furnitures.id','=',$request->furniture)
            ->get();
            $eee_fur = DB::table('furnitures')
            ->join('eee_furniture', 'eee_furniture.furniture_id', '=', 'furnitures.id')
            ->where('furnitures.id','=',$request->furniture)
            ->get();
            $ce_fur = DB::table('furnitures')
            ->join('ce_furniture', 'ce_furniture.furniture_id', '=', 'furnitures.id')
            ->where('furnitures.id','=',$request->furniture)
            ->get();

            $i = 0;
            $total = 0;
            foreach ($all_fur as $key => $value) {
                $fur[$i]['fur_name'] = $value->furniture_name;
                $fur[$i]['total'] = 0;
                $i++;
            }
            foreach ($cse_fur as $key => $value) {
                $fur[$i]['fur_name'] = $value->furniture_name;
                $fur[$i]['total'] = $total + $value->quantity;
                $i++;
            }
            foreach ($eee_fur as $key => $value) {
                $fur[$i]['fur_name'] = $value->furniture_name;
                $fur[$i]['total'] = $total + $value->quantity;
                $i++;
            }
            foreach ($ce_fur as $key => $value) {
                $fur[$i]['fur_name'] = $value->furniture_name;
                $fur[$i]['total'] = $total + $value->quantity;
                $i++;

            }

            // Count Total
            $result = array();
            foreach ($fur as $val) {
                if (!isset($result[$val['fur_name']])){
                    $result[$val['fur_name']] = $val;
                }
                else{
                    $result[$val['fur_name']]['total'] += $val['total'];
                }
            }
            $result = array_values($result);
            $totals = 0;
            for ($i=0; $i < count($result) ; $i++) { 
                $totals = $result[$i]['total'];
            }

            $rem = $furniture->furniture_quantity - $totals;

            if ($rem < $request->quantity) {
                return Redirect::back()->withErrors(['Furniture not remain', 'msg']);
            }
            else{
               DB::table('cse_furniture')->insert([
                ['cse_id' => $request->id, 'furniture_id' => $request->furniture, 'quantity' => $request->quantity]
            ]);
           }

       }
       else{

        $instrument = DB::table('instruments')->where('id','=',$request->instrument)->first();

        $all_ins = DB::table('instruments')->get();
        $cse_ins = DB::table('instruments')
        ->join('cse_instrument', 'cse_instrument.instrument_id', '=', 'instruments.id')
        ->where('instruments.id','=',$request->instrument)
        ->get();
        $ce_ins = DB::table('instruments')
        ->join('ce_instrument', 'ce_instrument.instrument_id', '=', 'instruments.id')
        ->where('instruments.id','=',$request->instrument)
        ->get();
        $eee_ins = DB::table('instruments')
        ->join('eee_instrument', 'eee_instrument.instrument_id', '=', 'instruments.id')
        ->where('instruments.id','=',$request->instrument)
        ->get();


        $i = 0;
        $total = 0;
        foreach ($all_ins as $key => $value) {
            $ins[$i]['ins_name'] = $value->ins_name;
            $ins[$i]['total'] = 0;
            $i++;
        }
        foreach ($cse_ins as $key => $value) {
            $ins[$i]['ins_name'] = $value->ins_name;
            $ins[$i]['total'] = $total + $value->quantity;
            $i++;
        }
        foreach ($eee_ins as $key => $value) {
            $ins[$i]['ins_name'] = $value->ins_name;
            $ins[$i]['total'] = $total + $value->quantity;
            $i++;
        }
        foreach ($ce_ins as $key => $value) {
            $ins[$i]['ins_name'] = $value->ins_name;
            $ins[$i]['total'] = $total + $value->quantity;
            $i++;
        }

        // Count Total Instrument
        $result = array();
        foreach ($ins as $val) {
            if (!isset($result[$val['ins_name']])){
                $result[$val['ins_name']] = $val;
            }
            else{
                $result[$val['ins_name']]['total'] += $val['total'];
            }
        }
        $result = array_values($result);

        $totals = 0;
        for ($i=0; $i < count($result) ; $i++) { 
            $totals = $result[$i]['total'];
        }

        $rem = $instrument->ins_quantity - $totals;

        if ($rem < $request->quantity) {
            return Redirect::back()->withErrors(['Instrument not remain', 'msg']);
        }
        else{
         DB::table('cse_instrument')->insert([
            ['cse_id' => $request->id, 'instrument_id' => $request->instrument, 'quantity' => $request->quantity]
        ]);
     }


       
 }


         return redirect('cseinfo');
}

    

    public function showcse($id)
    {

            $cse_fur = DB::table('furnitures')
            ->join('cse_furniture', 'cse_furniture.furniture_id', '=', 'furnitures.id')
            ->join('cses', 'cses.id', '=', 'cse_furniture.cse_id')
            ->where('cses.id','=',$id)
            ->get();

            $cse_ins = DB::table('instruments')
            ->join('cse_instrument', 'cse_instrument.instrument_id', '=', 'instruments.id')
            ->join('cses', 'cses.id', '=', 'cse_instrument.cse_id')
            ->where('cses.id','=',$id)
            ->get();

            return view('building.cse.cseshow', compact(['cse_fur', 'cse_ins', 'id']));       
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
            

   $cse = new Cse;

        $cse->room_no = $request->room_no;
        $cse->capacity = $request->capacity;
        $cse->room_type = $request->room_type;


           $cse->save();

           session()->flash('roomaddcse', 'Room Added Successfully');

            return redirect('cseinfo');
          
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cse = Cse::find($id);
        return view('building.cse.show')->withcse($cse);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cse = Cse::find($id);
        
        return view('building.cse.edit')->withcse($cse);
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
            


   $cse = Cse::find($id);

        $cse->room_no = $request->input('room_no');
        $cse->capacity = $request->input('capacity');
        $cse->room_type = $request->input('room_type');
       
           $cse->save();

             return redirect()->route('cse.show', $cse->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cse = Cse::find($id);
         
        $cse->delete();
         $cse = Cse::orderBy('id', 'asc')->paginate(500);
        return view('building.cse.cseinfo')->withcse($cse);
    }

 
}
